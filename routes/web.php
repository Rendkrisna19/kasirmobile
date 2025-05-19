<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BayarController;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\RekapDataKeuanganController;
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
//routes untuk setting edit dan update 



//route untuk menampilkan product
// CRUD Product
Route::get('/dashboard/products', [BayarController::class, 'dashboardProduct'])->name('dashboard.products');
Route::get('/dashboard/products/create', [BayarController::class, 'createProduct'])->name('products.create');
Route::post('/dashboard/products', [BayarController::class, 'storeProduct'])->name('products.store');
Route::get('/dashboard/products/{id}/edit', [BayarController::class, 'editProduct'])->name('products.edit');
Route::put('/dashboard/products/{id}', [BayarController::class, 'updateProduct'])->name('products.update');
Route::delete('/dashboard/products/{id}', [BayarController::class, 'destroyProduct'])->name('products.destroy');
Route::post('/dashboard/products/store', [BayarController::class, 'storeProduct'])->name('products.store');



//routes ctegory 
// routes/web.php
Route::get('/category/foods', [BayarController::class, 'foods'])->name('category.foods');
Route::get('/category/drinks', [BayarController::class, 'drinks'])->name('category.drinks');
Route::get('/category/snacks', [BayarController::class, 'snacks'])->name('category.snacks');
Route::get('/rekap', [RekapDataKeuanganController::class, 'index'])->name('peges.rekap.index');



//routes profile controller
Route::get('/kasir/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/kasir/profile/update', [ProfileController::class, 'update'])->name('profile.update');