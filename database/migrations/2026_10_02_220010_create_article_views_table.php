<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('article_views', function (Blueprint $table) {
            $table->id();
            $table->foreignId('article_id')->constrained('articles')->cascadeOnDelete();
            $table->date('viewed_on');
            $table->unsignedBigInteger('views')->default(0);
            $table->unsignedBigInteger('unique_estimate')->nullable();
            $table->timestamps();

            $table->unique(['article_id', 'viewed_on']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('article_views');
    }
};
