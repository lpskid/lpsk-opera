@extends('layouts.dashboard')

@section('title', 'Tambah Peraturan')

@push('style')
    @include('style.select2')
@endpush

@section('content')
    <div class="card">
        <div class="card-body">
            <form id="add-data-form" action="{{ route('peraturan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="title">Judul</label>
                            <input type="text" name="title" class="form-control" id="title"
                                placeholder="Masukkan Judul" value="{{ old('title') }}">
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="number">Tipe</label>
                            {{-- Select --}}
                            <select class="form-control" name="status" id="status">
                                <option value="penetapan">Penetapan</option>
                                <option value="pengusulan">Perencanaan</option>
                            </select>
                            @error('number')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12" id="jdih_link_form">
                        <div class="form-group">
                            <label for="jdih_link">Link JDIH</label>
                            <input type="text" name="jdih_link" class="form-control" id="jdih_link"
                                placeholder="Masukkan Link JDIH" value="{{ old('jdih_link') }}">
                            @error('jdih_link')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="information">Keterangan</label>
                            <textarea name="information" id="information" class="form-control" cols="30" rows="10">{{ old('information') }}</textarea>
                            @error('information')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="content">Deskripsi</label>
                            <textarea name="content" id="content" class="form-control" cols="30" rows="10">{{ old('content') }}</textarea>
                            @error('content')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    {{-- File attachments --}}
                    <div class="col-md-12" id="attachment_form" style="display: none">
                        <div class="form-group">
                            <label for="attachment">Lampiran</label>
                            <input type="file" name="attachments[]" class="form-control" id="attachment">
                            <span class="text-muted text-sm">* Boleh lebih dari satu lampiran</span>
                            @error('attachments')
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

            $('#status').on('change', function() {
                if ($(this).val() == 'penetapan') {
                    $('#jdih_link_form').show();
                    $('#attachment_form').hide();
                } else {
                    $('#jdih_link_form').hide();
                    $('#attachment_form').show();
                }
            })
        });
    </script>
@endpush
