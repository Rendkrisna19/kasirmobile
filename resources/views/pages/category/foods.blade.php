@extends('layouts.app')

@section('content')
<div class="p-4">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold text-green-700 ">Foods</h1>
        <a href="/kasir" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg transition">
            ← Kembali
        </a>
    </div>

    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
        @foreach($products as $product)
        <div class="bg-green-50 p-4 shadow-md rounded-xl hover:shadow-lg transition duration-300">
            <img src="{{ asset($product->image) }}" class="w-full h-32 object-cover rounded mb-3">
            <h2 class="text-green-800 font-semibold text-base truncate">{{ $product->name }}</h2>
            <p class="text-green-600 text-sm">Rp{{ number_format($product->price, 0, ',', '.') }}</p>
        </div>
        @endforeach
    </div>
</div>
@endsection
