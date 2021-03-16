<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;

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
Route::get('/',[IndexController::class,'index'])->name('index');

Route::group(['middleware' => 'auth'], function(){
    Route::view('/create','index.create')->name('index.create');
    Route::post('/',[IndexController::class, 'store'])->name('index.store');
    Route::get('/{collection}/addCard', [IndexController::class, 'addCard'])->name('addCard');
    Route::post('/{collection}/storeCard', [IndexController::class, 'storeCard'])->name('storeCard');
});

Route::get('/{collection}/{card}',[IndexController::class,'show'])->name('index.show');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


