<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    public $timestamps = false;
}
