<?php

namespace App\Http\Controllers;

use App\DataTables\UserDataTable;
use App\Models\LevelModel;
use App\Models\m_user;
use Illuminate\Http\Request;

class POSController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(UserDataTable $dataTable)
    {
        // Fungsi eloquent menampilkan data menggunakan pagination
        $useri = m_user::all(); // Mengambil semua isi tabel
        return $dataTable->render('m_user.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $levels = LevelModel::all();
        return view('m_user.create', ['levels' => $levels]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Melakukan validasi data
        $request->validate([
            'user_id' => 'max 20',
            'username' => 'required',
            'nama' => 'required',
            'password' => 'required',
            'level_id' => 'required',
        ]);

        // Fungsi eloquent untuk menambah data
        m_user::create($request->all());

        return redirect()->route('m_user.index')
        ->with('success', 'User Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $useri = m_user::findOrFail($id);
        return view('m_user.show', compact('useri'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $levels = LevelModel::all();
        $useri = m_user::find($id);
        return view('m_user.edit', compact('useri'), ['levels' => $levels]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'username' => 'required',
            'nama' => 'required',
            'password' => 'required',
        ]);

        // Fungsi eloquent untuk mengupdate data inputan kita
        m_user::find($id)->update($request->all());
        // Jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('m_user.index')
        ->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $useri = m_user::findOrFail($id)->delete();
        return redirect()->route('m_user.index')
        ->with('success', 'Data Berhasil Dihapus');
    }
}
