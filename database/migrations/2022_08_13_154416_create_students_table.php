<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('studentId')->unique()->nullable();
            $table->string('fName');
            $table->string('lName');
            $table->string('admissionNumber')->nullable();
            $table->string('admissionDate')->nullable();
            $table->string('studentImage')->nullable();
            $table->string('gender');
            $table->string('rollNumber')->nullable();
            $table->string('dateOfBirth')->nullable();
            $table->string('religion');
            $table->string('address');
            $table->string('mobile')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('fatherName');
            $table->string('fatherMobile')->nullable();
            $table->string('fatherOccupation')->nullable();
            $table->string('motherName');
            $table->string('motherMobile')->nullable();
            $table->string('motherOccupation')->nullable();
            $table->foreignId('studentclass_id')->constrained();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
