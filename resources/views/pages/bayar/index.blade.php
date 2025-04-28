@extends('layouts.app')

@section('content')

<!-- Header -->
<header class="p-4 bg-green-500 text-white flex justify-between items-center">
    <h1 class="text-lg font-bold">Kasir</h1>
    <div class="flex items-center space-x-4">
        <i data-lucide="user" class="h-6 w-6"></i>
    </div>
</header>

<!-- Carousel kategori -->
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

<section class="p-4">
    <h2 class="text-lg font-semibold mb-4">Kasir Pembayaran</h2>

    @if (session('success'))
        <div class="bg-green-100 p-2 mb-4 rounded">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="bg-red-100 p-2 mb-4 rounded">{{ session('error') }}</div>
    @endif

    <form action="{{ route('pages.bayar.add') }}" method="POST">
        @csrf
        <div class="grid grid-cols-2 gap-4 mb-4">
            @foreach($products as $product)
                <div class="border p-2 rounded product {{ $product->category }}">
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="selected_products[]" value="{{ $product->id }}">
                        <div>
                            <div class="font-semibold">{{ $product->name }}</div>
                            <div class="text-xs">{{ $product->category }}</div>
                            <div class="text-green-600 font-bold text-xs">Rp {{ number_format($product->price, 0, ',', '.') }}</div>
                        </div>
                    </label>
                </div>
            @endforeach
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Pilih & Checkout</button>
    </form>
    @include('components.bottom-navbar')
</section>



<!-- JavaScript filter kategori -->
<script>
    function filterCategory(category) {
        const allProducts = document.querySelectorAll('.product');
        allProducts.forEach(product => product.classList.add('hidden'));

        const selectedProducts = document.querySelectorAll(`.product.${category}`);
        selectedProducts.forEach(product => product.classList.remove('hidden'));
    }

    // Default tampilkan kategori daging
    filterCategory('daging');
</script>

<script src="https://unpkg.com/lucide@latest"></script>
<script>
    lucide.createIcons();
</script>

@endsection
