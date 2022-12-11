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
        Schema::create('feature_boxes', function (Blueprint $table) {
            $table->id();
            $table->string('feature_title');
            $table->string('feature_image');
            $table->string('feature_subtitle1')->nullable();
            $table->string('feature_subtitle2')->nullable();
            $table->string('feature_subtitle3')->nullable();
            $table->string('feature_subtitle_link1')->nullable();
            $table->string('feature_subtitle_link2')->nullable();
            $table->string('feature_subtitle_link3')->nullable();
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
        Schema::dropIfExists('feature_boxes');
    }
};
