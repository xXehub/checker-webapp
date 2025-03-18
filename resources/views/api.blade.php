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
                                {{ __('Panduan penggunaan layanan API SihubChecker') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Page body -->
            <div class="page-body">
                <div class="container-xl">
                    <div class="row row-cards">
                        @foreach($apiServices as $serviceKey => $service)
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="card-title">{{ $service['name'] }}</h3>
                                        <p class="text-muted">{{ $service['description'] }}</p>
                                        
                                        <div class="mt-3">
                                            <h4>{{ __('Endpoint') }}</h4>
                                            @foreach($service['endpoints'] as $endpoint)
                                                <div class="mb-3">
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
                                                    <p class="small text-muted mt-1">
                                                        {{ $endpoint['description'] }}
                                                    </p>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <a href="#" class="btn btn-primary w-100 show-details" 
                                           data-service="{{ $serviceKey }}">
                                            {{ __('Lihat Detail') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Modal untuk menampilkan detail -->
                    <div class="modal modal-blur fade" id="apiDetailModal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="apiServiceTitle"></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body" id="apiServiceDetails">
                                    <!-- Konten akan diisi secara dinamis -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Tangani klik tombol detail
            const detailButtons = document.querySelectorAll('.show-details');
            const apiDetailModal = new bootstrap.Modal(document.getElementById('apiDetailModal'));
            const apiServiceTitle = document.getElementById('apiServiceTitle');
            const apiServiceDetails = document.getElementById('apiServiceDetails');

            detailButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const service = this.getAttribute('data-service');

                    // Ambil detail dari server
                    fetch(`/dokumentasi/api/layanan/${service}`)
                        .then(response => response.json())
                        .then(result => {
                            if (result.status === 'success') {
                                // Isi judul modal
                                apiServiceTitle.textContent = result.data.name;

                                // Buat konten detail
                                let detailsHtml = `
                                    <p class="text-muted">${result.data.description}</p>
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Endpoint</h3>
                                        </div>
                                        <div class="card-body">
                                `;

                                result.data.endpoints.forEach(endpoint => {
                                    detailsHtml += `
                                        <div class="mb-3">
                                            <div class="d-flex align-items-center">
                                                <span class="badge ${endpoint.method === 'GET' ? 'bg-blue-lt' : 'bg-green-lt'} me-2">
                                                    ${endpoint.method}
                                                </span>
                                                <code class="text-muted">${endpoint.url}</code>
                                            </div>
                                            <p class="small text-muted mt-1">${endpoint.description}</p>
                                            
                                            <h4 class="mt-2">Parameter</h4>
                                            <ul class="list-unstyled">
                                                ${Object.entries(endpoint.parameters).map(([key, value]) => 
                                                    `<li><strong>${key}</strong>: ${value}</li>`
                                                ).join('')}
                                            </ul>

                                            <h4 class="mt-2">Contoh Respon</h4>
                                            <pre><code class="language-json">${JSON.stringify(endpoint.response_example, null, 2)}</code></pre>
                                        </div>
                                    `;
                                });

                                detailsHtml += `
                                        </div>
                                    </div>
                                `;

                                apiServiceDetails.innerHTML = detailsHtml;

                                // Tampilkan modal
                                apiDetailModal.show();
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('Gagal memuat detail API');
                        });
                });
            });
        });
    </script>
    @endpush
</x-app>