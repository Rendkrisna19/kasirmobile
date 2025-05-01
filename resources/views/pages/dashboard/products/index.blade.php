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

    <!-- Konten Utama -->
    <div class="px-4 py-6 bg-green-50 min-h-screen">
        <h2 class="text-xl sm:text-2xl font-bold text-green-800 mb-4">Daftar Produk</h2>

        @if(session('success'))
            <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('products.create') }}"
           class="inline-block bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded mb-4">
            Tambah Produk
        </a>

        <!-- Table Responsive -->
        <div class="w-full overflow-x-auto">
            <table class="min-w-[640px] sm:min-w-full divide-y divide-gray-200 bg-white shadow-md rounded-lg">
        
                <thead class="bg-green-200 text-green-800 text-sm sm:text-base">
                    <tr>
                        <th class="px-4 py-3 text-left">Gambar</th>
                        <th class="px-4 py-3 text-left">Nama</th>
                        <th class="px-4 py-3 text-left">Kategori</th>
                        <th class="px-4 py-3 text-left">Harga</th>
                        <th class="px-4 py-3 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-sm sm:text-base">
                    @forelse($products as $product)
                        <tr class="hover:bg-green-50">
                            <td class="px-4 py-3">
                                <img src="{{ asset($product->image) }}" alt="Gambar Produk"
                                     class="w-14 h-14 object-cover rounded shadow-sm">
                            </td>
                            <td class="px-4 py-3">{{ $product->name }}</td>
                            <td class="px-4 py-3">{{ $product->category }}</td>
                            <td class="px-4 py-3">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                            <td class="px-4 py-3 space-y-1 sm:space-y-0 sm:space-x-2">
                                <a href="{{ route('products.edit', $product->id) }}"
                                   class="inline-block bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded text-xs sm:text-sm">
                                    Edit
                                </a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Yakin ingin menghapus produk ini?')"
                                            class="inline-block bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs sm:text-sm">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-3 text-center text-gray-500">Belum ada produk.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @include("components.bottom-navbar")


    <script src="https://unpkg.com/lucide@latest"></script>
    <script>lucide.createIcons();</script>
@endsection
