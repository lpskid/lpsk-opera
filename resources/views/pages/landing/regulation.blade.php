@extends('layouts.landing')

@section('title', 'Evaluasi')

@push('style')
    @include('style.datatable')
@endpush

@section('content')
    <section class="content container">
        <div class="row">
            <div class="col-12">
                {{-- Button Back --}}
                <div class="py-3">
                    <a href="{{ route('landing.index') }}" class="btn btn-primary">
                        <i class="fas fa-arrow-left"></i>
                        Kembali
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title mb-0">Data Peraturan</h3>
                    </div>
                    <div class="card-body">
                        @if (count($regulations) > 0)
                            <table class="table table-bordered" id="data-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Tanggal</th>
                                        <th>Dibuat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($regulations as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <a href="{{ route('landing.front-peraturan.detail', $data->slug) }}">
                                                    {{ $data->title }}
                                                </a>
                                            </td>
                                            <td>{{ $data->date }}</td>

                                            <td>{{ $data->created_at->diffForHumans() }}</td>
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
        });
    </script>
@endpush
