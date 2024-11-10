<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Be-Benz</title>
    <!-- Google Fonts: Roboto -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
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
            width: 500px;
            position: sticky;
            top: 0;
            z-index: 1000;
            /* Smooth transition for margin change */
        }

        .navbar ul {
            list-style: none;
            display: flex;
            gap: 1.3rem;
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
            margin-top: 3.5rem;
            width: 50%;
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
                {{-- <li><a href="{{ route('aboutus') }}" class="{{ request()->routeIs('aboutus') ? 'active' : '' }}">ABOUT
                        US</a></li>
                <li><a href="{{ route('faq') }}" class="{{ request()->routeIs('faq') ? 'active' : '' }}">FAQ</a></li> --}}
            </ul>
        </div>

        {{-- Title --}}
        <img src="assets/Asset-17.png" alt="Descriptive alt text" class="content-image-mid2">

        {{-- Konten --}}
        <!-- Konten -->
        <div class="container">
        <img src="assets/lineup/Asset-59.png" alt="Masdddho" class="content-image-lineup">
            <img src="assets/lineup/Asset-61.png" alt="Wawes" class="content-image-lineup">
            <img src="assets/lineup/Asset-62.png" alt="Ngatmombilung" class="content-image-lineup">
            <img src="assets/lineup/Asset-60.png" alt="DJ" class="content-image-lineup">
            <img src="assets/lineup/Asset-58.png" alt="Models" class="content-image-lineup">
            <img src="assets/lineup/Asset-63.png" alt="Band" class="content-image-lineup">
        </div>


    </main>
</body>

</html>
