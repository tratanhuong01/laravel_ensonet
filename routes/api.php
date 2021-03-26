<?php

namespace App\Http\Controllers;

use App\Models\Gioithieu;
use App\Process\DataProcessFour;
use App\Process\DataProcessSecond;
use App\Process\DataProcessThird;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::post('ProcessSaveCanvasStory', [Storys\StoryController::class, 'create'])
    ->name('ProcessSaveCanvasStorys');

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
});

Route::get('save', function () {
    $json = [
        'ThongTinCoBanVaLienHe' => [
            'NgaySinh' => [
                'Ngay' => [
                    'Ngay' => '01',
                    'IDQuyenRiengTu' => 'CHIBANBE'
                ],
                'Thang' => [
                    'Thang' => '10',
                    'IDQuyenRiengTu' => 'CHIBANBE'
                ],
                'Nam' => [
                    'Nam' => '2001',
                    'IDQuyenRiengTu' => 'CHIBANBE'
                ]
            ],
            'DiaChi' => [],
            'Email' => [
                'Email' => 'tratanhuong01@gmail.com',
                'IDQuyenRiengTu' => 'CHIBANBE'
            ],
            'GioiTinh' => [
                'IDQuyenRiengTu' => 'CHIBANBE',
                'TenGioiTinh' => 'Nam'
            ]
        ],
        'CongViecHocVan' => [
            'CongViec' => [],
            'HocVan' => [
                'DaiHocCaoDang' => [],
                'TrungHocPhoThong' => [],
                'TrungHocCoSo' => [],
                'TieuHoc' => []

            ],
        ],
        'NoiTungSong' => [],
        'GiaDinhVaCacMoiQuanHe' => [
            'HonNhan' => [
                'IDQuyenRiengTu' => 'CHIBANBE',
                'TinhTrang' => '0'
            ],
            'ThanhVienGiaDinh' => []
        ],
        'ChiTietBanThan' => [
            'GioiThieu' => [],
            'PhatAm' => [],
            'TenKhac' => [],
            'TrichDanYeuThich' => []
        ]
    ];
    DB::table('gioithieu')->insert([
        'IDTaiKhoan' => '1000000001',
        'JsonGioiThieu' => json_encode($json)
    ]);
});

Route::get('get', function () {
    $json = Gioithieu::where('gioithieu.IDTaiKhoan', '=', '1000000001')->get();
    $json = json_decode($json[0]->JsonGioiThieu);

    echo "<pre>";
    print_r($json);
    echo "</pre>";
});

Route::get('ProcessShowDataAboutCorresponding', function (Request $request) {
    switch ($request->Type) {
        case 'Companies':
            $data = DataProcessFour::getCompanies($request->Value);
            return view('Component/GioiThieu/Child/DuLieu')->with('data', $data)
                ->with('type', $request->Type);
            break;
        case 'CityAndTown':
            $data = DataProcessFour::getCityAndTown($request->Value);
            return view('Component/GioiThieu/Child/DuLieu')->with('data', $data)
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
