@extends('layouts.dashboard')

@section('title', 'Tambah Pengguna')

@push('style')
    @include('style.select2')
@endpush

@section('content')
    <div class="card">
        <div class="card-body">
            <form id="add-data-form" action="{{ route('peraturan.update', $regulation->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="number">Nomor</label>
                            <input type="text" name="number" class="form-control" id="number"
                                placeholder="Masukkan Nomor" value="{{ $regulation->number }}">
                            @error('number')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="title">Judul</label>
                            <input type="text" name="title" class="form-control" id="title"
                                placeholder="Masukkan Judul" value="{{ $regulation->title }}">
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="jdih_link">Link JDIH</label>
                            <input type="text" name="jdih_link" class="form-control" id="jdih_link"
                                placeholder="Masukkan Link JDIH" value="{{ $regulation->jdih_link }}">
                            @error('jdih_link')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="information">Keterangan</label>
                            <textarea name="information" id="information" class="form-control" cols="30" rows="10">{{ $regulation->information }}</textarea>
                            @error('information')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="content">Deskripsi</label>
                            <textarea name="content" id="content" class="form-control" cols="30" rows="10">{{ $regulation->content }}</textarea>
                            @error('content')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    {{-- File attachments --}}
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="attachment">Lampiran</label>
                            <input type="file" name="attachment[]" class="form-control" id="attachment">
                            <span class="text-muted text-sm">* Boleh lebih dari satu lampiran</span>
                            @error('attachment')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    {{-- Button back and submit --}}
                    <div class="col-md-12">
                        <div class="form-group">
                            <a href="{{ route('peraturan.index') }}" id="form-back-button"
                                class="btn btn-default">Kembali</a>
                            <button type="submit" id="form-submit-button" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('script')
    @include('scripts.select2')
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2').select2({
                theme: 'bootstrap4'
            })
        });
    </script>
@endpush
