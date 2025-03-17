<form method="POST" action="{{ route('banks.check') }}">
    @csrf
    <div class="mb-3">
        <label for="account_number_bank" class="form-label required">Nomor Rekening Bank</label>
        <input type="text" class="form-control @error('account_number') is-invalid @enderror" 
            id="account_number_bank" name="account_number" 
            value="{{ $formData['account_number'] ?? old('account_number') }}" required
            placeholder="Masukkan nomor rekening">
        
        @error('account_number')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="select-bank" class="form-label required">Pilih Bank</label>
        <select id="select-bank" class="form-select @error('account_bank') is-invalid @enderror" 
            name="account_bank" required>
            <option value="">-- Pilih Bank --</option>
            
            @if(count($banks) > 0)
                @foreach($banks as $bank)
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

    <div class="form-footer">
        <button type="submit" class="btn btn-primary"><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="currentColor"  class="icon icon-tabler icons-tabler-filled icon-tabler-square-check"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18.333 2c1.96 0 3.56 1.537 3.662 3.472l.005 .195v12.666c0 1.96 -1.537 3.56 -3.472 3.662l-.195 .005h-12.666a3.667 3.667 0 0 1 -3.662 -3.472l-.005 -.195v-12.666c0 -1.96 1.537 -3.56 3.472 -3.662l.195 -.005h12.666zm-2.626 7.293a1 1 0 0 0 -1.414 0l-3.293 3.292l-1.293 -1.292l-.094 -.083a1 1 0 0 0 -1.32 1.497l2 2l.094 .083a1 1 0 0 0 1.32 -.083l4 -4l.083 -.094a1 1 0 0 0 -.083 -1.32z" /></svg>Cek Data</button>
    </div>
    <input type="hidden" name="type" value="bank">
</form>

<script>
    // Initialize TomSelect for bank dropdown
    document.addEventListener("DOMContentLoaded", function () {
        var bankSelect;
        window.TomSelect && (new TomSelect(bankSelect = document.getElementById('select-bank'), {
            copyClassesToDropdown: false,
            dropdownParent: 'body',
            controlInput: '<input>',
            render:{
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
        }));
    });
</script>