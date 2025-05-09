@extends('layouts.app')

@section('content')
<section class="p-6 max-w-4xl mx-auto bg-white rounded-xl shadow-lg">
    <div class="text-center mb-8">
        <h2 class="text-3xl font-bold text-green-600">Rekapan Keuangan Harian</h2>
        <p class="text-gray-600">Laporan transaksi per hari</p>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full border border-green-200 shadow-sm rounded overflow-hidden">
            <thead>
                <tr class="bg-green-500 text-white text-left">
                    <th class="py-3 px-5 border-b border-green-300">Tanggal</th>
                    <th class="py-3 px-5 border-b border-green-300">Jumlah Transaksi</th>
                    <th class="py-3 px-5 border-b border-green-300">Total Pemasukan</th>
                </tr>
            </thead>
            <tbody class="bg-green-50">
                @forelse ($rekapan as $data)
                    <tr class="hover:bg-green-100 transition">
                        <td class="py-3 px-5 border-b border-green-200">
                            {{ \Carbon\Carbon::parse($data->tanggal)->translatedFormat('l, d F Y') }}
                        </td>
                        <td class="py-3 px-5 border-b border-green-200">{{ $data->jumlah_transaksi }}</td>
                        <td class="py-3 px-5 border-b border-green-200 text-green-700 font-semibold">
                            Rp {{ number_format($data->total_pemasukan, 0, ',', '.') }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="py-6 text-center text-gray-500">Belum ada data transaksi.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Tombol Kembali -->
    <div class="mt-6 text-center">
        <a href="{{ route('kasir') }}" class="inline-block px-6 py-2 bg-green-500 hover:bg-green-600 text-white font-semibold rounded shadow">
            ← Kembali ke Kasir
        </a>
    </div>
</section>
@endsection
