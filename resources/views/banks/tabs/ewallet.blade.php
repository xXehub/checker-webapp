<form method="POST" action="{{ route('banks.check') }}">
    @csrf
    <div class="mb-3">
        <label for="account_number_ewallet" class="form-label required">Nomor E-Wallet</label>
        <input type="text" class="form-control @error('account_number') is-invalid @enderror" 
            id="account_number_ewallet" name="account_number" 
            value="{{ isset($formData['type']) && $formData['type'] == 'ewallet' ? ($formData['account_number'] ?? old('account_number')) : '' }}" 
            placeholder="Masukkan nomor e-wallet">
        
        @error('account_number')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="select-ewallet" class="form-label required">Pilih E-Wallet</label>
        <select id="select-ewallet" class="form-select @error('account_bank') is-invalid @enderror" 
            name="account_bank" >
            <option value="">-- Pilih E-Wallet --</option>
            
            @if(count($ewallets) > 0)
                @foreach($ewallets as $ewallet)
                    <option value="{{ $ewallet['value'] }}" 
                        data-custom-properties="&lt;span class=&quot;badge bg-success-lt&quot;&gt;{{ $ewallet['value'] }}&lt;/span&gt;"
                        {{ isset($formData['type']) && $formData['type'] == 'ewallet' && isset($formData['account_bank']) && $formData['account_bank'] == $ewallet['value'] ? 'selected' : '' }}>
                        {{ $ewallet['label'] }}
                    </option>
                @endforeach
            @endif
        </select>
        
        @error('account_bank')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

<!-- Accordion untuk E-Wallet -->
@if(isset($result) && isset($formData['type']) && $formData['type'] == 'ewallet')
    <div class="accordion mb-3" id="ewallet-result-accordion">
        <div class="accordion-item">
            <h2 class="accordion-header" id="ewallet-result-heading">
                <button class="accordion-button {{ $result['success'] ? 'bg-success-lt' : 'bg-danger-lt' }} collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#ewallet-result-collapse" aria-expanded="false" aria-controls="ewallet-result-collapse">
                    @if($result['success'])
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check me-2 text-success" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M5 12l5 5l10 -10"></path>
                        </svg>
                        Data E-Wallet Berhasil Ditemukan
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alert-triangle me-2 text-danger" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 9v2m0 4v.01"></path>
                            <path d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75"></path>
                        </svg>
                        Data E-Wallet Tidak Ditemukan
                    @endif
                </button>
            </h2>
            <div id="ewallet-result-collapse" class="accordion-collapse collapse" aria-labelledby="ewallet-result-heading">
                <div class="accordion-body p-0">
                    <table class="table table-vcenter card-table m-0">
                        <tbody>
                            @if($result['success'])
                                <tr>
                                    <td class="text-muted" style="width: 40%">Nomor E-Wallet</td>
                                    <td class="fw-bold text-wrap">{{ $result['data']['account_number'] }}</td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Nama Pemilik</td>
                                    <td class="fw-bold text-wrap">{{ $result['data']['account_holder'] }}</td>
                                </tr>
                                <tr>
                                    <td class="text-muted">E-Wallet</td>
                                    <td>
                                        @php
                                            $accountType = $result['data']['account_bank'];
                                            foreach($ewallets as $ewallet) {
                                                if($ewallet['value'] == $accountType) {
                                                    echo '<div class="d-flex align-items-center">';
                                                    echo '<span class="badge bg-success-lt me-2">' . $ewallet['value'] . '</span>';
                                                    echo '<span class="fw-bold text-wrap">' . $ewallet['label'] . '</span>';
                                                    echo '</div>';
                                                    break;
                                                }
                                            }
                                        @endphp
                                    </td>
                                </tr>
                            @else
                                <tr>
                                    <td class="text-muted" style="width: 40%">Status</td>
                                    <td class="text-danger fw-bold">Gagal</td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Pesan</td>
                                    <td class="fw-bold text-wrap">{{ $result['message'] }}</td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Saran</td>
                                    <td class="text-wrap">Periksa kembali nomor e-wallet dan provider yang dipilih</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endif

    <!-- Form footer untuk e-wallet dengan tombol reset -->
<div class="form-footer d-flex">
    <button type="reset" class="btn btn-outline-success me-auto">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-refresh" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4" />
            <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4" />
        </svg>
        Reset
    </button>
    <button type="submit" class="btn btn-success">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"
            class="icon icon-tabler icons-tabler-filled icon-tabler-square-check">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M18.333 2c1.96 0 3.56 1.537 3.662 3.472l.005 .195v12.666c0 1.96 -1.537 3.56 -3.472 3.662l-.195 .005h-12.666a3.667 3.667 0 0 1 -3.662 -3.472l-.005 -.195v-12.666c0 -1.96 1.537 -3.56 3.472 -3.662l.195 -.005h12.666zm-2.626 7.293a1 1 0 0 0 -1.414 0l-3.293 3.292l-1.293 -1.292l-.094 -.083a1 1 0 0 0 -1.32 1.497l2 2l.094 .083a1 1 0 0 0 1.32 -.083l4 -4l.083 -.094a1 1 0 0 0 -.083 -1.32z" />
        </svg>
        Cek Data
    </button>
</div>
    <input type="hidden" name="type" value="ewallet">
</form>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Initialize TomSelect for e-wallet dropdown
        var ewalletTomSelect = null;
        if (window.TomSelect && document.getElementById('select-ewallet')) {
            ewalletTomSelect = new TomSelect('#select-ewallet', {
                copyClassesToDropdown: false,
                dropdownParent: 'body',
                controlInput: '<input>',
                render: {
                    item: function(data, escape) {
                        if (data.customProperties) {
                            return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape(data.text) + '</div>';
                        }
                        return '<div>' + escape(data.text) + '</div>';
                    },
                    option: function(data, escape) {
                        if (data.customProperties) {
                            return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape(data.text) + '</div>';
                        }
                        return '<div>' + escape(data.text) + '</div>';
                    },
                },
            });
        }

        // Handle reset button
        const ewalletResetButton = document.querySelector('#ewallet-content button[type="reset"]');
        if (ewalletResetButton && ewalletTomSelect) {
            ewalletResetButton.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Reset account number field
                const accountNumberField = document.getElementById('account_number_ewallet');
                if (accountNumberField) {
                    accountNumberField.value = '';
                }
                
                // Reset TomSelect without destroying it
                ewalletTomSelect.clear();
                const selectElement = document.getElementById('select-ewallet');
                if (selectElement) {
                    selectElement.value = '';
                    ewalletTomSelect.sync();
                }
                
                // Hide e-wallet accordion if it exists
                const ewalletAccordion = document.getElementById('ewallet-result-accordion');
                if (ewalletAccordion) {
                    ewalletAccordion.style.display = 'none';
                }
            });
        }
    });
</script>