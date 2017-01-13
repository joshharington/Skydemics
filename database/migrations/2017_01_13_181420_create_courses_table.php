<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->longText('description');
            $table->string('slug');
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('published')->nullable();
            $table->string('published_date')->nullable();
            $table->integer('is_open')->default(1);
            $table->integer('invite_only')->default(0);
            $table->integer('creator_id')->unsigned();
            $table->integer('discipline_id')->unsigned();
            $table->integer('lecturer_id')->unsigned()->nullable();
            $table->integer('featured_image_id')->nullable();
            $table->integer('auto_accept_enrollments')->default(0);
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
        Schema::dropIfExists('courses');
    }
}

//id
//name
//description
//slug
//is_open
//invite_only
//creator_id
//lecturer_id
//start_date
//end_date
//discipline_id
//published
//published_date
//featured_image_id
//auto_accept_enrollments