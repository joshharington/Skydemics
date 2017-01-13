<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->increments('id');
            $table->string('filename');
            $table->string('link');
            $table->string('thumb_lg')->nullable();
            $table->string('thumb_md')->nullable();
            $table->string('thumb_sm')->nullable();
            $table->string('ext')->nullable();
            $table->integer('uploader_id')->unsigned();
            $table->string('upload_date');
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
        Schema::dropIfExists('media');
    }
}

//id
//filename
//link
//thumb_lg
//thumb_md
//thumb_sm
//ext
//uploader_id
//upload_date