<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PollController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

],

function ($router) {
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
    Route::post('reset_password', [AuthController::class, 'reset_password']);
});

Route::group([

    'middleware' => 'api',
    'prefix' => 'user'

],

function ($router) {
    Route::post('list_user', [UserController::class, 'list_user'])->name('index');
    Route::post('store', [UserController::class, 'store']);
    route::post('update/{id}', [UserController::class, 'update']);
    Route::delete('/{id}', [UserController::class, 'delete']);
});

Route::group([

    'middleware' => ['api'],
    'prefix' => 'poll'

],
function ($router) {
    Route::get('/', [PollController::class, 'list_poll'])->name('index');
    Route::get('/{id}', [PollController::class, 'get_a_poll']);
    Route::post('/', [PollController::class, 'store']);
    route::post('update/{id}', [PollController::class, 'update']);
    Route::delete('/{id}', [PollController::class, 'delete']);
    Route::post('/{poll_id}/vote/{choice_id}',  [PollController::class, 'vote']);

});
