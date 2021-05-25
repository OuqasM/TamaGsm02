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

Route::get('/index', [App\Http\Controllers\TelephoneController::class, 'showPhones'])->name('index');

Route::get('/createTI', function () {
    return view('telephone.index');
});
Auth::routes();
Route::group(['prefix' => 'telephone'], function () {
    
Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('CreateTelephone', [App\Http\Controllers\TelephoneController::class, 'createtelephone'])->name('createtelephone');
Route::get('show/{id}', [App\Http\Controllers\TelephoneController::class, 'showphone'])->name('showphone');
Route::get('delete/{id}', [App\Http\Controllers\TelephoneController::class, 'deletephone'])->name('deletephone');
Route::get('GetAllPhones', [App\Http\Controllers\TelephoneController::class, 'editphones'])->name('getallphones');
Route::get('createTI', function () { return view('telephone.create');})->name('createphoneview');
Route::get('edit/{id}', [App\Http\Controllers\TelephoneController::class, 'editphone'])->name('editphone');

});