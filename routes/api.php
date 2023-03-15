<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookControllerApi;
use App\Http\Controllers\ApiSendEmailController;

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


Route::get('/', [BookControllerApi::class, 'test']);
Route::post('/create-book', [BookControllerApi::class, 'createBook']);
Route::post('/update-buku/{id}', [BookControllerApi::class, 'updateBook']); //patch update book method
Route::delete('/delete-api/{id}', [BookControllerApi::class, 'deleteBook']);
//send email
Route::post('/send-email/{id}', [ApiSendEmailController::class, 'store']);
