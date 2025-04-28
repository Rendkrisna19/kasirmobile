<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BayarController;

Route::get('/', [AuthController::class, 'loginPage'])->name('login.page');
Route::post('/', [AuthController::class, 'login'])->name('login');

Route::get('/kasir', function () {
    if (!session('user_id')) {
        return redirect('/');
    }
    return view('pages.index'); 
})->name('kasir');
Route::get('/kasir', [BayarController::class, 'income'])->name('kasir');


Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/pembayaran', function () {
    return view('pages.bayar');
});// pembaayaran kasir maksudnya daftar pembayaran kasir aplikasi 


// Route::get('/bayar', [BayarController::class, 'index'])->name('pages.bayar.index');
// Route::post('/bayar/proses', [BayarController::class, 'proses'])->name('bayar.proses'); // ini untuk setelah pilih produk
// Route::get('/bayar/checkout', [BayarController::class, 'checkout'])->name('pages.bayar.checkout'); // ini halaman checkout tampil
// Route::post('/kasir/store', [BayarController::class, 'store'])->name('pages.bayar.store');
// Route::get('/bayar/success/{id}', [BayarController::class, 'success'])->name('bayar.success');


Route::get('/bayar', [BayarController::class, 'index'])->name('pages.bayar.index');
Route::post('/bayar/add', [BayarController::class, 'addToCart'])->name('pages.bayar.add');
Route::get('/checkout', [BayarController::class, 'checkout'])->name('pages.bayar.checkout');
Route::post('/bayar/store', [BayarController::class, 'bayar'])->name('pages.bayar.store');