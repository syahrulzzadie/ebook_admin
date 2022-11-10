<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\AppHelpers;

use App\Models\Pengguna;

class PenggunaController extends Controller
{
    public function index()
    {
        $data['data_pengguna'] = Pengguna::get();

        return view('pengguna.index')->with($data);
    }

    public function create()
    {
        return view('pengguna.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'jk' => 'required',
            'foto' => 'required',
            'alamat' => 'required',
            'username' => 'required',
            'password' => 'required',
            'status' => 'required'
        ]);

        $foto = AppHelpers::uploadFile($request->foto,'images');

        $values['nama'] = $request->input('nama');
        $values['email'] = $request->input('email');
        $values['jk'] = $request->input('jk');
        $values['foto'] = $foto;
        $values['alamat'] = $request->input('alamat');
        $values['username'] = $request->input('username');
        $values['password'] = md5($request->input('password'));

        if (Pengguna::create($values)) {
            return redirect()
                ->route('pengguna.index')
                ->with('messageSuccess','Berhasil disimpan!');
        }

        return redirect()
            ->route('pengguna.index')
            ->with('messageError','Gagal disimpan!');
    }

    public function show($id)
    {
        $pengguna = Pengguna::findOrFail($id);

        $data['pengguna'] = $pengguna;
        return view('pengguna.show')->with($data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
            'username' => 'required',
            'status' => 'required'
        ]);

        if ($request->password) {
            $sets['password'] = md5($request->input('password'));
        }

        if ($request->foto) {
            $sets['foto'] = AppHelpers::uploadFile($request->foto,'images');
        }

        $sets['nama'] = $request->input('nama');
        $sets['email'] = $request->input('email');
        $sets['jk'] = $request->input('jk');
        $sets['alamat'] = $request->input('alamat');
        $sets['username'] = $request->input('username');
        $sets['status'] = $request->input('status');

        $where['id_pengguna'] = $id;

        if (Pengguna::where($where)->update($sets)) {
            return redirect()
                ->route('pengguna.index')
                ->with('messageSuccess','Berhasil diubah!');
        }

        return redirect()
            ->route('pengguna.index')
            ->with('messageError','Gagal diubah!');
    }

    public function destroy($id)
    {
        $pengguna = Pengguna::findOrFail($id);

        if ($pengguna->delete()) {
            return redirect()
                ->route('pengguna.index')
                ->with('messageSuccess','Berhasil dihapus!');
        }

        return redirect()
            ->route('pengguna.index')
            ->with('messageError','Gagal dihapus!');
    }
}
