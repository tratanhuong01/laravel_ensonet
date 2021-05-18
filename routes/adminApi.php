<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Category;
use App\Admin\GeneralID;
use App\Models\Amthanh;
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
