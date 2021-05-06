<?php

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/showAll/{id}', [App\Http\Controllers\TelephoneController::class, 'showAllImg'])->name('showAll');
Route::post('/addImg', [App\Http\Controllers\TelephoneController::class, 'stroimg'])->name('addImg');
Route::get('/show/{id}', [App\Http\Controllers\TelephoneController::class, 'showphone'])->name('showphone');
