<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\AppHelpers;

use App\Models\Perpus;

class PerpusController extends Controller
{
    public function index()
    {
        $data['data_perpus'] = Perpus::get();
        
        return view('perpus.index')->with($data);
    }

    public function create()
    {
        return view('perpus.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'link' => 'required',
            'gambar' => 'required'
        ]);

        $gambar = AppHelpers::imageName($request->gambar->extension());
        $request->gambar->move(public_path('uploads/images'), $gambar);

        $values['nama'] = $request->input('nama');
        $values['alamat'] = $request->input('alamat');
        $values['link'] = $request->input('link');
        $values['gambar'] = $gambar;

        if (Perpus::create($values)) {
            return redirect()
                ->route('perpus.index')
                ->with('messageSuccess','Berhasil disimpan!');
        }

        return redirect()
            ->route('perpus.index')
            ->with('messageError','Gagal disimpan!');
    }

    public function show($id)
    {
        $perpus = Perpus::findOrFail($id);

        $data['perpus'] = $perpus;
        return view('perpus.show')->with($data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'link' => 'required',
            'gambar' => 'required'
        ]);

        if ($request->gambar) {
            $gambar = AppHelpers::imageName($request->gambar->extension());
            $request->gambar->move(public_path('uploads/images'), $gambar);
            $sets['gambar'] = $gambar;
        }

        $sets['nama'] = $request->input('nama');
        $sets['alamat'] = $request->input('alamat');
        $sets['link'] = $request->input('link');

        $where['id_perpus'] = $id;

        if (Perpus::where($where)->update($sets)) {
            return redirect()
                ->route('perpus.index')
                ->with('messageSuccess','Berhasil diubah!');
        }

        return redirect()
            ->route('perpus.index')
            ->with('messageError','Gagal diubah!');
    }

    public function destroy($id)
    {
        $perpus = Perpus::findOrFail($id);

        if ($perpus->delete()) {
            return redirect()
                ->route('perpus.index')
                ->with('messageSuccess','Berhasil dihapus!');
        }

        return redirect()
            ->route('perpus.index')
            ->with('messageError','Gagal dihapus!');
    }
}
