<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Gioithieu extends Migration
{
    public function up()
    {
        Schema::create('gioithieu', function (Blueprint $table) {
            $table->increments('IDGioiThieu');
            $table->string('IDTaiKhoan', 10)->index();
            $table->json('JsonGioiThieu')->nullable();
            $table->foreign('IDTaiKhoan')->references('IDTaiKhoan')->on('taikhoan')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::drop('gioithieu');
    }
}
