<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    public function index()
    {
        // $data = [
        //     'kategori_kode' => 'SNK',
        //     'kategori_nama' => 'Snack/Makanan Ringan',
        //     'created_at' => now()
        // ];

        // DB::table('m_kategori')->insert($data);
        // return 'Insert Data Baru Berhasil';

        // $row = DB::table('m_kategori')->where('kategori_kode', 'SNK')->UPDATE(['kategori_nama' => 'camilan']);
        // return 'Update Data Berhasil. Jumlah Data yang Diupdate: ' . $row . ' baris.';

        // $row = DB::table('m_kategori')->where('kategori_kode', 'SNK')->DELETE();
        // return 'Delete Data Berhasil. Jumlah Data yang Dihapus: ' . $row . ' baris.';

        $data = DB::table("m_kategori")->get();
        return view('kategori', ['data' => $data]);
    }
}
