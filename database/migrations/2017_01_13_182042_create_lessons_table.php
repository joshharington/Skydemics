<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('module_id')->unsigned();
            $table->integer('requires_attendance')->default(1);
            $table->integer('position');
            $table->integer('published')->default(1);
            $table->string('published_date');
            $table->string('name');
            $table->longText('description')->nullable();
            $table->string('slug');
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('lesson_code')->nullable();
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
        Schema::dropIfExists('lessons');
    }
}

//id
//module_id
//name
//description
//slug
//start_date
//end_date
//lesson_code
//requires_attendance
//position
//published
//published_date