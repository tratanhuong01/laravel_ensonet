<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Process;
use App\Models\Notify;
use App\Models\Taikhoan;
use App\Models\Thongbao;
use Illuminate\Support\Facades\Session;
use App\Process\Functions;
use Illuminate\Database\Eloquent\Model;

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
Route::get('ProcessForgetAccount', [TaiKhoans\ForgetAccountController::class, 'get']);

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
Route::get('ProcessSendCodeAgain', [TaiKhoans\SendCodeAgainController::class, 'send']);

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
Route::get('ProcessProfileFriend', [ProfileController::class, 'viewAjaxFriends']);

// redriect bạn bè
Route::get('profile.{IDTaiKhoan}/friends', [ProfileController::class, 'viewFriends']);

// ajax bày tỏ cảm xúc bài đăng
Route::get('ProcessFeelPost', [BaiDang\FeelController::class, 'feel']);

// ajax xử lí lượt cảm xúc bài đăng
Route::get('ProcessViewFeelPost', [BaiDang\FeelController::class, 'view']);

// ajax xử lí bình luận
Route::get('ProcessCommentPost', [BaiDang\CommentController::class, 'comment'])
    ->name('ProcessCommentPost');

// ajax xử lí xem thêm bình luận
Route::get('ProcessViewMoreCommentPost', [BaiDang\CommentController::class, 'viewmore'])
    ->name('ProcessViewMoreCommentPost');

// ajax xử lí xem thêm bình luận
Route::get('ProcessLoadViewMoreComment', [BaiDang\CommentController::class, 'numcomment'])
    ->name('ProcessLoadViewMoreComment');

// ajax xử lí phản hồi bình luận
Route::get('ProcessRepViewCommentPost', [BaiDang\RepCommentController::class, 'repview'])
    ->name('ProcessRepViewCommentPost');

// ajax xử lí phản hồi bình luận
Route::get('ProcessRepViewCommentPost2', [BaiDang\RepCommentController::class, 'repview2'])
    ->name('ProcessRepViewCommentPost2');

// ajax xử lí phản hồi bình luận
Route::get('ProcessRepCommentPost', [BaiDang\RepCommentController::class, 'rep'])
    ->name('ProcessRepCommentPost');

// ajax xử lí chia sẽ bài viết
Route::post('ProcessSharePost', [BaiDang\SharePostController::class, 'share'])
    ->name('ProcessSharePost');

// ajax xử lí xem thông tin người dùng
Route::get('ProcessViewInfo', [ViewInfoHoverController::class, 'view']);

// ajax view lượt cảm xúc
Route::get('ProcessViewDetailFeel', [BaiDang\ViewDetailFeelController::class, 'view']);

// ajax view lượt cảm xúc
Route::get('ProcessViewOnlyDetailFeel', [BaiDang\ViewDetailFeelController::class, 'viewOnly']);

// ajax view lượt cảm xúc cmt
Route::get('ProcessViewDetailFeelCmt', [BaiDang\ViewDetailFeelController::class, 'viewCmt']);

// ajax view lượt cảm xúc cmt
Route::get('ProcessViewOnlyDetailFeelCmt', [BaiDang\ViewDetailFeelController::class, 'viewOnlyCmt']);

// ajax view lượt cảm xúc path khác
Route::get('/{value1}/{value2}/{value3}/ProcessViewDetailFeel', [BaiDang\ViewDetailFeelController::class, 'view']);

// ajax view lượt cảm xúc path khác
Route::get('/{value1}/{value2}/{value3}/ProcessViewOnlyDetailFeel', [BaiDang\ViewDetailFeelController::class, 'viewOnly']);

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
Route::get('/photo/{idBaiDang}/{idHinhAnh}', [Displays\ViewImageController::class, 'views']);

Route::get('/{value1}/{value2}/{value3}/backpage', [Displays\ViewImageController::class, 'backPage'])
    ->name('backpage');

Route::get('/{value1}/{value2}/{value3}/ProcessZoomViewIn', [Displays\ViewImageController::class, 'zoomIn']);

Route::get('/{value1}/{value2}/{value3}/ProcessZoomViewOut', [Displays\ViewImageController::class, 'zoomOut']);

//ajax thả cảm xúc cho bình luận
Route::get('ProcessFeelCommentPost', [BaiDang\FeelCommentPostController::class, 'feel']);

//ajax số lượng cảm xúc của bình luận
Route::get('ProcessLoadNumFeelCommentPost', [BaiDang\FeelCommentPostController::class, 'loadnumfeel']);

//ajax thả cảm xúc cho bình luận
Route::get('ProcessLoadNumRepComment', [BaiDang\RepCommentController::class, 'load']);

