<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\AdminController::class, 'index'])->name('home');

// method post, ketika tujuan kita ingin menginputkan sesuatu ke database
Route::post('/book/add', [AdminController::class, 'addbook']);
Route::post('/book/edit', [AdminController::class, 'editbook']);
Route::get('/book/delete/{id}', [AdminController::class, 'deletebook']);
Route::get('/book/detail/{id}', [AdminController::class, 'detailbook']);
