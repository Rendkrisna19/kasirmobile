@extends('layouts.app')

@section('content')

<!-- Header -->
<header class="p-4 bg-green-500 text-white flex justify-between items-center">
    <h1 class="text-lg font-bold">Kasir</h1>
    <div class="flex items-center space-x-4">
        <i data-lucide="user" class="h-6 w-6"></i>
    </div>
</header>

<!-- Carousel kategori pakai ikon -->
<div class="overflow-x-auto whitespace-nowrap p-4 bg-white">
    <div class="inline-flex space-x-4 text-gray-700">
        <a href="#" onclick="filterCategory('daging')" class="flex flex-col items-center w-20">
            <i data-lucide="beef" class="h-8 w-8 mb-1"></i>
            <span class="text-xs">Daging</span>
        </a>
        <a href="#" onclick="filterCategory('seafood')" class="flex flex-col items-center w-20">
            <i data-lucide="fish" class="h-8 w-8 mb-1"></i>
            <span class="text-xs">Seafood</span>
        </a>
        <a href="#" onclick="filterCategory('sayur')" class="flex flex-col items-center w-20">
            <i data-lucide="leaf" class="h-8 w-8 mb-1"></i>
            <span class="text-xs">Sayur</span>
        </a>
    </div>
</div>


<!-- List Produk -->
<section class="p-4" id="product-section">
    <h2 class="text-lg font-semibold mb-4">Produk Tersedia</h2>
    <div class="grid grid-cols-2 gap-4" id="product-list">
        <!-- Produk akan dimuat disini -->
        <!-- Daging Produk -->
        <div class="border rounded-lg p-2 flex flex-col items-center product daging">
            <img src="{{ asset('images/daging.png') }}" class="h-20 w-20 object-cover mb-2" alt="Daging">
            <h3 class="text-sm font-medium">Steak Sapi</h3>
            <span class="text-green-600 font-bold text-xs">Rp 120.000</span>
        </div>
        <div class="border rounded-lg p-2 flex flex-col items-center product daging">
            <img src="{{ asset('images/daging.png') }}" class="h-20 w-20 object-cover mb-2" alt="Daging">
            <h3 class="text-sm font-medium">Steak Ayam</h3>
            <span class="text-green-600 font-bold text-xs">Rp 50.000</span>
        </div>
        <div class="border rounded-lg p-2 flex flex-col items-center product daging">
            <img src="{{ asset('images/daging.png') }}" class="h-20 w-20 object-cover mb-2" alt="Daging">
            <h3 class="text-sm font-medium">Steak Sapi</h3>
            <span class="text-green-600 font-bold text-xs">Rp 120.000</span>
        </div>
        <div class="border rounded-lg p-2 flex flex-col items-center product daging">
            <img src="{{ asset('images/daging.png') }}" class="h-20 w-20 object-cover mb-2" alt="Daging">
            <h3 class="text-sm font-medium">Steak Ayam</h3>
            <span class="text-green-600 font-bold text-xs">Rp 50.000</span>
        </div>
        <div class="border rounded-lg p-2 flex flex-col items-center product daging">
            <img src="{{ asset('images/daging.png') }}" class="h-20 w-20 object-cover mb-2" alt="Daging">
            <h3 class="text-sm font-medium">Steak Sapi</h3>
            <span class="text-green-600 font-bold text-xs">Rp 120.000</span>
        </div>
        <div class="border rounded-lg p-2 flex flex-col items-center product daging">
            <img src="{{ asset('images/daging.png') }}" class="h-20 w-20 object-cover mb-2" alt="Daging">
            <h3 class="text-sm font-medium">Steak Ayam</h3>
            <span class="text-green-600 font-bold text-xs">Rp 50.000</span>
        </div>

        <!-- Seafood Produk -->
        <div class="border rounded-lg p-2 flex flex-col items-center product seafood hidden">
            <img src="{{ asset('images/seafood.png') }}" class="h-20 w-20 object-cover mb-2" alt="Seafood">
            <h3 class="text-sm font-medium">Bbq sapi</h3>
            <span class="text-green-600 font-bold text-xs">Rp 85.000</span>
        </div>
        <div class="border rounded-lg p-2 flex flex-col items-center product seafood hidden">
            <img src="{{ asset('images/seafood.png') }}" class="h-20 w-20 object-cover mb-2" alt="Seafood">
            <h3 class="text-sm font-medium">Ikan Salmon</h3>
            <span class="text-green-600 font-bold text-xs">Rp 250.000/kg</span>
        </div>

        <!-- Sayur Produk -->
        <div class="border rounded-lg p-2 flex flex-col items-center product sayur hidden">
            <img src="{{ asset('images/sayur.png') }}" class="h-20 w-20 object-cover mb-2" alt="Sayur">
            <h3 class="text-sm font-medium">Bayam</h3>
            <span class="text-green-600 font-bold text-xs">Rp 15.000/kg</span>
        </div>
        <div class="border rounded-lg p-2 flex flex-col items-center product sayur hidden">
            <img src="{{ asset('images/sayur.png') }}" class="h-20 w-20 object-cover mb-2" alt="Sayur">
            <h3 class="text-sm font-medium">Kangkung</h3>
            <span class="text-green-600 font-bold text-xs">Rp 10.000/kg</span>
        </div>
    </div>
    @include('components.bottom-navbar')
</section>

<!-- JavaScript untuk filter kategori -->
<script>
    function filterCategory(category) {
        // Sembunyikan semua produk
        const allProducts = document.querySelectorAll('.product');
        allProducts.forEach(product => product.classList.add('hidden'));

        // Tampilkan produk sesuai kategori
        const selectedProducts = document.querySelectorAll(`.product.${category}`);
        selectedProducts.forEach(product => product.classList.remove('hidden'));
    }

    // Default category (optional)
    filterCategory('daging');
</script>

<script src="https://unpkg.com/lucide@latest"></script>
<script>
    lucide.createIcons();
</script>

@endsection
