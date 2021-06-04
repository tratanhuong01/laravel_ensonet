<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Mautinnhan extends Model
{
    protected $table = "mautinnhan";

    protected $fillable = [
        'IDMauTinNhan',
        'TenMau',
    ];
    public static function add(
        $IDMauTinNhan,
        $TenMau
    ) {
        $mautinnhan = new Mautinnhan;
        $mautinnhan->IDMauTinNhan = $IDMauTinNhan;
        $mautinnhan->TenMau = $TenMau;
        $mautinnhan->save();
    }
    public static function edit(
        $IDMauTinNhan,
        $TenMau
    ) {
        DB::update('UPDATE mautinnhan SET TenMau = ? 
        WHERE IDMauTinNhan = ? ', [
            $TenMau, $IDMauTinNhan
        ]);
    }
    public $timestamps = false;
}
