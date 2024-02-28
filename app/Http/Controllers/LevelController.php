<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LevelController extends Controller
{
    public function index() {
        // DB::insert('INSERT INTO m_level (level_kode, level_nama, created_at) values (?, ?, ?)', ['CUS', 'Pelanggan', now()]);
        // return 'insert data baru berhasil';

        // $row = DB::UPDATE('UPDATE m_level SET level_nama = ? WHERE level_kode = ?', ['Customer', 'CUS']);
        // return 'Update Data Berhasil. Jumlah Data yang Diupdate: ' . $row . ' baris.';

        // $row = DB::DELETE('DELETE FROM m_level WHERE level_kode = ?', ['CUS']);
        // return 'Delete Data Berhasil. Jumlah Data yang Dihapus: ' . $row . ' baris';

        $data = DB::SELECT('SELECT * FROM m_level');
        return view('level', ['data' => $data]);
    }
}
