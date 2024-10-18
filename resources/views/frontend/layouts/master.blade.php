<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Head Start -->
    <x-frontend.head />

    @stack('styles')
</head>

<body>
    {{-- Pre Loader Start --}}
    <x-frontend.pre-loader />
    {{-- Pre Loader End --}}

    <!-- Header Start -->
    <x-frontend.header />
    <!-- Header End -->

    <!-- Page Wrapper Start -->
    @yield('content')
    <!-- Page Wrapper End -->

    <!-- Start Footer Start -->
    <x-frontend.footer />
    <!-- End Footer End -->

    <!-- Start Main JS  -->
    <x-frontend.main-js />
    <!-- End Main JS  -->

    {{-- Custom Js --}}
    @stack('scripts')
</body>

</html>
