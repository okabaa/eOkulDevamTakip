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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->get('/panel', function () {
    return view('dashboard');
})->name('dashboard');


Route::group([
    'middleware' => ['auth', 'isAdmin'],
    'namespace' => '\App\Http\Controllers'
], function () {
    Route::get('sinif/{id}',[\App\Http\Controllers\SinifController::class,'destroy'])->whereNumber('id')->name('sinif.destroy');
    Route::get('ogrenci/{id}',[\App\Http\Controllers\OgrenciController::class,'destroy'])->whereNumber('id')->name('ogrenci.destroy');
    Route::resource('sinif', SinifController::class);
    Route::resource('ogrenci', OgrenciController::class);
    Route::get('deneme', function () {
        return "middleware testi";
    });
});
