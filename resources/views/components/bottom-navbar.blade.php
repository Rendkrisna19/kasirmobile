@php
    use Illuminate\Support\Str;
    $currentRoute = request()->path(); // Misalnya: 'kasir', 'bayar', 'dashboard/products'
@endphp

<div class="fixed bottom-0 left-0 right-0 bg-white p-3 flex justify-around items-center shadow-md">
    <a href="/kasir" class="flex flex-col items-center text-xs {{ $currentRoute == 'kasir' ? 'text-green-600' : 'text-gray-400' }}">
        <i data-lucide="home" class="h-5 w-5 mb-1"></i>
        Home
    </a>
    <a href="/bayar" class="flex flex-col items-center text-xs {{ $currentRoute == 'bayar' ? 'text-green-600' : 'text-gray-400' }}">
        <i data-lucide="layout-dashboard" class="h-5 w-5 mb-1"></i>
        Kasir
    </a>
    <!---->
    <a href="/dashboard/products" class="flex flex-col items-center text-xs {{ Str::startsWith($currentRoute, 'dashboard') ? 'text-green-600' : 'text-gray-400' }}">
        <i data-lucide="settings" class="h-5 w-5 mb-1"></i>
        Settings
    </a>
</div>
