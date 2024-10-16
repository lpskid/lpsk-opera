@extends('layouts.dashboard')

@section('title', 'Peraturan')

@push('style')
    @include('style.datatable')
@endpush

@section('content')

    <div class="content-header">
        <div class="d-flex justify-content-between">
            <h5>Data</h5>
            {{-- button add with modal --}}
            <a href="{{ route('peraturan.create') }}"
                class="btn d-sm-block d-md-block d-lg-block d-xl-block d-none btn-primary mb-2">
                Tambah Peraturan
            </a>
        </div>
        <a href="#" class="btn d-md-none d-lg-none d-xl-none d-block btn-primary mb-2">
            Tambah Peraturan
        </a>
    </div>


    <div class="card">
        <div class="card-body">
            <table class="table table-bordered" id="data-table">
                <thead>
                    <tr>
                        <th></th>
                        <th>Nomor Peraturan</th>
                        <th>Judul</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($regulations as $regulation)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $regulation->number }}</td>
                            <td>{{ $regulation->title }}</td>
                            <th>{{ $regulation->date }}</th>
                            <th>{{ strtoupper(str_replace('_', ' ', $regulation->status)) }}</th>
                            <td>
                                @if ($regulation->status != 'analisa_evaluasi')
                                    {{-- Button Modal Update Status --}}
                                    <form action="{{ route('peraturan.update-status', $regulation->id) }}" method="post"
                                        class="delete-form d-inline">
                                        @csrf
                                        @method('PUT')
                                        <button type="button" class="btn btn-success btn-update-data">Update
                                            Status</button>
                                    </form>
                                @endif

                                <a href="{{ route('peraturan.show', $regulation->id) }}"
                                    class="btn btn-primary btn">Detail</a>
                                <a href="{{ route('peraturan.edit', $regulation->id) }}"
                                    class="btn btn-primary btn">Edit</a>
                                <form action="{{ route('peraturan.destroy', $regulation->id) }}" method="post"
                                    class="delete-form d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="button" class="btn btn-danger btn-delete-data">Hapus</button>
                                </form>
                            </td>
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


            $('.btn-delete-data').on('click', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Data yang dihapus tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(this).closest('form').submit();
                    }
                })
            })

            $('.btn-update-data').on('click', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Status peraturan yang diubah tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(this).closest('form').submit();
                    }
                })
            })
        });
    </script>
@endpush
