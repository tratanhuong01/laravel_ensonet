<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Category;
use App\Admin\GeneralID;
use App\Models\Amthanh;
use App\Models\Baidang;
use App\Models\Binhluan;
use App\Models\Taikhoan;
use App\Models\Thongbao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use JD\Cloudder\Facades\Cloudder;

Route::get('ProcessLoadViewDetailAd', [LoadDataControllerAd::class, 'loadViewDetail'])
    ->name('ProcessLoadViewDetailAd');

Route::get('ProcessPaginationAdmin', [LoadDataControllerAd::class, 'pagination'])
    ->name('ProcessPaginationAdmin');

Route::get('ProcessViewModalUpdateState', [ChangeStateController::class, 'changeViewStateUser'])
    ->name('ProcessViewModalUpdateState');

Route::get('ProcessHandelChangeState', [ChangeStateController::class, 'changeStateUser'])
    ->name('ProcessHandelChangeState');

Route::get('ProcessClickLoadCategoryChild', function (Request $request) {
    $category = Category::category();
    foreach ($category as $key => $value) {
        if ($key == $request->key) {
            return response()->json([
                "viewCategory" => "" . $value->viewCategory,
                "viewPagination" => "" . $value->viewPagination
            ]);
            break;
        }
    }
});

Route::get('ProcessOpenModalAddCategoryDetail', [InsertCategoryController::class, 'view'])
    ->name('ProcessOpenModalAddCategoryDetail');

Route::get('ProcessOpenModalEditCategoryDetail', [UpdateCategoryController::class, 'view'])
    ->name('ProcessOpenModalEditCategoryDetail');

Route::get('ProcessOpenModalDeleteCategoryDetail', [DeleteCategoryController::class, 'view'])
    ->name('ProcessOpenModalDeleteCategoryDetail');

Route::post('ProcessInsertCategoryDetail', [InsertCategoryController::class, 'insert'])
    ->name('ProcessInsertCategoryDetail');

Route::post('ProcessUpdateCategoryDetail', [UpdateCategoryController::class, 'update'])
    ->name('ProcessUpdateCategoryDetail');

Route::get('ProcessDeleteCategoryDetail',  [DeleteCategoryController::class, 'delete'])
    ->name('ProcessDeleteCategoryDetail');

Route::get('ProcessOnChangeSticker', function (Request $request) {
    $value = (object)[
        'Hang' => $request->Hang,
        'Cot' => $request->Cot,
        'DuongDanNhanDan' => $request->DuongDanNhanDan
    ];
    return response()->json([
        'view' => "" . view('Modal.ModalChat.Child.ChatSticker')
            ->with('value', $value)
    ]);
});

Route::get('ProcessDeletePostAPIAmin', function (Request $request) {
    $images = DB::table('hinhanh')->where('hinhanh.IDBaiDang', '=', $request->IDBaiDang)->get();
    for ($i = 0; $i < count($images); $i++) {
        $public_Id = explode('/', $images[$i]->DuongDan);
        $public_Id = $public_Id[count($public_Id) - 2]  . "/" . $public_Id[count($public_Id) - 1];
        Cloudder::destroyImage(explode('.', $public_Id)[0]);
        Cloudder::delete(explode('.', $public_Id)[0]);
    }
    $comment = Binhluan::where('binhluan.IDBaiDang', '=', $request->IDBaiDang)->get();
    foreach ($comment as $key => $value) {
        if (json_decode($value->NoiDungBinhLuan)->LoaiBinhLuan == 1) {
            $public_Id = explode('/', json_decode($value->NoiDungBinhLuan)->DuongDan);
            $public_Id = $public_Id[count($public_Id) - 2]  . "/" . $public_Id[count($public_Id) - 1];
            Cloudder::destroyImage(explode('.', $public_Id)[0]);
            Cloudder::delete(explode('.', $public_Id)[0]);
        }
        Binhluan::where('binhluan.IDBinhLuan', '=', $value->IDBinhLuan)->delete();
    }
    Baidang::where('baidang.IDBaiDang', '=', $request->IDBaiDang)->delete();
    Thongbao::whereRaw("thongbao.IDContent LIKE '%" . $request->IDBaiDang . "%'")->delete();
    return '';
});

Route::get('ProcessUpdateStatusOfRequestUser', function (Request $request) {
    DB::update('UPDATE yeucaunguoidung SET TinhTrangYeuCau = ? WHERE 
    IDYeuCauNguoiDung = ? ', [$request->TinhTrangYeuCau, $request->IDYeuCauNguoiDung]);
    $statusOfUser = $request->TinhTrangYeuCau;
    if ($statusOfUser == 2)
        DB::update('UPDATE taikhoan SET TinhTrang = ? WHERE 
        IDTaiKhoan = ? ', [0, $request->IDTaiKhoan]);
    return response()->json([
        'view' => "" . view("Admin.Modal.Reply.Child.ElementStatus")
            ->with('value', (object)['TinhTrangYeuCau' => $request->TinhTrangYeuCau])
    ]);
});
