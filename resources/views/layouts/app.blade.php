<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Kasir Corner')</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Jost:ital,wght@0,100..900;1,100..900&display=swap');

.font-modify{
    font-family: "Inter", sans-serif;
    font-optical-sizing: auto;
}
</style>
<body>
    <!-- Navbar -->
    {{-- @include('partials.navbar') --}}

    <div class="container mt-4 font-modify">
        @yield('content')
    </div>

    <!-- Footer -->
    {{-- @include('partials.footer') --}}

    <!-- JS Lokal / CDN -->
</body>
</html>
