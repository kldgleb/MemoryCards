<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MyCardsController;

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
    Route::get('/{collection}/{card}',[IndexController::class,'show'])->name('index.show');
});
Route::group(['middleware' => 'auth', 'prefix' => 'MyCards'], function(){
    Route::get('/{collection}/edit/{card}',[MyCardsController::class,'editCard'])->name('MyCards.editCard');
    Route::delete('/{collection}/destroy/{card}',[MyCardsController::class,'destroyCard'])->name('MyCards.destroyCard');
    Route::patch('/{collection}/update/{card}',[MyCardsController::class,'updateCard'])->name('MyCards.updateCard');
});
Route::resource('MyCards',MyCardsController::class)->except([
    'create', 'store', 'show'
]);;

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


