<?php

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

Route::prefix('/chair')->group(function(){
    Route::get('/{seat}',[\App\Http\Controllers\TransaksiController::class,'apiChair']);
});

// Route::get('/chair/{seat}', function ($seat) {
//     return "{\"status\":\"disabled\",\"jadwal\":\"no\",\"name\":\"noname\"}";
// });

// Route::prefix('/regist')->group(function(){
//     Route::get('/{UID}/{status}/{temp}',function($UID,$status,$temp){
//         return "{\"name\":\"".$UID."\",\"status\":\"".$temp."\"}";
//     });
// });
Route::prefix('/regist')->group(function(){
    Route::get('/{UID}/{status}/{temp}',[\App\Http\Controllers\TransaksiController::class,'apiRegist']);
});
