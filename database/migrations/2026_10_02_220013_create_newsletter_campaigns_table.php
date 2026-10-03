<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('newsletter_campaigns', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subject');
            $table->string('preview_text')->nullable();
            $table->longText('body');
            $table->string('status')->default('draft')->index();
            $table->string('provider')->nullable();
            $table->string('provider_campaign_id')->nullable();
            $table->timestamp('scheduled_at')->nullable();
            $table->timestamp('sent_at')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });

        Schema::create('newsletter_campaign_article', function (Blueprint $table) {
            $table->foreignId('campaign_id')->constrained('newsletter_campaigns')->cascadeOnDelete();
            $table->foreignId('article_id')->constrained('articles')->cascadeOnDelete();
            $table->unique(['campaign_id', 'article_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('newsletter_campaign_article');
        Schema::dropIfExists('newsletter_campaigns');
    }
};
