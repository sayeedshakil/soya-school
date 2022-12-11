<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institution_details', function (Blueprint $table) {
            $table->id();
            $table->string('aboutus_title');
            $table->string('aboutus_image');
            $table->longText('aboutus_description');
            $table->string('contactus_school_name');
            $table->string('contactus_address');
            $table->string('contactus_mobile');
            $table->string('contactus_telephone')->nullable();
            $table->string('contactus_email')->nullable();
            $table->boolean('is_active')->default(true);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('institution_details');
    }
};
