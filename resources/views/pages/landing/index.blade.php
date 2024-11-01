@extends('layouts.landing')

@section('title', 'Beranda')

@section('content')
    <!-- Main content -->
    <header class="d-flex align-items-center justify-content-center"
        style="background-image: url('{{ asset('images/bg-landing-lpsk.jpg') }}'); background-size: cover; background-position: center; height: 500px;">
        <div class="container text-center text-white">
            <div class="row justify-content-center">
                <div class="col-xl-6">
                    <h1 class="mb-5">Opini Penyusunan Peraturan di Lingkungan LPSK </h1>
                    <!-- Signup form-->
                    {{-- <form class="form-subscribe" id="contactForm">
                        <div class="row">
                            <div class="col">
                                <input class="form-control form-control-lg" id="emailAddress" type="email"
                                    placeholder="Cari peraturan di sini" required>
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-primary btn-lg" id="submitButton" type="submit">Cari</button>
                            </div>
                        </div>
                    </form> --}}
                    <!-- Additional content -->
                    <p class="mt-3">
                        Sistem ini merupakan sistem yang dapat menggambarkan proses setiap pembentukan peraturan di
                        lingkungan LPSK, serta menjadi pojok pemantauan, evaluasi dan partisipasi publik dalam penyusunan
                        peraturan di lingkungan LPSK
                    </p>
                </div>
            </div>
        </div>
    </header>

    <section class="content container mt-5">
        <h2 class="display-5 text-center pb-4">Apa Itu Opera?</h2>
        <div class="row align-items-center">
            <div class="col-lg-8 text-justify">
                <p>
                    Sistem ini merupakan sistem yang dapat menggambarkan proses setiap pembentukan peraturan di lingkungan
                    LPSK,
                    serta menjadi pojok pemantauan, evaluasi, dan partisipasi publik dalam penyusunan peraturan di
                    lingkungan LPSK, yaitu:
                </p>
                <ol>
                    <li>
                        <strong>Pemantauan</strong> dalam proses penyusunan peraturan di lingkungan LPSK digambarkan dalam
                        bentuk
                        proses tahapan yang sedang dilalui untuk setiap pembentuan peraturan di lingkungan LPSK.
                    </li>
                    <li>
                        <strong>Evaluasi</strong> dilakukan melalui pemberian ruang bagi masyarakat untuk memberikan
                        analisis dan
                        evaluasi terhadap peraturan di lingkungan LPSK yang telah ditetapkan atau terkait analisis kebutuhan
                        pengaturan yang harus disusun oleh LPSK.
                    </li>
                    <li>
                        <strong>Partisipasi publik</strong> dilakukan dengan memberikan informasi rancangan yang sedang
                        disusun
                        oleh LPSK serta memberikan ruang bagi masyarakat untuk memberikan masukan terhadap rancangan
                        peraturan
                        tersebut agar menghasilkan regulasi yang berkualitas serta sesuai dengan kebutuhan hukum masyarakat.
                    </li>
                </ol>
            </div>

            <!-- Gambar Section (Disembunyikan di Mobile) -->
            <div class="col-lg-4 d-none d-lg-flex align-items-center justify-content-center">
                <img src="{{ asset('images/logo.png') }}" alt="Tentang Opera" class="img-fluid rounded">
            </div>
        </div>
    </section>


    <section class="content container mt-5">
        <h2 class="display-5 text-center my-5">Alur Proses</h2>
        {{-- image --}}
        <div class="d-flex justify-content-center">
            <img src="{{ asset('images/alur.jpg') }}" alt="Alur Proses Peraturan" class="img-fluid">
        </div>
    </section>

    <section class="content container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card rounded-lg mb-2 bg-gradient-dark">
                    <img class="card-img-top" style="object-fit: cover; width: 100%; height: 200px"
                        src="{{ asset('images/landing/bg-landing-hukum-8.jpg') }}" alt="Dist Photo 1">
                    <div class="card-img-overlay d-flex flex-column justify-content-end">
                        <h5 class="card-title text-primary text-white">Daftar Peraturan yang Telah Ditetapkan</h5>
                        <p class="card-text text-white pb-2 pt-1">
                            <a href="{{ route('landing.public-participation') }}" class="btn btn-primary my-2">Lihat Semua</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="container my-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="display-5">Daftar Peraturan yang Telah Ditetapkan</h2>
                <a href="{{ route('landing.evaluation') }}" class="btn btn-outline-primary">Lihat Semua</a>
            </div>
        </div>

        <div class="row">
            @forelse ($fix_regulations as $index => $regulation)
                <div class="col-lg-3 col-md-6 mb-4">
                    <a href="{{ route('landing.front-peraturan.detail', $regulation->slug) }}">

                        <div class="card text-white position-relative"
                            style="background-image: url('{{ $backgroundImagesTwo[$index] }}'); background-size: cover; background-position: center; height: 200px;">
                            <!-- Overlay effect -->
                            <div class="overlay position-absolute w-100 h-100"
                                style="background-color: rgba(0, 0, 0, 0.2); top: 0; left: 0;"></div>
                            <div class="card-body d-flex align-items-center justify-content-center position-relative">
                                <h5 class="card-title text-center">{{ Str::limit($regulation->title, 30) }}</h5>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <p>Tidak ada peraturan terbaru.</p>
            @endforelse
        </div> --}}
    </section>

    <section class="content container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card rounded-lg mb-2 bg-gradient-dark">
                    <img class="card-img-top" style="object-fit: cover; width: 100%; height: 200px"
                        src="{{ asset('images/landing/bg-landing-hukum-2.jpg') }}" alt="Dist Photo 1">
                    <div class="card-img-overlay d-flex flex-column justify-content-end">
                        <h5 class="card-title text-primary text-white">Rancangan Peraturan Terbaru</h5>
                        <p class="card-text text-white pb-2 pt-1">
                            <a href="{{ route('landing.evaluation') }}" class="btn btn-primary my-2">Lihat Semua</a>
                        </p>
                    </div>
                </div>
            </div>
            {{-- <div class="container my-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="display-5">Rancangan Peraturan Terbaru</h2>
                <a href="{{ route('landing.public-participation') }}" class="btn btn-outline-primary">Lihat Semua</a>
            </div>

            <div class="row">
                @forelse ($newest_regulations as $index => $regulation)
                    <div class="col-lg-3 col-md-6 mb-4">
                        <a href="{{ route('landing.front-peraturan.detail', $regulation->slug) }}">
                            <div class="card text-white position-relative"
                                style="background-image: url('{{ $backgroundImages[$index] }}'); background-size: cover; background-position: center; height: 200px;">
                                <!-- Overlay effect -->
                                <div class="overlay position-absolute w-100 h-100"
                                    style="background-color: rgba(0, 0, 0, 0.2); top: 0; left: 0;"></div>
                                <div class="card-body d-flex align-items-center justify-content-center position-relative">
                                    <h5 class="card-title text-center">{{ Str::limit($regulation->title, 30) }}</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <p>Tidak ada peraturan terbaru.</p>
                @endforelse
            </div> --}}
        </div>



        {{-- <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="{{ asset('images/background-header.jpg') }}"
                        alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="https://placehold.it/900x500/3c8dbc/ffffff&text=I+Love+Bootstrap"
                        alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="https://placehold.it/900x500/f39c12/ffffff&text=I+Love+Bootstrap"
                        alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-custom-icon" aria-hidden="true">
                    <i class="fas fa-chevron-left"></i>
                </span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-custom-icon" aria-hidden="true">
                    <i class="fas fa-chevron-right"></i>
                </span>
                <span class="sr-only">Next</span>
            </a>
        </div> --}}
    </section>

    <section class="content container mt-5">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Statistik Partisipasi Masyarakat</h3>

                        {{-- <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div> --}}
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="barChart"
                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Data Peraturan</h3>

                        {{-- <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div> --}}
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="regulationChart"
                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </section>

    {{-- <section class="content container">
        <div class="py-5">
            <h2 class="text-center display-5">Cari Peraturan</h2>
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <form action="{{ route('landing.index') }}" method="GET"> <!-- Update with your route name -->
                        <div class="input-group">
                            <input type="search" name="search" class="form-control form-control-lg"
                                placeholder="Type your keywords here" value="{{ request()->input('search') }}">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-lg btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Display Search Results -->
            @if ($regulations->isNotEmpty())
                <div class="mt-4">
                    <h3>Hasil Pencarian:</h3>
                    <ul class="list-group">
                        @foreach ($regulations as $regulation)
                            <li class="list-group-item">
                                <h5>{{ $regulation->title }}</h5>
                                <p>{{ Str::limit($regulation->content, 100) }}</p> <!-- Display a snippet of content -->
                                <a href="{{ route('peraturan.show', $regulation->id) }}" class="btn btn-info">Lihat
                                    Detail</a> <!-- Link to regulation detail -->
                            </li>
                        @endforeach
                    </ul>
                </div>
            @else
                @if (request()->input('search'))
                    <div class="mt-4">
                        <p>Tidak ada hasil yang ditemukan untuk "<strong>{{ request()->input('search') }}</strong>".</p>
                    </div>
                @endif
            @endif
        </div>
    </section> --}}
