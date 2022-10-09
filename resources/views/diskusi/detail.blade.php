<?php use App\Helpers\AppHelpers; ?>

@include('template.header')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <span class="m-0 font-weight-bold text-primary">
            <i class="fa fa-table mr-2"></i>Detail Diskusi
        </span>
        <a href="{{ route('diskusi.index') }}" class="btn btn-sm btn-secondary float-right">
            <i class="fa fa-arrow-left mr-2"></i>Kembali
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="datatable" class="table table-bordered table-sm w-100">
                <thead class="bg-primary text-white">
                    <tr>
                        <th width="250">Pengguna</th>
                        <th>Isi</th>
                        <th width="80">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data_detail_diskusi as $diskusi)
                    <tr>
                        <td>{{ $diskusi->pengguna->nama }}</td>
                        <td>{{ Str::limit($diskusi->isi, 60) }}</td>
                        <td>{!! AppHelpers::buttonActions('diskusi-detail', $diskusi->id_detail_diskusi, false) !!}</td>
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