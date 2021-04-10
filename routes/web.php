<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Storys\StoryController;
use App\Models\Data;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Process;
use App\Models\Notify;
use App\Models\Taikhoan;
use App\Models\Thongbao;
use App\Process\DataProcess;
use Illuminate\Support\Facades\Session;
use App\Models\Functions;
use App\Models\Story;
use App\Process\DataProcessFive;
use App\Process\DataProcessThird;
use Illuminate\Database\Eloquent\Model;

// profile người dùng - ProfileController
Route::get('profile.{id}', [ProfileController::class, 'view']);

//load ajax page bạn bè- ProfileController
Route::get('ProcessProfileFriend', [ProfileController::class, 'viewAjaxFriends']);

//- ProfileController
Route::get('profile.{IDTaiKhoan}/friends', [ProfileController::class, 'viewFriends']);

// redirect giới thiệu- ProfileController
Route::get('ProcessProfileAbout', [ProfileController::class, 'viewAjaxAbout']);

// redirect giới thiệu- ProfileController
Route::get('profile.{IDTaiKhoan}/about', [ProfileController::class, 'viewAbout']);

// redirect ảnh- ProfileController
Route::get('ProcessProfilePicture', [ProfileController::class, 'viewAjaxPicture']);

// redirect ảnh- ProfileController
Route::get('profile.{IDTaiKhoan}/pictures', [ProfileController::class, 'viewPicture']);

Route::group(['namespace' => 'Displays'], function () {
    // 
    Route::get('/photo/{idBaiDang}/{idHinhAnh}', [Displays\ViewImageController::class, 'views']);

    //
    Route::get('/{value1}/{value2}/{value3}/backpage', [Displays\ViewImageController::class, 'backPage'])
        ->name('backpage');

    //
    Route::get('/{value1}/{value2}/{value3}/ProcessZoomViewIn', [Displays\ViewImageController::class, 'zoomIn']);

    //
    Route::get('/{value1}/{value2}/{value3}/ProcessZoomViewOut', [Displays\ViewImageController::class, 'zoomOut']);
});

Route::group(['namespace' => 'DangKi'], function () {
    // xử lí đăng kí
    Route::get('ProcessRegister', [DangKi\RegisterController::class, 'register'])
        ->name('ProcessRegister');

    //ajax xác nhận code
    Route::get('ProcessVerify', [DangKi\VerifyMailController::class, 'verify'])
        ->name('ProcessVerify');
});

Route::group(['namespace' => 'TaiKhoans'], function () {
    //ajax quên mật khẩu
    Route::get('ProcessForgetAccount', [TaiKhoans\ForgetAccountController::class, 'get'])
        ->name('ProcessForgetAccount');

    // ajax gửi lại code
    Route::get('ProcessSendCodeAgain', [TaiKhoans\SendCodeAgainController::class, 'send'])
        ->name('ProcessSendCodeAgain');

    // tìm kiếm bạn bè
    Route::get('ProcessSearchFriend', [TaiKhoans\SearchFriendController::class, 'search'])
        ->name('ProcessSearchFriend');

    //
    Route::get('ProcessStateUsersOnline', [TaiKhoans\StateUserController::class, 'online'])
        ->name('ProcessStateUsersOnline');

    //
    Route::get('ProcessStateUsersOnlineOther', [TaiKhoans\StateUserController::class, 'onlineOther'])
        ->name('ProcessStateUsersOnlineOther');

    //
    Route::get('ProcessSearchUserChat', [TaiKhoans\SearchFriendController::class, 'searchUserChat'])
        ->name('ProcessSearchUserChat');
});

Route::group(['namespace' => 'DangNhap'], function () {
    // ajax đăng nhập
    Route::post('ProcessLogin', [DangNhap\LoginController::class, 'login'])
        ->name('ProcessLogin');

    //
    Route::post('ProcessSendRequestUser', [DangNhap\RequestUserContrller::class, 'send'])
        ->name('ProcessSendRequestUser');

    // xử lí người dùng mới
    Route::post('NewBieLogin', [DangNhap\NewBieController::class, 'login'])
        ->name('NewBieLogin');

    //xử lí đăng xuất
    Route::get('logout', [DangNhap\LogoutController::class, 'logout'])
        ->name('logout');
});

