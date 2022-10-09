<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\AppHelpers;

use App\Models\Event;
use App\Models\Pengguna;

class EventController extends Controller
{
    public function index()
    {
        $data['data_event'] = Event::get();
        
        return view('event.index')->with($data);
    }

    public function create()
    {
        $data['data_pengguna'] = Pengguna::get();
        return view('event.create')->with($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'ket' => 'required',
            'isi' => 'required',
            'img' => 'required',
            'id_pengguna' => 'required',
        ]);

        $img = AppHelpers::imageName($request->img->extension());
        $request->img->move(public_path('uploads/images'), $img);

        $values['judul'] = $request->input('judul');
        $values['ket'] = $request->input('ket');
        $values['isi'] = $request->input('isi');
        $values['img'] = $img;
        $values['id_pengguna'] = $request->input('id_pengguna');
        $values['tanggal'] = AppHelpers::dateTimeNow();

        if (Event::create($values)) {
            return redirect()
                ->route('event.index')
                ->with('messageSuccess','Berhasil disimpan!');
        }

        return redirect()
            ->route('event.index')
            ->with('messageError','Gagal disimpan!');
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);

        $data['event'] = $event;
        $data['data_pengguna'] = Pengguna::get();
        return view('event.show')->with($data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'ket' => 'required',
            'isi' => 'required',
            'img' => 'required'
        ]);

        if ($request->img) {
            $img = AppHelpers::imageName($request->img->extension());
            $request->img->move(public_path('uploads/images'), $img);
            $sets['img'] = $img;
        }

        $sets['judul'] = $request->input('judul');
        $sets['ket'] = $request->input('ket');
        $sets['isi'] = $request->input('isi');

        $where['id_event'] = $id;

        if (Event::where($where)->update($sets)) {
            return redirect()
                ->route('event.index')
                ->with('messageSuccess','Berhasil diubah!');
        }

        return redirect()
            ->route('event.index')
            ->with('messageError','Gagal diubah!');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);

        if ($event->delete()) {
            return redirect()
                ->route('event.index')
                ->with('messageSuccess','Berhasil dihapus!');
        }

        return redirect()
            ->route('event.index')
            ->with('messageError','Gagal dihapus!');
    }
}
