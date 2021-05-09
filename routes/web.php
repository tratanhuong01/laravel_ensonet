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
use App\Models\Gioithieu;
use App\Models\Story;
use App\Models\StringUtil;
use App\Process\DataProcessFive;
use App\Process\DataProcessSix;
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

//
Route::get('memory', function () {
    return view('Guest.memory');
});

Route::group(['namespace' => 'Displays'], function () {
    // 
    Route::get('/photo/{idBaiDang}/{idHinhAnh}', [Displays\ViewImageController::class, 'views']);

    // 
    Route::get('/comment/{idBinhLuan}/{idHinhAnh}', [Displays\ViewImageController::class, 'viewsComment']);

    //
    Route::get('/{value1}/{value2}/{value3}/backpage', [Displays\ViewImageController::class, 'backPage'])
        ->name('backpage');

    //
    Route::get('/{value1}/{value2}/{value3}/ProcessZoomViewIn', [Displays\ViewImageController::class, 'zoomIn']);

    //
    Route::get('/{value1}/{value2}/{value3}/ProcessZoomViewOut', [Displays\ViewImageController::class, 'zoomOut']);
});

Route::group(['namespace' => 'Register'], function () {
    // xử lí đăng kí
    Route::get('ProcessRegister', [Register\RegisterController::class, 'register'])
        ->name('ProcessRegister');

    //ajax xác nhận code
    Route::get('ProcessVerify', [Register\VerifyMailController::class, 'verify'])
        ->name('ProcessVerify');
});

Route::group(['namespace' => 'Account'], function () {
    //ajax quên mật khẩu
    Route::get('ProcessForgetAccount', [Account\ForgetAccountController::class, 'get'])
        ->name('ProcessForgetAccount');

    // ajax gửi lại code
    Route::get('ProcessSendCodeAgain', [Account\SendCodeAgainController::class, 'send'])
        ->name('ProcessSendCodeAgain');

    // tìm kiếm bạn bè
    Route::get('ProcessSearchFriend', [Account\SearchFriendController::class, 'search'])
        ->name('ProcessSearchFriend');

    //
    Route::get('ProcessStateUsersOnline', [Account\StateUserController::class, 'online'])
        ->name('ProcessStateUsersOnline');

    //
    Route::get('ProcessStateUsersOnlineOther', [Account\StateUserController::class, 'onlineOther'])
        ->name('ProcessStateUsersOnlineOther');

    //
    Route::get('ProcessSearchUserChat', [Account\SearchFriendController::class, 'searchUserChat'])
        ->name('ProcessSearchUserChat');
});

Route::group(['namespace' => 'Login'], function () {
    // ajax đăng nhập
    Route::post('ProcessLogin', [Login\LoginController::class, 'login'])
        ->name('ProcessLogin');

    //
    Route::post('ProcessSendRequestUser', [Login\RequestUserContrller::class, 'send'])
        ->name('ProcessSendRequestUser');

    // xử lí người dùng mới
    Route::post('NewBieLogin', [Login\NewBieController::class, 'login'])
        ->name('NewBieLogin');

    //xử lí đăng xuất
    Route::get('logout', [Login\LogoutController::class, 'logout'])
        ->name('logout');
});

