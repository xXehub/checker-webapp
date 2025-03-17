<x-app>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <!-- Account Checker Column -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs nav-fill" data-bs-toggle="tabs">
                                <li class="nav-item">
                                    <a href="#bank-content" class="nav-link active" data-bs-toggle="tab">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
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
                                        Bank
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#ewallet-content" class="nav-link" data-bs-toggle="tab">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M17 8v-3a1 1 0 0 0 -1 -1h-10a2 2 0 0 0 0 4h12a1 1 0 0 1 1 1v3m0 4v3a1 1 0 0 1 -1 1h-12a2 2 0 0 1 -2 -2v-12" />
                                            <path d="M20 12v4h-4a2 2 0 0 1 0 -4h4" />
                                        </svg>
                                        E-Wallet
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <div class="tab-content">
                                <!-- Bank Tab -->
                                <div class="tab-pane active show" id="bank-content">
                                    @include('banks.tabs.bank')
                                </div>

                                <!-- E-Wallet Tab -->
                                <div class="tab-pane" id="ewallet-content">
                                    @include('banks.tabs.ewallet')
                                </div>
                            </div>

                            @if (isset($result))
                                <div class="mt-4">
                                    <h3 class="card-title">Hasil Pengecekan</h3>
                                    <div class="datagrid mt-2">
                                        @if ($result['success'])
                                            <div class="alert alert-success mb-3">
                                                {{ $result['message'] }}
                                            </div>
                                            <div class="card">
                                                <div class="table-responsive">
                                                    <table class="table table-vcenter card-table">
                                                        <tbody>
                                                            <tr>
                                                                <th class="w-25">Nomor Rekening/E-Wallet</th>
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

                                                                        foreach ($ewallets as $ewallet) {
                                                                            if ($ewallet['value'] == $accountType) {
                                                                                echo $ewallet['label'] . ' (E-Wallet)';
                                                                                $isEwallet = true;
                                                                                break;
                                                                            }
                                                                        }

                                                                        if (!$isEwallet) {
                                                                            foreach ($banks as $bank) {
                                                                                if ($bank['value'] == $accountType) {
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
                                                </div>
                                            </div>
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
                            <h3 class="card-title">Bantuan Penggunaan</h3>
                        </div>
                        <div class="card-body">
                            <div class="markdown">
                                <p>Aplikasi ini berfungsi untuk memeriksa nomor rekening/e-wallet. Caranya:</p>
                                <ol>
                                    <li>Pilih tab <strong>Bank</strong> untuk memeriksa rekening bank, atau tab
                                        <strong>E-Wallet</strong> untuk memeriksa nomor e-wallet
                                    </li>
                                    <li>Masukkan nomor rekening/e-wallet yang ingin diperiksa</li>
                                    <li>Pilih bank/e-wallet yang sesuai</li>
                                    <li>Klik tombol "Cek" dan hasil pengecekan akan muncul di bawah form</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Datatable Column -->
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs">
                                <li class="nav-item">
                                    <a href="#banks-list" class="nav-link active" data-bs-toggle="tab">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
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
                                        Daftar Bank
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#ewallets-list" class="nav-link" data-bs-toggle="tab">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M17 8v-3a1 1 0 0 0 -1 -1h-10a2 2 0 0 0 0 4h12a1 1 0 0 1 1 1v3m0 4v3a1 1 0 0 1 -1 1h-12a2 2 0 0 1 -2 -2v-12" />
                                            <path d="M20 12v4h-4a2 2 0 0 1 0 -4h4" />
                                        </svg>
                                        Daftar E-Wallet
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active show" id="banks-list">
                                    <div class="card">
                                        <div class="table-responsive">
                                            <table class="table table-vcenter card-table table-striped"
                                                id="banks-datatable">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Kode</th>
                                                        <th>Nama Bank</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($banks as $index => $bank)
                                                        <tr>
                                                            <td>{{ $index + 1 }}</td>
                                                            <td>
                                                                <span
                                                                    class="badge bg-primary-lt">{{ $bank['value'] }}</span>
                                                            </td>
                                                            <td>{{ $bank['label'] }}</td>
                                                            <td>
                                                                <span class="badge bg-success">Aktif</span>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="ewallets-list">
                                    <div class="card">
                                        <div class="table-responsive">
                                            <table class="table table-vcenter card-table table-striped"
                                                id="ewallets-datatable">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Kode</th>
                                                        <th>Nama E-Wallet</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($ewallets as $index => $ewallet)
                                                        <tr>
                                                            <td>{{ $index + 1 }}</td>
                                                            <td>
                                                                <span
                                                                    class="badge bg-success-lt">{{ $ewallet['value'] }}</span>
                                                            </td>
                                                            <td>{{ $ewallet['label'] }}</td>
                                                            <td>
                                                                <span class="badge bg-success">Aktif</span>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-4">
                        <div class="card-header">
                            <h3 class="card-title">Statistik & Informasi</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card card-sm">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <span class="bg-primary text-white avatar">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                                            width="24" height="24" viewBox="0 0 24 24"
                                                            stroke-width="2" stroke="currentColor" fill="none"
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
                                                    </span>
                                                </div>
                                                <div class="col">
                                                    <div class="font-weight-medium">
                                                        {{ count($banks) }} Bank
                                                    </div>
                                                    <div class="text-muted">
                                                        Tersedia untuk diperiksa
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card card-sm">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <span class="bg-success text-white avatar">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                                            width="24" height="24" viewBox="0 0 24 24"
                                                            stroke-width="2" stroke="currentColor" fill="none"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path
                                                                d="M17 8v-3a1 1 0 0 0 -1 -1h-10a2 2 0 0 0 0 4h12a1 1 0 0 1 1 1v3m0 4v3a1 1 0 0 1 -1 1h-12a2 2 0 0 1 -2 -2v-12" />
                                                            <path d="M20 12v4h-4a2 2 0 0 1 0 -4h4" />
                                                        </svg>
                                                    </span>
                                                </div>
                                                <div class="col">
                                                    <div class="font-weight-medium">
                                                        {{ count($ewallets) }} E-Wallet
                                                    </div>
                                                    <div class="text-muted">
                                                        Tersedia untuk diperiksa
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
            </div>
        </div>
    </div>

    <script>
        // Script to initialize datatables and preserve active tab after form submission
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize datatables
            if (typeof $.fn.dataTable !== 'undefined') {
                // Initialize DataTables with custom Tabler pagination
                // Initialize DataTables with minimal pagination settings
                $('#banks-datatable, #ewallets-datatable').DataTable({
                    responsive: true,
                    pageLength: 10,
                    lengthMenu: [
                        [10, 25, 50, -1],
                        [10, 25, 50, "All"]
                    ],
                    language: {
                        info: "Showing <span>_START_</span> to <span>_END_</span> of <span>_TOTAL_</span> entries",
                        paginate: {
                            first: "",
                            last: "",
                            next: "next",
                            previous: "prev"
                        }
                    },
                    dom: '<"card-body border-bottom py-3"<"d-flex"<"text-muted"l><"ms-auto text-muted"f>>>' +
                        '<"table-responsive"t>' +
                        '<"card-footer d-flex align-items-center"<"m-0 text-muted"i><"pagination m-0 ms-auto"p>>',
                    initComplete: function() {
                        // Fix search box
                        $('.dataTables_filter').html(
                            '<div class="ms-auto text-muted">Search: <div class="ms-2 d-inline-block"><input type="text" class="form-control form-control-sm custom-search" aria-label="Search"></div></div>'
                            );

                        // Bind custom search
                        $('.custom-search').on('keyup', function() {
                            var tableId = $(this).closest('.dataTables_wrapper').find('table')
                                .attr('id');
                            $('#' + tableId).DataTable().search(this.value).draw();
                        });
                    }
                });

                // After document is fully loaded
                $(document).ready(function() {
                    // Apply CSS via stylesheet instead of inline
                    $('<style type="text/css">\
            .dataTables_wrapper .paginate_button.previous a:before {\
                content: "< ";\
            }\
            .dataTables_wrapper .paginate_button.next a:after {\
                content: " >";\
            }\
            .dataTables_paginate {\
                display: flex !important;\
            }\
            .dataTables_paginate .paginate_button {\
                padding: 0 !important;\
                margin: 0 3px !important;\
                border: none !important;\
                background: none !important;\
            }\
            .dataTables_paginate .paginate_button.current {\
                background-color: #0d6efd !important;\
                color: white !important;\
            }\
            .dataTables_paginate .paginate_button a {\
                padding: 0.375rem 0.75rem;\
                border-radius: 4px;\
                color: #0d6efd;\
                text-decoration: none;\
                background: none;\
            }\
            .dataTables_paginate .paginate_button.current a {\
                color: white !important;\
                background: none !important;\
            }\
            .dataTables_paginate .paginate_button.disabled a {\
                color: #6c757d;\
                pointer-events: none;\
            }\
        </style>').appendTo('head');

                    // Just add classes, don't modify HTML
                    $('.dataTables_paginate').addClass('pagination');
                    $('.paginate_button').addClass('page-item');
                    $('.paginate_button a').addClass('page-link');
                });
            }

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
                    const ewalletTabLink = document.querySelector('a[href="#ewallet-content"]');
                    if (ewalletTabLink) {
                        ewalletTabLink.click();
                    }
                @endif
            @endif
        });
    </script>
</x-app>
