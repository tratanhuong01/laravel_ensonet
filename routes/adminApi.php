<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('ProcessLoadCategoryAd', [LoadDataControllerAd::class, 'loadCategory'])
    ->name('ProcessLoadCategoryAd');

Route::get('ProcessLoadViewDetailAd', [LoadDataControllerAd::class, 'loadViewDetail'])
    ->name('ProcessLoadViewDetailAd');

Route::get('ProcessPaginationAdmin', [LoadDataControllerAd::class, 'pagination'])
    ->name('ProcessPaginationAdmin');

Route::get('ProcessViewModalUpdateState', [ChangeStateController::class, 'changeViewStateUser'])
    ->name('ProcessViewModalUpdateState');

Route::get('ProcessHandelChangeState', [ChangeStateController::class, 'changeStateUser'])
    ->name('ProcessHandelChangeState');
