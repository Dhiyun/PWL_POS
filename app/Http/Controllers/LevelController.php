<?php

namespace App\Http\Controllers;

use App\DataTables\LevelDataTable;
use App\Http\Requests\StorePostRequest;
use App\Models\LevelModel;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LevelController extends Controller
{
    public function index(LevelDataTable $dataTable) 
    {
        return $dataTable->render('level.index');
    }

    public function create(): View
    {
        return view('level.create');
    }

    public function store(StorePostRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $validated = $request->safe()->only('level_kode', 'level_nama');
        $validated = $request->safe()->except('level_kode', 'level_nama');

        LevelModel::create([
            'level_kode' => $validated['kodeLevel'],
            'level_nama' => $validated['namaLevel']
        ]);

        return redirect('/level');
    }

    public function update($id)
    {
        $level = LevelModel::find($id);
        return view('level.update', ['data' => $level]);
    }

    public function save_update($id, Request $request)
    {
        $request->validate([
            'kodeLevel' => 'required',
            'namaLevel' => 'required',
        ]);

        $level = LevelModel::findOrFail($id);

        $level->level_kode = $request->kodeLevel;
        $level->level_nama = $request->namaLevel;

        $level->save();
        return redirect('/level')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function delete($id)
    {
        $user = LevelModel::find($id);
        $user->delete();

        return redirect('/level');
    }
}
