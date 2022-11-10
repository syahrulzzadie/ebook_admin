<?php use App\Helpers\AppHelpers; ?>

@include('template.header')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <span class="m-0 font-weight-bold text-primary">
            <i class="fa fa-table mr-2"></i>Data Saran
        </span>
        <a href="{{ route('saran.create') }}" class="btn btn-sm btn-success float-right">
            <i class="fa fa-plus mr-2"></i>Tambah Data
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="datatable" class="table table-bordered table-sm w-100">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>Isi</th>
                        <th>Pengguna</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data_saran as $saran)
                    <tr>
                        <td>{{ Str::limit($saran->isi, 60) }}</td>
                        <td>{{ $saran->pengguna->nama }}</td>
                        <td>{!! AppHelpers::buttonActions('saran', $saran->id_saran) !!}</td>
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