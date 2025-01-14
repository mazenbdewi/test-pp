<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
     
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('course_name')->nullable();
        //      $table->string('class')->nullable();
        //    $table->string('teacher_name')->nullable();
               $table->foreignId('section_id');
              $table->foreignId('teacher_id');
            $table->date('year');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
