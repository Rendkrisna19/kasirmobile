<?php

// app/Http/Controllers/RekapDataKeuanganController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

class RekapDataKeuanganController extends Controller
{
    public function index()
    {
        $rekapan = Transaction::select(
                DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d') as tanggal"),
                DB::raw("SUM(total) as total_pemasukan"),
                DB::raw("COUNT(*) as jumlah_transaksi")
            )
            ->groupBy('tanggal')
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('pages.rekap.index', compact('rekapan'));
    }
}