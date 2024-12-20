<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pages\LandingpageController;

Route::get('/', [LandingpageController::class, 'landingPage'])->name('landingpage');
Route::get('/detail/{type}/{slug}', [LandingpageController::class, 'showDetail'])->name('detail');
