<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Loaithongbao extends Migration
{
    public function up()
    {
        Schema::create('loaithongbao', function (Blueprint $table) {
            $table->string('IDLoaiThongBao', 10)->primary();
            $table->string('TenLoaiThongBao', 100);
        });
    }

    public function down()
    {
        Schema::drop('loaithongbao');
    }
}
