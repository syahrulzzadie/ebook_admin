<?php use App\Helpers\AppHelpers; ?>

@include('template.header')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <span class="m-0 font-weight-bold text-primary">
            <i class="fa fa-table mr-2"></i>Data Karya Tulis
        </span>
        <a href="{{ route('karya_tulis.create') }}" class="btn btn-sm btn-success float-right">
            <i class="fa fa-plus mr-2"></i>Tambah Data
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="datatable" class="table table-bordered table-sm w-100">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>Judul</th>
                        <th>Sinopsis</th>
                        <th>Tanggal</th>
                        <th>Kategori</th>
                        <th>Pengguna</th>
                        <th>Sampul</th>
                        <th>Publish</th>
                        <th>PDF</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data_karya_tulis as $karya_tulis)
                    <tr>
                        <td>{{ $karya_tulis->judul }}</td>
                        <td>{{ Str::limit($karya_tulis->sinopsis, 50) }}</td>
                        <td>{{ $karya_tulis->tanggal }}</td>
                        <td>{{ $karya_tulis->kategori }}</td>
                        <td>{{ $karya_tulis->pengguna->nama }}</td>
                        <td>{!! AppHelpers::image($karya_tulis->sampul, 120) !!}</td>
                        <td>{{ $karya_tulis->publish }}</td>
                        <td>{!! AppHelpers::btnDownload($karya_tulis->lokasi) !!}</td>
                        <td>{!! AppHelpers::buttonActions('karya_tulis', $karya_tulis->id_karya_tulis) !!}</td>
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