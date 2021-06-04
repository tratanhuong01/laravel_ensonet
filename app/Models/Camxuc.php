<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Camxuc extends Model
{
    protected $table = "camxuc";

    protected $fillable = [
        'IDCamXuc',
        'TenCamXuc',
        'BieuTuong',
    ];
    public static function add(
        $IDCamXuc,
        $TenCamXuc,
        $BieuTuong
    ) {
        $camxuc = new Camxuc;
        $camxuc->IDCamXuc = $IDCamXuc;
        $camxuc->TenCamXuc = $TenCamXuc;
        $camxuc->BieuTuong = $BieuTuong;
        $camxuc->save();
    }
    public static function edit(
        $IDCamXuc,
        $TenCamXuc,
        $BieuTuong
    ) {
        DB::update('UPDATE camxuc SET TenCamXuc = ? , 
        BieuTuong = ? WHERE IDCamXuc = ? ', [
            $TenCamXuc, $BieuTuong, $IDCamXuc
        ]);
    }
    public static function search($data)
    {
        return DB::select("select * from camxuc 
         where camxuc.TenCamXuc LIKE '%" . $data . "%' ");
    }
    public static function gets()
    {
        return Camxuc::get();
    }
    public $timestamps = false;
}
