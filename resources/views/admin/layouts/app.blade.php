<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @include('admin.layouts.styles')
</head>
<body>
@include('admin.layouts.sidebar')

<!-- Content Wrapper -->
<div class="content-wrapper">
    <!-- Navbar -->
    @include('admin.layouts.navbar')

    <!-- Content -->
    <div class="content">
        @yield('content')
    </div>
</div>

@include('admin.layouts.scripts')
</body>
</html>
