<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Mautinnhan extends Migration
{
    public function up()
    {
        Schema::create('mautinnhan', function (Blueprint $table) {
            $table->string('IDMauTinNhan', 10)->primary();
            $table->string('TenMau', 20);
        });
    }

    public function down()
    {
        Schema::drop('mautinnhan');
    }
}
