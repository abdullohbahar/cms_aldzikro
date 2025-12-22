<?php

namespace App\Http\Middleware;

use App\Models\Visitor;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Only track GET requests (not POST, PUT, DELETE)
        if ($request->isMethod('GET')) {
            try {
                $ipAddress = $request->ip();
                $today = now()->startOfDay();
                
                // Check if this IP already visited today
                $existingVisit = Visitor::where('ip_address', $ipAddress)
                    ->where('visited_at', '>=', $today)
                    ->exists();
                
                // Only insert if not visited today (unique visitor per day)
                if (!$existingVisit) {
                    Visitor::create([
                        'ip_address' => $ipAddress,
                        'user_agent' => $request->userAgent(),
                        'page_url' => $request->fullUrl(),
                        'visited_at' => now(),
                    ]);
                }
            } catch (\Exception $e) {
                // Silently fail if tracking fails, don't break the page
                \Log::error('Visitor tracking failed: ' . $e->getMessage());
            }
        }

        return $next($request);
    }
}
