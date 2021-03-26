<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Amthanh extends Migration
{
    public function up()
    {
        Schema::create('amthanh', function (Blueprint $table) {
            $table->string('IDAmThanh', 10)->primary();
            $table->string('TenAmThanh', 100);
            $table->string('TacGia', 100);
            $table->string('DuongDanAmThanh', 100);
        });
    }

    public function down()
    {
        Schema::drop('amthanh');
    }
}
