<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-image: url('assets/Asset-15.png');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body class="bg-gray-900 bg-opacity-50 flex justify-center items-center h-screen">

    <form id="orderForm" action="#" method="POST" class="bg-white bg-opacity-90 p-8 rounded-lg shadow-lg w-full max-w-2xl grid grid-cols-1 sm:grid-cols-2 gap-6">
        @csrf
        <h2 class="text-3xl font-bold col-span-2 text-center text-gray-800">Order Form</h2>

        <div>
            <label for="nama" class="block text-sm font-medium text-gray-700">Nama:</label>
            <input type="text" id="nama" name="nama" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div>
            <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat:</label>
            <input type="text" id="alamat" name="alamat" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div>
            <label for="nomer_whatsapp" class="block text-sm font-medium text-gray-700">Nomer WhatsApp:</label>
            <input type="text" id="nomer_whatsapp" name="nomer_whatsapp" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
            <input type="email" id="email" name="email" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div>
            <label for="gender" class="block text-sm font-medium text-gray-700">Gender:</label>
            <select id="gender" name="gender" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
        </div>

        <div>
            <label for="nik" class="block text-sm font-medium text-gray-700">NIK:</label>
            <input type="text" id="nik" name="nik" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div class="col-span-2">
            <label for="price_range" class="block text-sm font-medium text-gray-700">Package:</label>
            <select id="price_range" name="price_range" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                <option value="150000" data-url="https://app.midtrans.com/payment-links/1730427873428">Flashsale VIP - 150000 Rupiah</option>
                <option value="85000" data-url="https://app.midtrans.com/payment-links/1730427783859">Flashsale Reg - 85000 Rupiah</option>
            </select>
        </div>

        <button type="submit" class="col-span-2 w-full bg-yellow-500 text-white font-bold py-2 px-4 rounded-md hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">Submit</button>
    </form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
    <script>
        document.getElementById('orderForm').addEventListener('submit', function (event) {
            event.preventDefault();

            // Get form values
            const priceRangeSelect = document.getElementById('price_range');
            const selectedOption = priceRangeSelect.options[priceRangeSelect.selectedIndex];
            const redirectUrl = selectedOption.getAttribute('data-url');

            const phoneNumber = document.getElementById('nomer_whatsapp').value;
            const amount = priceRangeSelect.value;
            const email = document.getElementById('email').value;
            const nama = document.getElementById('nama').value;
            const alamat = document.getElementById('alamat').value;
            const nik = document.getElementById('nik').value;
            const gender = document.getElementById('gender').value;

            // Send AJAX request to the SendQrisController
            fetch("{{ route('send-qris') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    qr_code_url: selectedOption.getAttribute('data-url'),
                    amount: amount,
                    phone_number: phoneNumber,
                    email: email,
                    nama: nama,
                    alamat: alamat,
                    nik: nik,
                    gender: gender,
                    price_range: amount
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.message === 'QR code sent to WhatsApp') {
                    // Redirect after successful API call
                    window.location.href = redirectUrl;
                } else {
                    alert("Failed to send QR code to WhatsApp.");
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert("An error occurred. Please try again.");
            });
        });
    </script>

</body>
</html>
