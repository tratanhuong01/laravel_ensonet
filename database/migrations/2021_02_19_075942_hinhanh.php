<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Hinhanh extends Migration
{
    public function up()
    {
        Schema::create('hinhanh', function (Blueprint $table) {
            $table->string('IDHinhAnh', 10)->primary();
            $table->string('IDAlbumAnh', 10)->index();
            $table->string('IDBaiDang', 10)->index();
            $table->string('NoiDung', 255)->nullable();
            $table->foreign('IDAlbumAnh')->references('IDAlbumAnh')->on('albumanh')->onDelete('cascade');
            $table->foreign('IDBaiDang')->references('IDBaiDang')->on('baidang')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::drop('hinhanh');
    }
}
