<!DOCTYPE html>
<html>
<head>
    <title>Struk Pembayaran</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        .container { max-width: 400px; margin: auto; padding: 10px; }
        .text-center { text-align: center; }
        .mb-2 { margin-bottom: 8px; }
        .mb-4 { margin-bottom: 16px; }
        .bold { font-weight: bold; }
        .flex { display: flex; justify-content: space-between; }
        .border-top { border-top: 1px dashed #000; margin: 10px 0; }
    </style>
</head>
<body>
    <div class="container">

        <div class="text-center mb-4">
            <img src="{{ public_path('asset/img/logo.png') }}" alt="Logo" style="height: 60px;">
        </div>

        <div class="text-center bold">Caffe Korner</div>
        <div class="text-center mb-2">
            Jl. Erlangga No.18, Ngadirejo, Kediri<br>
            Telp: 0813-8452-1126
        </div>

        <div class="border-top"></div>

        @foreach($keranjang as $item)
            <div class="flex mb-2">
                <span>{{ $item['name'] }}</span>
                <span>Rp {{ number_format($item['price'], 0, ',', '.') }}</span>
            </div>
        @endforeach

        <div class="border-top"></div>

        <div class="flex mb-2"><span>Subtotal:</span><span>Rp {{ number_format($subtotal, 0, ',', '.') }}</span></div>
        <div class="flex mb-2"><span>PPN 5%:</span><span>Rp {{ number_format($tax, 0, ',', '.') }}</span></div>
        <div class="flex mb-2 bold"><span>Total Bayar:</span><span>Rp {{ number_format($grandTotal, 0, ',', '.') }}</span></div>
        <div class="flex mb-2"><span>Uang Diberikan:</span><span>Rp {{ number_format($bayar, 0, ',', '.') }}</span></div>
        <div class="flex mb-2" style="color: green;"><span>Kembalian:</span><span>Rp {{ number_format($change, 0, ',', '.') }}</span></div>

        <div class="border-top"></div>

        <p class="text-center">Selamat Menikmati</p>
    </div>
</body>
</html>
