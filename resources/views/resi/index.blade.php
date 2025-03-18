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
                                        <input type="text" class="form-control" name="tracking_number"
                                            placeholder="Nomor resi pengiriman" value="{{ $trackingNumber ?? '' }}"
                                            required>
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

                @if (isset($trackingData) && $trackingData['status'] == 200)
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
                                        <div class="datagrid-content">{{ ucfirst($trackingData['result']['courier']) }}
                                        </div>
                                    </div>
                                    <div class="datagrid-item">
                                        <div class="datagrid-title">Pengirim</div>
                                        <div class="datagrid-content">{{ $trackingData['result']['origin']['name'] }}
                                        </div>
                                    </div>
                                    <div class="datagrid-item">
                                        <div class="datagrid-title">Alamat Pengirim</div>
                                        <div class="datagrid-content">{{ $trackingData['result']['origin']['address'] }}
                                        </div>
                                    </div>
                                    <div class="datagrid-item">
                                        <div class="datagrid-title">Penerima</div>
                                        <div class="datagrid-content">
                                            {{ $trackingData['result']['destination']['name'] }}</div>
                                    </div>
                                    <div class="datagrid-item">
                                        <div class="datagrid-title">Alamat Penerima</div>
                                        <div class="datagrid-content">
                                            {{ $trackingData['result']['destination']['address'] }}</div>
                                    </div>
                                </div>
                                <h3 class="mt-4 mb-3">Riwayat Pengiriman</h3>
                                <div class="card">
                                    <div class="card-body">
                                        <ul class="steps steps-vertical">
                                            @php
                                                // Urutkan array dari yang terbaru (indeks 0) ke yang terlama
                                                // Data dari API biasanya sudah terurut, tapi kita pastikan saja
                                                // $sortedHistory = collect($trackingData['result']['history'])->sortByDesc('time')->values()->all();
                                                
                                                // Gunakan data asli karena sudah terurut dari terbaru ke terlama (indeks 0 adalah terbaru)
                                                $sortedHistory = $trackingData['result']['history'];
                                                
                                                // Tentukan status yang menandakan paket telah sampai
                                                $deliveredKeywords = ['delivered', 'diterima', 'sampai di alamat penerima'];
                                                
                                                // Cari indeks status terakhir (terbaru) yang menandakan paket telah sampai
                                                $activeIndex = 0; // Default ke status terbaru
                                                foreach ($sortedHistory as $index => $item) {
                                                    $note = strtolower($item['note']);
                                                    foreach ($deliveredKeywords as $keyword) {
                                                        if (strpos($note, $keyword) !== false) {
                                                            $activeIndex = $index;
                                                            break 2;
                                                        }
                                                    }
                                                }
                                            @endphp
                                            
                                            @foreach($sortedHistory as $index => $history)
                                            <li class="step-item {{ $index === $activeIndex ? 'active' : '' }}">
                                                <div class="h4 m-0">{{ $history['time'] }}</div>
                                                <div class="text-muted">{{ $history['note'] }}</div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
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
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app>
