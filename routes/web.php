<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\POSController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, 'index']);

// User
Route::group(['prefix' => 'user'], function() {
    Route::get('/', [UserController::class, 'index']);              // Menampilkan halaman awal user
    Route::post('/list', [UserController::class, 'list']);          // Menampilkan data user dalam bentuk json untuk datatables
    Route::get('/create', [UserController::class, 'create']);       // Menampilkan halaman form tambah user
    Route::post('/', [UserController::class, 'store']);             // Mentimpan data user baru 
    Route::get('/{id}', [UserController::class, 'show']);           // Menampilkan detail user
    Route::get('/{id}/edit', [UserController::class, 'edit']);      // Menampilkan halaman form edit user
    Route::put('/{id}', [UserController::class, 'update']);         // Menyimpan perubahan data user
    Route::delete('/{id}', [UserController::class, 'destroy']);     // Menghapus data user
});

// Level
Route::group(['prefix' => 'level'], function() {
    Route::get('/', [LevelController::class, 'index']);
    Route::post('/list', [LevelController::class, 'list']);
    Route::get('/create', [LevelController::class, 'create']);
    Route::post('/', [LevelController::class, 'store']);
    Route::get('/{id}', [LevelController::class, 'show']);
    Route::get('/{id}/edit', [LevelController::class, 'edit']);
    Route::put('/{id}', [LevelController::class, 'update']);
    Route::delete('/{id}', [LevelController::class, 'destroy']);
});

// Kategori
Route::group(['prefix' => 'kategori'], function() {
    Route::get('/', [KategoriController::class, 'index']);
    Route::post('/list', [KategoriController::class, 'list']);
    Route::get('/create', [KategoriController::class, 'create']);
    Route::post('/', [KategoriController::class, 'store']);
    Route::get('/{id}', [KategoriController::class, 'show']);
    Route::get('/{id}/edit', [KategoriController::class, 'edit']);
    Route::put('/{id}', [KategoriController::class, 'update']);
    Route::delete('/{id}', [KategoriController::class, 'destroy']);
});

// Barang
Route::group(['prefix' => 'barang'], function() {
    Route::get('/', [BarangController::class, 'index']);
    Route::post('/list', [BarangController::class, 'list']);
    Route::get('/create', [BarangController::class, 'create']);
    Route::post('/', [BarangController::class, 'store']);
    Route::get('/{id}', [BarangController::class, 'show']);
    Route::get('/{id}/edit', [BarangController::class, 'edit']);
    Route::put('/{id}', [BarangController::class, 'update']);
    Route::delete('/{id}', [BarangController::class, 'destroy']);
});

// Stok
Route::group(['prefix' => 'stok'], function() {
    Route::get('/', [StokController::class, 'index']);
    Route::post('/list', [StokController::class, 'list']);
    Route::get('/create', [StokController::class, 'create']);
    Route::post('/', [StokController::class, 'store']);
    Route::get('/{id}', [StokController::class, 'show']);
    Route::get('/{id}/edit', [StokController::class, 'edit']);
    Route::put('/{id}', [StokController::class, 'update']);
    Route::delete('/{id}', [StokController::class, 'destroy']);
});

// Transaksi
Route::group(['prefix' => 'transaksi'], function() {
    Route::get('/', [TransaksiController::class, 'index']);
    Route::post('/list', [TransaksiController::class, 'list']);
    Route::get('/create', [TransaksiController::class, 'create']);
    Route::post('/', [TransaksiController::class, 'store']);
    Route::get('/{id}', [TransaksiController::class, 'show']);
    Route::get('/{id}/edit', [TransaksiController::class, 'edit']);
    Route::put('/{id}', [TransaksiController::class, 'update']);
    Route::delete('/{id}', [TransaksiController::class, 'destroy']);
});

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/levelform', function () {
//     return view('admin.m_level');
// });


// Route::get('/userform', function () {
//     return view('admin.m_user');
// });

// Route::get('/level', [LevelController::class, 'index'])->name('indexlevel');
// Route::get('/level/create', [LevelController::class, 'create'])->name('createlevel');
// Route::post('/level', [LevelController::class, 'store']);
// Route::get('/level/update/{id}', [LevelController::class, 'update'])->name('updatelevel');
// Route::put('/level/save_update/{id}', [LevelController::class, 'save_update'])->name('saveupdatelevel');
// Route::get('/level/delete/{id}', [LevelController::class, 'delete'])->name('deletelevel');

//User
// Route::get('/user', [UserController::class, 'index'])->name('indexuser');
// Route::get('/user/create', [UserController::class, 'create'])->name('createuser');
// Route::post('/user', [UserController::class, 'store']);
// Route::get('/user/ubah/{id}', [UserController::class, 'ubah']);
// Route::put('/user/ubah_simpan/{id}', [UserController::class, 'ubah_simpan']);
// Route::get('/user/hapus/{id}', [UserController::class, 'hapus']);
// Route::resource('m_user', POSController::class);

Auth::routes();

//Kategori
// Route::get('/kategori', [KategoriController::class, 'index'])->name('indexkategori');
// Route::get('/kategori/create', [KategoriController::class, 'create'])->name('createkategori');
// Route::post('/kategori', [KategoriController::class, 'store']);
// Route::get('/kategori/update/{id}', [KategoriController::class, 'update'])->name('updatekategori');
// Route::put('/kategori/save_update/{id}', [KategoriController::class, 'save_update'])->name('saveupdatekategori');
// Route::get('/kategori/delete/{id}', [KategoriController::class, 'delete'])->name('deletekategori');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
