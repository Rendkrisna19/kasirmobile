<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;

class BayarController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('pages.bayar.index', compact('products'));
    }
    public function income()
    {

        $products = Product::all();
        $todayIncome = Transaction::whereDate('created_at', Carbon::today())->sum('subtotal');

        return view('pages.index', compact('products', 'todayIncome'));
    }

    public function addToCart(Request $request)
    {
        $request->validate([
            'selected_products' => 'required|array',
        ]);

        $products = Product::whereIn('id', $request->selected_products)->get();

        $keranjang = session()->get('keranjang', []);

        foreach ($products as $product) {
            $keranjang[] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'category' => $product->category,
                'image' => $product->image,
            ];
        }

        session()->put('keranjang', $keranjang);

        return redirect()->route('pages.bayar.checkout')->with('success', 'Produk berhasil ditambahkan ke checkout.');
    }

    public function checkout()
    {
        $keranjang = session()->get('keranjang', []);
        return view('pages.bayar.checkout', compact('keranjang'));
    }

    public function bayar(Request $request)
    {
        $keranjang = session()->get('keranjang', []);

        if (empty($keranjang)) {
            return redirect()->route('pages.bayar.index')->with('error', 'Keranjang kosong.');
        }

        $totalHarga = collect($keranjang)->sum('price');
        $tax = intval($totalHarga * 0.05);
        $grandTotal = $totalHarga + $tax;

        $request->validate([
            'bayar' => 'required|integer|min:' . $grandTotal,
        ]);

        $change = $request->bayar - $grandTotal;

        Transaction::create([
            'items' => $keranjang,
            'subtotal' => $totalHarga,
            'tax' => $tax,
            'total' => $grandTotal,
            'payment' => $request->bayar,
            'change' => $change,
        ]);

        session()->forget('keranjang');

        return view('pages.bayar.struk', [
            'keranjang' => $keranjang,
            'subtotal' => $totalHarga,
            'tax' => $tax,
            'grandTotal' => $grandTotal,
            'bayar' => $request->bayar,
            'change' => $change,
        ]);
    }


    // =================== CRUD PRODUCT ===================

    // TAMPILKAN SEMUA PRODUK DI DASHBOARD
    public function dashboardProduct()
    {
        $products = Product::all();
        return view('pages.dashboard.products.index', compact('products'));
    }

    // TAMPILKAN FORM BUAT PRODUK
    public function createProduct()
    {
        return view('pages.dashboard.products.create');
    }

    // SIMPAN PRODUK BARU
    public function storeProduct(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('uploads/products'), $imageName);

        Product::create([
            'name' => $request->name,
            'category' => $request->category,
            'price' => $request->price,
            'image' => 'uploads/products/' . $imageName,
        ]);

        return redirect()->route('dashboard.products')->with('success', 'Produk berhasil ditambahkan.');
    }

    // TAMPILKAN FORM EDIT PRODUK
    public function editProduct($id)
    {
        $product = Product::findOrFail($id);
        return view('pages.dashboard.products.edit', compact('product'));
    }

    // UPDATE PRODUK
    public function updateProduct(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if (File::exists(public_path($product->image))) {
                File::delete(public_path($product->image));
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/products'), $imageName);
            $product->image = 'uploads/products/' . $imageName;
        }

        $product->update([
            'name' => $request->name,
            'category' => $request->category,
            'price' => $request->price,
            'image' => $product->image,
        ]);

        return redirect()->route('dashboard.products')->with('success', 'Produk berhasil diperbarui.');
    }

    // HAPUS PRODUK
    public function destroyProduct($id)
    {
        $product = Product::findOrFail($id);

        // Hapus file gambar
        if (File::exists(public_path($product->image))) {
            File::delete(public_path($product->image));
        }

        $product->delete();

        return redirect()->route('dashboard.products')->with('success', 'Produk berhasil dihapus.');
    }



    // =================== CATEGORY KASIR FOODS,DRINK,SNACK ===================
    // Di BayarController.php
    public function foods()
    {
        $products = Product::where('category', 'Foods')->get();
        return view('pages.category.foods', compact('products'));
    }

    public function drinks()
    {
        $products = Product::where('category', 'Drink')->get();
        return view('pages.category.drinks', compact('products'));
    }

    public function snacks()
    {
        $products = Product::where('category', 'Snack')->get();
        return view('pages.category.snacks', compact('products'));
    }



    //cetak pdf
    
}