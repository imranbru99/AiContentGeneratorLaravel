<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostController;

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

Route::get('/wp-draft', [PostController::class, 'saveDraftToWordPress']);

Route::post('/save-draft', [PostController::class, 'saveDraftToWordPress']);


Route::namespace('Api')->name('api.')->group(function () {
});
