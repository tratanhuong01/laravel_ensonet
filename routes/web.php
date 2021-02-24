<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\Ensonet;
use App\Models\Taikhoan;
use App\Models\Functions;
use App\Events\RedisEvent;
// Đăng Nhập
Route::get('/login', function () {
    return view('Guest/login');
});
// ajax đăng kí
Route::get('LoadFromRegister', function () {
    return view('Modal/ModalDangNhap/ModalFormRegister');
});
// xử lí đăng kí

Route::get('ProcessRegister', [DangKi\RegisterController::class, 'register']);
//ajax xác nhận code

Route::get('ProcessVerify', [DangKi\VerifyMailController::class, 'verify']);

//ajax quên mật khẩu
Route::get('ProcessForgetAccount', [TaiKhoan\ForgetAccountController::class, 'get']);

//ajax xác nhận thành công
Route::get('VerifySuccess', [VerifyMailController::class, 'verify']);

// ajax đăng nhập
Route::post('ProcessLogin', [DangNhap\LoginController::class, 'login'])->name('ProcessLogin');

// xử lí người dùng mới
Route::post('NewBieLogin', [DangNhap\NewBieController::class, 'login'])->name('NewBieLogin');

//xử lí đăng xuất
Route::get('logout', [DangNhap\LogoutController::class, 'logout']);

// redriect sang index
Route::get('index', function () {
    return view('Guest/index');
});

// profile người dùng
Route::get('profile.{id}', [ProfileController::class, 'view']);

// ajax yêu cầu kết bạn
Route::get('ProcessRequestFriend', [MoiQuanHe\RequestFriendController::class, 'send']);

// ajax hủy yêu cầu kết bạn
Route::get('ProcessCancelRequestFriend', [MoiQuanHe\CancelRequestFriendController::class, 'cancel']);

// ajax chấp nhận kết bạn
Route::get('ProcessAcceptFriend', [MoiQuanHe\AcceptFriendController::class, 'accept']);

// ajax xóa kết bạn
Route::get('ProcessDeleteFriend', [MoiQuanHe\DeleteFriendController::class, 'delete']);

// ajax gửi lại code
Route::get('ProcessSendCodeAgain', [TaiKhoan\SendCodeAgainController::class, 'send']);

//ajax cập nhật ảnh đại diện
Route::post('ProcessUpdateAvatar', [UpdateAvatarController::class, 'update'])
    ->name('ProcessUpdateAvatar');

// ajax cập nhật ảnh bìa
Route::post('ProcessUpdateCoverImage', [UpdateCoverImageController::class, 'update'])
    ->name('ProcessUpdateCoverImage');

// ajax xem trước ảnh đại diện
Route::post('ProcessViewAvatar', [UpdateAvatarController::class, 'view'])
    ->name('ProcessViewAvatar');

// ajax xem trước ảnh bìa
Route::get('ProcessViewCoverImage', [UpdateCoverImageController::class, 'view']);

// xử lí bài đăng thông thường
Route::post('ProcessPostNormal', [BaiDang\PostNormalController::class, 'post'])
    ->name('ProcessPostNormal');

// ajax quên tài khoản
Route::get('LoadQuenTaiKhoan', function () {
    return view('Modal\ModalDangNhap\ModalNhapTT');
});

// redriect bạn bè
Route::get('ProcessProfileFriend', [ProfileFriendsController::class, 'view']);

// ajax bày tỏ cảm xúc bài đăng
Route::get('ProcessFeelPost', [BaiDang\FeelController::class, 'feel']);

// ajax xử lí lượt cảm xúc bài đăng
Route::get('ProcessViewFeelPost', [BaiDang\FeelController::class, 'view']);

// ajax xử lí bình luận
Route::post('ProcessCommentPost', [BaiDang\CommentController::class, 'comment'])
    ->name('ProcessCommentPost');

// ajax xử lí phản hồi bình luận
Route::post('ProcessRepCommentPost', [BaiDang\RepCommentController::class, 'rep'])
    ->name('ProcessRepCommentPost');

// ajax xử lí chia sẽ bài viết
Route::post('ProcessSharePost', [BaiDang\SharePostController::class, 'share'])
    ->name('ProcessSharePost');
