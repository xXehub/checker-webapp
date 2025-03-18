<x-app>
    <div class="page-wrapper">

        <!-- Page body -->
        <div class="page-body">
            <div class="container-xl">
                <div class="row row-deck row-cards">
                    <!-- Welcome card -->
                    <div class="col-12">
                        <div class="card card-md">
                            <div class="card-stamp card-stamp-lg">
                                <div class="card-stamp-icon bg-primary">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/ghost -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M3 21l18 0" />
                                        <path d="M3 10l18 0" />
                                        <path d="M5 6l7 -3l7 3" />
                                        <path d="M4 10l0 11" />
                                        <path d="M20 10l0 11" />
                                        <path d="M8 14l0 3" />
                                        <path d="M12 14l0 3" />
                                        <path d="M16 14l0 3" />
                                    </svg>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-10">
                                        <h3 class="h1">Selamat Datang di <b> SihubChecker </b></h3>
                                        <div class="markdown text-muted">
                                            Verifikasi rekening bank, e-wallet, dan lacak pengiriman paket dengan cepat
                                            dan mudah. <b> by sihub </b>
                                        </div>
                                        <div class="mt-3">
                                            <a href="{{ route('banks.index') }}" class="btn btn-primary me-2">
                                                Cek Rekening Bank
                                            </a>
                                            <a href="{{ route('kurir.index') }}" class="btn btn-info">
                                                Lacak Pengiriman
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Feature cards -->
                    <div class="col-sm-6 col-lg-4">
                        <div class="card card-md">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="bg-primary text-white avatar">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M3 21l18 0" />
                                                <path d="M3 10l18 0" />
                                                <path d="M5 6l7 -3l7 3" />
                                                <path d="M4 10l0 11" />
                                                <path d="M20 10l0 11" />
                                                <path d="M8 14l0 3" />
                                                <path d="M12 14l0 3" />
                                                <path d="M16 14l0 3" />
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-medium">
                                            Pemeriksa Rekening Bank
                                        </div>
                                        <div class="text-muted">
                                            Periksa detail rekening bank dengan validasi nomor rekening
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-4">
                        <div class="card card-md">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="bg-green text-white avatar">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/shopping-cart -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                    d="M17 8v-3a1 1 0 0 0 -1 -1h-10a2 2 0 0 0 0 4h12a1 1 0 0 1 1 1v3m0 4v3a1 1 0 0 1 -1 1h-12a2 2 0 0 1 -2 -2v-12" />
                                                <path d="M20 12v4h-4a2 2 0 0 1 0 -4h4" />
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-medium">
                                            Pemeriksa E-Wallet
                                        </div>
                                        <div class="text-muted">
                                            Verifikasi akun e-wallet dari berbagai penyedia
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-4">
                        <div class="card card-md">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="bg-azure text-white avatar">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/package -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5" />
                                                <path d="M12 12l8 -4.5" />
                                                <path d="M12 12l0 9" />
                                                <path d="M12 12l-8 -4.5" />
                                                <path d="M16 5.25l-8 4.5" />
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-medium">
                                            Lacak Pengiriman
                                        </div>
                                        <div class="text-muted">
                                            Cek status pengiriman paket dari berbagai kurir
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- About card -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Tentang Aplikasi Ini</h3>
                            </div>
                            <div class="card-body">
                                <p>Aplikasi ini memungkinkan Anda memverifikasi rekening bank, akun e-wallet di
                                    Indonesia, serta melacak status pengiriman paket. Aplikasi menggunakan API yang
                                    andal untuk memvalidasi dan menampilkan informasi yang Anda butuhkan dengan cepat.
                                </p>

                                <div class="datagrid">
                                    <div class="datagrid-item">
                                        <div class="datagrid-title">Fitur</div>
                                        <div class="datagrid-content">
                                            <ul class="list-unstyled space-y-1">
                                                <li>
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon text-green"
                                                        width="24" height="24" viewBox="0 0 24 24"
                                                        stroke-width="2" stroke="currentColor" fill="none"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M5 12l5 5l10 -10" />
                                                    </svg>
                                                    Verifikasi rekening bank untuk lebih dari 100 bank di Indonesia
                                                </li>
                                                <li>
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon text-green"
                                                        width="24" height="24" viewBox="0 0 24 24"
                                                        stroke-width="2" stroke="currentColor" fill="none"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M5 12l5 5l10 -10" />
                                                    </svg>
                                                    Verifikasi akun e-wallet untuk penyedia utama
                                                </li>
                                                <li>
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon text-green"
                                                        width="24" height="24" viewBox="0 0 24 24"
                                                        stroke-width="2" stroke="currentColor" fill="none"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M5 12l5 5l10 -10" />
                                                    </svg>
                                                    Lacak status pengiriman dari berbagai penyedia kurir
                                                </li>
                                                <li>
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon text-green"
                                                        width="24" height="24" viewBox="0 0 24 24"
                                                        stroke-width="2" stroke="currentColor" fill="none"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M5 12l5 5l10 -10" />
                                                    </svg>
                                                    Hasil verifikasi yang cepat dan akurat
                                                </li>
                                                <li>
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon text-green"
                                                        width="24" height="24" viewBox="0 0 24 24"
                                                        stroke-width="2" stroke="currentColor" fill="none"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M5 12l5 5l10 -10" />
                                                    </svg>
                                                    Antarmuka yang mudah digunakan
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</x-app>
