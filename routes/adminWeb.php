<?php

namespace App\Http\Controllers\Admin;

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
