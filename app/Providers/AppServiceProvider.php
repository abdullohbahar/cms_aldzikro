<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Admin gate - full access
        Gate::define('admin', function (User $user) {
            return $user->role === 'admin';
        });

        // Manage articles - admin and author can create/edit
        Gate::define('manage-articles', function (User $user) {
            return in_array($user->role, ['admin', 'author','reviewer']);
        });

        // Publish articles - admin and reviewer can publish
        Gate::define('publish-articles', function (User $user) {
            return in_array($user->role, ['admin', 'reviewer']);
        });

        // Edit own article - author can only edit their own
        Gate::define('edit-article', function (User $user, $article) {
            return $user->role === 'admin' || $user->role === 'reviewer' || $user->id === $article->user_id;
        });

        // Manage users - only admin
        Gate::define('manage-users', function (User $user) {
            return $user->role === 'admin';
        });

        // Manage categories and galleries - only admin
        Gate::define('manage-categories', function (User $user) {
            return $user->role === 'admin';
        });

        Gate::define('manage-galleries', function (User $user) {
            return $user->role === 'admin';
        });

        // Use Tailwind pagination
        \Illuminate\Pagination\Paginator::defaultView('pagination::tailwind');

        if (app()->environment('production')) {
            URL::forceScheme('https');
        }
    }
}
