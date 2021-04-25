<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Chat\SettingChatController;
use App\Models\Baidang;
use App\Models\Gioithieu;
use App\Models\Story;
use App\Models\StringUtil;
use App\Models\Taikhoan;
use App\Process\DataProcess;
use App\Process\DataProcessFive;
use App\Process\DataProcessFour;
use App\Process\DataProcessSecond;
use App\Process\DataProcessSix;
use App\Process\DataProcessThird;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;


Route::group(['namespace' => 'Image'], function () {
    //
    Route::get('ProcessLoadPictures', [Image\PictureController::class, 'load'])
        ->name('ProcessLoadPictures');

    //
    Route::get('ProcessLoadTimeLineAndViewPictures', [Image\PictureController::class, 'loadAndView'])
        ->name('ProcessLoadTimeLineAndViewPictures');
});

Route::group(['namespace' => 'Chat'], function () {
    //
    Route::get('ProcessLoadingChatTypingMessenge', [Chat\ChatController::class, 'loadingTypingMessage'])
        ->name('ProcessLoadingChatTypingMessenge');

    //
    Route::get('ProcessLoadingTypingOn', [Chat\ChatController::class, 'loadingTypingOn'])
        ->name('ProcessLoadingTypingOn');

    //
    Route::get('ProcessLoadingTypingOff', [Chat\ChatController::class, 'loadingTypingOff'])
        ->name('ProcessLoadingTypingOff');
});

Route::group(['namespace' => 'Post'], function () {
    //
    Route::get('ProcessLoadViewCommentImage', [Post\CommentController::class, 'loadViewCommentImage'])
        ->name('ProcessLoadViewCommentImage');

    //
    Route::get('ProcessOpenViewStickerCommnet', [Post\CommentController::class, 'openStickComment'])
        ->name('ProcessOpenViewStickerCommnet');

    //
    Route::get('ProcessOpenViewGifCommnet', [Post\CommentController::class, 'openGifComment'])
        ->name('ProcessOpenViewGifCommnet');

    //
    Route::get('ProcessWarnDeleteComment', [Post\CommentController::class, 'warn'])
        ->name('ProcessWarnDeleteComment');

    //
    Route::get('ProcessDeleteComment', [Post\CommentController::class, 'delete'])
        ->name('ProcessDeleteComment');
});

Route::group(['namespace' => 'About'], function () {
    //
    Route::post('ProcessAjaxDashboardAbout', [About\AboutController::class, 'dashboard'])
        ->name('ProcessAjaxDashboardAbout');

    //
    Route::post('ProcessAjaxWorkAndStudyAbout', [About\AboutController::class, 'workAndStudy'])
        ->name('ProcessAjaxWorkAndStudyAbout');

    //
    Route::post('ProcessAjaxPlaceLivedAbout', [About\AboutController::class, 'placeLived'])
        ->name('ProcessAjaxPlaceLivedAbout');

    //
    Route::post('ProcessAjaxInfoSimpleAndContactAbout', [About\AboutController::class, 'infoSimpleAndContact'])
        ->name('ProcessAjaxInfoSimpleAndContactAbout');

    //
    Route::post('ProcessAjaxFamilyAndRelationshipAbout', [About\AboutController::class, 'familyAndRelatioship'])
        ->name('ProcessAjaxFamilyAndRelationshipAbout');

    //
    Route::post('ProcessAjaxDetailAboutUserAbout', [About\AboutController::class, 'detailAboutUser'])
        ->name('ProcessAjaxDetailAboutUserAbout');

    //
    Route::post('ProcessAjaxEventLifeAbout', [About\AboutController::class, 'eventLife'])
        ->name('ProcessAjaxEventLifeAbout');

    // Add

    //
    Route::post('ProccessAddPlaceWorkAbout', [About\AddAboutController::class, 'addPlaceWorks'])
        ->name('ProccessAddPlaceWorkAbout');

    //
    Route::post('ProcessAddSchoolAbout', [About\AddAboutController::class, 'addSchool'])
        ->name('ProcessAddSchoolAbout');

    //
    Route::post('ProcessAddPlaceLiveCurrent', [About\AddAboutController::class, 'addPlaceLiveCurrent'])
        ->name('ProcessAddPlaceLiveCurrent');

    //
    Route::post('ProcessAddHomeTown', [About\AddAboutController::class, 'addHomeTown'])
        ->name('ProcessAddHomeTown');

    //
    Route::post('ProcessAddPlaceLived', [About\AddAboutController::class, 'addPlaceLived'])
        ->name('ProcessAddPlaceLived');

    //
    Route::post('ProcessAddIntroYouSelf', [About\AddAboutController::class, 'addIntroYourSelf'])
        ->name('ProcessAddIntroYouSelf');

    //
    Route::post('ProcessAddWayReadName', [About\AddAboutController::class, 'AddWayReadName'])
        ->name('ProcessAddWayReadName');

    //
    Route::post('ProcessAddNickName', [About\AddAboutController::class, 'addNickName'])
        ->name('ProcessAddNickName');

    //
    Route::post('ProcessAddFavoriteQuote', [About\AddAboutController::class, 'addFavoriteQuote'])
        ->name('ProcessAddFavoriteQuote');

    //
    Route::post('ProcessAddMemberFamilyAbout', [About\AddAboutController::class, 'addMemberFamily'])
        ->name('ProcessAddMemberFamilyAbout');

    //Delete

    //
    Route::get('ProcessDeleteAbout', [About\DeleteAboutController::class, 'delete']);

    //
    Route::get('ProcessDeleteAboutMain', [About\DeleteAboutController::class, 'deleteMain']);

    //Edit

    //
    Route::get('ProcessEditViewAbout', [About\EditAboutController::class, 'editView']);

    //
    Route::post('ProcessEditAboutMain', [About\EditAboutController::class, 'edit'])
        ->name('ProcessEditAboutMain');

    //
    Route::get('ProcessChangePrivacyAboutViewMain', [About\ChangePrivacyAboutController::class, 'changeView']);

    //
    Route::get('ProcessChangePrivacyAboutMain', [About\ChangePrivacyAboutController::class, 'change']);
});

