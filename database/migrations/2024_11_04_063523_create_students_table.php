<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('email')->unique();
            $table->integer('course_id')->nullable();
            $table->string('address')->nullable();
            $table->string('national_id')->unique(); 
            $table->string('college_name')->nullable();
            $table->string('specialization')->nullable();
            $table->decimal('overall_grade', 5, 2)->nullable();
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
