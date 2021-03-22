<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::post('ProcessSaveCanvasStory', [Storys\StoryController::class, 'create'])
    ->name('ProcessSaveCanvasStorys');

Route::post('ProcessLoadStory', [Storys\StoryController::class, 'load'])
    ->name('ProcessLoadStory');

Route::post('ProcessLoadAndAddViewStory', [Storys\StoryController::class, 'loadAndAddViewStory'])
    ->name('ProcessLoadAndAddViewStory');
