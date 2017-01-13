<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('questionset_id')->unsigned();
            $table->integer('option_set_id')->unsigned();
            $table->integer('construct_random')->default(0);
            $table->integer('position');
            $table->integer('required');
            $table->string('deadline')->nullable();
            $table->longText('question');
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
        Schema::dropIfExists('questions');
    }
}

//id
//questionset_id
//question
//option_set_id
//required
//deadline
//position
//construct_random