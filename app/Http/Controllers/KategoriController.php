<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\DataTables\KategoriDataTable;
use App\Http\Requests\StorePostRequest;
use App\Models\KategoriModel;
use Illuminate\Support\Facades\Redirect;

class KategoriController extends Controller
{
    public function index(KategoriDataTable $dataTable)
    {
        return $dataTable->render('kategori.index');
    }

    public function create(): View
    {
        return view('kategori.create');
    }

    public function store(StorePostRequest $request): RedirectResponse
    {
        // $validated = $request->validate(
        //     [
        //         'kodeKategori' => 'bail|required|unique:m_kategori,kategori_kode',
        //         'namaKategori' => 'required'
        //     ]
        // );

        // if (!$validated) {
        //     return redirect('/kategori/create')->withInput()->withErrors($validated);
        // }
        
        $validated = $request->validated();

        $validated = $request->safe()->only('kategori_kode', 'kategori_nama');
        $validated = $request->safe()->except('kategori_kode', 'kategori_nama');

        KategoriModel::create([
            'kategori_kode' => $validated['kodeKategori'],
            'kategori_nama' => $validated['namaKategori']
        ]);

        return redirect('/kategori');
    }

    public function update($id)
    {
        $kategori = KategoriModel::find($id);
        return view('kategori.update', ['data' => $kategori]);
    }

    public function save_update($id, Request $request)
    {
        $request->validate([
            'kodeKategori' => 'required',
            'namaKategori' => 'required',
        ]);

        $kategori = KategoriModel::findOrFail($id);

        $kategori->kategori_kode = $request->kodeKategori;
        $kategori->kategori_nama = $request->namaKategori;

        $kategori->save();
        return redirect('/kategori')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function delete($id)
    {
        $user = KategoriModel::find($id);
        $user->delete();

        return redirect('/kategori');
    }
}
