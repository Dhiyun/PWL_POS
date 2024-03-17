<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/level', [LevelController::class, 'index']);
Route::get('/kategori', [KategoriController::class, 'index']);

//User
Route::get('/user', [UserController::class, 'index']);
Route::get('/user/tambah', [UserController::class, 'tambah']);
Route::post('/user/tambah_simpan', [UserController::class, 'tambah_simpan']);
Route::get('/user/ubah/{id}', [UserController::class, 'ubah']);
Route::put('/user/ubah_simpan/{id}', [UserController::class, 'ubah_simpan']);
Route::get('/user/hapus/{id}', [UserController::class, 'hapus']);

Auth::routes();

//Kategori
Route::get('/kategori', [KategoriController::class, 'index'])->name('index');;
Route::get('/kategori/create', [KategoriController::class, 'create'])->name('createkategori');
Route::post('/kategori', [KategoriController::class, 'store']);
Route::get('/kategori/update/{id}', [KategoriController::class, 'update'])->name('updatekategori');
Route::put('/kategori/save_update/{id}', [KategoriController::class, 'save_update'])->name('saveupdate');
Route::get('/kategori/delete/{id}', [KategoriController::class, 'delete'])->name('deletekategori');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
