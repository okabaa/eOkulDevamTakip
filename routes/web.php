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

Route::namespace('\App\Http\Controllers')
    ->group(function () {
        Route::middleware(['auth', 'isAdmin'])->group(function () {
            Route::get('kullanici/{id}', [\App\Http\Controllers\KullaniciController::class, 'destroy'])->whereNumber('id')->name('kullanici.destroy');
            Route::get('sinif/{id}', [\App\Http\Controllers\SinifController::class, 'destroy'])->whereNumber('id')->name('sinif.destroy');
            Route::get('ogrenci/{id}', [\App\Http\Controllers\OgrenciController::class, 'destroy'])->whereNumber('id')->name('ogrenci.destroy');
            Route::resources([
                'sinif' => SinifController::class,
                'ogrenci' => OgrenciController::class,
                'kullanici' => KullaniciController::class,
            ]);
        });
        Route::middleware(['auth', 'isTeacher'])->group(function () {
            Route::get('devamtakip/{id}', [\App\Http\Controllers\DevamTakipController::class, 'destroy'])->whereNumber('id')->name('devamtakip.destroy');
            Route::resource('sinif', SinifController::class)->only(['index']);
            Route::resource('ogrenci', OgrenciController::class)->only(['index']);
            Route::resources([
                'devamtakip' => DevamTakipController::class,
            ]);
            Route::resource('devamtakipliste', DevamTakipOgrenciController::class)->only(['show','edit']);
        });
    });
