@extends('layouts.app')

@section('content')
    @php
        use App\Models\User;

        $user = null;
        if (session('user_id')) {
            $user = User::find(session('user_id'));
        }
    @endphp

    <!-- Header -->
    <header class="p-4 bg-green-500 text-white flex justify-between items-center">
        <h1 class="text-lg font-bold">Kasir</h1>
        <div class="flex items-center space-x-2">
            <i data-lucide="user" class="h-6 w-6"></i>
            @if($user)
                <span class="text-sm font-medium">{{ $user->name }}</span>
            @else
                <span class="text-sm italic text-white">Guest</span>
            @endif
        </div>
    </header>

    <!-- Carousel kategori -->
<div class="overflow-x-auto whitespace-nowrap p-4 bg-white border-b border-gray-200">
    <div class="inline-flex space-x-4 text-gray-700" id="categoryButtons">
        <a href="#" onclick="filterCategory('Foods', this)" class="category-btn active-category flex flex-col items-center w-20">
            <i data-lucide="utensils-crossed" class="h-8 w-8 mb-1"></i>
            <span class="text-xs">Foods</span>
        </a>
        <a href="#" onclick="filterCategory('Drink', this)" class="category-btn flex flex-col items-center w-20">
            <i data-lucide="cup-soda" class="h-8 w-8 mb-1"></i>
            <span class="text-xs">Drink</span>
        </a>
        <a href="#" onclick="filterCategory('Snack', this)" class="category-btn flex flex-col items-center w-20">
            <i data-lucide="cookie" class="h-8 w-8 mb-1"></i>
            <span class="text-xs">Snack</span>
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
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4 mb-8">
                @foreach($products as $product)
                <label
                    class="product {{ $product->category }} relative bg-white shadow-md rounded-lg border border-gray-200 hover:shadow-lg transition-all duration-300 cursor-pointer overflow-hidden group">
                        <input type="checkbox" name="selected_products[]" value="{{ $product->id }}"
                            class="absolute top-3 left-3 w-5 h-5 text-green-600 focus:ring-2 focus:ring-green-500 rounded border-gray-300 z-10 transition duration-200 ease-in-out">

                        <div class="p-4 pt-6">
                            @if ($product->image)
                                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}"
                                    class="w-full h-32 object-cover rounded-md mb-4 group-hover:scale-105 transition-transform duration-300">
                            @else
                                <div
                                    class="w-full h-32 bg-gray-100 flex items-center justify-center rounded-md mb-4 text-gray-500 text-sm">
                                    No Image
                                </div>
                            @endif

                            <h3 class="text-md font-semibold text-gray-800">{{ $product->name }}</h3>
                            <p class="text-sm text-gray-500 mb-1">{{ $product->category }}</p>
                            <p class="text-green-600 font-bold text-sm">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                        </div>
                    </label>
                @endforeach
            </div>

            <div class="text-center">
                <button type="submit"
                    class="bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-3 rounded-lg shadow-md transition duration-300 mb-20">
                    Lanjutkan
                </button>
            </div>
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
        filterCategory('Foods');
    </script>

    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        lucide.createIcons();
    </script>

@endsection