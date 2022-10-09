<?php use App\Helpers\AppHelpers; ?>

@include('template.header')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <span class="m-0 font-weight-bold text-primary">
            <i class="fa fa-table mr-2"></i>Data Event
        </span>
        <a href="{{ route('event.create') }}" class="btn btn-sm btn-success float-right">
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
                        <th>Isi</th>
                        <th>Tanggal</th>
                        <th>Pengguna</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data_event as $event)
                    <tr>
                        <td>{{ $event->judul }}</td>
                        <td>{{ Str::limit($event->ket, 60) }}</td>
                        <td>{{ Str::limit($event->isi, 60) }}</td>
                        <td>{{ $event->tanggal }}</td>
                        <td>{{ $event->pengguna->nama }}</td>
                        <td>{!! AppHelpers::buttonActions('event', $event->id_event) !!}</td>
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