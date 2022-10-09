<?php use App\Helpers\AppHelpers; ?>

@include('template.header')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <span class="m-0 font-weight-bold text-primary">
            <i class="fa fa-table mr-2"></i>Data Pengguna
        </span>
        <a href="{{ route('pengguna.create') }}" class="btn btn-sm btn-success float-right">
            <i class="fa fa-plus mr-2"></i>Tambah Data
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="datatable" class="table table-bordered table-sm w-100">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Jenis Kelamin</th>
                        <th>Foto</th>
                        <th>Alamat</th>
                        <th>Username</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data_pengguna as $pengguna)
                    <tr>
                        <td>{{ $pengguna->nama }}</td>
                        <td>{{ $pengguna->email }}</td>
                        <td>{{ $pengguna->jk }}</td>
                        <td>{!! AppHelpers::image($pengguna->foto, 150) !!}</td>
                        <td>{{ Str::limit($pengguna->alamat, 60) }}</td>
                        <td>{{ $pengguna->username }}</td>
                        <td>{{ $pengguna->status }}</td>
                        <td>{!! AppHelpers::buttonActions('pengguna', $pengguna->id_pengguna) !!}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
    function deleteData(form) {
        if (confirm('Apakah anda yakin?')) {
            $(form).submit();
        }
    }
    $(document).ready(function() {
        $('#datatable').DataTable();
    });
</script>

@include('template.footer')