@extends('layouts.landing')

@section('title', $regulation->title)

@section('content')

    <section class="content container">
        <div class="row">
            <div class="col-12">
                {{-- Button Back --}}
                <div class="py-3">
                    <a href="{{ route('landing.public-participation') }}" class="btn btn-primary">
                        <i class="fas fa-arrow-left"></i>
                        Kembali
                    </a>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-12 col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h3 class="card-title mb-0">Detail Peraturan</h3>
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
            <div class="col-12 col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title mb-0">Lampiran</h3>
                    </div>

                    <div class="card-body">
                        {{-- Jika ada lampiran --}}
                        @if (count($regulation->attachments) > 0)
                            @foreach ($regulation->attachments as $attachment)
                                <a href="{{ Storage::url($attachment->path) }}" target="_blank" rel="noopener noreferrer"
                                    class="btn btn-app">
                                    <i class="fas fa-paperclip"></i>Unduh
                                    {{ $attachment->name }}
                                </a>
                                {{-- <a class="btn btn-app">
                                    <i class="fas fa-save"></i> Save
                                </a> --}}
                            @endforeach
                        @else
                            <p class="text-muted">Tidak ada lampiran</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title mb-0">Rekam Jejak</h3>
                    </div>
                    <div class="card-body">
                        @if (count($regulation->publicParticipations) > 0)
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
                                    @foreach ($regulation->publicParticipations as $participations)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $participations->name }}</td>
                                            <td>{{ $participations->age }}</td>
                                            <td>{{ $participations->gender == 1 ? 'Laki-laki' : 'Perempuan' }}</td>
                                            <td>{{ $participations->created_at->diffForHumans() }}</td>
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

            <div class="col-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title mb-0">Partisipasi</h3>
                    </div>

                    <div class="card-body">

                        <form action="{{ route('landing.public-participation.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="regulation_id" id="regulation_id" value="{{ $regulation->id }}">
                            <div class="form-group">
                                <label for="name">Nama Lengkap</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    data-has-listeners="true" fdprocessedid="a3llc7" value="{{ old('name') }}">
                            </div>
                            <div class="form-group">
                                <label for="inputEmail">E-Mail</label>
                                <input type="email" id="inputEmail" name="email" class="form-control"
                                    data-has-listeners="true" fdprocessedid="5vwafl" value="{{ old('email') }}">
                            </div>
                            <div class="form-group">
                                <label for="phone">Nomor Telepon</label>
                                <input type="number" id="phone" name="phone" class="form-control"
                                    data-has-listeners="true" fdprocessedid="5vwafl" value="{{ old('phone') }}">
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
                                <label for="content">Partisipasi</label>
                                <textarea id="content" name="content" class="form-control" rows="4" data-has-listeners="true"
                                    value="{{ old('content') }}">{{ old('content') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="attachment">Lampiran</label>
                                <input type="file" name="attachments[]" class="form-control" id="attachment">
                                <span class="text-muted text-sm">* Jika ada file yang ingin diupload</span>
                                @error('attachments')
                                    <br>
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- <div  --}}

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
