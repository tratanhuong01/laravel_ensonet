<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Congty extends Model
{
    protected $table = "congty";

    protected $fillable = [
        'IDCongTy',
        'IDTrang',
        'TenCongTy'
    ];
    public static function add(
        $IDCongTy,
        $IDTrang,
        $TenCongTy
    ) {
        $congty = new Congty;
        $congty->IDCongTy = $IDCongTy;
        $congty->IDTrang = $IDTrang;
        $congty->TenCongTy = $TenCongTy;
        $congty->save();
    }
    public static function edit(
        $IDCongTy,
        $IDTrang,
        $TenCongTy
    ) {
        DB::update('UPDATE congty SET TenCongTy = ? 
        WHERE IDCongTy = ? ', [
            $TenCongTy, $IDCongTy
        ]);
    }
    public $timestamps = false;
}