Route::group(['namespace' => 'MoiQuanHe'], function () {
    // ajax yêu cầu kết bạn
    Route::get('ProcessRequestFriend', [MoiQuanHe\RequestFriendController::class, 'send'])
        ->name('ProcessRequestFriend');

    // ajax hủy yêu cầu kết bạn
    Route::get('ProcessCancelRequestRFriend', [MoiQuanHe\CancelRequestFriendController::class, 'cancelRequest'])
        ->name('ProcessCancelRequestRFriend');

    // ajax hủy yêu cầu kết bạn
    Route::get('ProcessCancelRequestFriend', [MoiQuanHe\CancelRequestFriendController::class, 'cancel'])
        ->name('ProcessCancelRequestFriend');

    // ajax hủy yêu cầu kết bạn
    Route::get('ProcessCancelRequestFriendIndex', [MoiQuanHe\CancelRequestFriendController::class, 'cancelIndex'])
        ->name('ProcessCancelRequestFriendIndex');

    // ajax chấp nhận kết bạn
    Route::get('ProcessAcceptFriend', [MoiQuanHe\AcceptFriendController::class, 'accept'])
        ->name('ProcessAcceptFriend');

    // ajax chấp nhận kết bạn index
    Route::get('ProcessAcceptFriendIndex', [MoiQuanHe\AcceptFriendController::class, 'acceptIndex'])
        ->name('ProcessAcceptFriendIndex');

    // ajax xóa kết bạn
    Route::get('ProcessDeleteFriend', [MoiQuanHe\DeleteFriendController::class, 'delete'])
        ->name('ProcessDeleteFriend');
});

Route::group(['namespace' => 'BaiDang'], function () {
    //
    Route::post('ProcessPostCommentSticker', [BaiDang\CommentController::class, 'postCommentSticker'])
        ->name('ProcessPostCommentSticker');

    //
    Route::post('ProcessPostCommentStickerRep', [BaiDang\RepCommentController::class, 'repPostCommentSticker'])
        ->name('ProcessPostCommentStickerRep');

    // xử lí bài đăng thông thường
    Route::post('ProcessPostNormal', [BaiDang\PostNormalController::class, 'post'])
        ->name('ProcessPostNormal');

    // ajax bày tỏ cảm xúc bài đăng
    Route::get('ProcessFeelPost', [BaiDang\FeelController::class, 'feel'])
        ->name('ProcessFeelPost');

    // ajax xử lí lượt cảm xúc bài đăng
    Route::get('ProcessViewFeelPost', [BaiDang\FeelController::class, 'view'])
        ->name('ProcessViewFeelPost');

    //
    Route::get('ProcessViewFeelCurrent', [BaiDang\FeelController::class, 'viewFeel'])
        ->name('ProcessViewFeelCurrent');

    //
    Route::get('ProcessTickFeelCurrent', [BaiDang\FeelController::class, 'tickFeel'])
        ->name('ProcessTickFeelCurrent');

    //
    Route::get('ProcessSearchFeelCurrent', [BaiDang\FeelController::class, 'searchFeel'])
        ->name('ProcessSearchFeelCurrent');

    // ajax xử lí bình luận
    Route::post('ProcessCommentPost', [BaiDang\CommentController::class, 'comment'])
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
    Route::post('ProcessRepCommentPost', [BaiDang\RepCommentController::class, 'rep'])
        ->name('ProcessRepCommentPost');

    // ajax xử lí chia sẽ bài viết
    Route::get('ProcessShareViewPost', [BaiDang\SharePostController::class, 'shareView'])
        ->name('ProcessShareViewPost');

    //
    Route::get('ProcessSharePost', [BaiDang\SharePostController::class, 'share'])
        ->name('ProcessSharePost');

    // ajax view lượt cảm xúc
    Route::get('ProcessViewDetailFeel', [BaiDang\ViewDetailFeelController::class, 'view'])
        ->name('ProcessViewDetailFeel');

    // ajax view lượt cảm xúc
    Route::get('ProcessViewOnlyDetailFeel', [BaiDang\ViewDetailFeelController::class, 'viewOnly'])
        ->name('ProcessViewOnlyDetailFeel');

    // ajax view lượt cảm xúc cmt
    Route::get('ProcessViewDetailFeelCmt', [BaiDang\ViewDetailFeelController::class, 'viewCmt'])
        ->name('ProcessViewDetailFeelCmt');

    // ajax view lượt cảm xúc cmt
    Route::get('ProcessViewOnlyDetailFeelCmt', [BaiDang\ViewDetailFeelController::class, 'viewOnlyCmt'])
        ->name('ProcessViewOnlyDetailFeelCmt');

    // ajax view lượt cảm xúc path khác
    Route::get('/{value1}/{value2}/{value3}/ProcessViewDetailFeel', [BaiDang\ViewDetailFeelController::class, 'view']);

    // ajax view lượt cảm xúc path khác
    Route::get('/{value1}/{value2}/{value3}/ProcessViewOnlyDetailFeel', [BaiDang\ViewDetailFeelController::class, 'viewOnly']);

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

    //ajax thả cảm xúc cho bình luận
    Route::get('ProcessFeelCommentPost', [BaiDang\FeelCommentPostController::class, 'feel'])
        ->name('ProcessFeelCommentPost');

    //ajax số lượng cảm xúc của bình luận
    Route::get('ProcessLoadNumFeelCommentPost', [BaiDang\FeelCommentPostController::class, 'loadnumfeel'])
        ->name('ProcessLoadNumFeelCommentPost');

    //ajax thả cảm xúc cho bình luận
    Route::get('ProcessLoadNumRepComment', [BaiDang\RepCommentController::class, 'load'])
        ->name('ProcessLoadNumRepComment');

    //ajax 
    Route::get('ProcessViewRepComment', [BaiDang\RepCommentController::class, 'view'])
        ->name('ProcessViewRepComment');

    //post
    Route::get('/post/{idBaiDang}', [BaiDang\PostController::class, 'view']);

    //
    Route::get('ProcessSearchTagFriend', [BaiDang\TagFriendController::class, 'search'])
        ->name('ProcessSearchTagFriend');

    //
    Route::get('ProcesViewTagFriend', [BaiDang\TagFriendController::class, 'view'])
        ->name('ProcesViewTagFriend');

    //
    Route::get('ProcesViewCreatePost', [BaiDang\PostController::class, 'viewCreatePost'])
        ->name('ProcesViewTagFriend');

    //
    Route::get('ProcessTagFriend', [BaiDang\TagFriendController::class, 'tag'])
        ->name('ProcessTagFriend');

    //
    Route::get('ProcessViewUserTagOfPost', [BaiDang\TagFriendController::class, 'viewUserTagOfPost'])
        ->name('ProcessViewUserTagOfPost');

    //
    Route::post('ProcessPostTimeLine', [BaiDang\PostTimeLineController::class, 'post'])
        ->name('ProcessPostTimeLine');

    //
    Route::post('ProcessEditViewComment', [BaiDang\EditCommentController::class, 'editView'])
        ->name('ProcessEditViewComment');

    //
    Route::post('ProcessEditComment', [BaiDang\EditCommentController::class, 'edit'])
        ->name('ProcessEditComment');
});

Route::group(['namespace' => 'TroChuyen'], function () {
    //
    Route::get('ProcessOpenChat', [TroChuyen\ChatController::class, 'view'])
        ->name('ProcessOpenChat');

    //
    Route::get('ProcessMinizeChat', [TroChuyen\ChatController::class, 'minize'])
        ->name('ProcessMinizeChat');

    //
    Route::get('ProcessOpenMessenger', [TroChuyen\ChatController::class, 'openMessenger'])
        ->name('ProcessOpenMessenger');

    //
    Route::post('ProcessSendMessages', [TroChuyen\SendMessageController::class, 'send'])
        ->name('ProcessSendMessages');

    //
    Route::get('ProcessChatEvent', [TroChuyen\SendMessageController::class, 'chatEvent'])
        ->name('ProcessChatEvent');

    //
    Route::get('ProcessViewRemoveMessage', [TroChuyen\DeleteMessageController::class, 'view'])
        ->name('ProcessViewRemoveMessage');

    //
    Route::get('ProcessRemoveMessage', [TroChuyen\DeleteMessageController::class, 'remove'])
        ->name('ProcessRemoveMessage');

    //
    Route::get('ProcessOpenChangeColor', [TroChuyen\ColorMessageController::class, 'open'])
        ->name('ProcessOpenChangeColor');

    //
    Route::get('ProcessChangeColor', [TroChuyen\ColorMessageController::class, 'change'])
        ->name('ProcessChangeColor');

    //
    Route::get('ProcessOpenCreateChat', [TroChuyen\ChatController::class, 'createChat'])
        ->name('ProcessOpenCreateChat');

    //
    Route::get('ProcessAddViewUserChatting', [TroChuyen\ChatController::class, 'addUser'])
        ->name('ProcessAddViewUserChatting');

    //
    Route::get('ProcessRemoveUserSelectedGroup', [TroChuyen\ChatController::class, 'removeUser'])
        ->name('ProcessRemoveUserSelectedGroup');

    //
    Route::get('ProcessLoadGUINewChatRemove', [TroChuyen\ChatController::class, 'loadRemove'])
        ->name('ProcessLoadGUINewChatRemove');

    //
    Route::get('ProcessLoadGUINewChatAdd', [TroChuyen\ChatController::class, 'loadAdd'])
        ->name('ProcessLoadGUINewChatAdd');

    //
    Route::get('ProcessSendMessageGroup', [TroChuyen\ChatController::class, 'sendMessageGroup'])
        ->name('ProcessSendMessageGroup');

    //
    Route::get('ProcessOpenMessageGroup', [TroChuyen\ChatController::class, 'openMessageGroup'])
        ->name('ProcessOpenMessageGroup');

    //
    Route::get('ProcessUpdateStateMessage', [TroChuyen\ChatController::class, 'updateStateMessage'])
        ->name('ProcessUpdateStateMessage');

    //
    Route::get('ProcessSeenMessage', [TroChuyen\ChatController::class, 'seenMessage'])
        ->name('ProcessSeenMessage');
});

//ajax xác nhận thành công
Route::get('VerifySuccess', [VerifyMailController::class, 'verify']);

//ajax cập nhật ảnh đại diện
Route::post('ProcessUpdateAvatar', [UpdateAvatarController::class, 'update'])
    ->name('ProcessUpdateAvatar');

// ajax xem trước ảnh đại diện
Route::post('ProcessViewAvatar', [UpdateAvatarController::class, 'view'])
    ->name('ProcessViewAvatar');

// ajax cập nhật ảnh bìa
Route::post('ProcessUpdateCoverImage', [UpdateCoverImageController::class, 'update'])
    ->name('ProcessUpdateCoverImage');

// ajax xem trước ảnh bìa
Route::get('ProcessViewCoverImage', [UpdateCoverImageController::class, 'view'])
    ->name('ProcessViewCoverImage');

// ajax xử lí xem thông tin người dùng
Route::get('ProcessViewInfo', [ViewInfoHoverController::class, 'view'])
    ->name('ProcessViewInfo');

// xử lí hiện thông báo
Route::get('ProcessNotificationShow', [Realtime\NotificationController::class, 'notify'])
    ->name('ProcessNotificationShow');
//
Route::post('ProcessChangeNameAccount', [SettingController::class, 'changeName'])
    ->name('ProcessChangeNameAccount');

//
Route::post('ProcessChangePasswordAccount', [SettingController::class, 'changePassword'])
    ->name('ProcessChangePasswordAccount');

//
Route::post('ProcessDeleteAccount', [SettingController::class, 'deleteAccount'])
    ->name('ProcessDeleteAccount');

//
Route::post('ProcessVerifyChangePassword', [SettingController::class, 'verifyChangePassword'])
    ->name('ProcessVerifyChangePassword');

// ajax mở hộp thoại bài đăng
Route::get('ProcessOpenPostDialog', function (Request $request) {
    if ($request->type == NULL)
        return view('Modal\ModalBaiDang\ModalTaoBaiViet');
    else
        return view('Modal\ModalBaiDang\ModalVietGiDo');
})->name('ProcessOpenPostDialog');

// ajax chọn quyền riêng tư bài đăng
Route::get('ProcessSelecPrivacyPost', function () {
    return view('Modal\ModalQuyenRiengTu\ModalQuyenRiengTu');
})->name('ProcessSelecPrivacyPost');

// ajax chọn quyền riêng tư bài đăng
Route::get('ProcessOnChangeInputPrivacy', function (Request $request) {
    return view('Component\Child\QuyenRiengTu')->with('idQuyenRiengTu', $request->IDQuyenRiengTu);
})->name('ProcessOnChangeInputPrivacy');

// 
Route::get('ProcessModalLast', function () {
    return view('Modal/ModalHeader/ModalLast');
})->name('ProcessModalLast');

// ajax quên tài khoản
Route::get('LoadQuenTaiKhoan', function () {
    return view('Modal\ModalDangNhap\ModalNhapTT');
});

//xử lí show modal notifications
Route::get('ProcessShowModalNotifications', function () {
    $notify = Notify::getNotify(Session::get('user')[0]->IDTaiKhoan);
    return view('Modal\ModalHeader\ModalThongBao')->with('notify', $notify);
})->name('ProcessShowModalNotifications');

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
        DB::update("UPDATE thongbao SET TinhTrang = ? 
        WHERE IDTaiKhoan = ? AND IDLoaiThongBao != 'TINNHAN001' ", ['1', Session::get('user')[0]->IDTaiKhoan]);
        return view('Component/Child/SoLuongThongBao')
            ->with('num', Notify::countNotify(Session::get('user')[0]->IDTaiKhoan, 0));
    }
})->name('ProcessUpdateStateNotifications');

//Đánh dấu tất cả là đã đọc
Route::get('ProcessTickAllIsRead', function () {
    DB::update("UPDATE thongbao SET TinhTrang = ? 
    WHERE IDTaiKhoan = ? AND IDLoaiThongBao != 'TINNHAN001' ", ['2', Session::get('user')[0]->IDTaiKhoan]);
    return '';
})->name('ProcessTickAllIsRead');

//
Route::post('ProcessEditDescribeUser', [ProfileController::class, 'editDescribeUser'])
    ->name('ProcessEditDescribeUser');

//dark mode
Route::get('ProcessDarkMode', function () {
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
})->name('ProcessDarkMode');

//
Route::get('friends', function () {
    return view('Guest/FriendRequest');
});

//
Route::get('messages/{idNhomTinNhan}', function ($idNhomTinNhan) {
    $chater = DataProcess::getUserOfGroupMessage($idNhomTinNhan);
    $messages = DataProcess::getMessageByNhomTinNhan($idNhomTinNhan);
    return view('Guest/messages')->with('chater', $chater)
        ->with('messages', $messages)
        ->with('idNhomTinNhan', $idNhomTinNhan);
});

//
Route::get('Timeline', function () {
    return strtotime(date("Y-m-d H:i:s")) - strtotime('2021-03-19 15:09:29');
});

//
Route::get('ProcessLoadingPost', function (Request $request) {
    $post = Data::sortAllPost(Session::get('user')[0]->IDTaiKhoan);
    $data = "";
    $num = $request->indexPost;
    $arrayNew = array_slice($post, $num, 3);
    if (count($arrayNew) == 0) {
        return '';
    } else {
        foreach ($arrayNew as $key => $value) {
            switch ($value[0]->LoaiBaiDang) {
                case '0':
                    $data .= view('Component/BaiDang/CapNhatAvatar')
                        ->with('item', $value)
                        ->with('user', Session::get('user'));
                    break;
                case '1':
                    $data .= view('Component/BaiDang/CapNhatAnhBia')
                        ->with('item', $value)
                        ->with('user', Session::get('user'));
                    break;
                case '2':
                    $data .= view('Component/BaiDang/BaiDangTT')
                        ->with('item', $value)
                        ->with('user', Session::get('user'));
                    break;
                case '3':
                    $data .= view('Component/BaiDang/ShareBaiViet')
                        ->with('item', $value)
                        ->with('user', Session::get('user'));
                    break;
            }
        }
        $num += 3;
        return $data . '<input type="hidden" name="indexPost" id="indexPost" value="' . $num . '">';
    }
})->name('ProcessLoadingPost');

//
Route::get('ProcessLoadingPostProfile', function (Request $request) {
    $posts = Functions::getAllPost($request->IDTaiKhoan);
    $data = "";
    $num = $request->indexPost;
    $arrayNew = array_slice($posts, $num, 3);
    if (count($arrayNew) == 0) {
        return '';
    } else {
        foreach ($arrayNew as $key => $value) {
            $post = Functions::getPost($value);
            switch ($value->LoaiBaiDang) {
                case '0':
                    $data .= view('Component/BaiDang/CapNhatAvatar')
                        ->with('item', $post)
                        ->with('user', Session::get('user'));
                    break;
                case '1':
                    $data .= view('Component/BaiDang/CapNhatAnhBia')
                        ->with('item', $post)
                        ->with('user', Session::get('user'));
                    break;
                case '2':
                    $data .= view('Component/BaiDang/BaiDangTT')
                        ->with('item', $post)
                        ->with('user', Session::get('user'));
                    break;
                case '3':
                    $data .= view('Component/BaiDang/ShareBaiViet')
                        ->with('item', $post)
                        ->with('user', Session::get('user'));
                    break;
                case '4':
                    $data .= view('Component/BaiDang/DongThoiGian')
                        ->with('item', $post)
                        ->with('user', Session::get('user'));
                    break;
            }
        }
        $num += 3;
        return $data . '<input type="hidden" name="indexPost" id="indexPost" value="' . $num . '">';
    }
})->name('ProcessLoadingPostProfile');

//
Route::get('ProcessLoading', function () {
    return view('TimeLine/BaiDang') . view('TimeLine/BaiDang');
})->name('ProcessLoading');

//
Route::get('stories/create', function () {
    return view('Guest/Story/createstory');
});

//
Route::get('stories/{IDTaiKhoan}', [Storys\StoryController::class, 'addViewStory']);

//
Route::get('stories/create/text', function () {
    return view('Guest/Story/storytext');
});

//
Route::get('stories/create/picture', function () {
    return view('Guest/Story/storypicture');
});

//
Route::get('stories', function () {
    $story = array();
    $allStory = DataProcessThird::sortStoryByID(Session::get('user')[0]->IDTaiKhoan);
    return view('Guest/Story/viewstory')->with('story', $story)
        ->with('allStory', $allStory);
});

//
Route::get('verify-user-identity', function () {
    return view('Guest/VeriAcc');
});

Route::get('verify-success', function () {
    Session::flush();
    return view('Component/Child/GuiYeuCauThanhCong');
});

//
Route::get('checkpoint', function () {
    return view('Guest/Block');
});

//
Route::get('activity', function () {
    return view('Guest/Activity')->with(
        'data',
        DataProcessThird::getActivityByIDTaiKhoan(Session::get('idcheckpoint'))
    );
});

//
Route::get('change-password', function () {
    return view('Guest/ChangePass');
});

//
Route::get('loadIndexVeriCheckpoint', function () {
    Session::put('user', Taikhoan::where(
        'taikhoan.IDTaiKhoan',
        '=',
        Session::get('idcheckpoint')
    )->get());
    DB::update('UPDATE taikhoan SET taikhoan.TinhTrang = ? 
    WHERE taikhoan.IDTaiKhoan = ? ', ['0', Session::get('idcheckpoint')]);
    Session::forget('idcheckpoint');
    redirect()->to('index')->send();
});

//
Route::get('setting/change-name', function () {
    Session::forget('verify');
    Session::forget('emailSend');
    Session::forget('passWordOld');
    Session::forget('passWordNew');
    Session::forget('typePassWordNew');
    return view('Guest/Setting');
});

//
Route::get('setting/change-password', function () {
    return view('Guest/Setting');
});

//
Route::get('setting/delete-account', function () {
    Session::forget('passWordOld');
    Session::forget('passWordNew');
    Session::forget('typePassWordNew');
    Session::forget('verify');
    Session::forget('emailSend');
    return view('Guest/Setting');
});

//
Route::get('ProcessSeenMessageEvent', function (Request $request) {
    $acc = Taikhoan::where('taikhoan.IDTaiKhoan', '=', $request->IDTaiKhoan)->get();
    return response()->json([
        'idgroup' => $request->IDNhomTinNhan,
        'id' => DataProcessFive::checkShowOrHideMessageRight(
            $request->IDNhomTinNhan,
            $request->IDTaiKhoan
        ),
        'view' => '<img src="/' . $acc[0]->AnhDaiDien . '" class="img-mess-right absolute 
        right-3 w-6 h-6 p-0.5 mt-1 mr-7 object-cover rounded-full bottom-2 -right-8" alt="">'
    ]);
});

// Đăng Nhập
Route::get('/login', function (Request $request) {
    return view('Guest/login');
});

//
Route::get('/', function () {
    if (session()->has('user'))
        redirect()->to('index')->send();
    else
        redirect()->to('index')->send();
});

// redriect sang index
Route::get('index', function () {
    session()->forget('users');
    return view('Guest/index');
});

Route::get('ProcessLoadMessageLimit', function (Request $request) {
    $message = DataProcess::getMessageByNhomTinNhanLimit($request->IDNhomTinNhan, $request->index);

    return response()->json([
        'view' => "" . view('Modal/ModalTroChuyen/Child/Message')
            ->with('messages', $message),
        'index' => $request->index - 15
    ]);
})->name('ProcessLoadMessageLimit');
