@extends('layouts.landing')

@section('title', 'Beranda')

@section('content')
    <!-- Main content -->
    <section class="content container">
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
    </section>
@endsection
