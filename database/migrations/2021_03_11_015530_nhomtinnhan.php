<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Nhomtinnhan extends Migration
{
    public function up()
    {
        Schema::create('nhomtinnhan', function (Blueprint $table) {
            $table->string('IDNhomTinNhan', 10)->primary();
            $table->string('TenNhomTinNhan', 100);
            $table->string('Mau', 10)->nullable();
            $table->string('BieuTuong', 10)->nullable();
            $table->integer('LoaiNhomTinNhan');
        });
    }

    public function down()
    {
        Schema::drop('nhomtinnhan');
    }
}