Route::group(['namespace' => 'Relationship'], function () {
    // ajax yêu cầu kết bạn
    Route::get('ProcessRequestFriend', [Relationship\RequestFriendController::class, 'send'])
        ->name('ProcessRequestFriend');

    // ajax hủy yêu cầu kết bạn
    Route::get('ProcessCancelRequestRFriend', [Relationship\CancelRequestFriendController::class, 'cancelRequest'])
        ->name('ProcessCancelRequestRFriend');

    // ajax hủy yêu cầu kết bạn
    Route::get('ProcessCancelRequestFriend', [Relationship\CancelRequestFriendController::class, 'cancel'])
        ->name('ProcessCancelRequestFriend');

    // ajax hủy yêu cầu kết bạn
    Route::get('ProcessCancelRequestFriendIndex', [Relationship\CancelRequestFriendController::class, 'cancelIndex'])
        ->name('ProcessCancelRequestFriendIndex');

    // ajax chấp nhận kết bạn
    Route::get('ProcessAcceptFriend', [Relationship\AcceptFriendController::class, 'accept'])
        ->name('ProcessAcceptFriend');

    // ajax chấp nhận kết bạn index
    Route::get('ProcessAcceptFriendIndex', [Relationship\AcceptFriendController::class, 'acceptIndex'])
        ->name('ProcessAcceptFriendIndex');

    // ajax xóa kết bạn
    Route::get('ProcessDeleteFriend', [Relationship\DeleteFriendController::class, 'delete'])
        ->name('ProcessDeleteFriend');
});

