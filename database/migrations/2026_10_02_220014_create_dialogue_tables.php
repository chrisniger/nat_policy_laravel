<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dialogue_topics', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('prompt');
            $table->text('description')->nullable();
            $table->string('slug')->unique();
            $table->string('status')->default('draft')->index();
            $table->timestamp('opens_at')->nullable();
            $table->timestamp('closes_at')->nullable();
            $table->boolean('featured')->default(false);
            $table->timestamps();
        });

        Schema::create('dialogue_submissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dialogue_topic_id')->nullable()->constrained('dialogue_topics')->nullOnDelete();
            $table->string('name');
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->text('contribution');
            $table->boolean('consent');
            $table->string('status')->default('new')->index();
            $table->string('published_slug')->nullable();
            $table->foreignId('reviewed_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('reviewed_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dialogue_submissions');
        Schema::dropIfExists('dialogue_topics');
    }
};
