@extends('layouts.app')

@section('content')
<section class="p-6 max-w-4xl mx-auto bg-white rounded-xl shadow-lg">
    <div class="text-center mb-8">
        <h2 class="text-3xl font-bold text-green-600">Rekapan Keuangan Harian</h2>
        <p class="text-gray-600">Laporan transaksi per hari</p>
    </div>

    <div class="overflow-x-auto">
        <table id="rekapanTable" class="w-full border border-green-200 shadow-sm rounded overflow-hidden">
            <thead>
                <tr class="bg-green-500 text-white text-left">
                    <th class="py-3 px-5 border-b border-green-300">Tanggal</th>
                    <th class="py-3 px-5 border-b border-green-300">Jumlah Transaksi</th>
                    <th class="py-3 px-5 border-b border-green-300">Total Pemasukan</th>
                </tr>
            </thead>
            <tbody class="bg-green-50">
                @forelse ($rekapan as $data)
                    <tr class="hover:bg-green-100 transition">
                        <td class="py-3 px-5 border-b border-green-200">
                            {{ \Carbon\Carbon::parse($data->tanggal)->translatedFormat('l, d F Y') }}
                        </td>
                        <td class="py-3 px-5 border-b border-green-200">{{ $data->jumlah_transaksi }}</td>
                        <td class="py-3 px-5 border-b border-green-200 text-green-700 font-semibold">
                            Rp {{ number_format($data->total_pemasukan, 0, ',', '.') }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="py-6 text-center text-gray-500">Belum ada data transaksi.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Grafik Rekapan -->
        <div class="mt-10">
            <h3 class="text-xl font-semibold text-green-600 text-center mb-4">Grafik Rekapan</h3>
            <canvas id="rekapanChart" class="w-full max-w-4xl mx-auto"></canvas>
        </div>
    </div>

    <div class="mt-6 text-center">
        <a href="{{ route('kasir') }}" class="inline-block px-6 py-2 bg-green-500 hover:bg-green-600 text-white font-semibold rounded shadow">
            ← Kembali
        </a>
    </div>
</section>
@endsection

{{-- JS Section --}}
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const labels = @json($rekapan->pluck('tanggal')->map(fn($tgl) => \Carbon\Carbon::parse($tgl)->translatedFormat('d M')));
        const jumlahTransaksi = @json($rekapan->pluck('jumlah_transaksi'));
        const totalPemasukan = @json($rekapan->pluck('total_pemasukan'));

        const ctx = document.getElementById('rekapanChart');
        if (ctx) {
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [
                        {
                            label: 'Jumlah Transaksi',
                            data: jumlahTransaksi,
                            backgroundColor: 'rgba(34, 197, 94, 0.5)',
                            borderColor: 'rgba(34, 197, 94, 1)',
                            borderWidth: 1
                        },
                        {
                            label: 'Total Pemasukan (Rp)',
                            data: totalPemasukan,
                            backgroundColor: 'rgba(16, 185, 129, 0.5)',
                            borderColor: 'rgba(16, 185, 129, 1)',
                            borderWidth: 1,
                            yAxisID: 'y1'
                        }
                    ]
                },
                options: {
                    responsive: true,
                    interaction: {
                        mode: 'index',
                        intersect: false
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Jumlah Transaksi'
                            }
                        },
                        y1: {
                            beginAtZero: true,
                            position: 'right',
                            grid: {
                                drawOnChartArea: false
                            },
                            title: {
                                display: true,
                                text: 'Total Pemasukan (Rp)'
                            }
                        }
                    }
                }
            });
        }
    });


    //data tables
     $(document).ready(function () {
        $('#rekapanTable').DataTable({
            "pageLength": 5,
            "language": {
                "search": "Cari:",
                "lengthMenu": "Tampilkan _MENU_ data per halaman",
                "zeroRecords": "Data tidak ditemukan",
                "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                "paginate": {
                    "first": "Awal",
                    "last": "Akhir",
                    "next": "→",
                    "previous": "←"
                }
            }
        });
    });
</script>
@endpush
