<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nurdamai Homestay</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: #f8f5ff;
            color: #1f2937;
        }

        .navbar {
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            width: 92%;
            max-width: 1300px;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(15px);
            border-radius: 24px;
            padding: 18px 35px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 10px 35px rgba(53, 42, 134, 0.15);
            z-index: 1000;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logo {
            height: 90px;
            width: auto;
            border-radius: 16px;
            transition: transform 0.3s ease;
        }

        .logo:hover {
            transform: scale(1.05);
        }

        .brand-text h2 {
            color: #352A86;
            font-size: 28px;
            font-weight: 700;
        }

        .brand-text p {
            color: #C41E75;
            font-size: 14px;
            font-weight: 500;
        }

        .nav {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .nav a {
            text-decoration: none;
            color: #352A86;
            font-weight: 600;
            padding: 10px 16px;
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .nav a:hover {
            background: rgba(196, 30, 117, 0.1);
            color: #C41E75;
        }

        .nav .btn {
            background: linear-gradient(135deg, #352A86, #C41E75);
            color: white;
            padding: 12px 24px;
            border-radius: 14px;
            box-shadow: 0 8px 20px rgba(196, 30, 117, 0.3);
        }

        .nav .btn:hover {
            color: white;
            transform: translateY(-2px);
        }

        .hero {
            min-height: 100vh;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 150px 80px 80px;
            background: linear-gradient(135deg, #352A86, #C41E75);
            color: white;
        }

        .hero-text {
            max-width: 600px;
        }

        .hero h1 {
            font-size: 60px;
            line-height: 1.1;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 20px;
            margin-bottom: 35px;
            opacity: 0.95;
        }

        .hero-btn {
            display: inline-block;
            background: white;
            color: #352A86;
            padding: 16px 32px;
            border-radius: 16px;
            text-decoration: none;
            font-weight: 700;
        }

        .hero-card {
            background: white;
            color: #352A86;
            padding: 35px;
            width: 350px;
            border-radius: 28px;
            text-align: center;
            box-shadow: 0 20px 40px rgba(0,0,0,0.2);
        }

        .homestay-img {
    width: 100%;
    height: 220px;
    object-fit: cover;
    border-radius: 20px;
    margin-bottom: 20px;
}

        .section {
            padding: 80px 60px;
            text-align: center;
        }

        .section h2 {
            color: #352A86;
            font-size: 38px;
            margin-bottom: 12px;
        }

        .section p {
            color: #6b7280;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
            margin-top: 40px;
        }

        .card {
            background: white;
            padding: 35px 25px;
            border-radius: 24px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.08);
        }

        .card .icon {
            font-size: 42px;
            margin-bottom: 15px;
        }

        .card h3 {
            color: #C41E75;
            margin-bottom: 10px;
        }

        .cta {
            margin: 0 60px 80px;
            padding: 60px;
            border-radius: 30px;
            background: linear-gradient(135deg, #352A86, #C41E75);
            color: white;
            text-align: center;
        }

        .cta h2 {
            margin-bottom: 10px;
        }

        .cta a {
            display: inline-block;
            margin-top: 20px;
            background: white;
            color: #352A86;
            text-decoration: none;
            padding: 14px 28px;
            border-radius: 14px;
            font-weight: 700;
        }

        footer {
            background: #241b5f;
            color: white;
            text-align: center;
            padding: 25px;
        }

        @media (max-width: 900px) {

            .navbar {
                padding: 15px 20px;
            }

            .logo {
                height: 70px;
            }

            .brand-text {
                display: none;
            }

            .hero {
                flex-direction: column;
                text-align: center;
                padding: 160px 25px 60px;
            }

            .hero h1 {
                font-size: 42px;
            }

            .hero-card {
                margin-top: 40px;
                width: 100%;
                max-width: 350px;
            }

            .cards {
                grid-template-columns: 1fr;
            }

            .section {
                padding: 60px 25px;
            }

            .cta {
                margin: 0 25px 50px;
                padding: 40px 25px;
            }
        }
    </style>
</head>

<body>

<nav class="navbar">

    <div class="brand">
        <img src="{{ asset('images/logonurdamai.jpg') }}" alt="Nurdamai Logo" class="logo">

        <div class="brand-text">
            <h2>Nurdamai</h2>
            <p>Homestay Booking</p>
        </div>
    </div>

    <div class="nav">
        <a href="/">Home</a>
        <a href="#features">Features</a>

        @auth
            <a href="{{ route('dashboard') }}" class="btn">Dashboard</a>
        @else
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}" class="btn">Register</a>
        @endauth
    </div>

</nav>

<section class="hero">

    <div class="hero-text">
        <h1>Find Your Perfect Stay</h1>

        <p>
            Experience comfort, convenience and unforgettable moments at Nurdamai Homestay.
        </p>

        @auth
            <a href="{{ route('dashboard') }}" class="hero-btn">Go to Dashboard</a>
        @else
            <a href="{{ route('register') }}" class="hero-btn">Book Now</a>
        @endauth
    </div>

    <div class="hero-card">
    <img src="{{ asset('images/homestay.jpg') }}" alt="Nurdamai Homestay" class="homestay-img">

    <h2>Nurdamai Homestay</h2>

    <p>Comfortable stay for family, friends and short vacations.</p>
</div>

</section>

<section class="section" id="features">

    <h2>Why Choose Nurdamai?</h2>

    <p>Enjoy a seamless booking experience with comfort, convenience and trusted service.</p>

    <div class="cards">

        <div class="card">
            <div class="icon">🏠</div>
            <h3>Comfortable Homestay</h3>
            <p>View homestay details, facilities and pricing before booking.</p>
        </div>

        <div class="card">
            <div class="icon">📅</div>
            <h3>Easy Booking</h3>
            <p>Choose your preferred check-in and check-out dates with ease.</p>
        </div>

        <div class="card">
            <div class="icon">💬</div>
            <h3>WhatsApp Support</h3>
            <p>Contact the owner directly for payment and booking confirmation.</p>
        </div>

    </div>

</section>

<div class="cta">

    <h2>Ready to book your stay?</h2>

    <p>Create an account and start your homestay booking today.</p>

    @auth
        <a href="{{ route('dashboard') }}">Open Dashboard</a>
    @else
        <a href="{{ route('register') }}">Register Now</a>
    @endauth

</div>

<footer>
    © 2026 Nurdamai Homestay. All rights reserved.
</footer>

</body>
</html>