@endsection

@push('script')
    <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
    <script>
        // Data for the bar chart
        var barChartData = {
            labels: ['Partisipasi Publik', 'Analisis Evaluasi'], // Label untuk tiap data
            datasets: [{
                    label: 'Partisipasi Publik',
                    backgroundColor: '#28a745', // Warna untuk Public Participation
                    data: [{{ $participant_public }}, 0] // Data Public Participation
                },
                {
                    label: 'Analisis Evaluasi',
                    backgroundColor: '#17a2b8', // Warna untuk Evaluation
                    data: [0, {{ $participant_evaluation }}] // Data Evaluation
                }
            ]
        };

        var barChartCanvas = $('#barChart').get(0).getContext('2d');
        var barChartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            datasetFill: false
        };

        // Membuat bar chart
        new Chart(barChartCanvas, {
            type: 'bar',
            data: barChartData,
            options: barChartOptions
        });

        // Data for the bar chart
        var regulationChartData = {
            labels: ['Rancangan', 'Penetapan'], // Label untuk tiap data
            datasets: [{
                    label: 'Rancangan',
                    backgroundColor: '#28a745', // Warna untuk Public Participation
                    data: [{{ $new_regulations }}, 0] // Data Public Participation
                },
                {
                    label: 'Penetapan',
                    backgroundColor: '#17a2b8', // Warna untuk Evaluation
                    data: [0, {{ $fixed_regulations }}] // Data Evaluation
                }
            ]
        };

        var regulationChartCanvas = $('#regulationChart').get(0).getContext('2d');
        var regulationChartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            datasetFill: false
        };

        // Membuat bar chart
        new Chart(regulationChartCanvas, {
            type: 'bar',
            data: regulationChartData,
            options: regulationChartOptions
        });
    </script>
@endpush
