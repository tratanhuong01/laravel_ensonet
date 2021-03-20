<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::post('ProcessSaveCanvasStory', [Storys\StoryController::class, 'create'])
    ->name('ProcessSaveCanvasStorys');
