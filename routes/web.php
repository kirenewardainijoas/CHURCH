<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});

Route::get('/logout',[\App\Http\Controllers\Auth\RegisterController::class,'logoutAfterRegister']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware('auth')->prefix('admin')->group(function(){
    Route::get('/',[\App\Http\Controllers\AdminController::class,'index'])->name('admin');
    Route::prefix('/rfid')->group(function(){
        Route::get('/',[\App\Http\Controllers\RFIDController::class,'index']);
        Route::get('/record/{user_id}',[\App\Http\Controllers\RFIDController::class,'create']);
        Route::post('/record',[\App\Http\Controllers\RFIDController::class,'store']);
        Route::get('/update/{user_id}',[\App\Http\Controllers\RFIDController::class,'edit']);
        Route::post('/update',[\App\Http\Controllers\RFIDController::class,'update']);
    });
    Route::prefix('/seat')->group(function(){
        Route::get('/',[\App\Http\Controllers\KursiController::class,'index']);
        Route::post('/add',[\App\Http\Controllers\KursiController::class,'store']);
        Route::get('/remove/confirm/{id}',[\App\Http\Controllers\KursiController::class,'removeConfirm']);
        Route::get('/remove',[\App\Http\Controllers\KursiController::class,'destroy']);
    });
    Route::prefix('/schedule')->group(function(){
        Route::get('/',[\App\Http\Controllers\JadwalController::class,'index']);
        Route::post('/create',[\App\Http\Controllers\JadwalController::class,'store']);
        Route::post('/delete',[\App\Http\Controllers\JadwalController::class,'destroy']);
        Route::get('/detail/{id}',[\App\Http\Controllers\JadwalController::class,'chairDetail']);

    });
    Route::prefix('/account')->group(function(){
        Route::get('/',[\App\Http\Controllers\AdminController::class,'account']);
        Route::post('/role',[\App\Http\Controllers\AdminController::class,'changeRole']);

    });

    Route::prefix('/log')->group(function(){
        Route::get('/',[\App\Http\Controllers\LogController::class,'index']);
        Route::get('/detail',[\App\Http\Controllers\LogController::class,'detail']);
    });

});

Route::middleware('auth')->prefix('umat')->group(function(){
    Route::get('/',[\App\Http\Controllers\UmatController::class,'index'])->name('umat');
    Route::prefix('/reservation')->group(function(){
        Route::get('/',[\App\Http\Controllers\TransaksiController::class,'index']);
        Route::post('/book',[\App\Http\Controllers\TransaksiController::class,'book']);
        Route::get('/book',[\App\Http\Controllers\TransaksiController::class,'create']);
        Route::post('/cancel',[\App\Http\Controllers\TransaksiController::class,'cancel']);
        Route::post('/cancel/yes',[\App\Http\Controllers\TransaksiController::class,'destroy']);
        Route::get('/detail/{id}',[\App\Http\Controllers\TransaksiController::class,'detail']);

    });
});
