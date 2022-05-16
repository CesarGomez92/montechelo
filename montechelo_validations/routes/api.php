<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ValidationController;
use App\Http\Controllers\ExceptionsController;

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
Route::get('/get-token', [ValidationController::class, 'getToken']);
Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('/validations/key/{key}', [ValidationController::class, 'validateCreateUser']);
    Route::get('/exceptions', [ExceptionsController::class, 'getExceptions']);
});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
