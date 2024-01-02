@extends('Layouts.main')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4><i class="fas fa-ticket-alt"></i> {{ $title }}</h4>
        </div>

        <div class="card-body col-md-10">
            <a href="http://" class="btn btn-sm btn-primary mb-4"><i class="fas fa-folder-plus"></i> Tambah Data</a>
            <table id="myTable" class="table table-hover">
                <thead>
                    <th>No</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </thead>

            </table>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ url('getTiket') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: 'kategori',
                        name: 'kategori'
                    },
                    {
                        data: 'harga',
                        name: 'harga'
                    },
                    {
                        data: 'aksi',
                        name: 'Aksi'
                    }
                ]
            })
        })
    </script>
@endpush
