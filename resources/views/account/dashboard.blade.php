@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Account Checker Dashboard</h4>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="card h-100">
                                <div class="card-body text-center">
                                    <i class="bi bi-bank display-1 text-primary mb-3"></i>
                                    <h5 class="card-title">Bank Account Checker</h5>
                                    <p class="card-text">Check bank account details with account number validation</p>
                                    <a href="{{ route('banks.index') }}" class="btn btn-primary">Check Bank Account</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="card h-100">
                                <div class="card-body text-center">
                                    <i class="bi bi-wallet display-1 text-success mb-3"></i>
                                    <h5 class="card-title">E-Wallet Checker</h5>
                                    <p class="card-text">Verify e-wallet accounts from multiple providers</p>
                                    <a href="{{ route('ewallets.index') }}" class="btn btn-success">Check E-Wallet</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header">
                    <h4 class="mb-0">About This Application</h4>
                </div>
                <div class="card-body">
                    <p>This application allows you to verify bank accounts and e-wallet accounts in Indonesia. It uses a reliable API to validate account numbers and return account holder details.</p>
                    <p><strong>Features:</strong></p>
                    <ul>
                        <li>Bank account verification for over 100 banks in Indonesia</li>
                        <li>E-wallet account verification for major providers</li>
                        <li>Quick and accurate verification results</li>
                        <li>User-friendly interface</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection