<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\AppHelpers;

use App\Models\Diskusi;
use App\Models\Pengguna;
use App\Models\DetailDiskusi;

class DiskusiController extends Controller
{
    public function index()
    {
        $data['data_diskusi'] = Diskusi::get();
        
        return view('diskusi.index')->with($data);
    }

    public function create()
    {
        $data['data_pengguna'] = Pengguna::get();
        return view('diskusi.create')->with($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'ket' => 'required'
        ]);

        $values['judul'] = $request->input('judul');
        $values['ket'] = $request->input('ket');
        $values['id_pengguna'] = $request->input('id_pengguna');
        $values['tanggal'] = AppHelpers::dateTimeNow();

        if (Diskusi::create($values)) {
            return redirect()
                ->route('diskusi.index')
                ->with('messageSuccess','Berhasil disimpan!');
        }

        return redirect()
            ->route('diskusi.index')
            ->with('messageError','Gagal disimpan!');
    }

    public function show($id)
    {
        $diskusi = Diskusi::findOrFail($id);

        $data['diskusi'] = $diskusi;
        $data['data_pengguna'] = Pengguna::get();
        return view('diskusi.show')->with($data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'ket' => 'required'
        ]);

        $sets['judul'] = $request->input('judul');
        $sets['ket'] = $request->input('ket');

        $where['id_diskusi'] = $id;

        if (Diskusi::where($where)->update($sets)) {
            return redirect()
                ->route('diskusi.index')
                ->with('messageSuccess','Berhasil diubah!');
        }

        return redirect()
            ->route('diskusi.index')
            ->with('messageError','Gagal diubah!');
    }

    public function destroy($id)
    {
        $diskusi = Diskusi::findOrFail($id);

        if ($diskusi->delete()) {
            return redirect()
                ->route('diskusi.index')
                ->with('messageSuccess','Berhasil dihapus!');
        }

        return redirect()
            ->route('diskusi.index')
            ->with('messageError','Gagal dihapus!');
    }

    public function detail($id_diskusi = 0)
    {
        $where['id_diskusi'] = $id_diskusi;
        $detail_diskusi = DetailDiskusi::where($where)->get();

        $data['data_detail_diskusi'] = $detail_diskusi;
        return view('diskusi.detail')->with($data);
    }

    public function detail_destroy($id_detail_diskusi = 0)
    {
        $diskusi = DetailDiskusi::findOrFail($id_detail_diskusi);

        $id_diskusi = $diskusi->id_diskusi;

        if ($diskusi->delete()) {
            return redirect()
                ->route('diskusi.detail', $id_diskusi)
                ->with('messageSuccess','Berhasil dihapus!');
        }

        return redirect()
            ->route('diskusi.detail', $id_diskusi)
            ->with('messageError','Gagal dihapus!');
    }
}
