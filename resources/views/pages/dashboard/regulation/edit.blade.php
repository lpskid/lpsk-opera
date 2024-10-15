@extends('layouts.dashboard')

@section('title', 'Tambah Pengguna')

@push('style')
    @include('style.select2')
@endpush

@section('content')
    <div class="card">
        <div class="card-body">
            <form id="edit-data-form" action="{{ route('peraturan.update', $regulation->id) }}" method="POST">
                @csrf
                @method('PUT') <!-- Add this line for PUT method -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="title">Judul</label>
                            <input type="text" name="title" class="form-control" id="title"
                                placeholder="Masukkan Judul" value="{{ old('title', $regulation->title) }}">
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="invitation_date">Tanggal</label>
                            <input type="date" name="invitation_date" class="form-control" id="invitation_date"
                                placeholder="Masukkan Tanggal"
                                value="{{ old('invitation_date', $regulation->invitation_date) }}">
                            @error('invitation_date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="content">Deskripsi</label>
                            <textarea name="content" id="content" class="form-control" cols="30" rows="10">{{ old('content', $regulation->content) }}</textarea>
                            @error('content')
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
