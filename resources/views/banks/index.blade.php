@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Bank Account Checker</h4>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('check.account') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="account_number" class="form-label">Nomor Rekening</label>
                            <input type="text" class="form-control @error('account_number') is-invalid @enderror" 
                                id="account_number" name="account_number" 
                                value="{{ $formData['account_number'] ?? old('account_number') }}" required>
                            
                            @error('account_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="account_bank" class="form-label">Bank / E-Wallet</label>
                            <select class="form-select @error('account_bank') is-invalid @enderror" 
                                id="account_bank" name="account_bank" required>
                                <option value="">-- Pilih Bank / E-Wallet --</option>
                                
                                @if(count($banks) > 0)
                                    <optgroup label="Bank">
                                        @foreach($banks as $bank)
                                            <option value="{{ $bank['value'] }}" 
                                                {{ isset($formData['account_bank']) && $formData['account_bank'] == $bank['value'] ? 'selected' : '' }}>
                                                {{ $bank['label'] }}
                                            </option>
                                        @endforeach
                                    </optgroup>
                                @endif
                                
                                @if(count($ewallets) > 0)
                                    <optgroup label="E-Wallet">
                                        @foreach($ewallets as $ewallet)
                                            <option value="{{ $ewallet['value'] }}" 
                                                {{ isset($formData['account_bank']) && $formData['account_bank'] == $ewallet['value'] ? 'selected' : '' }}>
                                                {{ $ewallet['label'] }}
                                            </option>
                                        @endforeach
                                    </optgroup>
                                @endif
                            </select>
                            
                            @error('account_bank')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Cek Pemilik Rekening</button>
                        </div>
                    </form>

                    @if(isset($result))
                        <div class="mt-4">
                            <h5>Hasil Pengecekan:</h5>
                            <div class="border rounded p-3 mt-2">
                                @if($result['success'])
                                    <div class="alert alert-success">
                                        {{ $result['message'] }}
                                    </div>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <th style="width: 40%">Nomor Rekening</th>
                                                <td>{{ $result['data']['account_number'] }}</td>
                                            </tr>
                                            <tr>
                                                <th>Nama Pemilik</th>
                                                <td>{{ $result['data']['account_holder'] }}</td>
                                            </tr>
                                            <tr>
                                                <th>Bank/E-Wallet</th>
                                                <td>{{ $result['data']['account_bank'] }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                @else
                                    <div class="alert alert-danger">
                                        {{ $result['message'] }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header">
                    <h4 class="mb-0">Daftar Bank yang Didukung</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Bank</h5>
                            <ul class="list-group">
                                @foreach($banks as $bank)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ $bank['label'] }}
                                        <span class="badge bg-primary rounded-pill">{{ $bank['value'] }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h5>E-Wallet</h5>
                            <ul class="list-group">
                                @foreach($ewallets as $ewallet)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ $ewallet['label'] }}
                                        <span class="badge bg-primary rounded-pill">{{ $ewallet['value'] }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection