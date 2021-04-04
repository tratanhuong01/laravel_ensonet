<?php

use App\Http\Controllers\Admin\LoadDataControllerAd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('ProcessLoadCategoryAd', [LoadDataControllerAd::class, 'loadCategory']);

Route::get('ProcessLoadViewDetailAd', [LoadDataControllerAd::class, 'loadViewDetail']);

Route::get('ProcessPaginationAdmin', [LoadDataControllerAd::class, 'pagination']);
