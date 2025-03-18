<x-app>
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

                @if (isset($trackingData))
                    <div class="col-12">
                        <div class="accordion mb-3" id="resi-result-accordion">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="resi-result-heading">
                                    <button
                                        class="accordion-button {{ $trackingData['status'] == 200 ? 'bg-success-lt' : 'bg-danger-lt' }} collapsed"
                                        type="button" data-bs-toggle="collapse" data-bs-target="#resi-result-collapse"
                                        aria-expanded="false" aria-controls="resi-result-collapse">
                                        @if ($trackingData['status'] == 200)
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-check me-2 text-success" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M5 12l5 5l10 -10"></path>
                                            </svg>
                                            Pelacakan Berhasil
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-alert-triangle me-2 text-danger" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M12 9v2m0 4v.01"></path>
                                                <path
                                                    d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75">
                                                </path>
                                            </svg>
                                            Pelacakan Gagal
                                        @endif
                                    </button>
                                </h2>
                                <div id="resi-result-collapse" class="accordion-collapse collapse"
                                    aria-labelledby="resi-result-heading">
                                    <div class="accordion-body p-0">
                                        @if ($trackingData['status'] == 200)
                                            <div class="datagrid">
                                                <div class="datagrid-item">
                                                    <div class="datagrid-title">Nomor Resi</div>
                                                    <div class="datagrid-content">
                                                        <div class="input-icon">
                                                            <input type="text" value="{{ $trackingData['result']['resi'] }}" class="form-control" placeholder="Nomor Resi" readonly>
                                                            <span class="input-icon-addon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 3v4a1 1 0 0 0 1 1h4" /><path d="M18 17h-7a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h4l5 5v7a2 2 0 0 1 -2 2z" /><path d="M16 17v2a2 2 0 0 1 -2 2h-7a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h2" /></svg>
                                                            </span>
                                                        </div>
                                                    </div>
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

                                            <h3 class="mt-4 mb-3 px-3">Riwayat Pengiriman</h3>
                                            <ul class="steps steps-vertical steps-green steps-counter my-4 px-3">
                                                @php
                                                    $sortedHistory = $trackingData['result']['history'];
                                                    usort($sortedHistory, function ($a, $b) {
                                                        return strtotime($a['time']) - strtotime($b['time']);
                                                    });

                                                    foreach ($sortedHistory as $key => $item) {
                                                        $sortedHistory[$key]['note'] = preg_replace(
                                                            '/\s*\[[^\]]*\]\s*/',
                                                            ' ',
                                                            $item['note'],
                                                        );
                                                        $sortedHistory[$key]['note'] = trim($sortedHistory[$key]['note']);
                                                    }

                                                    $activeIndex = count($sortedHistory) - 1;
                                                @endphp

                                                @foreach ($sortedHistory as $index => $history)
                                                    <li class="step-item {{ $index === $activeIndex ? 'active' : '' }}">
                                                        <div class="step-content">
                                                            <div class="h4 m-0">{{ $history['time'] }}</div>
                                                            <div class="text-muted">{{ $history['note'] }}</div>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @else
                                            <table class="table table-vcenter card-table m-0">
                                                <tbody>
                                                    <tr>
                                                        <td class="text-muted" style="width: 40%">Status</td>
                                                        <td class="text-danger fw-bold">Gagal</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-muted">Pesan</td>
                                                        <td class="fw-bold text-wrap">{{ $trackingData['message'] }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-muted">Saran</td>
                                                        <td class="text-wrap">Periksa kembali nomor resi yang dimasukkan</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        @endif
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