<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('membership_applications', function (Blueprint $table) {
            $table->id();
            $table->string('reference_code')->unique();
            $table->foreignId('photo_media_id')->nullable()->constrained('media')->nullOnDelete();
            $table->string('title')->nullable();
            $table->string('full_name');
            $table->date('date_of_birth')->nullable();
            $table->string('nationality')->nullable();
            $table->string('state_province')->nullable();
            $table->string('lga')->nullable();
            $table->text('contact_address')->nullable();
            $table->string('phone');
            $table->string('email');
            $table->string('occupation')->nullable();
            $table->string('organization')->nullable();
            $table->string('designation')->nullable();
            $table->unsignedSmallInteger('years_experience')->nullable();
            $table->json('areas_of_interest')->nullable();
            $table->string('membership_classification')->nullable();
            $table->boolean('declaration_accepted');
            $table->string('status')->default('pending')->index();
            $table->text('notes')->nullable();
            $table->timestamp('submitted_at')->nullable();
            $table->foreignId('reviewed_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('membership_applications');
    }
};
