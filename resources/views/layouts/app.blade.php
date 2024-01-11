<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if(isset($title))
        <title>{{ $title }}</title>
    @endif
    <!--livewire -->
    @livewireStyles
    <!-- Scripts -->
    @vite(['resources/sass/app.scss'])
    @vite(['resources/css/main.css'])
</head>
<body >
<div>
    @livewire("header")
    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>
    <footer>
        <p>ALl copywrite by naimul islam</p>
    </footer>
</div>

@livewireScripts
@vite(['resources/js/app.js'])
</body>
</html>
