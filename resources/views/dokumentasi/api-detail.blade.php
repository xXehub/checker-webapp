{{-- File: resources/views/documentation/api-detail.blade.php --}}
<x-app>
    <div class="page">
        <div class="page-wrapper">
            <!-- Page header -->
            {{-- <div class="page-header d-print-none">
                <div class="container-xl">
                    <div class="row g-2 align-items-center">
                        <div class="col">
                            <div class="page-pretitle">
                                <a href="{{ route('dokumentasi.api.index') }}" class="text-muted">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-left" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M5 12l14 0"></path>
                                        <path d="M5 12l6 -6"></path>
                                        <path d="M5 12l6 6"></path>
                                    </svg>
                                    {{ __('Kembali') }}
                                </a>
                            </div>
                            <h2 class="page-title">
                                {{ $service['name'] ?? 'Dokumentasi API' }}
                            </h2>
                            <div class="text-muted mt-1">
                                {{ $service['description'] ?? 'Detail layanan API' }}
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

            <!-- Page body -->
            <div class="page-body">
                <div class="container-xl">
                    @if(isset($service) && !empty($service['endpoints']))
                        <div class="row row-cards">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="card-title">{{ __('Endpoints') }}</h3>
                                        
                                        @foreach($service['endpoints'] as $endpoint)
                                            <div class="card mb-3">
                                                <div class="card-header">
                                                    <div class="d-flex align-items-center">
                                                        <span class="badge 
                                                            @if($endpoint['method'] == 'GET') bg-blue-lt 
                                                            @elseif($endpoint['method'] == 'POST') bg-green-lt 
                                                            @else bg-secondary-lt @endif 
                                                            me-2">
                                                            {{ $endpoint['method'] }}
                                                        </span>
                                                        <code class="text-muted">{{ $endpoint['url'] }}</code>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <p>{{ $endpoint['description'] }}</p>

                                                    {{-- Parameters --}}
                                                    <div class="mb-3">
                                                        <h4>{{ __('Parameter') }}</h4>
                                                        @if(!empty($endpoint['parameters']))
                                                            <table class="table table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th>{{ __('Nama') }}</th>
                                                                        <th>{{ __('Deskripsi') }}</th>
                                                                        <th>{{ __('Tipe') }}</th>
                                                                        <th>{{ __('Status') }}</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach($endpoint['parameters'] as $paramName => $paramDesc)
                                                                        <tr>
                                                                            <td><code>{{ $paramName }}</code></td>
                                                                            <td>{{ $paramDesc['description'] ?? $paramDesc }}</td>
                                                                            <td>{{ $paramDesc['type'] ?? 'string' }}</td>
                                                                            <td>
                                                                                @if(is_array($paramDesc) && isset($paramDesc['required']) && $paramDesc['required'])
                                                                                    <span class="badge bg-red-lt">{{ __('Wajib') }}</span>
                                                                                @else
                                                                                    <span class="badge bg-green-lt">{{ __('Opsional') }}</span>
                                                                                @endif
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        @else
                                                            <p class="text-muted">{{ __('Tidak ada parameter') }}</p>
                                                        @endif
                                                    </div>

                                                    {{-- Response Example --}}
                                                    <div class="mb-3">
                                                        <h4>{{ __('Contoh Respon') }}</h4>
                                                        <pre><code class="language-json">{{ json_encode($endpoint['response_example'], JSON_PRETTY_PRINT) }}</code></pre>
                                                    </div>

                                                    {{-- Code Examples --}}
                                                    <div>
                                                        <h4>{{ __('Contoh Penggunaan') }}</h4>
                                                        <ul class="nav nav-tabs" data-bs-toggle="tabs">
                                                            <li class="nav-item">
                                                                <a href="#curl-{{ $loop->index }}" class="nav-link active" data-bs-toggle="tab">
                                                                    cURL
                                                                </a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a href="#php-{{ $loop->index }}" class="nav-link" data-bs-toggle="tab">
                                                                    PHP
                                                                </a>
                                                            </li>
                                                        </ul>
                                                        <div class="tab-content">
                                                            <div class="tab-pane active" id="curl-{{ $loop->index }}">
                                                                <pre><code class="language-bash">{{ $endpoint['examples']['curl'] ?? 'curl ' . $endpoint['url'] }}</code></pre>
                                                            </div>
                                                            <div class="tab-pane" id="php-{{ $loop->index }}">
                                                                <pre><code class="language-php">{{ $endpoint['examples']['php'] ?? '$response = Http::get("' . $endpoint['url'] . '");' }}</code></pre>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="card">
                            <div class="card-body">
                                <div class="alert alert-danger">
                                    <h4 class="alert-title">{{ __('Layanan Tidak Ditemukan') }}</h4>
                                    <p>{{ __('Maaf, detail layanan API yang Anda cari tidak tersedia.') }}</p>
                                    <a href="{{ route('dokumentasi.api.index') }}" class="btn btn-primary mt-3">
                                        {{ __('Kembali ke Daftar Layanan') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Optional: Add syntax highlighting for code blocks
            if (window.hljs) {
                document.querySelectorAll('pre code').forEach((block) => {
                    hljs.highlightBlock(block);
                });
            }
        });
    </script>
    @endpush
</x-app>