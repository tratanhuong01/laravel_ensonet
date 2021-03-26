<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Congty extends Migration
{
    public function up()
    {
        Schema::create('congty', function (Blueprint $table) {
            $table->string('IDCongTy', 10)->primary();
            $table->string('IDTrang', 10)->index();
            $table->string('TenCongTy', 200)->nullable();
            $table->foreign('IDTrang')->references('IDTrang')->on('trang')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::drop('congty');
    }
}
