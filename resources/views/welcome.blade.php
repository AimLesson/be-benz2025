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
            background-image: url('assets/Asset-15.png');
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
            width: 80%;
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

        .content-image-viewalltext {
            width: 7%;
            /* Adjust width as needed */
            max-width: 1000px;
            border-radius: 8px;
        }

        /* Scrollable image container */
        .scroll-container {
            display: flex;
            overflow-x: auto;
            white-space: nowrap;
            width: 80%;
            border-radius: 8px;
            margin-bottom: 3rem;
            scrollbar-width: none;
            /* For Firefox */
        }

        .scroll-container::-webkit-scrollbar {
            display: none;
            /* For Chrome, Safari, and Edge */
        }

        .scroll-container img {
            border-radius: 8px;
            max-width: 450px;
            /* Set a maximum width for each image */
        }

        /* Countdown Section */

        .content-image-countdown {
            width: 20%;
            max-width: 1000px;
            border-radius: 8px;
            margin-top: 6rem;
        }

        .countdown-container {
            font-size: 2rem;
            color: #fff;
            background-color: rgba(0, 0, 0, 0.4);
            padding: 1rem;
            border-radius: 8px;
            margin-top: 0.2rem;
            margin-bottom: 4rem;
        }

        .countdown-item {
            display: inline-block;
            margin: 0 1rem;
            text-align: center;
        }
    </style>
</head>

<body>

    <!-- Background div -->
    <div class="background"></div>
    <main>
        <!-- Navbar -->
        <nav class="navbar">
            <ul>
                <li><a href="/">HOME</a></li>
                <li><a href="{{route('lineup')}}">LINE UP</a></li>
                <li><a href="{{route('package')}}">PACKAGE</a></li>
                <li><a href="{{route('aboutus')}}">ABOUTUS</a></li>
                <li><a href="{{route('faq')}}">FAQ</a></li>
            </ul>
        </nav>

        {{-- --HOME-- --}}
        {{-- Jababeka --}}
        <img src="assets/Asset-9.png" alt="Descriptive alt text" class="content-image-head">

        {{-- BE-BENZ --}}
        <img src="assets/Asset-23.png" alt="Descriptive alt text" class="content-image-mid">

        {{-- DATE --}}
        <img src="assets/Asset-26.png" alt="Descriptive alt text" class="content-image-mid2">

        <!-- BUTTON -->
        <div class="button-container">
            <a href="{{ route('order.create') }}">
                <button class="button-primary">BUY TICKETS</button>
            </a>
            <a href="{{route('faq')}}">
                <button class="button-secondary">FAQ</button>
            </a>
        </div>


        {{-- --LINEUP SECTION-- --}}
        {{-- LINEUP TEXT --}}
        <img src="assets/Asset-17.png" alt="Descriptive alt text" class="content-image-lineuptext">
        {{-- VIEWALL TEXT --}}
        <img src="assets/Asset-18.png" alt="Descriptive alt text" class="content-image-viewalltext">
        <!-- Scrollable Image Container -->
        <div class="scroll-container">
            <img src="assets/lineup/Asset-58.png" alt="Descriptive alt text" class="content-image-lineup">
            <img src="assets/lineup/Asset-59.png" alt="Descriptive alt text" class="content-image-lineup">
            <img src="assets/lineup/Asset-60.png" alt="Descriptive alt text" class="content-image-lineup">
            <img src="assets/lineup/Asset-61.png" alt="Descriptive alt text" class="content-image-lineup">
            <img src="assets/lineup/Asset-62.png" alt="Descriptive alt text" class="content-image-lineup">
        </div>


        <!-- Countdown Section -->
        {{-- <img src="assets/Asset-17.png" alt="Descriptive alt text" class="content-image-countdown"> --}}
        <div class="countdown-container">
            <div class="countdown-item"><span id="days">00</span> Days</div>
            <div class="countdown-item"><span id="hours">00</span> Hours</div>
            <div class="countdown-item"><span id="minutes">00</span> Minutes</div>
            <div class="countdown-item"><span id="seconds">00</span> Seconds</div>
        </div>
    </main>
    <script>
        // Set the event date
        const eventDate = new Date('2025-01-10T23:59:59').getTime();

        // Update the countdown every second
        const countdownInterval = setInterval(() => {
            const now = new Date().getTime();
            const timeLeft = eventDate - now;

            // Calculate days, hours, minutes, and seconds
            const days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
            const hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

            // Display the results
            document.getElementById('days').innerText = days;
            document.getElementById('hours').innerText = hours;
            document.getElementById('minutes').innerText = minutes;
            document.getElementById('seconds').innerText = seconds;

            // If the countdown is over, stop the timer
            if (timeLeft < 0) {
                clearInterval(countdownInterval);
                document.querySelector('.countdown-container').innerText = 'Event Started!';
            }
        }, 1000);
    </script>
</body>

</html>
