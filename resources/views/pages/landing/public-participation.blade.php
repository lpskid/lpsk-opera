@extends('layouts.landing')

@section('title', 'Partisipasi Publik')

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

        <div class="row my-3">
            <div class="col-12">
                <h3>
                    Partisipasi Publik
                </h3>
            </div>

            <div class="col-12">
                <canvas id="topParticipationChart" height="200"></canvas>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        {{-- Table --}}
                        <table class="table table-bordered" id="data-table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Judul</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($regulations as $regulation)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><a href="{{ route('landing.public-participation.detail', $regulation->slug) }}" >
                                                {{ $regulation->title }}</a></td>
                                        <th>{{ $regulation->date }}</th>
                                        <th>{{ strtoupper(str_replace('_', ' ', $regulation->status)) }}</th>
                                    </tr>
                                @endforeach
                        </table>
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

    <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
<script>
    var topParticipationLabels = {!! json_encode($regulations->pluck('title')) !!};
    var topParticipationData = {!! json_encode($regulations->pluck('public_participations_count')) !!};

    var topParticipationChartCanvas = $('#topParticipationChart').get(0).getContext('2d');

    var pieColors = [
        '#007bff', '#28a745', '#dc3545', '#ffc107', '#17a2b8',
        '#6c757d', '#6610f2', '#e83e8c', '#fd7e14', '#20c997'
    ];

    var topParticipationChartData = {
        labels: topParticipationLabels,
        datasets: [{
            data: topParticipationData,
            backgroundColor: pieColors,
        }]
    };

    var topParticipationChartOptions = {
        maintainAspectRatio: false,
        responsive: true,
        plugins: {
            tooltip: {
                callbacks: {
                    label: function(context) {
                        let label = context.label || '';
                        let value = context.parsed || 0;
                        return `${label}: ${value} partisipasi`;
                    }
                }
            },
            legend: {
                position: 'bottom'
            }
        }
    };

    new Chart(topParticipationChartCanvas, {
        type: 'pie',
        data: topParticipationChartData,
        options: topParticipationChartOptions
    });
</script>

@endpush