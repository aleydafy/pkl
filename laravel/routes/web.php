<?php

use App\Http\Controllers\AnimalController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('galeri', App\Http\Controllers\GaleriController::class);
Route::get('galeri/{id}/edit/', [App\Http\Controllers\GaleriController::class, 'edit']);

Route::resource('berita', App\Http\Controllers\BeritaController::class);
Route::get('berita/{id}/edit/', [App\Http\Controllers\BeritaController::class, 'edit']);

Route::resource('profile', App\Http\Controllers\profileController::class);
Route::get('profile/{id}/edit/', [App\Http\Controllers\ProfileController::class, 'edit']);

Route::resource('dashboardProfile', App\Http\Controllers\DashboardProfileController::class);
Route::get('dashboardProfile/{id}/edit/', [App\Http\Controllers\DashboardProfileController::class, 'edit']);

Route::resource('dashboardBerita', App\Http\Controllers\DashboardBeritaController::class);
Route::get('dashboardBerita/{id}/edit/', [App\Http\Controllers\DashboardBeritaController::class, 'edit']);
