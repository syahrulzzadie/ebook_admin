<?php use App\Helpers\AppHelpers; ?>

@include('template.header')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <span class="m-0 font-weight-bold text-primary">
            <i class="fa fa-plus mr-2"></i>Tambah Data
        </span>
        <a href="{{ route('books.index') }}" class="btn btn-sm btn-secondary float-right">
            <i class="fa fa-arrow-left mr-2"></i>Kembali
        </a>
    </div>
    <div class="card-body">
        <form action="{{ route('books.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Judul</label>
                <input type="text" name="judul" class="form-control" placeholder="Judul.." required>
            </div>
            <div class="form-group">
                <label>Sinopsis</label>
                <textarea name="sinopsis" class="form-control" placeholder="Sinopsis.." required></textarea>
            </div>
            <div class="form-group">
                <label>Kategori</label>
                <input type="text" name="kategori" class="form-control" placeholder="Kategori.." required>
            </div>
            <div class="form-group">
                <label>Pengguna</label>
                <select name="id_pengguna" class="form-control" required>
                    @foreach($data_pengguna as $pengguna)
                    <option value="{{ $pengguna->id_pengguna }}">{{ $pengguna->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Sampul</label>
                <input type="file" name="sampul" accept="image/*" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Publish</label>
                <select name="publish" class="form-control" required>
                    <option value="publish">Publish</option>
                    <option value="draft">Draft</option>
                </select>
            </div>
            <div class="form-group">
                <label>PDF</label>
                <input type="file" name="lokasi" accept="application/pdf" class="form-control" required>
            </div>
            <div class="form-group text-center mt-4">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-2"></i>Simpan Data</button>
            </div>
        </form>
    </div>
</div>

@include('template.footer')