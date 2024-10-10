@extends('layouts.landing')

@section('title', 'Evaluasi')

@section('content')
    <div class="card">
        <div class="card-body row">
            <div class="col-5 text-center d-flex align-items-center justify-content-center">
                <div class="">
                    <h2>Admin<strong>LTE</strong></h2>
                    <p class="lead mb-5">123 Testing Ave, Testtown, 9876 NA<br>
                        Phone: +1 234 56789012
                    </p>
                </div>
            </div>
            <div class="col-7">
                <div class="form-group">
                    <label for="inputName">Nama Lengkap</label>
                    <input type="text" id="inputName" class="form-control" data-has-listeners="true"
                        fdprocessedid="a3llc7">
                </div>
                <div class="form-group">
                    <label for="inputEmail">E-Mail</label>
                    <input type="email" id="inputEmail" class="form-control" data-has-listeners="true"
                        fdprocessedid="5vwafl">
                </div>
                <div class="form-group">
                    <label for="status">Status Pekerjaan</label>
                    <select id="status" class="form-control" data-has-listeners="true">
                        <option value="1">Bekerja</option>
                        <option value="2">Kuliah</option>
                        <option value="3">Tidak Bekerja</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="age">Umur</label>
                    <input type="number" id="age" class="form-control" data-has-listeners="true" />
                </div>
                <div class="form-group">
                    {{-- Gender --}}
                    <label for="gender">Jenis Kelamin</label>
                    <select id="gender" class="form-control" data-has-listeners="true">
                        <option value="1">Laki-laki</option>
                        <option value="2">Perempuan</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="inputMessage">Evaluasi</label>
                    <textarea id="inputMessage" class="form-control" rows="4" data-has-listeners="true"></textarea>
                </div>

                <img src="{{ captcha_src() }}" alt="captcha">
                <div class="form-group">
                    <label for="inputMessage">Captcha</label>
                    <input type="text" id="captcha" name="captcha" class="form-control" data-has-listeners="true">
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Send message" data-has-listeners="true"
                        fdprocessedid="tfescn">
                </div>

            </div>
        </div>
    </div>
@endsection
