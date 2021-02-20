<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\Ensonet;
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
Route::get('ProcessForgetAccount','App\Http\Controllers\ForgetAccountController@get');
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
Route::post('ProcessUpdateAvatar','App\Http\Controllers\UpdateAvatarController@update')->name('ProcessUpdateAvatar');
Route::post('ProcessUpdateCoverImage','App\Http\Controllers\UpdateCoverImageController@update')->name('ProcessUpdateCoverImage');
Route::post('ProcessViewAvatar','App\Http\Controllers\UpdateAvatarController@view')->name('ProcessViewAvatar');
Route::get('ProcessViewCoverImage','App\Http\Controllers\UpdateCoverImageController@view');
Route::get('LoadQuenTaiKhoan',function() {
    return view('Modal\ModalDangNhap\ModalNhapTT');
});
Route::get('checked',function() {
    $datetime = "2021-02-20 17:07:47";
        $result = "";
        $timeInput = strtotime($datetime);
        echo $timeInput ."<br>";
        $timeCurrent = time();
        echo $timeCurrent;
        $time = $timeCurrent - $timeInput;
        $sec = $time;
        $min = round($sec/60);
        $hour = round($sec/(3600));
        $day = round($sec/(86400));
        $week = round($sec/604800);
        $month = round($sec/2629440);
        $year = round($sec/31553280);
        if($sec <= 60)  
        {  
            $result = "Bây giờ";  
        }  
        else if($min <=60)  
        {  
            if($min==1)  
            {  
                $result = "1 phút trước";  
            }  
            else  
            {  
                $result = "$min phút trước";  
            }  
        }  
        else if($hour <=24)  
        {  
            if($hour==1)  
            {  
                $result = "1h";  
            }  
            else  
            {  
                $result = "$hour h";  
            }  
        }  
        else if($day <= 7)  
        {  
            if($day==1)  
            {  
                $result = "Hôm qua";  
            }  
            else  
            {  
                $result = "$day ngày trước";  
            }  
        }  
        else if($week <= 4.3) //4.3 == 52/12  
        {  
            if($week==1)  
            {  
                $result = "1w";  
            }  
            else  
            {  
                $result = "$week w";  
            }  
        }  
        else if($month <=12)  
        {  
            if($month==1)  
            {  
                $result = "a month ago";  
            }  
            else  
            {  
                $result = "$month month ago";  
            }  
        }  
        else  
        {  
            if($year==1)  
            {  
                return "one year ago";  
            }  
            else  
            {  
                return "$year year ago";  
            }  
        } 
        return $result;
});