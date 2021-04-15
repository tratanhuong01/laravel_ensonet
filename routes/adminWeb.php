<?php

namespace App\Http\Controllers\Admin;

use App\Models\Gioithieu;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('/login', function () {
    if (session()->has('admin'))
        return redirect()->to('admin/index')->send();
    else
        return view('Admin/login');
});

Route::get('/index', function () {
    return view('Admin/index');
});

Route::post('ProcessLoginAd', [LoginControllerAd::class, 'login'])
    ->name('ProcessLoginAd');

Route::get('test', function () {
    echo "<pre>";
    print_r(json_decode(Gioithieu::where('gioithieu.IDTaiKhoan', '=', '1000000001')->get()[0]->JsonGioiThieu));
    echo "</pre>";
});
