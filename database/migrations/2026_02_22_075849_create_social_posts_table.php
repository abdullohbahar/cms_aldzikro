<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('social_posts', function (Blueprint $table) {
            $table->id();
            $table->string('platform'); // youtube, instagram
            $table->string('post_id');
            $table->string('title')->nullable();
            $table->text('url');
            $table->text('thumbnail')->nullable();
            $table->timestamp('posted_at');
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->unique(['platform', 'post_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('social_posts');
    }
};
