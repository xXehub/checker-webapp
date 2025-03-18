<x-app>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
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
                            <!-- Hasil Pengecekan -->
                            {{-- @if (isset($result))
                                @if ($result['success'])
                                    <!-- Card success dengan status berhasil -->
                                    <div class="card card-md mt-4">
                                        <div class="card-status-top bg-success"></div>
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-check text-success"
                                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M5 12l5 5l10 -10"></path>
                                                </svg>
                                                Hasil Pengecekan Berhasil
                                            </h3>
                                            <div class="card-actions">
                                                <a href="#" class="btn-action" data-bs-toggle="collapse"
                                                    data-bs-target="#collapse-result">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                                        width="24" height="24" viewBox="0 0 24 24"
                                                        stroke-width="2" stroke="currentColor" fill="none"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M12 5l0 14"></path>
                                                        <path d="M5 12l14 0"></path>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="collapse show" id="collapse-result">
                                            <div class="card-body">
                                                <div class="datagrid">
                                                    <div class="datagrid-item">
                                                        <div class="datagrid-title">Nomor Rekening/E-Wallet</div>
                                                        <div class="datagrid-content">
                                                            {{ $result['data']['account_number'] }}</div>
                                                    </div>
                                                    <div class="datagrid-item">
                                                        <div class="datagrid-title">Nama Pemilik</div>
                                                        <div class="datagrid-content">
                                                            {{ $result['data']['account_holder'] }}</div>
                                                    </div>
                                                    <div class="datagrid-item">
                                                        <div class="datagrid-title">Bank/E-Wallet</div>
                                                        <div class="datagrid-content">
                                                            @php
                                                                $accountType = $result['data']['account_bank'];
                                                                $isEwallet = false;

                                                                foreach ($ewallets as $ewallet) {
                                                                    if ($ewallet['value'] == $accountType) {
                                                                        $badgeClass = 'bg-success-lt';
                                                                        echo '<span class="badge ' .
                                                                            $badgeClass .
                                                                            '">' .
                                                                            $ewallet['value'] .
                                                                            '</span> ' .
                                                                            $ewallet['label'] .
                                                                            ' (E-Wallet)';
                                                                        $isEwallet = true;
                                                                        break;
                                                                    }
                                                                }

                                                                if (!$isEwallet) {
                                                                    foreach ($banks as $bank) {
                                                                        if ($bank['value'] == $accountType) {
                                                                            $badgeClass = 'bg-primary-lt';
                                                                            echo '<span class="badge ' .
                                                                                $badgeClass .
                                                                                '">' .
                                                                                $bank['value'] .
                                                                                '</span> ' .
                                                                                $bank['label'] .
                                                                                ' (Bank)';
                                                                            break;
                                                                        }
                                                                    }
                                                                }
                                                            @endphp
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer text-end">
                                                <button class="btn btn-outline-success btn-sm" onclick="window.print()">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-printer" width="24"
                                                        height="24" viewBox="0 0 24 24" stroke-width="2"
                                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path
                                                            d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2">
                                                        </path>
                                                        <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4"></path>
                                                        <path
                                                            d="M7 13m0 2a2 2 0 0 1 2 -2h6a2 2 0 0 1 2 2v4a2 2 0 0 1 -2 2h-6a2 2 0 0 1 -2 -2z">
                                                        </path>
                                                    </svg>
                                                    Cetak
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <!-- Card alert dengan pesan error -->
                                    <div class="card card-md mt-4">
                                        <div class="card-status-top bg-danger"></div>
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <span class="avatar bg-red-lt">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon icon-tabler icon-tabler-alert-triangle"
                                                            width="24" height="24" viewBox="0 0 24 24"
                                                            stroke-width="2" stroke="currentColor" fill="none"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                            </path>
                                                            <path d="M12 9v4"></path>
                                                            <path
                                                                d="M10.363 3.591l-8.106 13.534a1.998 1.998 0 0 0 1.717 2.992h16.054a1.998 1.998 0 0 0 1.717 -2.992l-8.106 -13.534a1.998 1.998 0 0 0 -3.276 0z">
                                                            </path>
                                                            <path d="M12 16h.01"></path>
                                                        </svg>
                                                    </span>
                                                </div>
                                                <div class="col">
                                                    <h3 class="mt-0">Pengecekan Gagal</h3>
                                                    <div class="text-muted">{{ $result['message'] }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endif --}}
                        </div>
                    </div>

                    {{-- hasil dan pengecekan lek dipisah --}}
                    {{-- <div class="card mt-2">
                        <div class="card-header">
                            <h3 class="card-title">Hasil Pengecekan</h3>
                        </div>
                        <div class="card-body">
                            @if (isset($result))
                                <div class="datagrid">
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
                            @else
                                <div class="alert alert-info">
                                    Hasil pengecekan akan muncul di sini setelah Anda mengisi form dan menekan tombol "Cek".
                                </div>
                            @endif
                        </div>
                    </div> --}}

                    {{-- bantuan penggunaan mas --}}
                    <div class="card mt-2">
                        <div class="card-header">
                            <h3 class="card-title">Bantuan Penggunaan</h3>
                        </div>
                        <div class="card-body">
                            <div class="accordion" id="accordion-help">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading-help">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapse-help"
                                            aria-expanded="false" aria-controls="collapse-help">
                                            Cara Menggunakan Aplikasi
                                        </button>
                                    </h2>
                                    <div id="collapse-help" class="accordion-collapse collapse"
                                        aria-labelledby="heading-help" data-bs-parent="#accordion-help">
                                        <div class="accordion-body">
                                            <div class="markdown">
                                                <p>Aplikasi ini berfungsi untuk memeriksa nomor rekening/e-wallet.
                                                    Caranya:</p>
                                                <ol>
                                                    <li>Pilih tab <strong>Bank</strong> untuk memeriksa rekening bank,
                                                        atau tab
                                                        <strong>E-Wallet</strong> untuk memeriksa nomor e-wallet
                                                    </li>
                                                    <li>Masukkan nomor rekening/e-wallet yang ingin diperiksa</li>
                                                    <li>Pilih bank/e-wallet yang sesuai</li>
                                                    <li>Klik tombol "Cek" dan hasil pengecekan akan muncul di bawah form
                                                    </li>
                                                </ol>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Datatable Column -->

                <div class="col-md-8">

                    <div class="card-header">
                        {{-- <h3 class="card-title">Statistik & Informasi</h3> --}}
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


                    <div class="card mt-2">
                        <div class="card">
                            <div class="card-header">
                                <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs">
                                    <li class="nav-item">
                                        <a href="#banks-list" class="nav-link active" data-bs-toggle="tab">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="24"
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
                                            Daftar Bank
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#ewallets-list" class="nav-link" data-bs-toggle="tab">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
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
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Inisialisasi datatable
            if (typeof $.fn.dataTable !== 'undefined') {
                // Initialize DataTables
                $('#banks-datatable, #ewallets-datatable').DataTable({
                    responsive: true,
                    pageLength: 10,
                    lengthMenu: [
                        [10, 25, 50, -1],
                        [10, 25, 50, "All"]
                    ],
                    dom: '<"card-body border-bottom py-3"<"d-flex"<"text-muted custom-length"l><"ms-auto text-muted"f>>>' +
                        '<"table-responsive"t>' +
                        '<"card-footer d-flex align-items-center"<"m-0 text-muted"i><"custom-pagination m-0 ms-auto"p>>',
                    language: {
                        lengthMenu: "_MENU_" // Keep this minimal as we'll replace it
                    },
                    drawCallback: function(settings) {
                        // Get pagination info
                        var api = this.api();
                        var info = api.page.info();

                        // Get current page
                        var currentPage = info.page;
                        var totalPages = info.pages;

                        // Clear existing pagination
                        var paginationContainer = $(this).closest('.dataTables_wrapper').find(
                            '.custom-pagination');
                        paginationContainer.empty();

                        // Create Tabler pagination
                        var paginationHtml = '<ul class="pagination m-0 ms-auto">';

                        // Previous button
                        var prevDisabled = currentPage === 0 ? 'disabled' : '';
                        paginationHtml += '<li class="page-item ' + prevDisabled + '">' +
                            '<a class="page-link" href="#" tabindex="-1" aria-disabled="' + (
                                prevDisabled === 'disabled') + '">' +
                            '<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" ' +
                            'stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">' +
                            '<path stroke="none" d="M0 0h24v24H0z" fill="none" />' +
                            '<path d="M15 6l-6 6l6 6" />' +
                            '</svg> prev</a></li>';

                        // Page numbers
                        var startPage = Math.max(0, Math.min(currentPage - 2, totalPages - 5));
                        var endPage = Math.min(totalPages - 1, startPage + 4);

                        for (var i = startPage; i <= endPage; i++) {
                            var activeClass = i === currentPage ? 'active' : '';
                            paginationHtml += '<li class="page-item ' + activeClass + '">' +
                                '<a class="page-link" href="#">' + (i + 1) + '</a></li>';
                        }

                        // Next button
                        var nextDisabled = currentPage >= totalPages - 1 ? 'disabled' : '';
                        paginationHtml += '<li class="page-item ' + nextDisabled + '">' +
                            '<a class="page-link" href="#">next ' +
                            '<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" ' +
                            'stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">' +
                            '<path stroke="none" d="M0 0h24v24H0z" fill="none" />' +
                            '<path d="M9 6l6 6l-6 6" />' +
                            '</svg></a></li>';

                        paginationHtml += '</ul>';

                        // Add pagination to container
                        paginationContainer.html(paginationHtml);

                        // Add click event to pagination buttons
                        paginationContainer.find('.page-item:not(.disabled) .page-link').on('click',
                            function(e) {
                                e.preventDefault();
                                var $this = $(this);
                                var pageText = $this.text().trim();

                                if (pageText.indexOf('prev') !== -1) {
                                    api.page('previous').draw('page');
                                } else if (pageText.indexOf('next') !== -1) {
                                    api.page('next').draw('page');
                                } else {
                                    var page = parseInt(pageText) - 1;
                                    api.page(page).draw('page');
                                }
                            });

                        // Format the info text with spans
                        var infoContainer = $(this).closest('.dataTables_wrapper').find(
                            '.dataTables_info');
                        var infoText = infoContainer.text();
                        var parts = infoText.match(/Showing (\d+) to (\d+) of (\d+) entries/);

                        if (parts && parts.length === 4) {
                            infoContainer.html('Showing <span>' + parts[1] + '</span> to <span>' +
                                parts[2] + '</span> of <span>' + parts[3] + '</span> entries');
                        }

                        // Fix the length menu if it exists
                        fixLengthMenu($(this));
                    },
                    initComplete: function() {
                        // Fix search box
                        $('.dataTables_filter').html(
                            '<div class="ms-auto text-muted">Cari: <div class="ms-2 d-inline-block"><input type="text" class="form-control form-control-sm custom-search" aria-label="Search"></div></div>'
                        );

                        // Bind custom search
                        $('.custom-search').on('keyup', function() {
                            var tableId = $(this).closest('.dataTables_wrapper').find('table')
                                .attr('id');
                            $('#' + tableId).DataTable().search(this.value).draw();
                        });

                        // Fix length menu initially
                        fixLengthMenu($(this));
                    }
                });

                // Function to fix the length menu
                function fixLengthMenu(tableElement) {
                    var wrapper = tableElement.closest('.dataTables_wrapper');
                    var lengthContainer = wrapper.find('.custom-length');
                    var currentLength = tableElement.DataTable().page.len();

                    // Create custom length input
                    var lengthHtml =
                        'Menampilkan' +
                        '<div class="mx-2 d-inline-block">' +
                        '<input type="text" class="form-control form-control-sm length-input" value="' +
                        currentLength + '" size="3" aria-label="Entries count">' +
                        '</div>' +
                        'data';

                    lengthContainer.html(lengthHtml);

                    // Bind input event for length change
                    lengthContainer.find('.length-input').on('change', function() {
                        var value = parseInt($(this).val());
                        if (isNaN(value) || value < 1) {
                            value = 10; // Default to 10 if invalid
                            $(this).val(value);
                        }
                        tableElement.DataTable().page.len(value).draw();
                    });
                }
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

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Store the active tab in localStorage when tab is changed
        const tabLinks = document.querySelectorAll('.nav-tabs .nav-link');
        tabLinks.forEach(link => {
            link.addEventListener('click', function() {
                localStorage.setItem('activeTab', this.getAttribute('href'));
            });
        });

        // Restore active tab from localStorage on page load
        const activeTab = localStorage.getItem('activeTab');
        if (activeTab) {
            const tab = document.querySelector(`.nav-tabs .nav-link[href="${activeTab}"]`);
            if (tab) {
                tab.click();
            }
        }
    });
</script>
</x-app>