Route::group(['namespace' => 'Storys'], function () {
    //
    Route::post('ProcessSaveCanvasStory', [Storys\StoryController::class, 'create'])
        ->name('ProcessSaveCanvasStorys');

    //
    Route::post('ProcessViewPictureStory', [Storys\StoryController::class, 'createPicView'])
        ->name('ProcessViewPictureStory');

    //
    Route::post('ProcessSavePictureStory', [Storys\StoryController::class, 'createPic'])
        ->name('ProcessSavePictureStory');
    //
    Route::post('ProcessLoadStory', [Storys\StoryController::class, 'load'])
        ->name('ProcessLoadStory');

    //
    Route::post('ProcessLoadAndAddViewStory', [Storys\StoryController::class, 'loadAndAddViewStory'])
        ->name('ProcessLoadAndAddViewStory');

    //
    Route::get('ProcessNextStory', [Storys\StoryController::class, 'nextStory'])
        ->name('ProcessNextStory');

    //
    Route::get('ProcessPreviousStory', [Storys\StoryController::class, 'previousStory'])
        ->name('ProcessPreviousStory');

    //
    Route::get('ProcessDeleteStory', [Storys\StoryController::class, 'deleteStory'])
        ->name('ProcessDeleteStory');
});

//
Route::get('save/{id}', function ($id) {
    $json = [
        'ThongTinCoBanVaLienHe' => [
            'NgaySinh' => [
                'Ngay' => [
                    'IDNgay' => '10000',
                    'Ngay' => '01',
                    'IDQuyenRiengTu' => 'CHIBANBE'
                ],
                'Thang' => [
                    'IDThang' => '10000',
                    'Thang' => '10',
                    'IDQuyenRiengTu' => 'CHIBANBE'
                ],
                'Nam' => [
                    'IDNam' => '10000',
                    'Nam' => '2001',
                    'IDQuyenRiengTu' => 'CHIBANBE'
                ]
            ],
            'DiaChi' => [],
            'Email' => [
                'IDEmail' => '10000',
                'Email' => 'tratanhuong01@gmail.com',
                'IDQuyenRiengTu' => 'CHIBANBE'
            ],
            'GioiTinh' => [
                'IDGioiTinh' => '10000',
                'IDQuyenRiengTu' => 'CHIBANBE',
                'TenGioiTinh' => 'Nam'
            ],
            'SoDienThoai' => [
                'IDSoDienThoai' => '10000',
                'SoDienThoai' => '0354114665',
                'IDQuyenRiengTu' => 'CHIBANBE'
            ],
        ],
        'CongViecHocVan' => [
            'CongViec' => [],
            'HocVan' => [],
        ],
        'NoiTungSong' => [
            'QueQuan' => [],
            'NoiOHienTai' => [],
            'NoiTungSong' => []
        ],
        'GiaDinhVaCacMoiQuanHe' => [
            'HonNhan' => [
                'IDHonNhan' => '10000',
                'IDQuyenRiengTu' => 'CHIBANBE',
                'TinhTrang' => 'Độc Thân'
            ],
            'ThanhVienGiaDinh' => []
        ],
        'ChiTietBanThan' => [
            'GioiThieu' => [],
            'PhatAm' => [],
            'BietDanh' => [],
            'TrichDanYeuThich' => []
        ]
    ];
    DB::table('gioithieu')->insert([
        'IDTaiKhoan' => $id,
        'JsonGioiThieu' => json_encode($json)
    ]);
});

//
Route::post('ProcessSearchData', [SearchController::class, 'search'])
    ->name('ProcessSearchData');

//
Route::get('ProcessOpenRequestFriendsMain', function (Request $request) {
    $data = DataProcessSecond::getRequestSend($request->IDTaiKhoan);
    return response()->json([
        'view' => "" . view('Modal/ModalProfile/SendRequest')->with('requests', $data)
            ->with('idTaiKhoan', $request->IDTaiKhoan)
    ]);
})->name('ProcessOpenRequestFriendsMain');