Route::group(['namespace' => 'Post'], function () {
    //
    Route::post('ProcessPostCommentSticker', [Post\CommentController::class, 'postCommentSticker'])
        ->name('ProcessPostCommentSticker');

    //
    Route::post('ProcessPostCommentStickerRep', [Post\RepCommentController::class, 'repPostCommentSticker'])
        ->name('ProcessPostCommentStickerRep');

    // xử lí bài đăng thông thường
    Route::post('ProcessPostNormal', [Post\PostNormalController::class, 'post'])
        ->name('ProcessPostNormal');

    // ajax bày tỏ cảm xúc bài đăng
    Route::get('ProcessFeelPost', [Post\FeelController::class, 'feel'])
        ->name('ProcessFeelPost');

    // ajax xử lí lượt cảm xúc bài đăng
    Route::get('ProcessViewFeelPost', [Post\FeelController::class, 'view'])
        ->name('ProcessViewFeelPost');

    //
    Route::get('ProcessViewFeelCurrent', [Post\FeelController::class, 'viewFeel'])
        ->name('ProcessViewFeelCurrent');

    //
    Route::get('ProcessTickFeelCurrent', [Post\FeelController::class, 'tickFeel'])
        ->name('ProcessTickFeelCurrent');

    //
    Route::get('ProcessSearchFeelCurrent', [Post\FeelController::class, 'searchFeel'])
        ->name('ProcessSearchFeelCurrent');

    // ajax xử lí bình luận
    Route::post('ProcessCommentPost', [Post\CommentController::class, 'comment'])
        ->name('ProcessCommentPost');

    // ajax xử lí xem thêm bình luận
    Route::get('ProcessViewMoreCommentPost', [Post\CommentController::class, 'viewmore'])
        ->name('ProcessViewMoreCommentPost');

    // ajax xử lí xem thêm bình luận
    Route::get('ProcessLoadViewMoreComment', [Post\CommentController::class, 'numcomment'])
        ->name('ProcessLoadViewMoreComment');

    // ajax xử lí phản hồi bình luận
    Route::get('ProcessRepViewCommentPost', [Post\RepCommentController::class, 'repview'])
        ->name('ProcessRepViewCommentPost');

    // ajax xử lí phản hồi bình luận
    Route::get('ProcessRepViewCommentPost2', [Post\RepCommentController::class, 'repview2'])
        ->name('ProcessRepViewCommentPost2');

    // ajax xử lí phản hồi bình luận
    Route::post('ProcessRepCommentPost', [Post\RepCommentController::class, 'rep'])
        ->name('ProcessRepCommentPost');

    // ajax xử lí chia sẽ bài viết
    Route::get('ProcessShareViewPost', [Post\SharePostController::class, 'shareView'])
        ->name('ProcessShareViewPost');

    //
    Route::get('ProcessSharePost', [Post\SharePostController::class, 'share'])
        ->name('ProcessSharePost');

    // ajax view lượt cảm xúc
    Route::get('ProcessViewDetailFeel', [Post\ViewDetailFeelController::class, 'view'])
        ->name('ProcessViewDetailFeel');

    // ajax view lượt cảm xúc
    Route::get('ProcessViewOnlyDetailFeel', [Post\ViewDetailFeelController::class, 'viewOnly'])
        ->name('ProcessViewOnlyDetailFeel');

    // ajax view lượt cảm xúc cmt
    Route::get('ProcessViewDetailFeelCmt', [Post\ViewDetailFeelController::class, 'viewCmt'])
        ->name('ProcessViewDetailFeelCmt');

    //
    Route::get('ProcessTickLocal', [Post\PostNormalController::class, 'tickLocal'])
        ->name('ProcessTickLocal');

    // ajax view lượt cảm xúc cmt
    Route::get('ProcessViewOnlyDetailFeelCmt', [Post\ViewDetailFeelController::class, 'viewOnlyCmt'])
        ->name('ProcessViewOnlyDetailFeelCmt');

    // ajax view lượt cảm xúc path khác
    Route::get('/{value1}/{value2}/{value3}/ProcessViewDetailFeel', [Post\ViewDetailFeelController::class, 'view']);

    // ajax view lượt cảm xúc path khác
    Route::get('/{value1}/{value2}/{value3}/ProcessViewOnlyDetailFeel', [Post\ViewDetailFeelController::class, 'viewOnly']);

    // ajax xóa bài đăng
    Route::get('ProcessDeletePost', [Post\DeletePostController::class, 'delete'])
        ->name('ProcessDeletePost');

    // ajax xác nhận xóa bài đăng
    Route::get('ProcessWarnDeletePost', [Post\DeletePostController::class, 'warn'])
        ->name('ProcessWarnDeletePost');

    // ajax chỉnh sửa bài đăng
    Route::post('ProcessEditPost', [Post\EditPostController::class, 'edit'])
        ->name('ProcessEditPost');

    // ajax view chỉnh sửa bài đăng
    Route::get('ProcessViewEditPost', [Post\EditPostController::class, 'view'])
        ->name('ProcessViewEditPost');

    // ajax chỉnh sửa đối tượng bài đăng view
    Route::get('ProcessViewObjectPrivacyPost', [Post\EditObjectPrivacyController::class, 'view'])
        ->name('ProcessViewObjectPrivacyPost');

    // ajax chỉnh sửa đối tượng bài đăng view
    Route::get('ProcessEditObjectPrivacyPost', [Post\EditObjectPrivacyController::class, 'edit'])
        ->name('ProcessEditObjectPrivacyPost');

    //ajax thả cảm xúc cho bình luận
    Route::get('ProcessFeelCommentPost', [Post\FeelCommentPostController::class, 'feel'])
        ->name('ProcessFeelCommentPost');

    //ajax số lượng cảm xúc của bình luận
    Route::get('ProcessLoadNumFeelCommentPost', [Post\FeelCommentPostController::class, 'loadnumfeel'])
        ->name('ProcessLoadNumFeelCommentPost');

    //ajax thả cảm xúc cho bình luận
    Route::get('ProcessLoadNumRepComment', [Post\RepCommentController::class, 'load'])
        ->name('ProcessLoadNumRepComment');

    //ajax 
    Route::get('ProcessViewRepComment', [Post\RepCommentController::class, 'view'])
        ->name('ProcessViewRepComment');

    //post
    Route::get('/post/{idPost}', [Post\PostController::class, 'view']);

    //
    Route::get('ProcessSearchTagFriend', [Post\TagFriendController::class, 'search'])
        ->name('ProcessSearchTagFriend');

    //
    Route::get('ProcesViewTagFriend', [Post\TagFriendController::class, 'view'])
        ->name('ProcesViewTagFriend');

    //
    Route::get('ProcesViewCreatePost', [Post\PostController::class, 'viewCreatePost'])
        ->name('ProcesViewTagFriend');

    //
    Route::get('ProcessRemoveTagFriendPost', [Post\TagFriendController::class, 'removeTagFriend'])
        ->name('ProcessRemoveTagFriendPost');

    //
    Route::get('ProcessTagFriend', [Post\TagFriendController::class, 'tag'])
        ->name('ProcessTagFriend');

    //
    Route::get('ProcessViewUserTagOfPost', [Post\TagFriendController::class, 'viewUserTagOfPost'])
        ->name('ProcessViewUserTagOfPost');

    //
    Route::post('ProcessPostTimeLine', [Post\PostTimeLineController::class, 'post'])
        ->name('ProcessPostTimeLine');

    //
    Route::post('ProcessEditViewComment', [Post\EditCommentController::class, 'editView'])
        ->name('ProcessEditViewComment');

    //
    Route::post('ProcessEditComment', [Post\EditCommentController::class, 'edit'])
        ->name('ProcessEditComment');
});

