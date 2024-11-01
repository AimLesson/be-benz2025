<!DOCTYPE html>
<html>
<head>
    <title>Processing Payment</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        h3 {
            margin-bottom: 5px;
        }
        img {
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <h3>Silahkan lakukan pembayaran QRIS sejumlah: Rp {{ number_format($amount, 0, ',', '.') }}</h3>
    <img src="{{ $qr }}" alt="QRIS for Payment">
</body>
</html>
