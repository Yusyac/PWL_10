<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\MahasiswaController;
use App\Models\Article;

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

Route::resource('mahasiswa', MahasiswaController::class);
Route::get('/mahasiswa/cetak_pdf/{id}',[MahasiswaController::class,'cetak_pdf']);
Route::get('mahasiswa/nilai/{Nim}', [MahasiswaController::class, 'nilai'])->name('mahasiswa.nilai');

Route::resource('articles', ArticleController::class);

Route::get('/article/cetak_pdf', [ArticleController::class, 'cetak_pdf']);
