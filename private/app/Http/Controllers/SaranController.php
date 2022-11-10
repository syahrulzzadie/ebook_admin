<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\AppHelpers;

use App\Models\Pengguna;
use App\Models\Saran;

class SaranController extends Controller
{
    public function index()
    {
        $data['data_saran'] = Saran::get();
        
        return view('saran.index')->with($data);
    }

    public function create()
    {
        $data['data_pengguna'] = Pengguna::get();
        return view('saran.create')->with($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'isi' => 'required',
            'id_pengguna' => 'required'
        ]);

        $values['isi'] = $request->input('isi');
        $values['id_pengguna'] = $request->input('id_pengguna');
        $values['tanggal'] = AppHelpers::dateTimeNow();

        if (Saran::create($values)) {
            return redirect()
                ->route('saran.index')
                ->with('messageSuccess','Berhasil disimpan!');
        }

        return redirect()
            ->route('saran.index')
            ->with('messageError','Gagal disimpan!');
    }

    public function show($id)
    {
        $saran = Saran::findOrFail($id);

        $data['saran'] = $saran;
        $data['data_pengguna'] = Pengguna::get();
        return view('saran.show')->with($data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'isi' => 'required',
            'id_pengguna' => 'required'
        ]);

        $sets['isi'] = $request->input('isi');
        $sets['id_pengguna'] = $request->input('id_pengguna');

        $where['id_saran'] = $request->input('id_saran');

        if (Saran::where($where)->update($sets)) {
            return redirect()
                ->route('saran.index')
                ->with('messageSuccess','Berhasil diubah!');
        }

        return redirect()
            ->route('saran.index')
            ->with('messageError','Gagal diubah!');
    }

    public function destroy($id)
    {
        $saran = Saran::findOrFail($id);

        if ($saran->delete()) {
            return redirect()
                ->route('saran.index')
                ->with('messageSuccess','Berhasil dihapus!');
        }

        return redirect()
            ->route('saran.index')
            ->with('messageError','Gagal dihapus!');
    }
}
