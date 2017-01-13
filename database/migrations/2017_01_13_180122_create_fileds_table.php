<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFiledsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filed', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fileable_id')->unsigned();
            $table->integer('file_id')->unsigned();
            $table->string('fileable_type');
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
        Schema::dropIfExists('filed');
    }
}


//id
//fileable_id
//fileable_type
//file_id