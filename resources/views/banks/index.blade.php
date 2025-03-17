@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Bank & E-Wallet Account Checker</h4>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- Tabs Navigation -->
                    <ul class="nav nav-tabs mb-4" id="accountTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="bank-tab" data-bs-toggle="tab" data-bs-target="#bank-content" 
                                type="button" role="tab" aria-controls="bank-content" aria-selected="true">
                                Bank
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="ewallet-tab" data-bs-toggle="tab" data-bs-target="#ewallet-content" 
                                type="button" role="tab" aria-controls="ewallet-content" aria-selected="false">
                                E-Wallet
                            </button>
                        </li>
                    </ul>

                    <!-- Tabs Content -->
                    <div class="tab-content" id="accountTabsContent">
                        <!-- Bank Tab -->
                        @include('banks.tabs.bank')
                        
                        <!-- E-Wallet Tab -->
                        @include('banks.tabs.ewallet')
                    </div>

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
                                                <th style="width: 40%">Nomor Rekening/E-Wallet</th>
                                                <td>{{ $result['data']['account_number'] }}</td>
                                            </tr>
                                            <tr>
                                                <th>Nama Pemilik</th>
                                                <td>{{ $result['data']['account_holder'] }}</td>
                                            </tr>
                                            <tr>
                                                <th>Bank/E-Wallet</th>
                                                <td>
                                                    @php
                                                        $accountType = $result['data']['account_bank'];
                                                        $isEwallet = false;
                                                        
                                                        foreach($ewallets as $ewallet) {
                                                            if($ewallet['value'] == $accountType) {
                                                                echo $ewallet['label'] . ' (E-Wallet)';
                                                                $isEwallet = true;
                                                                break;
                                                            }
                                                        }
                                                        
                                                        if(!$isEwallet) {
                                                            foreach($banks as $bank) {
                                                                if($bank['value'] == $accountType) {
                                                                    echo $bank['label'] . ' (Bank)';
                                                                    break;
                                                                }
                                                            }
                                                        }
                                                    @endphp
                                                </td>
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
                    <h4 class="mb-0">Bantuan Penggunaan</h4>
                </div>
                <div class="card-body">
                    <p>Aplikasi ini berfungsi untuk memeriksa nomor rekening/e-wallet. Caranya:</p>
                    <ol>
                        <li>Pilih tab <strong>Bank</strong> untuk memeriksa rekening bank, atau tab <strong>E-Wallet</strong> untuk memeriksa nomor e-wallet</li>
                        <li>Masukkan nomor rekening/e-wallet yang ingin diperiksa</li>
                        <li>Pilih bank/e-wallet yang sesuai</li>
                        <li>Klik tombol "Cek" dan hasil pengecekan akan muncul di bawah form</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Script to preserve active tab after form submission
    document.addEventListener('DOMContentLoaded', function() {
        // If form was submitted from e-wallet tab, switch to it
        @if(isset($formData['account_bank']))
            @php
                $isEwallet = false;
                foreach($ewallets as $ewallet) {
                    if($ewallet['value'] == $formData['account_bank']) {
                        $isEwallet = true;
                        break;
                    }
                }
            @endphp
            
            @if($isEwallet)
                document.getElementById('ewallet-tab').click();
            @endif
        @endif
    });
</script>
@endsection