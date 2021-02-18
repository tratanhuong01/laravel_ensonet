<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\Ensonet;
use App\Models\Chitietthongtin;
use App\Models\Taikhoan;
// Đăng Nhập
Route::get('/login', function () {
    return view('Guest/login');
});
Route::get('LoadFromRegister',function() {
    return view('Modal/ModalDangNhap/ModalFormRegister');
});
Route::get('ProcessRegister','App\Http\Controllers\RegisterController@register');
Route::get('ProcessVerify','App\Http\Controllers\VerifyMailController@verify');
Route::get('VerifySuccess','App\Http\Controllers\VerifyMailController@verify');
Route::post('ProcessLogin','App\Http\Controllers\LoginController@login')->name('ProcessLogin');
Route::post('NewBieLogin','App\Http\Controllers\NewBieController@login')->name('NewBieLogin');
Route::get('logout','App\Http\Controllers\LogoutController@logout');
Route::get('index', function() {
    return view('Guest/index');
});
Route::get('profile.{id}','App\Http\Controllers\ProfileController@view');
Route::get('ProcessRequestFriend','App\Http\Controllers\RequestFriendController@send');
Route::get('ProcessCancelRequestFriend','App\Http\Controllers\CancelRequestFriendController@cancel');
Route::get('ProcessAcceptFriend','App\Http\Controllers\AcceptFriendController@accept');
Route::get('ProcessDeleteFriend','App\Http\Controllers\DeleteFriendController@delete');
Route::get('ProcessSendCodeAgain','App\Http\Controllers\SendCodeAgainController@send');
Route::get('checked',function() {
    $regex = '';
    if (preg_match($regex,'Hưởng') == 1) 
    echo "oke";
    else 
    echo "not oke";
});