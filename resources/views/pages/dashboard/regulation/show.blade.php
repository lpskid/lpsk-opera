@extends('layouts.dashboard')

@section('title', 'Detail Peraturan')

@push('style')
    @include('style.datatable')
@endpush

@section('content')
    <div class="card mb-4 shadow-sm">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-6">
                    <!-- Judul -->
                    <h5 class="fw-bold">{{ $regulation->title }}</h5>
                    <div class="d-flex align-items-center fw-bold">
                        <p class="mb-0">{{ $regulation->number }}</p>
                        <span class="mx-2">|</span>
                        <p class="mb-0">{{ $regulation->date }}</p>
                        <span class="mx-2">|</span>
                        <p class="mb-0 badge badge-success">{{ strtoupper($regulation->status) }}</p>
                    </div> 
                    
                    <div class="mt-2">
                        <h5 class="fw-bold">Link JDIH</h5>
                        <a href="{{ $regulation->jdih_link }}" target="_blank" rel="noopener noreferrer">
                            {{ $regulation->jdih_link }}
                        </a>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12">
                    <div class="content py-2">
                        <h5 class="fw-bold">Keterangan</h5>
                        <!-- Information -->
                        <p class="text-muted">{!! $regulation->information !!}</p>
                    </div>

                    <div class="content py-2">
                        <h5 class="fw-bold">Isi</h5>
                        <!-- Content -->
                        <p>{!! $regulation->content !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="card">
        <div class="card-body">
            <table class="table table-bordered" id="data-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
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
