<?php

use App\Http\Controllers\Api\DebugSentryController;
use App\Http\Controllers\Api\FilterObjectController;
use App\Http\Controllers\Api\ReqResController;
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

Route::get('filter', FilterObjectController::class);

Route::get('/debug-sentry', DebugSentryController::class);

Route::prefix('reqres')
    ->group(function() {
        Route::post('register', [ReqResController::class, 'register']);
        Route::post('login', [ReqResController::class, 'login']);
    });
