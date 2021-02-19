<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Albumanh extends Migration
{
    public function up()
    {
        Schema::create('albumanh', function (Blueprint $table) {
            $table->string('IDAlbumAnh',10)->primary();
            $table->string('TenAlbum', 100);
        });
    }

    public function down()
    {
        Schema::drop('albumanh');
    }
}
