<x-app>
    {{-- <div class="container">
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

                    @if (isset($result))
                        <div class="mt-4">
                            <h5>Hasil Pengecekan:</h5>
                            <div class="border rounded p-3 mt-2">
                                @if ($result['success'])
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
</div> --}}

    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs nav-fill" data-bs-toggle="tabs">
                                <li class="nav-item">
                                    <a href="#tabs-home-7" class="nav-link active"
                                        data-bs-toggle="tab"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                                            <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                            <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                        </svg>
                                        Home</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#tabs-profile-7" class="nav-link"
                                        data-bs-toggle="tab"><!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                            <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                        </svg>
                                        Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#tabs-activity-7" class="nav-link"
                                        data-bs-toggle="tab"><!-- Download SVG icon from http://tabler-icons.io/i/activity -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M3 12h4l3 8l4 -16l3 8h4" />
                                        </svg>
                                        Activity</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active show" id="tabs-home-7">
                                    <h4>Home tab</h4>
                                    <div>Cursus turpis vestibulum, dui in pharetra vulputate id sed non turpis ultricies
                                        fringilla at sed facilisis lacus pellentesque purus nibh</div>
                                </div>
                                <div class="tab-pane" id="tabs-profile-7">
                                    <h4>Profile tab</h4>
                                    <div>Fringilla egestas nunc quis tellus diam rhoncus ultricies tristique enim at
                                        diam, sem nunc amet, pellentesque id egestas velit sed</div>
                                </div>
                                <div class="tab-pane" id="tabs-activity-7">
                                    <h4>Activity tab</h4>
                                    <div>Donec ac vitae diam amet vel leo egestas consequat rhoncus in luctus amet,
                                        facilisi sit mauris accumsan nibh habitant senectus</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Script to preserve active tab after form submission
        document.addEventListener('DOMContentLoaded', function() {
            // If form was submitted from e-wallet tab, switch to it
            @if (isset($formData['account_bank']))
                @php
                    $isEwallet = false;
                    foreach ($ewallets as $ewallet) {
                        if ($ewallet['value'] == $formData['account_bank']) {
                            $isEwallet = true;
                            break;
                        }
                    }
                @endphp

                @if ($isEwallet)
                    document.getElementById('ewallet-tab').click();
                @endif
            @endif
        });
    </script>
</x-app>