Route::group(['namespace' => 'Chat'], function () {
    //
    Route::get('ProcessRetrievalMessageEvent', [Chat\DeleteMessageController::class, 'retrievalMessageEvent'])
        ->name('ProcessRetrievalMessageEvent');

    //
    Route::get('ProcessOpenChat', [Chat\ChatController::class, 'view'])
        ->name('ProcessOpenChat');

    //
    Route::get('ProcessMinizeChat', [Chat\ChatController::class, 'minize'])
        ->name('ProcessMinizeChat');

    //
    Route::get('ProcessOpenMessenger', [Chat\ChatController::class, 'openMessenger'])
        ->name('ProcessOpenMessenger');

    //
    Route::post('ProcessSendMessages', [Chat\SendMessageController::class, 'send'])
        ->name('ProcessSendMessages');

    //
    Route::get('ProcessChatEvent', [Chat\SendMessageController::class, 'chatEvent'])
        ->name('ProcessChatEvent');

    //
    Route::get('ProcessViewRemoveMessage', [Chat\DeleteMessageController::class, 'view'])
        ->name('ProcessViewRemoveMessage');

    //
    Route::get('ProcessRemoveMessage', [Chat\DeleteMessageController::class, 'remove'])
        ->name('ProcessRemoveMessage');

    //
    Route::get('ProcessOpenChangeColor', [Chat\ColorMessageController::class, 'open'])
        ->name('ProcessOpenChangeColor');

    //
    Route::get('ProcessChangeColor', [Chat\ColorMessageController::class, 'change'])
        ->name('ProcessChangeColor');

    //
    Route::get('ProcessOpenCreateChat', [Chat\ChatController::class, 'createChat'])
        ->name('ProcessOpenCreateChat');

    //
    Route::get('ProcessAddViewUserChatting', [Chat\ChatController::class, 'addUser'])
        ->name('ProcessAddViewUserChatting');

    //
    Route::get('ProcessRemoveUserSelectedGroup', [Chat\ChatController::class, 'removeUser'])
        ->name('ProcessRemoveUserSelectedGroup');

    //
    Route::get('ProcessLoadGUINewChatRemove', [Chat\ChatController::class, 'loadRemove'])
        ->name('ProcessLoadGUINewChatRemove');

    //
    Route::get('ProcessLoadGUINewChatAdd', [Chat\ChatController::class, 'loadAdd'])
        ->name('ProcessLoadGUINewChatAdd');

    //
    Route::post('ProcessSendMessageGroup', [Chat\ChatController::class, 'sendMessageGroup'])
        ->name('ProcessSendMessageGroup');

    //
    Route::get('ProcessOpenMessageGroup', [Chat\ChatController::class, 'openMessageGroup'])
        ->name('ProcessOpenMessageGroup');

    //
    Route::get('ProcessUpdateStateMessage', [Chat\ChatController::class, 'updateStateMessage'])
        ->name('ProcessUpdateStateMessage');

    //
    Route::get('ProcessSeenMessage', [Chat\ChatController::class, 'seenMessage'])
        ->name('ProcessSeenMessage');

    // ajax view lượt cảm xúc
    Route::get('ProcessViewDetailFeelMessage', [Chat\ChatController::class, 'viewFeel'])
        ->name('ProcessViewDetailFeelMessage');

    // ajax view lượt cảm xúc
    Route::get('ProcessViewOnlyDetailFeelMessage', [Chat\ChatController::class, 'viewFeelOnly'])
        ->name('ProcessViewOnlyDetailFeelMessage');

    Route::get('ProcessSendStickerMessage', [Chat\SendMessageController::class, 'sendStickerMessage'])
        ->name('ProcessSendStickerMessage');

    Route::get('ProcessSendStickerMessageNewChat', [Chat\SendMessageController::class, 'sendStickerMessageNewChat'])
        ->name('ProcessSendStickerMessageNewChat');
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
        return view('Modal\ModalPost\ModalCreatePost');
    else
        return view('Modal\ModalPost\ModalWriteAnyThing');
})->name('ProcessOpenPostDialog');

// ajax chọn quyền riêng tư bài đăng
Route::get('ProcessSelecPrivacyPost', function () {
    return view('Modal\ModalPrivacy\ModalPrivacy');
})->name('ProcessSelecPrivacyPost');

// ajax chọn quyền riêng tư bài đăng
Route::get('ProcessOnChangeInputPrivacy', function (Request $request) {
    return view('Component\Child\Privacy')->with('idQuyenRiengTu', $request->IDQuyenRiengTu);
})->name('ProcessOnChangeInputPrivacy');

// 
Route::get('ProcessModalLast', function () {
    return view('Modal/ModalHeader/ModalLast');
})->name('ProcessModalLast');

// ajax quên tài khoản
Route::get('LoadForgetAccount', function () {
    return view('Modal\ModalLogin\ModalTypeInfo')->with('errors', '');
});

//xử lí show modal notifications
Route::get('ProcessShowModalNotifications', function () {
    $notify = Notify::getNotify(Session::get('user')[0]->IDTaiKhoan);
    return view('Modal\ModalHeader\ModalNotify')->with('notify', $notify);
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
        return view('Component/Child/NumberNotify')
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

//
Route::get('ProcessLoadProfileFriendRequest', [ProfileController::class, 'loadAjaxProfileFriendRequest'])
    ->name('ProcessLoadProfileFriendRequest');

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
    return view('Guest/friend-request')
        ->with('users', []);
});

//
Route::get('friends/{id}', function ($id) {
    $users = Taikhoan::where('taikhoan.IDTaiKhoan', '=', $id)->get();
    if (count($users) > 0)
        return view('Guest/friend-request')->with('users', $users);
    else
        return view('Guest/friend-request')->with('users', []);
});

//
Route::get('messages/{idNhomTinNhan}', function ($idNhomTinNhan) {
    $chater = DataProcess::getUserOfGroupMessage($idNhomTinNhan);
    $messages = DataProcess::getMessageByNhomTinNhan($idNhomTinNhan);
    if (count($chater) == 1) {
        return view('Guest/messager')->with('chater', $chater)
            ->with('messages', $messages)
            ->with('idNhomTinNhan', $idNhomTinNhan);
    } else {
        $chater = DataProcess::getUserOfGroupMessageReal($idNhomTinNhan);
        return view('Guest/messager')->with('chater', $chater)
            ->with('messages', $messages)
            ->with('idNhomTinNhan', $idNhomTinNhan);
    }
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
                    $data .= view('Component/Post/UpdateAvatarImage')
                        ->with('item', $value)
                        ->with('user', Session::get('user'));
                    break;
                case '1':
                    $data .= view('Component/Post/UpdateCoverImage')
                        ->with('item', $value)
                        ->with('user', Session::get('user'));
                    break;
                case '2':
                    $data .= view('Component/Post/PostNormal')
                        ->with('item', $value)
                        ->with('user', Session::get('user'));
                    break;
                case '3':
                    $data .= view('Component/Post/SharePost')
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
                    $data .= view('Component/Post/UpdateAvatarImage')
                        ->with('item', $post)
                        ->with('user', Session::get('user'));
                    break;
                case '1':
                    $data .= view('Component/Post/UpdateCoverImage')
                        ->with('item', $post)
                        ->with('user', Session::get('user'));
                    break;
                case '2':
                    $data .= view('Component/Post/PostNormal')
                        ->with('item', $post)
                        ->with('user', Session::get('user'));
                    break;
                case '3':
                    $data .= view('Component/Post/SharePost')
                        ->with('item', $post)
                        ->with('user', Session::get('user'));
                    break;
                case '4':
                    $data .= view('Component/Post/Timeline')
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
    return view('TimeLine/Post') . view('TimeLine/Post');
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
    return view('Guest/verify-account');
});

