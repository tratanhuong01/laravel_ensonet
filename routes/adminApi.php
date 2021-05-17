<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Category;
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
