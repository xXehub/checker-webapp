<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- fontawesome --}}
    <script src="https://kit.fontawesome.com/a45f001349.js" crossorigin="anonymous"></script>
    {{-- css --}}
    <script src="https://kit.fontawesome.com/a45f001349.js" crossorigin="anonymous"></script>

    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('assets/css/tabler.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/tabler-flags.min.css?1667333929') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/tabler-payments.min.css?1667333929') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/tabler-vendors.min.css?1667333929') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/demo.min.css?1667333929') }}">

    {{-- <link rel="stylesheet" href="{{ asset('assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/extra-libs/datatables.net-bs4/css/responsive.dataTables.min.css') }}">

 --}}

    {{-- <script src="{{ asset('assets/extra-libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/libs/list.js/dist/list.min.js?1684106062') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: Inter, -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }
    </style>

    {{-- sssss --}}
    {{-- <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet"> --}}
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script> --}}
    {{-- <script src="{{ asset('assets/js/sihub-datatable.js') }}"></script> --}}

    <title>{{ config('app.name', 'sihub-checker-webapp') }}</title>
    @vite('resources/js/app.js')
</head>

<body>
    {{-- @include('sweetalert::alert') --}}

    <script src="{{ asset('assets/js/demo-theme.min.js?1667333929') }}"></script>
    <div id="app">
        {{-- gawe nyeluk component navbar --}}
        <x-navbar />
        <main class="py-4">
            {{ $slot }}
        </main>
    </div>
</body>
<!-- Libs JS -->
<script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js?1684106062') }}"></script>
<script src="{{ asset('assets/libs/jsvectormap/dist/js/jsvectormap.min.js?1667333929') }}"></script>
<script src="{{ asset('assets/libs/jsvectormap/dist/maps/world.js?1667333929') }}"></script>
<script src="{{ asset('assets/libs/jsvectormap/dist/maps/world-merc.js?1667333929') }}"></script>

<script src="{{ asset('assets/libs/nouislider/dist/nouislider.min.js?1667333929') }}" defer></script>
<script src="{{ asset('assets/libs/litepicker/dist/litepicker.js?1667333929') }}" defer></script>
<script src="{{ asset('assets/libs/tom-select/dist/js/tom-select.base.min.js?1667333929') }}" defer></script>
<script src="{{ asset('assets/js/tabler.min.js?1667333929') }}"></script>
<script src="{{ asset('assets/js/demo.min.js?1667333929') }}"></script>

</html>
