<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\AppHelpers;

use App\Models\KaryaTulis;
use App\Models\Pengguna;

class KaryaTulisController extends Controller
{
    public function index()
    {
        $data['data_karya_tulis'] = KaryaTulis::get();

        return view('karya_tulis.index')->with($data);
    }

    public function create()
    {
        $data['data_pengguna'] = Pengguna::get();
        return view('karya_tulis.create')->with($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'lokasi' => 'required',
            'sinopsis' => 'required',
            'sampul' => 'required',
            'publish' => 'required',
            'kategori' => 'required',
            'id_pengguna' => 'required'
        ]);

        $sampul = AppHelpers::uploadFile($request->sampul,'images',1);
        $lokasi = AppHelpers::uploadFile($request->lokasi,'pdf',2);

        $id_pengguna = $request->input('id_pengguna');
        $pengguna = Pengguna::findOrFail($id_pengguna);

        $values['judul'] = $request->input('judul');
        $values['lokasi'] = $lokasi;
        $values['sinopsis'] = $request->input('sinopsis');
        $values['sampul'] = $sampul;
        $values['publish'] = $request->input('publish');
        $values['kategori'] = $request->input('kategori');
        $values['id_pengguna'] = $pengguna->id_pengguna;
        $values['nama'] = $pengguna->nama;
        $values['tanggal'] = AppHelpers::dateTimeNow();

        if (KaryaTulis::create($values)) {
            return redirect()
                ->route('karya_tulis.index')
                ->with('messageSuccess','Berhasil disimpan!');
        }

        return redirect()
            ->route('karya_tulis.index')
            ->with('messageError','Gagal disimpan!');
    }

    public function show($id)
    {
        $karya_tulis = KaryaTulis::findOrFail($id);

        $data['karya_tulis'] = $karya_tulis;
        $data['data_pengguna'] = Pengguna::get();
        return view('karya_tulis.show')->with($data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'sinopsis' => 'required',
            'kategori' => 'required',
            'publish' => 'required',
        ]);

        if ($request->sampul) {
            $sets['sampul'] = AppHelpers::uploadFile($request->sampul,'images',1);
        }

        if ($request->lokasi) {
            $sets['lokasi'] = AppHelpers::uploadFile($request->lokasi,'pdf',2);
        }

        $sets['judul'] = $request->input('judul');
        $sets['sinopsis'] = $request->input('sinopsis');
        $sets['kategori'] = $request->input('kategori');
        $sets['publish'] = $request->input('publish');

        $where['id_karya_tulis'] = $id;

        if (KaryaTulis::where($where)->update($sets)) {
            return redirect()
                ->route('karya_tulis.index')
                ->with('messageSuccess','Berhasil diubah!');
        }

        return redirect()
            ->route('karya_tulis.index')
            ->with('messageError','Gagal diubah!');
    }

    public function destroy($id)
    {
        $karya_tulis = KaryaTulis::findOrFail($id);

        if ($karya_tulis->delete()) {
            return redirect()
                ->route('karya_tulis.index')
                ->with('messageSuccess','Berhasil dihapus!');
        }

        return redirect()
            ->route('karya_tulis.index')
            ->with('messageError','Gagal dihapus!');
    }
}
