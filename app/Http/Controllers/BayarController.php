<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Transaction;
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
}