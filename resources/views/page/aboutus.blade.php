<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Be-Benz</title>
    <!-- Google Fonts: Roboto -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.css" rel="stylesheet">

    <style>
        /* Centering content in the body */

        /* Full background styling */
        .background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('assets/bg-page.png');
            background-size: cover;
            background-repeat: no-repeat;
            z-index: -1;
        }

        body {
            margin: 0;
            font-family: 'Roboto', sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        /* Overlay container for content */
        main {
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            z-index: 1;
        }

        /* Navbar styles */
        .navbar {
            display: flex;
            border-radius: 5px;
            justify-content: space-between;
            align-items: center;
            padding: 0.5rem 2rem;
            background-color: rgba(0, 0, 0, 0.4);
            /* Semi-transparent background */
            margin-top: 65px;
            color: #fff;
            width: 560px;
            position: sticky;
            top: 0;
            z-index: 1000;
            /* Smooth transition for margin change */
        }

        .navbar ul {
            list-style: none;
            display: flex;
            gap: 1.2rem;
            margin: 0;
            padding: 0;
        }

        .navbar ul li {
            display: inline;
        }

        .navbar ul li a {
            color: #fff;
            text-decoration: none;
            padding: 0.5rem 0.5rem;
            font-size: 1.2rem;
            /* font-weight: bold; */
            position: relative;
        }

        .navbar ul li a:hover {
            color: #ffc800;
            /* Keep the text color white on hover */
        }

        .navbar ul li a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background-color: #ffc800;
            transition: width 0.3s ease;
        }

        .navbar ul li a:hover::after {
            width: 100%;
            /* Full underline on hover */
        }

        .navbar ul li a.active {
            color: #ffc800;
            /* Highlight color */
        }

        .navbar ul li a.active::after {
            width: 100%;
            /* Full underline on the active link */
            background-color: #ffc800;
        }


        /* Image below navbar */
        .content-image-head {
            margin-top: 3rem;
            width: 25%;
            /* Adjust width as needed */
            max-width: 1000px;
            border-radius: 8px;
        }

        .content-image-mid {
            margin-top: 1rem;
            margin-bottom: 1rem;
            width: 40%;
            /* Adjust width as needed */
            max-width: 1000px;
            border-radius: 8px;
        }

        .content-image-mid2 {
            margin-top: 3.5rem;
            margin-bottom: 2rem;
            width: 20%;
            /* Adjust width as needed */
            max-width: 1000px;
            border-radius: 8px;
        }

        /* Button container */
        .button-container {
            display: flex;
            gap: 3rem;
            margin-top: 1rem;
            margin-bottom: 5rem;
            width: 40%;
            max-width: 400px;
            /* Limit container width */
        }

        .button-container button {
            flex: 1;
            /* Make buttons equal width */
            padding: 0.5rem 1rem;
            font-size: 1.2rem;
            border-radius: 5px;
            cursor: pointer;
            font-family: 'Roboto', sans-serif;
            height: 50px;
            width: 150px;
        }

        .button-primary {
            background-color: #ffc800;
            color: #000000;
            font-weight: bold;
            border: none;
        }

        .button-secondary {
            background-color: transparent;
            color: #000000;
            font-weight: bold;
            border-style: solid;
            border-color: #ffc800;
            border-width: 0.5px;
        }

        .button-primary:hover {
            background-color: #ffaa00;
        }

        .button-secondary:hover {
            background-color: #ffc800;
        }

        .content-image-lineup {
            width: 30%;
            /* Adjust width as needed */
            max-width: 1000px;
            border-radius: 8px;
        }

        .content-image-lineuptext {
            width: 20%;
            /* Adjust width as needed */
            max-width: 1000px;
            border-radius: 8px;
        }

        /* Flex container styling */
        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            gap: 1rem;
            margin-top: 1rem;
            /* Adjust the spacing between items */
        }

        /* Each image takes up one-third of the container width */
        .content-image-lineup {
            width: 27%;
            border-radius: 8px;
            max-width: 100%;
        }
    </style>
</head>

<body>

    <!-- Background div -->
    <div class="background"></div>
    <main>
        <!-- Navbar -->
        <div class="navbar">
            <ul>
                <li><a href="/" class="{{ request()->is('/') ? 'active' : '' }}">HOME</a></li>
                <li><a href="{{ route('lineup') }}" class="{{ request()->routeIs('lineup') ? 'active' : '' }}">LINE
                        UP</a></li>
                <li><a href="{{ route('package') }}"
                        class="{{ request()->routeIs('package') ? 'active' : '' }}">PACKAGE</a></li>
                <li><a href="{{ route('aboutus') }}" class="{{ request()->routeIs('aboutus') ? 'active' : '' }}">ABOUT
                        US</a></li>
                <li><a href="{{ route('faq') }}" class="{{ request()->routeIs('faq') ? 'active' : '' }}">FAQ</a></li>
            </ul>
        </div>

        {{-- Title --}}
        <img src="assets/Asset-30.png" alt="Descriptive alt text" class="content-image-mid2">

        <div class="bg-black bg-opacity-60 p-8 rounded-lg shadow-lg w-full max-w-6xl mb-6">
            <p class="mb-3 text-2xl text-white ">
                Tentang Acara Be-Benz - Anniversary Komunitas Mercedes-Benz
            </p>
            <p class="mb-3 text-lg text-white ">
                Acara Be-Benz adalah acara yang sudah menjadi agenda setiap 2 tahun sekali, sekaligus spesial dalam rangka merayakan anniversary ke-5th club mobil komunitas Mercedes-Benz w211 Chapter Bekasi, yang akan digelar di lapangan Mall Hollywood Junction, Jababeka, Cikarang, pada tanggal 25 Januari 2025. Acara ini menggabungkan semangat komunitas otomotif dengan hiburan musik dari para musisi ternama, sehingga menjadi momen yang dinantikan para anggota dan pecinta Mercedes-Benz.
            </p>
            <p class="mb-3 text-lg text-white ">
                Menghadirkan artis-artis terkenal dan acara-acara yang menarik Seperti Konser Musik, Fun Run,Car Modifikasi,Bazar Otomotif, dan masih banyak lagi. Be-Benz siap memberikan keseruan dan Hiburan yang tak terlupakan bagi para pengunjung.
            </p>
            <p class="mb-3 text-lg text-white ">
                Be-Benz menjadi wadah bagi para anggota komunitas untuk berbagi cerita, pengalaman, dan antusiasme mereka terhadap Mercedes-Benz, sambil merayakan perjalanan panjang komunitas ini. Dengan atmosfer meriah dan fasilitas yang nyaman, acara ini diharapkan dapat mempererat persaudaraan antar anggota serta memberikan pengalaman istimewa yang menyatukan penggemar otomotif dan musik.
            </p>
            <p class="mb-3 text-lg text-white ">
                Bergabunglah dengan kami dalam perayaan ini menikmati acara yang tidak boleh terlewarkan di acara Be-Benz 2 dan Anniversary ke-5th Komunitas Mercedes-Benz w211 Chapter Bekasi di Jababeka Cikarang!
            </p>

        </div>

    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>

</body>

</html>
