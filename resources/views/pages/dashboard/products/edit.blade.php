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
<div class="container mx-auto px-4 py-6 bg-green-50 min-h-screen">
    <h2 class="text-2xl font-bold text-green-800 mb-6 flex items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none"
             viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M11 5h2m-1 0v14m-7-7h14" />
        </svg>
        Edit Produk
    </h2>

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data"
          class="bg-white shadow-md rounded-lg p-6 space-y-5">
        @csrf
        @method('PUT')

        <div>
            <label for="name" class="block text-sm font-medium text-green-900 mb-1">Nama Produk</label>
            <input type="text" name="name" id="name"
                   class="w-full px-4 py-2 border border-green-300 rounded focus:outline-none focus:ring-2 focus:ring-green-400"
                   required value="{{ old('name', $product->name) }}">
        </div>

        <div>
            <label for="category" class="block text-sm font-medium text-green-900 mb-1">Kategori</label>
            <input type="text" name="category" id="category"
                   class="w-full px-4 py-2 border border-green-300 rounded focus:outline-none focus:ring-2 focus:ring-green-400"
                   required value="{{ old('category', $product->category) }}">
        </div>

        <div>
            <label for="price" class="block text-sm font-medium text-green-900 mb-1">Harga</label>
            <input type="number" name="price" id="price"
                   class="w-full px-4 py-2 border border-green-300 rounded focus:outline-none focus:ring-2 focus:ring-green-400"
                   required value="{{ old('price', $product->price) }}">
        </div>

        <div>
            <label class="block text-sm font-medium text-green-900 mb-1">Gambar Lama</label>
            <img src="{{ asset($product->image) }}" alt="Gambar Produk"
                 class="w-24 h-24 object-cover rounded shadow">
        </div>

        <div>
            <label for="image" class="block text-sm font-medium text-green-900 mb-1">Ganti Gambar (Opsional)</label>
            <input type="file" name="image" id="image"
                   class="w-full px-4 py-2 border border-green-300 rounded file:bg-green-100 file:border-0 file:px-4 file:py-2 file:rounded file:text-green-800 file:cursor-pointer">
        </div>

        <div class="flex gap-4">
            <button type="submit"
                    class="flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white font-semibold px-4 py-2 rounded shadow">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M5 13l4 4L19 7"/>
                </svg>
                Update
            </button>

            <a href="{{ route('dashboard.products') }}"
               class="flex items-center gap-2 bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold px-4 py-2 rounded shadow">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M15 19l-7-7 7-7"/>
                </svg>
                Kembali
            </a>
        </div>
    </form>
</div>

@endsection
