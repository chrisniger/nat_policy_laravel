<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('legacy_wp_id')->nullable()->index();
            $table->foreignId('author_id')->constrained('authors')->cascadeOnDelete();
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->string('slug')->unique();
            $table->text('excerpt')->nullable();
            $table->longText('body');
            $table->string('status')->default('draft')->index();
            $table->foreignId('featured_media_id')->nullable()->constrained('media')->nullOnDelete();
            $table->boolean('default_image_used')->default(false);
            $table->string('seo_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('canonical_url')->nullable();
            $table->boolean('robots_index')->default(true);
            $table->boolean('robots_follow')->default(true);
            $table->string('social_title')->nullable();
            $table->text('social_description')->nullable();
            $table->foreignId('social_media_id')->nullable()->constrained('media')->nullOnDelete();
            $table->boolean('allow_comments')->default(false);
            $table->boolean('show_view_count')->default(true);
            $table->boolean('featured')->default(false);
            $table->unsignedInteger('featured_weight')->default(0);
            $table->timestamp('published_at')->nullable()->index();
            $table->timestamp('scheduled_at')->nullable()->index();
            $table->timestamp('updated_content_at')->nullable();
            $table->string('legacy_url')->nullable()->index();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