//
Route::get('ProcessShowDataAboutCorresponding', function (Request $request) {
    switch ($request->Type) {
        case 'Companies':
            $data = DataProcessFour::getCompanies($request->Value);
            return view('Component/GioiThieu/Them/DuLieu')->with('data', $data)
                ->with('type', $request->Type);
            break;
        case 'CityAndTown':
            $data = DataProcessFour::getCityAndTown($request->Value);
            return view('Component/GioiThieu/Them/DuLieu')->with('data', $data)
                ->with('type', $request->Type);
            break;
        case 'NameSchool':
            $data = DataProcessFour::getSchool($request->Value);
            return view('Component/GioiThieu/Them/DuLieu')->with('data', $data)
                ->with('type', $request->Type);
            break;
        case 'TypeSchool':
            $data = DataProcessFour::getTypeSchool($request->Value);
            return view('Component/GioiThieu/Them/DuLieu')->with('data', $data)
                ->with('type', $request->Type);
            break;
        case 'LiveCurrents':
            $data = DataProcessFour::getCityAndTown($request->Value);
            return view('Component/GioiThieu/Them/DuLieu')->with('data', $data)
                ->with('type', $request->Type);
            break;
        case 'PlaceHomeTown':
            $data = DataProcessFour::getCityAndTown($request->Value);
            return view('Component/GioiThieu/Them/DuLieu')->with('data', $data)
                ->with('type', $request->Type);
            break;
        case 'PlaceLived':
            $data = DataProcessFour::getCityAndTown($request->Value);
            return view('Component/GioiThieu/Them/DuLieu')->with('data', $data)
                ->with('type', $request->Type);
            break;
        case 'NameOthers':
            $data = DataProcessFour::getNickName($request->Value);
            return view('Component/GioiThieu/Them/DuLieu')->with('data', $data)
                ->with('type', $request->Type);
            break;
        case 'Sexs':
            $data = DataProcessFour::getSex($request->Value);
            return view('Component/GioiThieu/Them/DuLieu')->with('data', $data)
                ->with('type', $request->Type);
            break;
        case 'RelationShip':
            $data = DataProcessFour::getMaritalStatus($request->Value);
            return view('Component/GioiThieu/Them/DuLieu')->with('data', $data)
                ->with('type', $request->Type);
            break;
        case 'MemberFamily':
            $data = Taikhoan::search($request->Value, $request->Name);
            return view('Component/GioiThieu/Them/DuLieu')->with('data', $data)
                ->with('type', $request->Type);
            break;
        case 'RelationShipFamily':
            $data = DataProcessFour::getRelationShip($request->Value);
            return view('Component/GioiThieu/Them/DuLieu')->with('data', $data)
                ->with('type', $request->Type);
            break;
        default:
            # code...
            break;
    }
})->name('ProcessShowDataAboutCorresponding');

//
Route::get('ProcessViewPrivacyAbout', function () {
    return view('Component/GioiThieu/Modal/QuyenRiengTu');
})->name('ProcessViewPrivacyAbout');

//
Route::get('ProcessPrivacyAbouts', function (Request $request) {
    return view('Component/Child/PrivacyAbout')->with('idQuyenRiengTu', $request->IDQuyenRiengTu);
})->name('ProcessPrivacyAbouts');

Route::get('ProcessOpenModalStickerChat', function (Request $request) {
    switch ($request->type) {
        case 'Sticker':
            return response()->json([
                'view' => "" . view('Modal/ModalChat/Child/Sticker')
                    ->with('IDNhomTinNhan', $request->IDNhomTinNhan)
                    ->with('IDTaiKhoan', $request->IDTaiKhoan)
            ]);
            break;
        case 'Gif':
            // return response()->json([
            //     'view' => "" . view('Modal/ModalChat/Child/Gif')
            // ]);
            break;
        default:
            # code...
            break;
    }
});

Route::get('ProcessPreviewBeforeUploadFile', function (Request $request) {
    return response()->json([
        'view' => "" . view('Modal/ModalPost/ModalPreviewPost')
            ->with('url', $request->url)
            ->with('type', $request->type)
    ]);
})->name('ProcessPreviewBeforeUploadFile');

Route::get('ProcessSearchLocal', function (Request $request) {
    $array = DataProcessSix::createAllAddress();
    return response()->json([
        'view' => "" . view('Modal/ModalPost/Child/Local')->with(
            'local',
            DataProcessSix::searchAllAddress($array, $request->Ten)
        )
    ]);
});

Route::get('ProcessViewChangeNickName', [SettingChatController::class, 'viewNickName'])
    ->name('ProcessViewChangeNickName');

Route::get('ProcessEditNickNameUserChat', [SettingChatController::class, 'editNickName'])
    ->name('ProcessEditNickNameUserChat');

Route::get('ProcessViewChangeIconFeelChat', [SettingChatController::class, 'viewIconFeel'])
    ->name('ProcessViewChangeIconFeelChat');

Route::get('ProcessChangeIconFeelChat', [SettingChatController::class, 'changeIconFeel'])
    ->name('ProcessChangeIconFeelChat');

Route::get('demo', function () {
    return view('Demo');
});
