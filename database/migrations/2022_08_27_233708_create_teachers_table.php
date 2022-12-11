<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('teacherId')->unique()->nullable();
            $table->string('fName');
            $table->string('lName');
            $table->string('designation')->nullable();
            $table->string('qualification')->nullable();
            $table->string('contractType')->nullable();
            $table->string('joinDate')->nullable();
            $table->string('maritalStatus')->nullable();
            $table->string('teacherImage')->nullable();
            $table->string('gender');
            $table->string('religion');
            $table->string('address')->nullable();
            $table->string('mobile');
            $table->string('email')->unique()->nullable();
            $table->string('fatherName')->nullable();
            $table->string('motherName')->nullable();
            $table->string('facebook_link')->nullable();
            $table->string('instagram_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('website_link')->nullable();
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
        Schema::dropIfExists('teachers');
    }
}
