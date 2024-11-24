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
            $table->integer('school_id')->unsigned();
            $table->integer('division_id')->unsigned();
            $table->string('address')->nullable();
            $table->string('national_id')->unique();
            $table->string('college_name')->nullable();
			$table->enum('level',[1,2,3,4,5,6,7,8,9,10,11,12]);
            $table->string('specialization')->nullable();
            $table->decimal('overall_grade', 5, 2)->nullable();
            $table->foreign('division_id')
            ->references('id')->on('divisions')->onDelete('cascade');
			$table->foreign('school_id')
            ->references('id')->on('schools')->onDelete('cascade');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
