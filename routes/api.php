<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PassportAuthController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\AuthContactController;
use App\Http\Controllers\ApiController;
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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
 //   return $request->user();
//});

/*
Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');

});
*/
/*
Route::post('/register',[ApiController::class,'register']);
Route::post('/login',[ApiController::class,'login']);
Route::post('/detail',[ApiController::class,'detail'])->middleware('auth:api');
Route::put('/update', [ApiController::class , 'update'])->middleware('auth:api');
//Route::delete('/delete', [ApiController::class , 'delete'])->middleware('auth:api');





*/


Route::post('register', [PassportAuthController::class, 'register']);
Route::post('login', [PassportAuthController::class, 'login']);
Route::get('detail',[PassportAuthController::class,'detail'])->middleware('auth:api');
Route::resource('contacts',AuthContactController::class)->middleware('auth:api');
/*
Route::middleware('auth:api')->group(function () {
    Route::get('get-user', [PassportAuthController::class, 'detail']);

 Route::resource('contacts', [AuthContactController::class]);

});*/
