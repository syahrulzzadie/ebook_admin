<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\AppHelpers;

use App\Models\Books;
use App\Models\Pengguna;

class BooksController extends Controller
{
    public function index()
    {
        $data['data_books'] = Books::get();

        return view('books.index')->with($data);
    }

    public function create()
    {
        $data['data_pengguna'] = Pengguna::get();

        return view('books.create')->with($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'sinopsis' => 'required',
            'sampul' => 'required',
            'publish' => 'required',
            'lokasi' => 'required',
            'kategori' => 'required',
            'id_pengguna' => 'required'
        ]);

        $fotoSampul = AppHelpers::imageName($request->sampul->extension(),1);
        $request->sampul->move(public_path('uploads/images'), $fotoSampul);

        $lokasiPdf = AppHelpers::imageName($request->lokasi->extension(),2);
        $request->lokasi->move(public_path('uploads/pdf'), $lokasiPdf);

        $id_pengguna = $request->input('id_pengguna');
        $pengguna = Pengguna::findOrFail($id_pengguna);

        $values['judul'] = $request->input('judul');
        $values['sinopsis'] = $request->input('sinopsis');
        $values['sampul'] = $fotoSampul;
        $values['publish'] = $request->input('publish');
        $values['lokasi'] = $lokasiPdf;
        $values['kategori'] = $request->input('kategori');
        $values['id_pengguna'] = $pengguna->id_pengguna;
        $values['nama'] = $pengguna->nama;
        $values['tanggal'] = AppHelpers::dateTimeNow();

        if (Books::create($values)) {
            return redirect()
                ->route('books.index')
                ->with('messageSuccess','Berhasil disimpan!');
        }

        return redirect()
            ->route('books.index')
            ->with('messageError','Gagal disimpan!');
    }

    public function show($id)
    {
        $books = Books::findOrFail($id);

        $data['books'] = $books;
        $data['data_pengguna'] = Pengguna::get();
        return view('books.show')->with($data);
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
            $fotoSampul = AppHelpers::imageName($request->sampul->extension(),1);
            $request->sampul->move(public_path('uploads/images'), $fotoSampul);
            $sets['sampul'] = $fotoSampul;
        }

        if ($request->lokasi) {
            $lokasiPdf = AppHelpers::imageName($request->lokasi->extension(),2);
            $request->lokasi->move(public_path('uploads/pdf'), $lokasiPdf);
            $sets['lokasi'] = $lokasiPdf;
        }

        $sets['judul'] = $request->input('judul');
        $sets['sinopsis'] = $request->input('sinopsis');
        $sets['kategori'] = $request->input('kategori');
        $sets['publish'] = $request->input('publish');

        $where['id_books'] = $id;

        if (Books::where($where)->update($sets)) {
            return redirect()
                ->route('books.index')
                ->with('messageSuccess','Berhasil diubah!');
        }

        return redirect()
            ->route('books.index')
            ->with('messageError','Gagal diubah!');
    }

    public function destroy($id)
    {
        $books = Books::findOrFail($id);

        if ($books->delete()) {
            return redirect()
                ->route('books.index')
                ->with('messageSuccess','Berhasil dihapus!');
        }

        return redirect()
            ->route('books.index')
            ->with('messageError','Gagal dihapus!');
    }
}
