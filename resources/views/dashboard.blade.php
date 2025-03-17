@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Dashboard Pemeriksa Rekening</h4>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mb-4 text-center">
                            <h2>Selamat Datang di Pemeriksa Rekening Bank & E-Wallet</h2>
                            <p class="lead">Verifikasi rekening bank dan e-wallet dengan cepat dan mudah</p>
                            <a href="{{ route('banks.index') }}" class="btn btn-lg btn-primary">
                                Cek rekening kamu sekarang
                            </a>
                        </div>
                    </div>
                    
                    <div class="row mt-4">
                        <div class="col-md-6 mb-3">
                            <div class="card h-100">
                                <div class="card-body text-center">
                                    <i class="bi bi-bank display-1 text-primary mb-3"></i>
                                    <h5 class="card-title">Pemeriksa Rekening Bank</h5>
                                    <p class="card-text">Periksa detail rekening bank dengan validasi nomor rekening</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="card h-100">
                                <div class="card-body text-center">
                                    <i class="bi bi-wallet display-1 text-success mb-3"></i>
                                    <h5 class="card-title">Pemeriksa E-Wallet</h5>
                                    <p class="card-text">Verifikasi akun e-wallet dari berbagai penyedia</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header">
                    <h4 class="mb-0">Tentang Aplikasi Ini</h4>
                </div>
                <div class="card-body">
                    <p>Aplikasi ini memungkinkan Anda memverifikasi rekening bank dan akun e-wallet di Indonesia. Aplikasi menggunakan API yang andal untuk memvalidasi nomor rekening dan menampilkan detail pemilik rekening.</p>
                    <p><strong>Fitur:</strong></p>
                    <ul>
                        <li>Verifikasi rekening bank untuk lebih dari 100 bank di Indonesia</li>
                        <li>Verifikasi akun e-wallet untuk penyedia utama</li>
                        <li>Hasil verifikasi yang cepat dan akurat</li>
                        <li>Antarmuka yang mudah digunakan</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection