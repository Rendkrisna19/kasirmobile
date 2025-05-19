@extends('layouts.app') {{-- Sesuaikan dengan layout milikmu --}}

@section('head')
    <!-- Heroicons CDN -->
@endsection

@section('content')
<div class="min-h-screen bg-green-50 flex flex-col items-center py-8 px-4">

  <!-- Header -->
  <header class="w-full max-w-md mb-8 flex items-center justify-between">
    <a href="{{ url('/kasir') }}" class="flex items-center text-green-600 hover:text-green-700 font-semibold">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
      </svg>
      Back
    </a>
    <h1 class="text-xl font-bold text-green-700">Edit Profil</h1>
    <div class="w-6"></div> {{-- Spacer agar judul tetap di tengah --}}
  </header>

  <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-6">

    @if(session('success'))
      <div class="bg-green-100 text-green-700 p-3 rounded mb-6 text-center font-medium">
        {{ session('success') }}
      </div>
    @endif

    <div class="flex justify-center mb-8">
      <div class="relative">
        <img src="{{ $user->photo ? asset('uploads/profile/' . $user->photo) : asset('default-user.png') }}" 
             class="w-28 h-28 rounded-full border-4 border-green-500 object-cover shadow-md" 
             alt="Foto Profil">
        <label for="photo" class="absolute bottom-0 right-0 bg-green-500 text-white p-2 rounded-full cursor-pointer shadow-lg hover:bg-green-600 transition">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536M9 11l3 3L19.5 6.5a2.121 2.121 0 00-3-3L9 11z" />
          </svg>
        </label>
      </div>
    </div>

    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="space-y-6">
      @csrf

      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">Username</label>
        <input type="text" name="username" value="{{ old('username', $user->username) }}" 
               class="w-full mt-1 p-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-500" required>
      </div>

      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">Foto Baru</label>
        <input type="file" id="photo" name="photo" accept="image/*" class="w-full mt-1 text-sm text-gray-600">
      </div>

      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">Password Baru</label>
        <input type="password" name="password" placeholder="Biarkan kosong jika tidak diubah" 
               class="w-full mt-1 p-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
      </div>

      <button type="submit" 
              class="w-full bg-green-500 hover:bg-green-600 text-white font-semibold py-3 rounded-lg shadow-md transition">
        Simpan Perubahan
      </button>
    </form>
  </div>
</div>
@endsection
