<?php use App\Helpers\AppHelpers; ?>

@include('template.header')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <span class="m-0 font-weight-bold text-primary">
            <i class="fa fa-plus mr-2"></i>Tambah Data
        </span>
        <a href="{{ route('saran.index') }}" class="btn btn-sm btn-secondary float-right">
            <i class="fa fa-arrow-left mr-2"></i>Kembali
        </a>
    </div>
    <div class="card-body">
        <form action="{{ route('saran.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Isi</label>
                <input type="text" name="isi" class="form-control" placeholder="Isi.." required>
            </div>
            <div class="form-group">
                <label>Pengguna</label>
                <select name="id_pengguna" class="form-control" required>
                    @foreach($data_pengguna as $pengguna)
                    <option value="{{ $pengguna->id_pengguna }}">{{ $pengguna->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group text-center mt-4">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-2"></i>Simpan Data</button>
            </div>
        </form>
    </div>
</div>

@include('template.footer')