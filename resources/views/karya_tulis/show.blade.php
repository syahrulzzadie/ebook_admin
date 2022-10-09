<?php use App\Helpers\AppHelpers; ?>

@include('template.header')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <span class="m-0 font-weight-bold text-primary">
            <i class="fa fa-plus mr-2"></i>Edit Data
        </span>
        <a href="{{ route('karya_tulis.index') }}" class="btn btn-sm btn-secondary float-right">
            <i class="fa fa-arrow-left mr-2"></i>Kembali
        </a>
    </div>
    <div class="card-body">
        <form action="{{ route('karya_tulis.update', $karya_tulis->id_karya_tulis) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label>Judul</label>
                <input type="text" name="judul" class="form-control" placeholder="Judul.." value="{{ $karya_tulis->judul }}" required>
            </div>
            <div class="form-group">
                <label>Sinopsis</label>
                <textarea name="sinopsis" class="form-control" placeholder="Sinopsis.." required>{{ $karya_tulis->sinopsis }}</textarea>
            </div>
            <div class="form-group">
                <label>Kategori</label>
                <input type="text" name="kategori" class="form-control" placeholder="Kategori.." value="{{ $karya_tulis->kategori }}" required>
            </div>
            <div class="form-group">
                <label>Isi</label>
                <textarea name="isi" class="form-control" placeholder="Isi.." required>{{ $karya_tulis->isi }}</textarea>
            </div>
            <div class="form-group">
                <label>Pengguna</label>
                <select id="id_pengguna" name="id_pengguna" class="form-control" required>
                    @foreach($data_pengguna as $pengguna)
                    <option value="{{ $pengguna->id_pengguna }}">{{ $pengguna->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Sampul <small>(Kosongkan jika tidak di ubah)</small></label>
                <input type="file" name="sampul" accept="image/*" class="form-control">
            </div>
            <div class="form-group">
                <label>Publish</label>
                <select id="publish" name="publish" class="form-control" required>
                    <option value="publish">Publish</option>
                    <option value="draft">Draft</option>
                </select>
            </div>
            <div class="form-group text-center mt-4">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-2"></i>Simpan Data</button>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    $("#id_pengguna").val('{{ $karya_tulis->id_pengguna }}');
    $("#publish").val('{{ $karya_tulis->publish }}');
});
</script>

@include('template.footer')