<?php use App\Helpers\AppHelpers; ?>

@include('template.header')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <span class="m-0 font-weight-bold text-primary">
            <i class="fa fa-table mr-2"></i>Data Perpus
        </span>
        <a href="{{ route('perpus.create') }}" class="btn btn-sm btn-success float-right">
            <i class="fa fa-plus mr-2"></i>Tambah Data
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="datatable" class="table table-bordered table-sm w-100">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Link</th>
                        <th>Gambar</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data_perpus as $perpus)
                    <tr>
                        <td>{{ $perpus->nama }}</td>
                        <td>{{ Str::limit($perpus->alamat, 60) }}</td>
                        <td>{{ Str::limit($perpus->link, 60) }}</td>
                        <td>{!! AppHelpers::image($perpus->gambar, 150) !!}</td>
                        <td>{!! AppHelpers::buttonActions('perpus', $perpus->id_perpus) !!}</td>
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