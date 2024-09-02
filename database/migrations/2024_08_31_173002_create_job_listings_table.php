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
        Schema::create('job_listings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employer_id')->constrained('employers')->onDelete('cascade');
            $table->string('title');
            $table->text('description');
            $table->json('requirements'); 
            $table->json('required_skills'); 
            $table->string('category'); 
            $table->string('location'); 
            $table->enum('work_type', ['remote', 'on-site', 'hybrid']);
            $table->text('technologies')->nullable(); 
            $table->decimal('salary_range_min', 10, 2)->nullable();
            $table->decimal('salary_range_max', 10, 2)->nullable();
            $table->date('application_deadline');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_listings');
    }
};
