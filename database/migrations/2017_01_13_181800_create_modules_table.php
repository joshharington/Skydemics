<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modules', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('course_id')->unsigned();
            $table->integer('featured_image_id')->unsigned()->nullable();
            $table->integer('position')->nullable();
            $table->integer('published')->default(0);
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('slug');
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('extra_info')->nullable();
            $table->string('published_date')->nullable();
            $table->string('temp_guid')->nullable();
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
        Schema::dropIfExists('modules');
    }
}

//id
//course_id
//name
//description
//slug
//featured_image_id
//start_date
//end_date
//extra_info
//position
//published
//published_date