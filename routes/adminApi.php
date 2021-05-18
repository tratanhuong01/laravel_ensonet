<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Category;
use App\Admin\GeneralID;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;


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
                "view" => "" . $value->View
            ]);
            break;
        }
    }
});

Route::get('ProcessOpenModalAddCategoryDetail', function (Request $request) {
    $modalAdd = Category::generalModalAdd();
    foreach ($modalAdd as $key => $value) {
        if ($value->type == $request->type) {
            return response()->json([
                'view' => "" . view('Admin.Component.DetailCategory.Modal.ModalAdd')
                    ->with('modal', $value)
                    ->with('id', GeneralID::ID($value->table, $value->ID))
            ]);
            break;
        }
    }
})->name('ProcessOpenModalAddCategoryDetail');

Route::get('ProcessOpenModalEditCategoryDetail', function (Request $request) {
    $modalAdd = Category::generalModalAdd();
    foreach ($modalAdd as $key => $value) {
        if ($value->type == $request->type) {
            $data = DB::select(
                "SELECT * FROM $value->table WHERE $value->ID = ? ",
                [$request->ID]
            )[0];
            $modalEdit = Category::generalModalEdit($data, $value->type);
            return response()->json([
                'view' => "" . view('Admin.Component.DetailCategory.Modal.ModalEdit')
                    ->with('modal', $modalEdit)
            ]);
            break;
        }
    }
})->name('ProcessOpenModalEditCategoryDetail');

Route::get('ProcessOpenModalDeleteCategoryDetail', function (Request $request) {
    return response()->json([
        'view' => "" . view('Admin.Component.DetailCategory.Modal.ModalDelete')
    ]);
})->name('ProcessOpenModalDeleteCategoryDetail');
