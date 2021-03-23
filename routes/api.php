<?php

namespace App\Http\Controllers;

use App\Models\Story;
use App\Process\DataProcessSecond;
use App\Process\DataProcessThird;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::post('ProcessSaveCanvasStory', [Storys\StoryController::class, 'create'])
    ->name('ProcessSaveCanvasStorys');

Route::post('ProcessLoadStory', [Storys\StoryController::class, 'load'])
    ->name('ProcessLoadStory');

Route::post('ProcessLoadAndAddViewStory', [Storys\StoryController::class, 'loadAndAddViewStory'])
    ->name('ProcessLoadAndAddViewStory');


Route::get('testAc', function () {
    echo "<pre>";
    print_r(DataProcessSecond::getUserFollowByID('1000000009'));
    echo "</pre>";
});
