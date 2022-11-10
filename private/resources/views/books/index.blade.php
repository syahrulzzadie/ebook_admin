<?php use App\Helpers\AppHelpers; ?>

@include('template.header')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <span class="m-0 font-weight-bold text-primary">
            <i class="fa fa-table mr-2"></i>Data Books
        </span>
        <a href="{{ route('books.create') }}" class="btn btn-sm btn-success float-right">
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
                    @foreach($data_books as $books)
                    <tr>
                        <td>{{ $books->judul }}</td>
                        <td>{{ Str::limit($books->sinopsis, 60) }}</td>
                        <td>{{ $books->tanggal }}</td>
                        <td>{{ $books->kategori }}</td>
                        <td>{{ $books->pengguna->nama }}</td>
                        <td>{!! AppHelpers::image($books->sampul, 150) !!}</td>
                        <td>{{ $books->publish }}</td>
                        <td>{!! AppHelpers::btnDownload($books->lokasi) !!}</td>
                        <td>{!! AppHelpers::buttonActions('books', $books->id_books) !!}</td>
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