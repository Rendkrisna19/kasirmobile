<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Kasir Corner')</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- jQuery (required) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>



</head>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Jost:ital,wght@0,100..900;1,100..900&display=swap');

.font-modify{
    font-family: "Inter", sans-serif;
    font-optical-sizing: auto;
}
 /* Pagination styling with green theme */
    .dataTables_wrapper .dataTables_paginate .paginate_button {
        padding: 6px 12px;
        margin: 2px;
        border-radius: 6px;
        background-color: #ecfdf5; /* bg-green-50 */
        color: #047857; /* text-green-700 */
        border: 1px solid #a7f3d0; /* border-green-200 */
        transition: background 0.3s, color 0.3s;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        background-color: #d1fae5; /* bg-green-100 */
        color: #065f46; /* text-green-800 */
        border-color: #6ee7b7;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
        background-color: #34d399; /* bg-green-400 */
        color: white !important;
        border: 1px solid #10b981; /* border-green-500 */
    }

    .dataTables_wrapper .dataTables_filter input {
        border: 1px solid #a7f3d0;
        border-radius: 6px;
        padding: 5px;
        margin-left: 10px;
    }

    .dataTables_wrapper .dataTables_length select {
        border: 1px solid #a7f3d0;
        border-radius: 6px;
        padding: 5px;
        margin-left: 10px;
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @stack('scripts')

</body>
</html>
