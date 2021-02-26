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
use App\Models\Data;
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
    session()->forget('users');
    return view('Guest/index');
});

// profile người dùng
Route::get('profile.{id}', [ProfileController::class, 'view']);

// ajax yêu cầu kết bạn
Route::get('ProcessRequestFriend', [MoiQuanHe\RequestFriendController::class, 'send']);

// ajax hủy yêu cầu kết bạn
Route::get('ProcessCancelRequestFriend', [MoiQuanHe\CancelRequestFriendController::class, 'cancel']);

// ajax hủy yêu cầu kết bạn
Route::get('ProcessCancelRequestFriendIndex', [MoiQuanHe\CancelRequestFriendController::class, 'cancelIndex']);

// ajax chấp nhận kết bạn
Route::get('ProcessAcceptFriend', [MoiQuanHe\AcceptFriendController::class, 'accept']);

// ajax chấp nhận kết bạn index
Route::get('ProcessAcceptFriendIndex', [MoiQuanHe\AcceptFriendController::class, 'acceptIndex']);

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

// ajax xử lí chia sẽ bài viết
Route::get('ProcessViewInfo', [ViewInfoHoverController::class, 'view']);

// ajax view lượt cảm xúc
Route::get('ProcessViewDetailFeel', [BaiDang\ViewDetailFeelController::class, 'view']);

// ajax view lượt cảm xúc
Route::get('ProcessViewOnlyDetailFeel', [BaiDang\ViewDetailFeelController::class, 'viewOnly']);

// ajax mở hộp thoại bài đăng
Route::get('ProcessOpenPostDialog', function () {
    return view('Modal\ModalBaiDang\ModalTaoBaiViet');
});

// ajax chọn quyền riêng tư bài đăng
Route::get('ProcessSelecPrivacyPost', function () {
    return view('Modal\ModalQuyenRiengTu\ModalQuyenRiengTu');
});

// ajax chọn quyền riêng tư bài đăng
Route::get('ProcessOnChangeInputPrivacy', function (Request $request) {
    return view('Component\Child\QuyenRiengTu')->with('idQuyenRiengTu', $request->IDQuyenRiengTu);
});

// ajax xóa bài đăng
Route::get('ProcessDeletePost', [BaiDang\DeletePostController::class, 'delete'])
    ->name('ProcessDeletePost');

// ajax xác nhận xóa bài đăng
Route::get('ProcessWarnDeletePost', [BaiDang\DeletePostController::class, 'warn'])
    ->name('ProcessWarnDeletePost');

// ajax chỉnh sửa bài đăng
Route::get('ProcessEditPost', [BaiDang\EditPostController::class, 'edit'])
    ->name('ProcessEditPost');

// ajax view chỉnh sửa bài đăng
Route::get('ProcessViewEditPost', [BaiDang\EditPostController::class, 'view'])
    ->name('ProcessViewEditPost');

// ajax chỉnh sửa đối tượng bài đăng view
Route::get('ProcessViewObjectPrivacyPost', [BaiDang\EditObjectPrivacyController::class, 'view'])
    ->name('ProcessViewObjectPrivacyPost');

// ajax chỉnh sửa đối tượng bài đăng view
Route::get('ProcessEditObjectPrivacyPost', [BaiDang\EditObjectPrivacyController::class, 'edit'])
    ->name('ProcessEditObjectPrivacyPost');

//xem chi tiết hình 
Route::get('/profile.{idTaiKhoan}/{idBaiDang}/{duongDan}', [Displays\ViewImageController::class, 'views']);

// ajax xử lí chia sẽ bài viết
Route::get('checked', function () {
    echo "<pre>";
    print_r(Data::getDetailFeelPosts('2000000029'));
    echo "</pre>";
});
