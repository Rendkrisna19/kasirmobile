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

<div class="min-h-screen bg-green-200 p-4 font-modify">

    <!-- Header -->
    <div class="flex items-center justify-between mb-4 opacity-0 animate-fadeInUp" style="animation-delay: 0.1s; animation-fill-mode: forwards;">
        <div>
            <h1 class="text-sm text-gray-700">
                Hello, 
                <span class="font-bold text-green-700">
                    {{ $user ? $user->username : 'Guest' }}
                </span>
            </h1>
        </div>
        <a href="/kasir/profile" class="inline-block">
            <div class="bg-white p-2 rounded-full shadow hover:shadow-lg transition">
                <i data-lucide="user" class="text-green-500"></i>
            </div>
        </a>
    </div>

    <!-- Search -->
    <div class="flex items-center bg-white rounded-full p-2 shadow mb-4 opacity-0 animate-fadeInUp" style="animation-delay: 0.3s; animation-fill-mode: forwards;">
        <input type="text" placeholder="Cari Daftar menu?" class="flex-1 outline-none px-2 text-sm">
        <button class="bg-green-500 p-2 rounded-full hover:bg-green-600 transition">
            <i data-lucide="map-pin" class="text-white h-5 w-5"></i>
        </button>
    </div>

    <!-- Carousel Banner -->
    <div class="relative overflow-hidden rounded-xl shadow-lg mb-6 opacity-0 animate-fadeInUp" style="animation-delay: 0.5s; animation-fill-mode: forwards; max-w-md mx-auto bg-green-600 text-white">
        <div id="carousel" class="flex transition-transform duration-700">
            <!-- Slide 1 -->
            <div class="flex-shrink-0 w-full p-6 flex flex-col items-center text-center bg-green-300">
                <i data-lucide="gift" class="h-12 w-12 mb-2"></i>
                <h2 class="font-bold text-lg mb-1">Ppn 5% di setiap pembelian</h2>
                <p class="text-sm">Nikmati diskon PPN 5% untuk semua transaksi</p>
            </div>
            <!-- Slide 2 -->
            <div class="flex-shrink-0 w-full p-6 flex flex-col items-center text-center bg-green-300">
                <i data-lucide="star" class="h-12 w-12 mb-2"></i>
                <h2 class="font-bold text-lg mb-1">Promo Spesial Minggu Ini</h2>
                <p class="text-sm">Dapatkan gratis minuman untuk pembelian tertentu</p>
            </div>
            <!-- Slide 3 -->
            <div class="flex-shrink-0 w-full p-6 flex flex-col items-center text-center bg-green-300">
                <i data-lucide="truck" class="h-12 w-12 mb-2"></i>
                <h2 class="font-bold text-lg mb-1">Gratis Ongkir</h2>
                <p class="text-sm">Pengiriman gratis untuk wilayah Medan</p>
            </div>
        </div>

        <!-- Controls -->
        <button id="prev" class="absolute left-2 top-1/2 -translate-y-1/2 bg-green-700 bg-opacity-60 rounded-full p-2 hover:bg-opacity-90 transition">
            <i data-lucide="chevron-left" class="text-white h-5 w-5"></i>
        </button>
        <button id="next" class="absolute right-2 top-1/2 -translate-y-1/2 bg-green-700 bg-opacity-60 rounded-full p-2 hover:bg-opacity-90 transition">
            <i data-lucide="chevron-right" class="text-white h-5 w-5"></i>
        </button>
    </div>

    <!-- Balance Info -->
    <div class="bg-white rounded-xl p-4 shadow flex justify-between items-center mb-4 text-sm opacity-0 animate-fadeInUp" style="animation-delay: 0.7s; animation-fill-mode: forwards;">
        <div class="flex items-center gap-2">
            <i data-lucide="wallet" class="text-green-500 h-6 w-6"></i>
            <p class="font-bold">Rp {{ number_format($todayIncome, 0, ',', '.') }}</p>
        </div>
        <div class="flex items-center gap-2">
            <i data-lucide="book" class="text-yellow-400 h-6 w-6"></i>
            <div>
                <p class="text-gray-500">Rekapan bulanan</p>
                <a href="/rekap" class="font-bold text-gray-800 hover:underline">klik</a>
            </div>
        </div>
    </div>

    <!-- Categories -->
    <div class="mb-4 opacity-0 animate-fadeInUp" style="animation-delay: 0.9s; animation-fill-mode: forwards;">
        <h2 class="font-bold text-lg text-gray-800 mb-2">Kategori</h2>
        <div class="grid grid-cols-3 gap-3">
            <a href="{{ route('category.foods') }}">
                <div class="bg-white p-3 rounded-xl flex flex-col items-center justify-center shadow hover:bg-gray-100 transition">
                    <i data-lucide="pizza" class="h-8 w-8 text-red-500 mb-1"></i>
                    <p class="text-xs font-semibold text-center">Foods</p>
                </div>
            </a>

            <a href="{{ route('category.drinks') }}">
                <div class="bg-white p-3 rounded-xl flex flex-col items-center justify-center shadow hover:bg-gray-100 transition">
                    <i data-lucide="cup-soda" class="h-8 w-8 text-blue-500 mb-1"></i>
                    <p class="text-xs font-semibold text-center">Drinks</p>
                </div>
            </a>

            <a href="{{ route('category.snacks') }}">
                <div class="bg-white p-3 rounded-xl flex flex-col items-center justify-center shadow hover:bg-gray-100 transition">
                    <i data-lucide="cookie" class="h-8 w-8 text-yellow-500 mb-1"></i>
                    <p class="text-xs font-semibold text-center">Snacks</p>
                </div>
            </a>
        </div>
    </div>

    <!-- Bottom Navbar -->
    @include('components.bottom-navbar')
</div>

<!-- Aktifkan Lucide Icon -->
<script>
    lucide.createIcons();
</script>

<!-- Animasi CSS -->
<style>
@keyframes fadeInUp {
    0% {
        opacity: 0;
        transform: translateY(20px) scale(0.95);
    }
    100% {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
}
.animate-fadeInUp {
    animation: fadeInUp 0.6s ease forwards;
}
</style>

<!-- Carousel Script -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const carousel = document.getElementById('carousel');
        const slides = carousel.children;
        const total = slides.length;
        let currentIndex = 0;
        const slideWidth = carousel.clientWidth;

        function updateCarousel() {
            carousel.style.transform = `translateX(-${currentIndex * slideWidth}px)`;
        }

        function nextSlide() {
            currentIndex = (currentIndex + 1) % total;
            updateCarousel();
        }

        function prevSlide() {
            currentIndex = (currentIndex - 1 + total) % total;
            updateCarousel();
        }

        document.getElementById('next').addEventListener('click', () => {
            nextSlide();
            resetAutoSlide();
        });

        document.getElementById('prev').addEventListener('click', () => {
            prevSlide();
            resetAutoSlide();
        });

        // Auto slide every 4 seconds
        let autoSlide = setInterval(nextSlide, 4000);

        function resetAutoSlide() {
            clearInterval(autoSlide);
            autoSlide = setInterval(nextSlide, 4000);
        }

        // On window resize, update slideWidth
        window.addEventListener('resize', () => {
            updateCarousel();
        });

        // Initial update
        updateCarousel();
    });
</script>

@endsection
