<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TransaksiModel;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function show($id)
    {
        $penjualan = TransaksiModel::with('user')->findOrFail($id);
        $barang = $penjualan->detailtransaksi()->with('barang')->get();
        $penjualan->barang = $barang;
        return response()->json($penjualan, 200);
    }
}
