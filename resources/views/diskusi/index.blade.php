<?php use App\Helpers\AppHelpers; ?>

@include('template.header')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <span class="m-0 font-weight-bold text-primary">
            <i class="fa fa-table mr-2"></i>Data Diskusi
        </span>
        <a href="{{ route('diskusi.create') }}" class="btn btn-sm btn-success float-right">
            <i class="fa fa-plus mr-2"></i>Tambah Data
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="datatable" class="table table-bordered table-sm w-100">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>Judul</th>
                        <th>Keterangan</th>
                        <th>Tanggal</th>
                        <th>Pengguna</th>
                        <th>Detail</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data_diskusi as $diskusi)
                    <tr>
                        <td>{{ $diskusi->judul }}</td>
                        <td>{{ Str::limit($diskusi->ket, 60) }}</td>
                        <td>{{ $diskusi->tanggal }}</td>
                        <td>{{ $diskusi->pengguna->nama }}</td>
                        <td>
                            <a class="btn btn-sm btn-secondary" href="{{ route('diskusi.detail', $diskusi->id_diskusi) }}">
                                <i class="fa fa-eye mr-2"></i>Detail
                            </a>
                        </td>
                        <td>{!! AppHelpers::buttonActions('diskusi', $diskusi->id_diskusi) !!}</td>
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