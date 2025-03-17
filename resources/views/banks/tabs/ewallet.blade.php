<div class="tab-pane fade" id="ewallet-content" role="tabpanel" aria-labelledby="ewallet-tab">
    <form method="POST" action="{{ route('banks.check') }}">
        @csrf
        <div class="mb-3">
            <label for="account_number_ewallet" class="form-label">Nomor E-Wallet</label>
            <input type="text" class="form-control @error('account_number') is-invalid @enderror" 
                id="account_number_ewallet" name="account_number" 
                value="{{ $formData['account_number'] ?? old('account_number') }}" required>
            
            @error('account_number')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="account_ewallet" class="form-label">Pilih E-Wallet</label>
            <select class="form-select @error('account_bank') is-invalid @enderror" 
                id="account_ewallet" name="account_bank" required>
                <option value="">-- Pilih E-Wallet --</option>
                
                @if(count($ewallets) > 0)
                    @foreach($ewallets as $ewallet)
                        <option value="{{ $ewallet['value'] }}" 
                            {{ isset($formData['account_bank']) && $formData['account_bank'] == $ewallet['value'] ? 'selected' : '' }}>
                            {{ $ewallet['label'] }}
                        </option>
                    @endforeach
                @endif
            </select>
            
            @error('account_bank')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Cek E-Wallet</button>
        </div>
        <input type="hidden" name="type" value="ewallet">
    </form>
</div>