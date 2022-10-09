<?php use App\Helpers\AppHelpers; ?>

@include('template.header')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <span class="m-0 font-weight-bold text-primary">
            <i class="fa fa-plus mr-2"></i>Edit Data
        </span>
        <a href="{{ route('perpus.index') }}" class="btn btn-sm btn-secondary float-right">
            <i class="fa fa-arrow-left mr-2"></i>Kembali
        </a>
    </div>
    <div class="card-body">
        <form action="{{ route('perpus.update', $perpus->id_perpus) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" placeholder="Nama.." value="{{ $perpus->nama }}" required>
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control" placeholder="Alamat.." value="{{ $perpus->alamat }}" required>
            </div>
            <div class="form-group">
                <label>Link</label>
                <input type="text" name="link" class="form-control" placeholder="Link.." value="{{ $perpus->link }}" required>
            </div>
            <div class="form-group">
                <label>Gambar <small>(Kosongkan jika tidak di ubah)</small></label>
                <input type="file" name="gambar" accept="image/*" class="form-control">
            </div>
            <div class="form-group text-center mt-4">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-2"></i>Simpan Data</button>
            </div>
        </form>
    </div>
</div>

@include('template.footer')