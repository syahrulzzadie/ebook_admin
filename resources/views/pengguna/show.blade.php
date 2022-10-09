<?php use App\Helpers\AppHelpers; ?>

@include('template.header')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <span class="m-0 font-weight-bold text-primary">
            <i class="fa fa-plus mr-2"></i>Edit Data
        </span>
        <a href="{{ route('pengguna.index') }}" class="btn btn-sm btn-secondary float-right">
            <i class="fa fa-arrow-left mr-2"></i>Kembali
        </a>
    </div>
    <div class="card-body">
        <form action="{{ route('pengguna.update', $pengguna->id_pengguna) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" placeholder="Username.." value="{{ $pengguna->username }}" required>
            </div>
            <div class="form-group">
                <label>Password <small>(Kosongkan jika tidak diubah)</small></label>
                <input type="text" name="password" class="form-control" placeholder="Password Baru..">
            </div>
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" placeholder="Nama.." value="{{ $pengguna->nama }}" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Email.." value="{{ $pengguna->email }}" required>
            </div>
            <div class="form-group">
                <label>Jenis Kelamin</label>
                <select id="jk" name="jk" class="form-control" required>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label>Foto <small>(Kosongkan jika tidak di ubah)</small></label>
                <input type="file" name="foto" accept="image/*" class="form-control">
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control" placeholder="Alamat.." value="{{ $pengguna->alamat }}" required>
            </div>
            <div class="form-group">
                <label>Status</label>
                <select id="status" name="status" class="form-control" required>
                    <option value="0">Tidak</option>
                    <option value="1">Ya</option>
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
    $("#jk").val('{{ strtoupper(substr($pengguna->jk, 0, 1)) }}');
    $("#status").val('{{ $pengguna->status }}');
});
</script>

@include('template.footer')