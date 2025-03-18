<style>
    /* Style for active navbar items using primary button color */
    .navbar-nav .nav-item.active .nav-link {
        color: var(--tblr-primary) !important;
        font-weight: bold;
    }

    /* Remove background and make navbar transparent */
    .navbar {
        background-color: transparent !important;
        box-shadow: none;
        padding: 0.75rem 0;
    }

    /* Brand styling */
    .navbar-brand {
        font-weight: 700;
        display: flex;
        align-items: center;
    }

    /* Remove any bottom lines/borders on links */
    .navbar-nav .nav-link::after {
        display: none;
    }

    /* Logo styling with primary and secondary colors */
    .brand-text-sihub {
        color: var(--tblr-primary);
        font-weight: 700;
        font-size: 1.25rem;
    }

    .brand-text-checker {
        color: var(--tblr-secondary);
        font-weight: 700;
        font-size: 1.25rem;
    }

    /* Color adjustments for dark theme */
    .navbar[data-bs-theme="dark"] .brand-text-sihub {
        color: var(--tblr-primary);
    }

    .navbar[data-bs-theme="dark"] .brand-text-checker {
        color: var(--tblr-secondary);
    }

    /* gawe live */
    /* Import modern fonts */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@600;700&family=Roboto+Mono:wght@500;700&display=swap');

    /* Combined container */
    .brand-live-container {
        display: flex;
        align-items: center;
    }

    /* SihubChecker logo styling */
    .brand-logo {
        display: flex;
        align-items: center;
        font-family: 'Poppins', sans-serif;
        margin-right: 16px;
        padding-right: 16px;
        position: relative;
    }

    /* Add divider after SihubChecker */
    .brand-logo::after {
        content: '';
        position: absolute;
        right: 0;
        top: 50%;
        transform: translateY(-50%);
        height: 20px;
        width: 1px;
        background-color: rgba(255, 255, 255, 0.3);
    }

    .brand-text-sihub {
        color: var(--tblr-primary);
        font-weight: 700;
        font-size: 1.25rem;
    }

    .brand-text-checker {
        color: var(--tblr-secondary);
        font-weight: 600;
        font-size: 1.25rem;
    }

    /* Live badge and time styling */
    .live-badge {
        display: flex;
        align-items: center;
        margin-left: 16px;
    }

    .time-display {
        font-family: 'Roboto Mono', monospace;
        font-weight: 500;
        font-size: 1rem;
        color: var(--tblr-primary);
        margin-left: 10px;
    }

    /* Pulse animation for live indicator */
    @keyframes pulse {
        0% {
            opacity: 1;
        }

        50% {
            opacity: 0.5;
        }

        100% {
            opacity: 1;
        }
    }

    .live-dot {
        animation: pulse 1.5s infinite;
    }
</style>

<header class="navbar navbar-expand-md navbar-overlap d-print-none" data-bs-theme="dark">
    <div class="container-xl">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu"
            aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Brand/logo area -->
        <a href="{{ route('dashboard') }}" class="text-decoration-none">
            <div class="brand-live-container">
                <!-- SihubChecker logo first -->
                {{-- <div class="brand-logo">
                    <span class="brand-text-sihub">Sihub</span><span class="brand-text-checker">Checker</span>
                </div> --}}

                <!-- Live badge and time after divider -->
                <div class="live-badge">
                    <span class="badge bg-danger-lt live-dot">● SIHUBCHECKER</span>
                    <span class="time-display" id="current-time">--:--:--</span>
                </div>
            </div>
        </a>
        </h1>
        <!-- Dark/Light mode toggles -->
        <div class="navbar-nav flex-row order-md-last">
            <div class="d-none d-md-flex me-3">
                <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" title="Aktifkan mode gelap"
                    data-bs-toggle="tooltip" data-bs-placement="bottom">
                    <!-- Download SVG icon from http://tabler-icons.io/i/moon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" />
                    </svg>
                </a>
                <a href="?theme=light" class="nav-link px-0 hide-theme-light" title="Aktifkan mode terang"
                    data-bs-toggle="tooltip" data-bs-placement="bottom">
                    <!-- Download SVG icon from http://tabler-icons.io/i/sun -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                        <path
                            d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" />
                    </svg>
                </a>
            </div>

            <!-- Guest login/register buttons -->
            @guest
                <div class="nav-item d-none d-md-flex me-3">
                    <div class="btn-list">
                        <a href="{{ route('register') }}" class="btn btn-outline-primary" rel="noreferrer">
                            Daftar
                        </a>
                        <a href="{{ route('login') }}" class="btn btn-primary d-flex align-items-center" rel="noreferrer">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="icon me-1">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M9 8v-2a2 2 0 0 1 2 -2h7a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-7a2 2 0 0 1 -2 -2v-2" />
                                <path d="M3 12h13l-3 -3" />
                                <path d="M13 15l3 -3" />
                            </svg>
                            Masuk
                        </a>
                    </div>
                </div>
                <div class="nav-item d-md-none">
                    <a href="{{ route('login') }}" class="btn btn-primary d-sm-none btn-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-login-2">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M9 8v-2a2 2 0 0 1 2 -2h7a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-7a2 2 0 0 1 -2 -2v-2" />
                            <path d="M3 12h13l-3 -3" />
                            <path d="M13 15l3 -3" />
                        </svg>
                    </a>
                </div>
            @endguest

            <!-- User dropdown if authenticated -->
            @auth
            <div class="nav-item dropdown">
                <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                    <span class="avatar avatar-sm" style="{{ Auth::user()->avatar ? 'background-image: url(' . asset(Auth::user()->avatar) . ')' : 'background-color: var(--tblr-primary); color: white; display: flex; align-items: center; justify-content: center;' }}">
                        @if (!Auth::user()->avatar)
                            {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                        @endif
                    </span>
                    <div class="d-none d-xl-block ps-2">
                        <div>{{ Auth::user()->name }}</div>
                        <div class="mt-1 small text-muted">{{ Auth::user()->email }}</div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <a href="#" class="dropdown-item">Profil</a>
                    <a href="#" class="dropdown-item">Pengaturan</a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        @endauth
        </div>

        <!-- Centered navbar items with icons -->
        <div class="collapse navbar-collapse" id="navbar-menu">
            <div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">
                <ul class="navbar-nav mx-auto">
                    <li
                        class="nav-item {{ request()->routeIs('dashboard') || request()->routeIs('home') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('dashboard') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Dashboard
                            </span>
                        </a>
                    </li>
                    <li class="nav-item {{ Route::is('banks.*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('banks.index') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
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
                            </span>
                            <span class="nav-link-title">
                                Cek Rekening
                            </span>
                        </a>
                    </li>
                    <li class="nav-item {{ Route::is('kurir.*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('kurir.index') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-align-box-left-top">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M3 3m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z" />
                                    <path d="M9 13h-2" />
                                    <path d="M13 10h-6" />
                                    <path d="M11 7h-4" />
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Cek Resi
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>


    </div>
</header>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        function updateTime() {
            const now = new Date();

            // Format time as HH:MM:SS with leading zeros
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');

            // Update the display
            document.getElementById('current-time').textContent =
                `${hours}:${minutes}:${seconds}`;
        }

        // Update immediately and then every second
        updateTime();
        setInterval(updateTime, 1000);
    });
</script>
