<x-app>
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Lacak Pengiriman
                    </h2>
                    <div class="text-muted mt-1">Cek status pengiriman paket Anda</div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Lacak Paket Anda</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('kurir.track') }}" method="POST">
                                @csrf
                                <div class="form-group mb-3">
                                    <label class="form-label">Masukkan Nomor Resi</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="tracking_number" placeholder="Nomor resi pengiriman" value="{{ $trackingNumber ?? '' }}" required>
                                        <button type="submit" class="btn btn-primary">Lacak</button>
                                    </div>
                                    @error('tracking_number')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
    
                @if(isset($trackingData) && $trackingData['status'] == 200)
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Hasil Pelacakan</h3>
                        </div>
                        <div class="card-body">
                            <div class="datagrid">
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Nomor Resi</div>
                                    <div class="datagrid-content">{{ $trackingData['result']['resi'] }}</div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Kurir</div>
                                    <div class="datagrid-content">{{ ucfirst($trackingData['result']['courier']) }}</div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Pengirim</div>
                                    <div class="datagrid-content">{{ $trackingData['result']['origin']['name'] }}</div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Alamat Pengirim</div>
                                    <div class="datagrid-content">{{ $trackingData['result']['origin']['address'] }}</div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Penerima</div>
                                    <div class="datagrid-content">{{ $trackingData['result']['destination']['name'] }}</div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Alamat Penerima</div>
                                    <div class="datagrid-content">{{ $trackingData['result']['destination']['address'] }}</div>
                                </div>
                            </div>
    
                            <h3 class="mt-4 mb-3">Riwayat Pengiriman</h3>
                            <div class="timeline">
                                @foreach($trackingData['result']['history'] as $history)
                                <div class="timeline-event">
                                    <div class="timeline-event-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-package" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <polyline points="12 3 20 7.5 20 16.5 12 21 4 16.5 4 7.5 12 3"></polyline>
                                            <line x1="12" y1="12" x2="20" y2="7.5"></line>
                                            <line x1="12" y1="12" x2="12" y2="21"></line>
                                            <line x1="12" y1="12" x2="4" y2="7.5"></line>
                                        </svg>
                                    </div>
                                    <div class="card timeline-event-card">
                                        <div class="card-body">
                                            <div class="text-muted float-end">{{ $history['time'] }}</div>
                                            <p>{{ $history['note'] }}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                @elseif(isset($trackingData) && $trackingData['status'] != 200)
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="alert alert-danger" role="alert">
                                <h4 class="alert-title">Pelacakan Gagal</h4>
                                <div class="text-muted">{{ $trackingData['message'] }}</div>
                                <div class="mt-2">
                                    <strong>Detail:</strong> 
                                    <pre>{{ isset($trackingData['result']) ? json_encode($trackingData['result'], JSON_PRETTY_PRINT) : 'Tidak ada detail' }}</pre>
                                </div>
                                <div class="mt-2">
                                    <strong>Status Code:</strong> {{ $trackingData['status'] }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</x-app>