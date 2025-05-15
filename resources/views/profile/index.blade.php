@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-white">
    <div class="p-6 bg-gray-100">
        <h2 class="text-xl font-semibold mb-4">Settings</h2>

        @if (session('success'))
            <div class="mb-4 text-green-600 font-medium">{{ session('success') }}</div>
        @endif

        <form action="{{ route('settings.update') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-medium">Name</label>
                <input type="text" name="name" value="{{ old('name', $setting->name) }}" class="w-full px-4 py-2 border rounded" />
            </div>

            <div>
                <label class="block text-sm font-medium">Home Address</label>
                <input type="text" name="home_address" value="{{ old('home_address', $setting->home_address) }}" class="w-full px-4 py-2 border rounded" />
            </div>

            <div>
                <label class="block text-sm font-medium">Business Address</label>
                <input type="text" name="business_address" value="{{ old('business_address', $setting->business_address) }}" class="w-full px-4 py-2 border rounded" />
            </div>

            <div>
                <label class="block text-sm font-medium">Shopping Center</label>
                <input type="text" name="shopping_center" value="{{ old('shopping_center', $setting->shopping_center) }}" class="w-full px-4 py-2 border rounded" />
            </div>

            <div>
                <label class="block text-sm font-medium">Brand Name</label>
                <input type="text" name="brand_name" value="{{ old('brand_name', $setting->brand_name) }}" class="w-full px-4 py-2 border rounded" />
            </div>

            <div>
                <label class="block text-sm font-medium">Background Color</label>
                <input type="color" name="brand_bg_color" value="{{ old('brand_bg_color', $setting->brand_bg_color ?? '#22c55e') }}" />
            </div>

            <div>
                <label class="block text-sm font-medium">Brand Logo</label>
                <input type="file" name="brand_logo" accept="image/*" />
                @if($setting->brand_logo)
                    <img src="{{ asset('storage/'.$setting->brand_logo) }}" class="mt-2 h-16" />
                @endif
            </div>

            <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded-lg mb-">Save Settings</button>
        </form>
    </div>
</div>

@include('components.bottom-navbar')
@endsection