<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnrollmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrollments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('course_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('enrolled_by_user_id')->unsigned();
            $table->integer('accepted_by_lecturer')->nullable();
            $table->integer('accepted_by_student')->nullable();
            $table->string('enrolled_date')->nullable();
            $table->integer('is_request')->default(1);
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
        Schema::dropIfExists('enrollments');
    }
}

//id
//course_id
//user_id
//enrolled_by_user_id
//enrolled_date
//is_request
//accepted_by_lecturer
//accepted_by_student