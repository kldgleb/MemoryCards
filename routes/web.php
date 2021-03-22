<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Index\IndexController;
use App\Http\Controllers\Search\SearchController;
use App\Http\Controllers\MyCardsEdit\MyCardsEditCardController;
use App\Http\Controllers\MyCardsEdit\MyCardsEditCollectionController;
use App\Http\Controllers\MyCards\MyCardsController;
use App\Http\Controllers\Api\ApiTokenController;

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

Route::group(['middleware' => 'auth', 'prefix' => 'MyCardsEdit'], function(){
    //card routes
    Route::get('/{collection}/edit/{card}',[MyCardsEditCardController::class,'editCard'])->name('MyCardsEdit.editCard');
    Route::get('/{collection}/create',[MyCardsEditCardController::class,'createCard'])->name('MyCardsEdit.createCard');
    Route::post('/{collection}/create',[MyCardsEditCardController::class,'storeCard'])->name('MyCardsEdit.storeCard');
    Route::delete('/{collection}/destroy/{card}',[MyCardsEditCardController::class,'destroyCard'])->name('MyCardsEdit.destroyCard');
    Route::patch('/{collection}/update/{card}',[MyCardsEditCardController::class,'updateCard'])->name('MyCardsEdit.updateCard');
    //collection routes
    Route::get('/{collection}/edit',[MyCardsEditCollectionController::class,'editCollection'])->name('MyCardsEdit.editCollection');
    Route::patch('/{collection}/update',[MyCardsEditCollectionController::class,'updateCollection'])->name('MyCardsEdit.updateCollection');
    Route::get('/',[MyCardsEditCollectionController::class,'index'])->name('MyCardsEdit.index');
    Route::delete('/{collection}/destroy',[MyCardsEditCollectionController::class,'destroyCollection'])->name('MyCardsEdit.destroyCollection');
});

Route::get('/MyCards',[MyCardsController::class,'index'])->middleware('auth')->name('MyCards.index');

Route::get('/search',[SearchController::class,'index'])->name('search');

Route::get('/Api',[ApiTokenController::class,'index'])->middleware('auth')->name('Api.index');
Route::post('/Api',[ApiTokenController::class,'update'])->middleware('auth')->name('Api.update');

Auth::routes();

