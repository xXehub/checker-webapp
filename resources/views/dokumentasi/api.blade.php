<x-app>
    <div class="page">
        <div class="page-wrapper">
            <!-- Page body -->
            <div class="page-body">
                <div class="container-xl">
                    <div class="row row-cards">
                        @foreach($apiServices as $serviceKey => $service)
                            @foreach($service['endpoints'] as $endpoint)
                                <div class="col-md-4 d-flex">
                                    <div class="card flex-fill">
                                        <div class="card-body d-flex flex-column">
                                            <h3 class="card-title">{{ $service['name'] }} ({{ $endpoint['method'] }})</h3>
                                            <p class="text-muted flex-grow-1">{{ $endpoint['description'] }}</p>
                                            
                                            <div class="mt-3">
                                                <h4>{{ __('Endpoint') }}</h4>
                                                <div class="mb-3">
                                                    <div class="d-flex align-items-center">
                                                        <span class="badge 
                                                            @if($endpoint['method'] == 'GET') bg-blue-lt 
                                                            @elseif($endpoint['method'] == 'POST') bg-green-lt 
                                                            @else bg-secondary-lt @endif 
                                                            me-2">
                                                            {{ $endpoint['method'] }}
                                                        </span>
                                                        <code class="text-muted text-truncate">{{ $endpoint['url'] }}</code>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer mt-auto">
                                            <a href="{{ route('dokumentasi.api.service.detail', $serviceKey) }}" 
                                               class="btn btn-primary w-100 show-details" 
                                               data-service="{{ $serviceKey }}"
                                               data-endpoint="{{ $loop->index }}">
                                                {{ __('Lihat Detail') }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
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
                    const endpointIndex = this.getAttribute('data-endpoint');

                    // Ambil detail dari server
                    fetch(`/dokumentasi/api/layanan/${service}`)
                        .then(response => response.json())
                        .then(result => {
                            if (result.status === 'success') {
                                const endpoint = result.data.endpoints[endpointIndex];
                                // Isi judul modal
                                apiServiceTitle.textContent = `${endpoint.method} ${endpoint.url}`;

                                // Buat konten detail
                                let detailsHtml = `
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Parameter</h3>
                                        </div>
                                        <div class="card-body">
                                            <ul class="list-unstyled">
                                                ${Object.entries(endpoint.parameters).map(([key, value]) => 
                                                    `<li>
                                                        <strong>${key}</strong>: 
                                                        ${typeof value === 'object' ? value.description || 'Tidak ada deskripsi' : value}
                                                        ${typeof value === 'object' && value.required 
                                                            ? `<span class="badge ${value.required ? 'bg-red-lt' : 'bg-green-lt'} ms-2">
                                                                ${value.required ? 'Wajib' : 'Opsional'}
                                                               </span>` 
                                                            : ''}
                                                    </li>`
                                                ).join('')}
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="card mt-3">
                                        <div class="card-header">
                                            <h3 class="card-title">Contoh Respon</h3>
                                        </div>
                                        <div class="card-body">
                                            <pre><code class="language-json">${JSON.stringify(endpoint.response_example, null, 2)}</code></pre>
                                        </div>
                                    </div>

                                    <div class="card mt-3">
                                        <div class="card-header">
                                            <h3 class="card-title">Contoh Request</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="nav nav-tabs" data-bs-toggle="tabs">
                                                <a href="#curl-${endpointIndex}" class="nav-link active" data-bs-toggle="tab">
                                                    cURL
                                                </a>
                                                <a href="#php-${endpointIndex}" class="nav-link" data-bs-toggle="tab">
                                                    PHP
                                                </a>
                                            </div>
                                            <div class="tab-content mt-3">
                                                <div class="tab-pane active" id="curl-${endpointIndex}">
                                                    <pre><code class="language-bash">${endpoint.examples.curl}</code></pre>
                                                </div>
                                                <div class="tab-pane" id="php-${endpointIndex}">
                                                    <pre><code class="language-php">${endpoint.examples.php}</code></pre>
                                                </div>
                                            </div>
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