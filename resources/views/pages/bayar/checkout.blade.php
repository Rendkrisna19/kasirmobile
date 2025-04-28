@extends('layouts.app')

@section('content')
<section class="min-h-screen flex items-center justify-center bg-gray-100 p-4">
    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">

        <h2 class="text-2xl font-bold mb-6 text-center">Checkout</h2>

        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-3 mb-6 rounded text-sm">
                {{ session('success') }}
            </div>
        @endif

        <ul class="mb-6 space-y-2">
            @foreach($keranjang as $item)
                <li class="flex justify-between text-sm border-b pb-1">
                    <span>{{ $item['name'] }}</span>
                    <span>Rp {{ number_format($item['price'], 0, ',', '.') }}</span>
                </li>
            @endforeach
        </ul>

        <form action="{{ route('pages.bayar.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-medium mb-1">Total Harga + PPN (5%)</label>
                <input type="text" readonly value="Rp {{ number_format(collect($keranjang)->sum('price') * 1.05, 0, ',', '.') }}" class="w-full border rounded p-2 bg-gray-50 text-gray-700">
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Uang Bayar</label>
                <input type="number" name="bayar" class="w-full border rounded p-2" required placeholder="Masukkan nominal uang">
            </div>

            <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white font-semibold py-2 rounded">
                Bayar Sekarang
            </button>
        </form>

    </div>
</section>
@endsection