//ajax 
Route::get('ProcessViewRepComment', [BaiDang\RepCommentController::class, 'view']);

// ajax xử lí chia sẽ bài viết
Route::get('checked', function () {
    echo "<pre>";
    echo "</pre>";
    // Functions::get();
});

Route::get('ProcessSearchFriend', [TaiKhoans\SearchFriendController::class, 'search']);

// 
Route::get('ProcessModalLast', function () {
    return view('Modal/ModalHeader/ModalLast');
});

// xử lí hiện thông báo
Route::get('ProcessNotificationShow', [Realtime\NotificationController::class, 'notify']);

//xử lí show modal notifications
Route::get('ProcessShowModalNotifications', function () {
    $notify = Notify::getNotify(Session::get('user')[0]->IDTaiKhoan);
    return view('Modal\ModalHeader\ModalThongBao')->with('notify', $notify);
});

//Cập nhật trạng thái của thông báo
Route::get('ProcessUpdateStateNotifications', function () {
    $notify = Thongbao::where('thongbao.IDTaiKhoan', '=', Session::get('user')[0]->IDTaiKhoan)->get();
    $count = 0;
    for ($i = 0; $i < count($notify); $i++) {
        if ($notify[$i]->TinhTrang == 2 || $notify[$i]->TinhTrang == 1)
            $count++;
    }
    if ($count == count($notify)) {
    } else {
        DB::update('UPDATE thongbao SET TinhTrang = ? 
        WHERE IDTaiKhoan = ? ', ['1', Session::get('user')[0]->IDTaiKhoan]);
        return view('Component/Child/SoLuongThongBao')
            ->with('num', Notify::countNotify(Session::get('user')[0]->IDTaiKhoan, 0));
    }
});

//Đánh dấu tất cả là đã đọc
Route::get('ProcessTickAllIsRead', function () {
    DB::update('UPDATE thongbao SET TinhTrang = ? 
    WHERE IDTaiKhoan = ? ', ['2', Session::get('user')[0]->IDTaiKhoan]);
    return '';
});

//post
Route::get('/post/{idBaiDang}', [BaiDang\PostController::class, 'view']);

//dark mode
Route::get('/ProcessDarkMode', function () {
    $darkMode = Taikhoan::where(
        'taikhoan.IDTaiKhoan',
        '=',
        Session::get('user')[0]->IDTaiKhoan
    )->get()[0]->DarkMode;
    if ($darkMode == 0) {
        DB::update(
            'UPDATE taikhoan SET DarkMode = ? WHERE IDTaiKhoan = ? ',
            ['1', Session::get('user')[0]->IDTaiKhoan]
        );
        Session::put(
            'user',
            Taikhoan::where('taikhoan.IDTaiKhoan', '=', Session::get('user')[0]->IDTaiKhoan)
                ->get()
        );
        return 'dark';
    } else {
        DB::update(
            'UPDATE taikhoan SET DarkMode = ? WHERE IDTaiKhoan = ? ',
            ['0', Session::get('user')[0]->IDTaiKhoan]
        );
        Session::put(
            'user',
            Taikhoan::where('taikhoan.IDTaiKhoan', '=', Session::get('user')[0]->IDTaiKhoan)
                ->get()
        );
        return '';
    }
});

// redirect giới thiệu
Route::get('ProcessProfileAbout', [ProfileController::class, 'viewAjaxAbout']);

// redirect giới thiệu
Route::get('profile.{IDTaiKhoan}/about', [ProfileController::class, 'viewAbout']);

// redirect ảnh
Route::get('ProcessProfilePicture', [ProfileController::class, 'viewAjaxPicture']);

// redirect ảnh
Route::get('profile.{IDTaiKhoan}/pictures', [ProfileController::class, 'viewPicture']);

Route::get('friends', function () {
    return view('Guest/FriendRequest');
});

Route::get('ProcessSearchTagFriend', [BaiDang\TagFriendController::class, 'search']);

Route::get('ProcesViewTagFriend', [BaiDang\TagFriendController::class, 'view']);

Route::get('ProcesViewCreatePost', [BaiDang\PostController::class, 'viewCreatePost']);

Route::get('ProcessTagFriend', [BaiDang\TagFriendController::class, 'tag']);

Route::get('ProcessViewFeelCurrent', [BaiDang\FeelController::class, 'viewFeel']);

Route::get('ProcessTickFeelCurrent', [BaiDang\FeelController::class, 'tickFeel']);

Route::get('ProcessSearchFeelCurrent', [BaiDang\FeelController::class, 'searchFeel']);
