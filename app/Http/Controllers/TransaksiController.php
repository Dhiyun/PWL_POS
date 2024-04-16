<?php

namespace App\Http\Controllers;

use App\Models\TransaksiModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TransaksiController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Transaksi',
            'list'  => ['Home', 'Transaksi']
        ];

        $page = (object) [
            'title' => 'Daftar Transaksi yang Terdaftar Dalam Sistem'
        ];

        $activeMenu = 'transaksi';

        $user = UserModel::all();

        return view('transaksi.index', [
            'breadcrumb' => $breadcrumb, 
            'page' => $page, 
            'user' => $user,
            'activeMenu' => $activeMenu
        ]);
    }

    public function list(Request $request)
    {
        $transaksis = TransaksiModel::select('penjualan_id', 'user_id', 'pembeli', 'penjualan_tanggal')
            ->with('user');

        if ($request->user_id) {
            $transaksis->where('user_id', $request->user_id);
        }

        return DataTables::of($transaksis)
            ->addIndexColumn()
            ->addColumn('aksi', function ($transaksi) {
                $btn = '<a href="'.url('/transaksi/' . $transaksi->penjualan_id).'" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="'.url('/transaksi/' . $transaksi->penjualan_id . '/edit').'" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="'. url('/transaksi/'.$transaksi->penjualan_id).'">'.
                            csrf_field() . method_field('DELETE') .
                            '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Transaksi',
            'list'  => ['Home', 'Transaksi', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah Transaksi Baru'
        ];

        $user = UserModel::all();
        $activeMenu = 'transaksi';

        return view('transaksi.create', [
            'breadcrumb' => $breadcrumb, 
            'page' => $page, 
            'user' => $user, 
            'activeMenu' => $activeMenu
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'penjualan_tanggal' => 'required|date',
            'pembeli'  => 'required|string',
            'user_id' => 'required|integer',
        ]);

        TransaksiModel::create([
            'penjualan_tanggal' => $request->penjualan_tanggal,
            'pembeli'  => $request->pembeli,
            'user_id' => $request->user_id,
        ]);

        return redirect('/transaksi')->with('success', 'Data Transaksi Berhasil Disimpan');
    }

    public function show($id)
    {
        $transaksi = TransaksiModel::with('user')->find($id);

        $breadcrumb = (object) [
            'title' => 'Detail Transaksi', 
            'list'  => ['Home', 'Transaksi', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail Transaksi'
        ];

        $activeMenu = 'transaksi';

        return view('transaksi.show', [
            'breadcrumb' => $breadcrumb, 
            'page' => $page, 
            'transaksi' => $transaksi, 
            'activeMenu' => $activeMenu
        ]);
    }

    public function edit($id)
    {
        $transaksi = TransaksiModel::find($id);
        $user = UserModel::all();

        $breadcrumb = (object) [
            'title' => 'Edit Transaksi',
            'list'  => ['Home', 'Transaksi', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit Transaksi'
        ];

        $activeMenu = 'transaksi';

        return view('transaksi.edit', [
            'breadcrumb' => $breadcrumb, 
            'page' => $page, 
            'transaksi' => $transaksi, 
            'user' => $user,
            'activeMenu' => $activeMenu
        ]);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'penjualan_tanggal' => 'required|date',
            'pembeli'  => 'required|string',
            'user_id' => 'required|integer',
        ]);

        TransaksiModel::find($id)->update([
            'penjualan_tanggal' => $request->penjualan_tanggal,
            'pembeli'  => $request->pembeli,
            'user_id' => $request->user_id,
        ]);

        return redirect('/transaksi')->with('success', 'Data Transaksi Berhasil Diubah');
    }

    public function destroy($id)
    {
        $check = TransaksiModel::find($id);
        if(!$check) {
            return redirect('/transaksi')->with('error'. 'Data Transaksi Tidak Ditemukan');
        }

        try{
            TransaksiModel::destroy($id);

            return redirect('/transaksi')->with('success'. 'Data Transaksi Berhasil Dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/transaksi')->with('error'. 'Data Transaksi Gagal Dihapus Karena Masih Terdapat Tabel Lain yang Terkait Dengan Data Ini');
        }
    }
}
