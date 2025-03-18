<form method="POST" action="{{ route('banks.check') }}">
    @csrf
    <div class="mb-3">
        <label for="account_number_bank" class="form-label required">Nomor Rekening Bank</label>
        <input type="text" class="form-control @error('account_number') is-invalid @enderror" id="account_number_bank"
            name="account_number" value="{{ $formData['account_number'] ?? old('account_number') }}"
            placeholder="Masukkan nomor rekening">

        @error('account_number')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="select-bank" class="form-label required">Pilih Bank</label>
        <select id="select-bank" class="form-select @error('account_bank') is-invalid @enderror" name="account_bank">
            <option value="">-- Pilih Bank --</option>

            @if (count($banks) > 0)
                @foreach ($banks as $bank)
                    <option value="{{ $bank['value'] }}"
                        data-custom-properties="&lt;span class=&quot;badge bg-primary-lt&quot;&gt;{{ $bank['value'] }}&lt;/span&gt;"
                        {{ isset($formData['account_bank']) && $formData['account_bank'] == $bank['value'] ? 'selected' : '' }}>
                        {{ $bank['label'] }}
                    </option>
                @endforeach
            @endif
        </select>

        @error('account_bank')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Hasil Pengecekan dengan Accordion -->
    <!-- Accordion untuk Bank -->
    @if (isset($result) && isset($formData['type']) && $formData['type'] == 'bank')
        <div class="accordion mb-3" id="bank-result-accordion">
            <div class="accordion-item">
                <h2 class="accordion-header" id="bank-result-heading">
                    <button
                        class="accordion-button {{ $result['success'] ? 'bg-success-lt' : 'bg-danger-lt' }} collapsed"
                        type="button" data-bs-toggle="collapse" data-bs-target="#bank-result-collapse"
                        aria-expanded="false" aria-controls="bank-result-collapse">
                        @if ($result['success'])
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="icon icon-tabler icon-tabler-check me-2 text-success" width="24"
                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M5 12l5 5l10 -10"></path>
                            </svg>
                            Data Bank Berhasil Ditemukan
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
                            Data Bank Tidak Ditemukan
                        @endif
                    </button>
                </h2>
                <div id="bank-result-collapse" class="accordion-collapse collapse"
                    aria-labelledby="bank-result-heading">
                    <div class="accordion-body p-0">
                        @if ($result['success'])
                            <table class="table table-vcenter card-table m-0">
                                <tbody>
                                    <tr>
                                        <td class="text-muted" style="width: 40%">Nomor Rekening</td>
                                        <td class="fw-bold text-wrap">{{ $result['data']['account_number'] }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Nama Pemilik</td>
                                        <td class="fw-bold text-wrap">{{ $result['data']['account_holder'] }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Bank</td>
                                        <td>
                                            @php
                                                $accountType = $result['data']['account_bank'];
                                                foreach ($banks as $bank) {
                                                    if ($bank['value'] == $accountType) {
                                                        echo '<div class="d-flex align-items-center">';
                                                        echo '<span class="badge bg-primary-lt me-2">' .
                                                            $bank['value'] .
                                                            '</span>';
                                                        echo '<span class="fw-bold text-wrap">' .
                                                            $bank['label'] .
                                                            '</span>';
                                                        echo '</div>';
                                                        break;
                                                    }
                                                }
                                            @endphp
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        @else
                            <div class="alert alert-danger m-3">
                                {{ $result['message'] }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Form footer dengan tombol reset -->
    <div class="form-footer d-flex">
        <button type="reset" class="btn btn-outline-secondary me-auto">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-refresh" width="24"
                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4" />
                <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4" />
            </svg>
            Reset
        </button>
        <button type="submit" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-square-check">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path
                    d="M18.333 2c1.96 0 3.56 1.537 3.662 3.472l.005 .195v12.666c0 1.96 -1.537 3.56 -3.472 3.662l-.195 .005h-12.666a3.667 3.667 0 0 1 -3.662 -3.472l-.005 -.195v-12.666c0 -1.96 1.537 -3.56 3.472 -3.662l.195 -.005h12.666zm-2.626 7.293a1 1 0 0 0 -1.414 0l-3.293 3.292l-1.293 -1.292l-.094 -.083a1 1 0 0 0 -1.32 1.497l2 2l.094 .083a1 1 0 0 0 1.32 -.083l4 -4l.083 -.094a1 1 0 0 0 -.083 -1.32z" />
            </svg>
            Cek Data
        </button>
    </div>
    <input type="hidden" name="type" value="bank">
</form>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Initialize TomSelect for bank dropdown
        var bankTomSelect = null;
        if (window.TomSelect && document.getElementById('select-bank')) {
            bankTomSelect = new TomSelect('#select-bank', {
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
        const bankResetButton = document.querySelector('#bank-content button[type="reset"]');
        if (bankResetButton && bankTomSelect) {
            bankResetButton.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Reset account number field
                const accountNumberField = document.getElementById('account_number_bank');
                if (accountNumberField) {
                    accountNumberField.value = '';
                }
                
                // Reset TomSelect without destroying it
                bankTomSelect.clear();
                const selectElement = document.getElementById('select-bank');
                if (selectElement) {
                    selectElement.value = '';
                    bankTomSelect.sync();
                }
                
                // Hide bank accordion if it exists
                const bankAccordion = document.getElementById('bank-result-accordion');
                if (bankAccordion) {
                    bankAccordion.style.display = 'none';
                }
            });
        }
    });
</script>