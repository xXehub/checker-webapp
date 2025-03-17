<div class="tab-pane fade show active" id="bank-content" role="tabpanel" aria-labelledby="bank-tab">
    <form method="POST" action="{{ route('banks.check') }}">
        @csrf
        <div class="mb-3">
            <label for="account_number_bank" class="form-label">Nomor Rekening Bank</label>
            <input type="text" class="form-control @error('account_number') is-invalid @enderror" 
                id="account_number_bank" name="account_number" 
                value="{{ $formData['account_number'] ?? old('account_number') }}" required>
            
            @error('account_number')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="account_bank" class="form-label">Pilih Bank</label>
            <select class="form-select @error('account_bank') is-invalid @enderror" 
                id="account_bank" name="account_bank" required>
                <option value="">-- Pilih Bank --</option>
                
                @if(count($banks) > 0)
                    @foreach($banks as $bank)
                        <option value="{{ $bank['value'] }}" 
                            {{ isset($formData['account_bank']) && $formData['account_bank'] == $bank['value'] ? 'selected' : '' }}>
                            {{ $bank['label'] }}
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
            <button type="submit" class="btn btn-primary">Cek Rekening Bank</button>
        </div>
        <input type="hidden" name="type" value="bank">
    </form>
</div>