<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        // Tambah data user dengan Eloquent Model
        $data = 
        [
            'nama' => 'Pelanggan Pertama',
        ];
        UserModel::WHERE('username', 'customer-1')->UPDATE($data); // Tambahkan data ke tabel m_user

        // Coba akses model UserModel
        $user = UserModel::all(); // Ambil semua data dari tabel m_user;
        return view('user', ['data' => $user]);
    }
}