Route::get('verify-success', function () {
    Session::flush();
    return view('Component/Child/SendRequestSuccess');
});

//
Route::get('checkpoint', function () {
    return view('Guest/block');
});

//
Route::get('activity', function () {
    return view('Guest/activity')->with(
        'data',
        DataProcessThird::getActivityByIDTaiKhoan(Session::get('idcheckpoint'))
    );
})->name('activity');

//
Route::get('change-password', function () {
    return view('Guest/change-pass');
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
    return view('Guest/setting');
});

//
Route::get('setting/change-password', function () {
    return view('Guest/setting');
});

//
Route::get('setting/delete-account', function () {
    Session::forget('passWordOld');
    Session::forget('passWordNew');
    Session::forget('typePassWordNew');
    Session::forget('verify');
    Session::forget('emailSend');
    return view('Guest/setting');
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

//
Route::get('/', function () {
    if (session()->has('user'))
        redirect()->to('index')->send();
    else
        redirect()->to('index')->send();
});

// Đăng Nhập
Route::get('/login', function (Request $request) {
    if (session()->has('user'))
        return redirect()->to('index')->send();
    else
        return view('Guest/login');
})->name('login');

Route::get('LoadFormRegister', function () {
    return view('Modal/ModalLogin/ModalFormRegister');
});

// redriect sang index
Route::get('index', function () {
    session()->forget('users');
    if (session()->has('user'))
        return view('Guest/index');
    else
        return redirect()->to('login')->send();
})->name('index');

Route::get('ProcessLoadMessageLimit', function (Request $request) {
    $message = DataProcess::getMessageByNhomTinNhanLimit($request->IDNhomTinNhan, $request->index);

    return response()->json([
        'view' => "" . view('Modal/ModalChat/Child/Message')
            ->with('messages', $message),
        'index' => $request->index - 15
    ]);
})->name('ProcessLoadMessageLimit');

Route::get('ProcessFeelMessage', [Chat\ChatController::class, 'feelMessage'])
    ->name('ProcessFeelMessage');

Route::get('ProcessResetSession', function () {
    Session::forget('tag');
    Session::forget('feelCur');
    Session::forget('userGroup');
    Session::forget('localU');
});

Route::get('aa', function () {
    echo "<pre>";
    print_r(json_decode(Gioithieu::where('IDTaiKhoan', '=', '1000000002')->get()[0]->JsonGioiThieu));
    echo "</pre>";
});

Route::get('ProcessViewLocalPost', function (Request $request) {
    return response()->json([
        'view' => "" . view('Modal/ModalPost/ModalLocal')
            ->with('local', DataProcessSix::createAllAddress())
    ]);
});

Route::get('ProcessOpenModalAddAccountLogin', [Login\LoginController::class, 'viewAddAccount'])
    ->name('ProcessOpenModalAddAccountLogin');

Route::post('ProcessLoginModal', [Login\LoginController::class, 'loginModal'])
    ->name('ProcessLoginModal');

Route::get('ProcessRemoveAccountSave', [Login\LoginController::class, 'removeAccountSave'])
    ->name('ProcessRemoveAccountSave');

Route::get('ProcessViewAddAccountSave', [Login\LoginController::class, 'viewAccountSave'])
    ->name('ProcessViewAddAccountSave');
