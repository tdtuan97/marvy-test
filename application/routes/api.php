<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'prefix' => 'v1',
], function () {
    Route::group([
        'middleware' => ['custom-guard'],
    ], function () {
        // Customer
        Route::group(['prefix' => 'user'], function () {
            Route::get('', [UserController::class, 'index']);
            Route::get('{id}', [UserController::class, 'find']);
            Route::post('', [UserController::class, 'create']);

            Route::post('{id}/point', [UserController::class, 'postPoint']);
        });
    });
});
