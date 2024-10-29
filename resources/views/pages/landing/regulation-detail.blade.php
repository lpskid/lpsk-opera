@extends('layouts.landing')

@section('title', $regulation->title)

@push('style')
    @include('style.datatable')
@endpush

@section('content')

    <section class="content container">
        <div class="row">
            <div class="col-12">
                {{-- Button Back --}}
                <div class="py-3">
                    <a href="{{ route('landing.evaluation') }}" class="btn btn-primary">
                        <i class="fas fa-arrow-left"></i>
                        Kembali
                    </a>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-12 col-md-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h3 class="card-title mb-0">
                            Detail Peraturan
                        </h3>
                    </div>

                    <div class="card-body">
                        <h4 class="fw-bold mb-4">
                            {{ $regulation->title }}
                        </h4>

                        <div class="mb-3">
                            <p class="fw-bold mb-1">Nomor</p>
                            <p class="text-muted">{{ $regulation->number }}</p>
                        </div>

                        <div class="mb-3">
                            <p class="fw-bold mb-1">Tanggal</p>
                            <p class="text-muted">{{ $regulation->date }}</p>
                        </div>


                        <div class="mb-3">
                            <p class="fw-bold mb-1">Lihat Peraturan</p>
                            <a href="{{ $regulation->jdih_link }}" target="_blank">{{ $regulation->jdih_link }}</a>
                        </div>

                        <div class="mb-3">
                            <p class="fw-bold mb-1">Progres</p>
                            <p class="badge bg-info text-dark">{{ strtoupper(str_replace('_', ' ', $regulation->status)) }}
                            </p>
                        </div>

                        <div class="mb-3">
                            <p class="fw-bold mb-1">Keterangan</p>
                            <p>{!! $regulation->information !!}</p>
                        </div>

                        <div class="mb-3">
                            <p class="fw-bold mb-1">Isi</p>
                            <p>{!! $regulation->content !!}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title mb-0">Rekam Jejak</h3>
                    </div>
                    <div class="card-body">
                        @if (count($regulation->evaluations) > 0)
                            <table class="table table-bordered" id="data-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Umur</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Dibuat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($regulation->evaluations as $evaluation)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $evaluation->name }}</td>
                                            <td>{{ $evaluation->age }}</td>
                                            <td>{{ $evaluation->gender == 1 ? 'Laki-laki' : 'Perempuan' }}</td>
                                            <td>{{ $evaluation->created_at->diffForHumans() }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p class="text-muted">Tidak ada rekam jejak</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection


@push('script')
    @include('scripts.datatable')

    <script>
        $(function() {
            let table = $("#data-table").DataTable({
                "paging": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });


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
