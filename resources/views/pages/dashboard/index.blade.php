@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $users->count() }}</h3>
                    <p>Pengguna</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="#" class="small-box-footer">Lihat detail <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $pengusulan }}</h3>
                    <p>Pengusulan</p>
                </div>
                <div class="icon">
                    <i class="fas fa-file-alt"></i>
                </div>
                <a href="#" class="small-box-footer">Lihat detail <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <!-- Penyusunan Pembahasan -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{ $penyusunan_pembahasan }}</h3>
                    <p>Penyusunan Pembahasan</p>
                </div>
                <div class="icon">
                    <i class="fas fa-edit"></i>
                </div>
                <a href="#" class="small-box-footer">Lihat detail <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <!-- Partisipasi Publik -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $partisipasi_publik }}</h3>
                    <p>Partisipasi Publik</p>
                </div>
                <div class="icon">
                    <i class="fas fa-comment-dots"></i>
                </div>
                <a href="#" class="small-box-footer">Lihat detail <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <!-- Persetujuan Pimpinan -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $persetujuan_pimpinan }}</h3>
                    <p>Persetujuan Pimpinan</p>
                </div>
                <div class="icon">
                    <i class="fas fa-check-double"></i>
                </div>
                <a href="#" class="small-box-footer">Lihat detail <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <!-- Penyelarasan -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-secondary">
                <div class="inner">
                    <h3>{{ $penyelarasan }}</h3>
                    <p>Penyelarasan</p>
                </div>
                <div class="icon">
                    <i class="fas fa-sync-alt"></i>
                </div>
                <a href="#" class="small-box-footer">Lihat detail <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <!-- Penetapan -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-dark">
                <div class="inner">
                    <h3>{{ $penetapan }}</h3>
                    <p>Penetapan</p>
                </div>
                <div class="icon">
                    <i class="fas fa-lock"></i>
                </div>
                <a href="#" class="small-box-footer">Lihat detail <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <!-- Pengundangan Peraturan -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $pengundangan_peraturan }}</h3>
                    <p>Pengundangan Peraturan</p>
                </div>
                <div class="icon">
                    <i class="fas fa-bell"></i>
                </div>
                <a href="#" class="small-box-footer">Lihat detail <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <!-- Penyusunan Informasi-->
        <div class=“col-lg-3 col-6”>
        </div>
    @endsection
