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

Route::get('/index', [App\Http\Controllers\HomeController::class, 'showAll'])->name('index');

Route::get('/createTI', function () {
    return view('telephone.index');
});
Auth::routes();
Route::get('home', [App\Http\Controllers\HomeController::class, 'showAll'])->name('home');

Route::group(['prefix' => 'telephone'], function () {

Route::post('CreateTelephone', [App\Http\Controllers\TelephoneController::class, 'createtelephone'])->name('createtelephone');
Route::get('show/{id}', [App\Http\Controllers\TelephoneController::class, 'showphone'])->name('showphone');
Route::post('delete', [App\Http\Controllers\TelephoneController::class, 'deletephone'])->name('deletephone');
Route::get('GetAllPhones', [App\Http\Controllers\TelephoneController::class, 'editphones'])->name('getallphones');
Route::get('createTI', function () { return view('telephone.create');})->name('createphoneview');
Route::get('edit/{id}', [App\Http\Controllers\TelephoneController::class, 'editphone'])->name('editphone');
Route::post('deleteImage', [App\Http\Controllers\TelephoneController::class, 'deleteimage'])->name('deleteImage');
Route::post('updatetelephone', [App\Http\Controllers\TelephoneController::class, 'Updatetelephone'])->name('updatetelephone');
});


Route::group(['prefix' => 'accessoir'], function () {
    
    Route::post('CreateAcs', [App\Http\Controllers\AccessoirController::class, 'createAcs'])->name('createacs');
    //Route::get('show/{id}', [App\Http\Controllers\TelephoneController::class, 'showphone'])->name('showphone');
    Route::post('deleteAcs', [App\Http\Controllers\AccessoirController::class, 'deleteAcs'])->name('deleteacs');
    Route::get('GetAllAcs', [App\Http\Controllers\AccessoirController::class, 'editAcss'])->name('getallacs');
    Route::get('createAcs', function () { return view('Accessoire.create');})->name('createacsview');
    Route::get('edit/{id}', [App\Http\Controllers\AccessoirController::class, 'editAcs'])->name('editacs');
    Route::post('deleteAcsImage', [App\Http\Controllers\AccessoirController::class, 'deleteimage'])->name('deleteAcsImage');
    Route::post('updateacs', [App\Http\Controllers\AccessoirController::class, 'UpdateAcs'])->name('updateacs');
    
    });