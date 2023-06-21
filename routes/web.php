<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DB_Connect;
use App\Http\Controllers\ActorDao;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FilmController;

Route::get('/', [CustomerController::class, 'index']);

Route::get('home', [CustomerController::class, 'index'])->name("home");
Route::view('movie-profile', 'userProfile')->name("movie-profile");

// DB Connect
// Route::get('select', [DB_Connect::class, 'select']);
// ORM
// Route::get('getData', [ActorDao::class, 'getData']);
// Project
Route::get('movie-management', [FilmController::class, 'show'])->name("movie-management/");
Route::get('movie-management/page/{page}', [FilmController::class, 'show'])->name('movie-management/page/');
// Route::get('movie-management/page/{page}', [FilmController::class, 'show'])->name('movie-management/page/');
Route::get('edit-movie/{id}', [FilmController::class, 'edit']);
Route::get('add-new-movie', [FilmController::class, 'create'])->name("add-new-movie");
Route::post('update-movie/{id}', [FilmController::class, 'update'])->name("update-movie");
Route::post('add-movie', [FilmController::class, 'store'])->name("add-movie");
Route::post('delete-movie', [FilmController::class, 'destroy'])->name("delete-movie");
// Route::get('user-management/search', [FilmController::class, 'search'])->name('movie-search');
