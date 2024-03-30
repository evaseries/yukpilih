<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\VoteController;
use Illuminate\Support\Facades\Route;

Route::resource('/index', HomeController::class);
Route::resource('/vote', VoteController::class);