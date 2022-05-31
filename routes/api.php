<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileResourceController;
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

Route::apiResource('file_resource',\App\Http\Controllers\FileResourceController::class);
Route::post('file_update',[FileResourceController::class, 'fileUpdate']);
Route::apiResource('html_resource',\App\Http\Controllers\HtmlResourceController::class);
Route::apiResource('link_resource',\App\Http\Controllers\LinkResourceController::class);
