{{-- File: resources/views/documentation/api.blade.php --}}
<x-app>
    <div class="page">
        <div class="page-wrapper">
            <!-- Page header -->
            <div class="page-header d-print-none">
                <div class="container-xl">
                    <div class="row g-2 align-items-center">
                        <div class="col">
                            <h2 class="page-title">
                                {{ __('Dokumentasi API') }}
                            </h2>
                            <div class="text-muted mt-1">
                                {{ __('Panduan lengkap penggunaan layanan API SihubChecker') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Page body -->
            <div class="page-body">
                <div class="container-xl">
                    <div class="row row-cards">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="alert alert-info">
                                        <h4 class="alert-title">{{ __('Selamat Datang di Dokumentasi API') }}</h4>
                                        <p>{{ __('Untuk menggunakan layanan API, Anda memerlukan API Key. Silakan hubungi administrator untuk mendapatkan akses.') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @foreach($apiServices as $serviceKey => $service)
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="subheader">{{ __('Layanan API') }}</div>
                                            <div class="ms-auto lh-1">
                                                <div class="dropdown">
                                                    <a href="#" class="link-secondary" data-bs-toggle="dropdown">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                            <path d="M5 12l14 0"/>
                                                            <path d="M5 12l6 -6"/>
                                                            <path d="M5 12l6 6"/>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="h2 mt-2 mb-3">{{ $service['name'] }}</div>
                                        <div class="text-muted mb-3">
                                            {{ $service['description'] }}
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="d-flex align-items-center">
                                                    <span class="me-2">{{ __('Endpoint') }}:</span>
                                                    @foreach($service['endpoints'] as $endpoint)
                                                        <span class="badge 
                                                            @if($endpoint['method'] == 'GET') bg-blue-lt 
                                                            @elseif($endpoint['method'] == 'POST') bg-green-lt 
                                                            @else bg-secondary-lt @endif 
                                                            me-1">
                                                            {{ $endpoint['method'] }}
                                                        </span>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <a href="{{ route('dokumentasi.api.service.detail', $serviceKey) }}" class="btn btn-primary w-100">
                                            {{ __('Lihat Detail') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">{{ __('Persyaratan Umum') }}</h3>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <h4>{{ __('Autentikasi') }}</h4>
                                                <p>{{ __('Setiap permintaan API memerlukan API Key yang valid.') }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <h4>{{ __('Rate Limit') }}</h4>
                                                <p>{{ __('Maksimal 100 permintaan per menit untuk setiap API Key.') }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <h4>{{ __('Format Respon') }}</h4>
                                                <p>{{ __('Semua respon dalam format JSON dengan status dan data.') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app>