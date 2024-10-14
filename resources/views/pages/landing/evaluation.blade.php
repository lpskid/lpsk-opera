@extends('layouts.landing')

@section('title', 'Evaluasi')

@section('content')
    <div class="card">
        <div class="card-body row">
            <div class="col-5 text-center d-flex align-items-center justify-content-center">
                <div class="">
                    <h2>Opera <strong>LPSK</strong></h2>
                    <p class="lead mb-5">Jl. Raya Bogor KM.24 No.47-49, <br> RT.6/RW.1, Susukan, Kec. Ciracas, <br>Kota
                        Jakarta Timur, <br>
                        Daerah Khusus Ibukota Jakarta <br> 13750
                    </p>
                </div>
            </div>
            <div class="col-7">
                {{-- Show error message if there is any --}}
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif
                <form action="{{ route('landing.evaluation.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" name="name" id="name" class="form-control" data-has-listeners="true"
                            fdprocessedid="a3llc7" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">E-Mail</label>
                        <input type="email" id="inputEmail" name="email" class="form-control" data-has-listeners="true"
                            fdprocessedid="5vwafl" value="{{ old('email') }}">
                    </div>
                    <div class="form-group">
                        <label for="phone">Nomor Telepon</label>
                        <input type="number" id="phone" name="phone" class="form-control" data-has-listeners="true"
                            fdprocessedid="5vwafl" value="{{ old('phone') }}">
                    </div>
                    <div class="form-group">
                        <label for="status">Status Pekerjaan</label>
                        <select id="status" name="status" class="form-control" data-has-listeners="true">
                            <option value="1">Bekerja</option>
                            <option value="2">Kuliah</option>
                            <option value="3">Tidak Bekerja</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="age">Umur</label>
                        <input type="number" id="age" name="age" class="form-control"
                            data-has-listeners="true" value="{{ old('age') }}" />
                    </div>
                    <div class="form-group">
                        {{-- Gender --}}
                        <label for="gender">Jenis Kelamin</label>
                        <select id="gender" name="gender" class="form-control" data-has-listeners="true">
                            <option value="1">Laki-laki</option>
                            <option value="2">Perempuan</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="regulation_id">Peraturan</label>
                        <select id="regulation_id" name="regulation_id" class="form-control" data-has-listeners="true">
                            @foreach ($regulations as $regulation)
                                <option value="{{ $regulation->id }}">{{ $regulation->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="content">Evaluasi</label>
                        <textarea id="content" name="content" class="form-control" rows="4" data-has-listeners="true" value="{{ old('content') }}"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="captcha">Captcha</label>
                        <br>
                        <img src="{{ captcha_src() }}" alt="captcha" id="captcha-img">
                        <br>
                        <input type="text" id="captcha" name="captcha" class="form-control">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
