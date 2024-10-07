@extends('layouts.dashboard')

@section('title', 'Pengguna')

@push('style')
    @include('style.datatable')
@endpush

@section('content')

    <div class="content-header">
        <div class="d-flex justify-content-between">
            <h4>Data Pengguna</h4>
            {{-- button add with modal --}}
            <a href="{{ route('users.create') }}"
                class="btn d-sm-block d-md-block d-lg-block d-xl-block d-none btn-primary mb-2">
                Tambah Pengguna
            </a>
        </div>
        <a href="#" class="btn d-md-none d-lg-none d-xl-none d-block btn-primary mb-2">
            Tambah Pengguna
        </a>
    </div>


    <div class="card">
        <div class="card-body">
            <table class="table table-bordered" id="data-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                    @endforeach
            </table>
        </div>
    </div>
@endsection


@push('script')
    @include('scripts.datatable')

    <script>
        $(function() {
            let table = $("#data-table").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": true,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
            }).buttons().container().appendTo('#data-table_wrapper .col-md-6:eq(0)');
        });
    </script>
@endpush
