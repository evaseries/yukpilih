<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::resource('/index', HomeController::class);
// Route::resource('/vote', HomeController::class);
