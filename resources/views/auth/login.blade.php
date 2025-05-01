@extends('layouts.app')

@section('title', 'Login')

@section('content')

<style>
    body {
        margin: 0;
        padding: 0;
        background: #d1fae5;
        font-family: 'Poppins', sans-serif;
    }

    .container-login {
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        align-items: center;
        position: relative;
        background: #d1fae5;
    }

    /* Header putih */
    .header-login {
        width: 100%;
        background: #fff;
        padding: 1.5rem 1rem 2rem 1rem;
        position: relative;
        text-align: center;
    }

    /* Titik-titik */
    .dots {
        position: absolute;
        top: 1rem;
        display: flex;
        gap: 5px;
        z-index: 20;
    }

    .dots.left {
        left: 1rem;
        z-index: 10;
    }

    .dots.right {
        right: 1rem;
        z-index: 20;
    }

    .dot {
        width: 6px;
        height: 6px;
        background: #047857; /* hijau tua */
        border-radius: 50%;
        z-index: 20;
    }

    /* Logo bulat */
    .logo-circle {
        padding: 10px;
        width: 80px;
        height: 80px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
        margin-bottom: 0.5rem;
        z-index: 10;
        position: relative;
    }

    .logo-circle img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    /* Shape robekan */
    .shape {
        width: 100%;
        height: 50px;
        background: url('{{ asset('asset/img/shape.png') }}') no-repeat center top;
        background-size: cover;
        margin-top: -1px;
    }

    /* Card login */
    .card-login {
        width: 90%;
        max-width: 400px;
        background: #d1fae5;
        padding: 2rem 1.5rem;
        border-radius: 20px;
        margin-top: 1rem;
        text-align: center;
    }

    /* Input form */
    .input-login {
       
        border: none;
        border-radius: 9999px;
        padding: 0.75rem 1.5rem;
        margin-top: 1rem;
        width: 100%;
        color: #065f46;
        font-weight: 500;
        outline: none;
    }

    .input-login::placeholder {
        color: #065f46;
    }

    /* Tombol login */
    .btn-login {
        background: #047857;
        border-radius: 9999px;
        padding: 0.75rem;
        margin-top: 1rem;
        width: 100%;
        color: white;
        font-weight: bold;
        transition: background 0.3s ease;
    }

    .btn-login:hover {
        background: #065f46;
    }

    /* Footer */
    .footer-login {
        font-size: 0.75rem;
        color: #047857;
        margin-top: 1.5rem;
    }
</style>

<div class="container-login font-modify">
    <!-- Titik-titik Kiri -->
    <div class="dots left">
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
    </div>

    <!-- Titik-titik Kanan -->
    <div class="dots right">
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
    </div>

    <!-- Header -->
    <div class="header-login">
        <div class="logo-circle">
            <img src="{{ asset('asset/img/logo.png') }}" alt="Logo">
        </div>
        <h2 class="text-green-800 font-bold text-lg">LatteCorner Kasir<br>POS Caffe</h2>
    </div>

    <!-- Shape robekan -->
    <div class="shape"></div>

    <!-- Card Login -->
    <div class="card-login">
        <h1 class="text-2xl font-bold text-green-900">Login</h1>
        <p class="text-green-700 mt-1 text-sm">Sign in to continue</p>

        <!-- Form login -->
        <form action="{{ route('login') }}" method="POST" class="space-y-4">
            @csrf
            <input type="text" name="username" placeholder="Username" class="input-login bg-green-300" required>
            <input type="password" name="password" placeholder="Password" class="input-login bg-green-300" required>
            <button type="submit" class="btn-login">
                Log In
            </button>
        </form>

        @if($errors->any())
            <div class="text-red-500 text-sm mt-2">
                {{ $errors->first() }}
            </div>
        @endif

        <div class="footer-login">
            <a href="#" class="hover:underline">Forgot Password</a>
            <p class="mt-1">www.kasirCaffeCorner.com</p>
        </div>
    </div>
</div>


@endsection