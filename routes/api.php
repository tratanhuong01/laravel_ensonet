<?php

namespace App\Http\Controllers;

use App\Models\Gioithieu;
use App\Models\Story;
use App\Models\Taikhoan;
use App\Process\DataProcessFour;
use App\Process\DataProcessSecond;
use App\Process\DataProcessThird;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::post('ProcessSaveCanvasStory', [Storys\StoryController::class, 'create'])
    ->name('ProcessSaveCanvasStorys');

Route::post('ProcessViewPictureStory', [Storys\StoryController::class, 'createPicView'])
    ->name('ProcessViewPictureStory');

Route::post('ProcessSavePictureStory', [Storys\StoryController::class, 'createPic'])
    ->name('ProcessSavePictureStory');

Route::post('ProcessLoadStory', [Storys\StoryController::class, 'load'])
    ->name('ProcessLoadStory');

Route::post('ProcessLoadAndAddViewStory', [Storys\StoryController::class, 'loadAndAddViewStory'])
    ->name('ProcessLoadAndAddViewStory');

Route::post('ProcessSearchData', [SearchController::class, 'search'])
    ->name('ProcessSearchData');

Route::get('ProcessOpenRequestFriendsMain', function (Request $request) {
    $data = DataProcessSecond::getRequestSend($request->IDTaiKhoan);
    return response()->json([
        'view' => "" . view('Modal/ModalProfile/GuiKetBan')->with('requests', $data)
            ->with('idTaiKhoan', $request->IDTaiKhoan)
    ]);
});

Route::group(['namespace' => 'GioiThieus'], function () {

    Route::post('ProcessAjaxDashboardAbout', [GioiThieus\AboutController::class, 'dashboard'])
        ->name('ProcessAjaxDashboardAbout');

    Route::post('ProcessAjaxWorkAndStudyAbout', [GioiThieus\AboutController::class, 'workAndStudy'])
        ->name('ProcessAjaxWorkAndStudyAbout');

    Route::post('ProcessAjaxPlaceLivedAbout', [GioiThieus\AboutController::class, 'placeLived'])
        ->name('ProcessAjaxPlaceLivedAbout');

    Route::post('ProcessAjaxInfoSimpleAndContactAbout', [GioiThieus\AboutController::class, 'infoSimpleAndContact'])
        ->name('ProcessAjaxInfoSimpleAndContactAbout');

    Route::post('ProcessAjaxFamilyAndRelationshipAbout', [GioiThieus\AboutController::class, 'familyAndRelatioship'])
        ->name('ProcessAjaxFamilyAndRelationshipAbout');

    Route::post('ProcessAjaxDetailAboutUserAbout', [GioiThieus\AboutController::class, 'detailAboutUser'])
        ->name('ProcessAjaxDetailAboutUserAbout');

    Route::post('ProcessAjaxEventLifeAbout', [GioiThieus\AboutController::class, 'eventLife'])
        ->name('ProcessAjaxEventLifeAbout');

    // Add

    Route::post('ProccessAddPlaceWorkAbout', [GioiThieus\AddAboutController::class, 'addPlaceWorks'])
        ->name('ProccessAddPlaceWorkAbout');

    Route::post('ProcessAddSchoolAbout', [GioiThieus\AddAboutController::class, 'addSchool'])
        ->name('ProcessAddSchoolAbout');

    Route::post('ProcessAddPlaceLiveCurrent', [GioiThieus\AddAboutController::class, 'addPlaceLiveCurrent'])
        ->name('ProcessAddPlaceLiveCurrent');

    Route::post('ProcessAddHomeTown', [GioiThieus\AddAboutController::class, 'addHomeTown'])
        ->name('ProcessAddHomeTown');

    Route::post('ProcessAddPlaceLived', [GioiThieus\AddAboutController::class, 'addPlaceLived'])
        ->name('ProcessAddPlaceLived');

    Route::post('ProcessAddIntroYouSelf', [GioiThieus\AddAboutController::class, 'addIntroYourSelf'])
        ->name('ProcessAddIntroYouSelf');

    Route::post('ProcessAddWayReadName', [GioiThieus\AddAboutController::class, 'AddWayReadName'])
        ->name('ProcessAddWayReadName');

    Route::post('ProcessAddNickName', [GioiThieus\AddAboutController::class, 'addNickName'])
        ->name('ProcessAddNickName');

    Route::post('ProcessAddFavoriteQuote', [GioiThieus\AddAboutController::class, 'addFavoriteQuote'])
        ->name('ProcessAddFavoriteQuote');

    Route::post('ProcessAddMemberFamilyAbout', [GioiThieus\AddAboutController::class, 'addMemberFamily'])
        ->name('ProcessAddMemberFamilyAbout');

    //Delete

    Route::get('ProcessDeleteAbout', [GioiThieus\DeleteAboutController::class, 'delete']);

    Route::get('ProcessDeleteAboutMain', [GioiThieus\DeleteAboutController::class, 'deleteMain']);

    //Edit

    Route::get('ProcessEditViewAbout', [GioiThieus\EditAboutController::class, 'editView']);

    Route::post('ProcessEditAboutMain', [GioiThieus\EditAboutController::class, 'edit'])
        ->name('ProcessEditAboutMain');

    Route::get('ProcessChangePrivacyAboutViewMain', [GioiThieus\ChangePrivacyAboutController::class, 'changeView']);

    Route::get('ProcessChangePrivacyAboutMain', [GioiThieus\ChangePrivacyAboutController::class, 'change']);
});

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

Route::get('get', function () {
    $json = Gioithieu::where('gioithieu.IDTaiKhoan', '=', '1000000001')->get();
    $json = json_decode($json[0]->JsonGioiThieu);
    echo count($json->GiaDinhVaCacMoiQuanHe->ThanhVienGiaDinh);
    echo "<pre>";
    print_r($json);
    echo "</pre>";
    $json = Story::where('IDStory', '=', '3000041')->get();
    echo "<pre>";
    print_r(
        count(DataProcessThird::sortStoryByID('1000000001'))
    );
    echo "</pre>";
});

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
});

Route::get('ProcessViewPrivacyAbout', function () {
    return view('Component/GioiThieu/Modal/QuyenRiengTu');
});
Route::get('ProcessPrivacyAbouts', function (Request $request) {
    return view('Component/Child/QuyenRiengTuGioiThieu')->with('idQuyenRiengTu', $request->IDQuyenRiengTu);
});

Route::get('ProcessLoadPictures', [HinhAnhs\PictureController::class, 'load']);
Route::get('ProcessLoadTimeLineAndViewPictures', [HinhAnhs\PictureController::class, 'loadAndView']);

Route::get('ProcessNextStory', [Storys\StoryController::class, 'nextStory']);

Route::get('ProcessPreviousStory', [Storys\StoryController::class, 'previousStory']);
