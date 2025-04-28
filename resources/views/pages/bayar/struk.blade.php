@extends('layouts.app')

@section('content')
<section class="p-6 max-w-md mx-auto bg-white rounded shadow text-center">

    {{-- Logo --}}
    <div class="flex justify-center mb-4">
        <img src="{{ asset('asset/img/logo.png') }}" alt="Logo Cafe" class="h-20">
    </div>

    {{-- Nama Cafe --}}
    <h2 class="text-xl font-bold">Caffe Korner</h2>
    <div class="text-sm mb-2 leading-tight">
        Jl. Erlangga No.18, Ngadirejo, Kediri, Jawa Timur 64129<br>
        Telp: 0813-8452-1126
    </div>

    <hr class="my-4 border-dashed">

    {{-- Daftar Item --}}
    <ul class="text-left mb-4">
        @foreach($keranjang as $item)
            <li class="flex justify-between mb-1">
                <span>{{ $item['name'] }}</span>
                <span>Rp {{ number_format($item['price'], 0, ',', '.') }}</span>
            </li>
        @endforeach
    </ul>

    <hr class="my-4 border-dashed">

    {{-- Totalan --}}
    <div class="text-left mb-2 flex justify-between">
        <span>Subtotal:</span>
        <span>Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
    </div>
    <div class="text-left mb-2 flex justify-between">
        <span>PPN 5%:</span>
        <span>Rp {{ number_format($tax, 0, ',', '.') }}</span>
    </div>
    <div class="text-left mb-2 flex justify-between font-semibold">
        <span>Total Bayar:</span>
        <span>Rp {{ number_format($grandTotal, 0, ',', '.') }}</span>
    </div>
    <div class="text-left mb-2 flex justify-between">
        <span>Uang Diberikan:</span>
        <span>Rp {{ number_format($bayar, 0, ',', '.') }}</span>
    </div>
    <div class="text-left mb-2 flex justify-between text-green-600 font-bold">
        <span>Kembalian:</span>
        <span>Rp {{ number_format($change, 0, ',', '.') }}</span>
    </div>

    <hr class="my-4 border-dashed">

    <p class="mt-4 text-sm italic">Selamat Menikmati</p>

</section>
@endsection
