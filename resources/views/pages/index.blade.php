@extends('layouts.app')

@section('content')

@php
    use App\Models\User;

    $user = null;
    if (session('user_id')) {
        $user = User::find(session('user_id'));
    }
@endphp

<!-- Tambahkan link CDN Lucide -->
<script src="https://unpkg.com/lucide@latest"></script>

<div class="min-h-screen bg-green-100 p-4 font-modify">

    <!-- Header -->
    <div class="flex items-center justify-between mb-4">
        <div>
            <h1 class="text-sm text-gray-700">
                Hello, 
                <span class="font-bold text-green-700">
                    {{ $user ? $user->username : 'Guest' }}
                </span>
            </h1>
        </div>
        <div class="bg-white p-2 rounded-full shadow">
            <i data-lucide="shopping-bag" class="text-green-500"></i>
        </div>
    </div>

    <!-- Search -->
    <div class="flex items-center bg-white rounded-full p-2 shadow mb-4">
        <input type="text" placeholder="Cari Daftar menu?" class="flex-1 outline-none px-2 text-sm">
        <button class="bg-green-500 p-2 rounded-full">
            <i data-lucide="map-pin" class="text-white h-5 w-5"></i>
        </button>
    </div>

    <!-- Banner -->
    <div class="bg-green-400 rounded-xl p-6 mb-4 shadow flex flex-col items-center text-white">
        <i data-lucide="gift" class="h-12 w-12 mb-2"></i>
        <h2 class="font-bold text-lg mb-1">Ppn 5% di setiap pembelian</h2>
        <p class="text-sm">lorem lorem </p>
    </div>

    <!-- Balance Info -->
    <div class="bg-white rounded-xl p-4 shadow flex justify-between items-center mb-4 text-sm">
        <div class="flex items-center gap-2">
            <i data-lucide="wallet" class="text-green-500 h-6 w-6"></i>
            <p class="font-bold">Rp {{ number_format($todayIncome, 0, ',', '.') }}</p>

            
            
        </div>
        <div class="flex items-center gap-2">
            <i data-lucide="star" class="text-yellow-400 h-6 w-6"></i>
            <div>
                <p class="text-gray-500">P20 Points</p>
                <p class="font-bold text-gray-800">1.500 pts</p>
            </div>
        </div>
    </div>

    <!-- Categories -->
    <div class="mb-4">
        <h2 class="font-bold text-lg text-gray-800 mb-2">Kategori</h2>
        <div class="grid grid-cols-4 gap-3">
            <div class="bg-white p-2 rounded-xl flex flex-col items-center justify-center shadow">
                <i data-lucide="beef" class="h-8 w-8 text-red-500 mb-1"></i>
                <p class="text-xs font-semibold text-center">Daging</p>
            </div>

            <div class="bg-white p-2 rounded-xl flex flex-col items-center justify-center shadow">
                <i data-lucide="fish" class="h-8 w-8 text-blue-500 mb-1"></i>
                <p class="text-xs font-semibold text-center">Seafood</p>
            </div>

            <div class="bg-white p-2 rounded-xl flex flex-col items-center justify-center shadow">
                <i data-lucide="leaf" class="h-8 w-8 text-green-500 mb-1"></i>
                <p class="text-xs font-semibold text-center">Sayur</p>
            </div>

            <div class="bg-white p-2 rounded-xl flex flex-col items-center justify-center shadow">
                <i data-lucide="flame" class="h-8 w-8 text-orange-500 mb-1"></i>
                <p class="text-xs font-semibold text-center">Rempah</p>
            </div>

            <div class="bg-white p-2 rounded-xl flex flex-col items-center justify-center shadow">
                <i data-lucide="drumstick" class="h-8 w-8 text-red-400 mb-1"></i>
                <p class="text-xs font-semibold text-center">Ayam</p>
            </div>

            <div class="bg-white p-2 rounded-xl flex flex-col items-center justify-center shadow">
                <i data-lucide="snowflake" class="h-8 w-8 text-blue-300 mb-1"></i>
                <p class="text-xs font-semibold text-center">Frozenfood</p>
            </div>

            <div class="bg-white p-2 rounded-xl flex flex-col items-center justify-center shadow">
                <i data-lucide="sprout" class="h-8 w-8 text-green-400 mb-1"></i>
                <p class="text-xs font-semibold text-center">Organic</p>
            </div>

            <div class="bg-white p-2 rounded-xl flex flex-col items-center justify-center shadow">
                <i data-lucide="milk" class="h-8 w-8 text-yellow-400 mb-1"></i>
                <p class="text-xs font-semibold text-center">Susu & Telur</p>
            </div>
        </div>
    </div>

    <!-- Bottom Navbar -->
  @include('components.bottom-navbar')
</div>

<!-- Aktifkan Lucide Icon -->
<script>
    lucide.createIcons();
</script>
@endsection
