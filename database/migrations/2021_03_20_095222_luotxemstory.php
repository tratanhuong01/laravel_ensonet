<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LuotXemStory extends Migration
{
    public function up()
    {
        Schema::create('luotxemstory', function (Blueprint $table) {
            $table->increments('IDLuotXemStory');
            $table->string('IDStory', 10)->index();
            $table->string('IDXem', 10);
            $table->foreign('IDStory')->references('IDStory')->on('story')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::drop('luotxemstory');
    }
}
