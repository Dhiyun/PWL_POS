<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\POSController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/levelform', function () {
    return view('admin.m_level');
});


Route::get('/userform', function () {
    return view('admin.m_user');
});

Route::get('/level', [LevelController::class, 'index'])->name('indexlevel');
Route::get('/level/create', [LevelController::class, 'create'])->name('createlevel');
Route::post('/level', [LevelController::class, 'store']);
Route::get('/level/update/{id}', [LevelController::class, 'update'])->name('updatelevel');
Route::put('/level/save_update/{id}', [LevelController::class, 'save_update'])->name('saveupdatelevel');
Route::get('/level/delete/{id}', [LevelController::class, 'delete'])->name('deletelevel');

//User
// Route::get('/user', [UserController::class, 'index']);
// Route::get('/user/tambah', [UserController::class, 'tambah']);
// Route::post('/user/tambah_simpan', [UserController::class, 'tambah_simpan']);
// Route::get('/user/ubah/{id}', [UserController::class, 'ubah']);
// Route::put('/user/ubah_simpan/{id}', [UserController::class, 'ubah_simpan']);
// Route::get('/user/hapus/{id}', [UserController::class, 'hapus']);
// Route::get('/user', [UserController::class, 'index'])->name('indexuser');
// Route::get('/user/create', [UserController::class, 'create'])->name('createuser');
// Route::post('/user', [UserController::class, 'store']);
// Route::get('/user/ubah/{id}', [UserController::class, 'ubah']);
// Route::put('/user/ubah_simpan/{id}', [UserController::class, 'ubah_simpan']);
// Route::get('/user/hapus/{id}', [UserController::class, 'hapus']);
Route::resource('m_user', POSController::class);

Auth::routes();

//Kategori
Route::get('/kategori', [KategoriController::class, 'index'])->name('indexkategori');
Route::get('/kategori/create', [KategoriController::class, 'create'])->name('createkategori');
Route::post('/kategori', [KategoriController::class, 'store']);
Route::get('/kategori/update/{id}', [KategoriController::class, 'update'])->name('updatekategori');
Route::put('/kategori/save_update/{id}', [KategoriController::class, 'save_update'])->name('saveupdatekategori');
Route::get('/kategori/delete/{id}', [KategoriController::class, 'delete'])->name('deletekategori');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
