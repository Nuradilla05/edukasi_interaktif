<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan Kesehatan Online - Klinik Sehat</title>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        :root {
            --primary-color: #00695C; /* Hijau kesehatan */
            --accent-color: #26A69A; /* Hijau muda */
            --light-bg: #F8F9FA;
            --dark-text: #333333;
            --light-text: #FFFFFF;
            --danger-color: #E74C3C;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background-color: var(--light-bg);
            margin: 0;
            padding: 0;
            color: var(--dark-text);
        }

        /* Header */
        .main-header {
            background-color: var(--light-text);
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            padding: 15px 0;
        }
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: auto;
        }
        .nav-links {
            list-style: none;
            display: flex;
            margin: 0;
            padding: 0;
        }
        .nav-links li {
            margin-left: 20px;
            position: relative;
        }
        .nav-links a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
        }
        .nav-links a:hover {
            color: var(--accent-color);
        }
        .dropdown-menu {
            display: none;
            position: absolute;
            background: #fff;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            border-radius: 5px;
            top: 100%;
            left: 0;
        }
        .dropdown:hover .dropdown-menu {
            display: block;
        }

        /* Hero Section */
        .hero-section {
            position: relative; /* supaya foto bisa ditempatkan absolut */
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)),
                        url("{{ asset('img/pasien-dokter.jpg') }}") center/cover no-repeat;
            color: #fff;
            text-align: center;
            padding: 120px 20px;
            border-bottom-left-radius: 20px;
            border-bottom-right-radius: 20px;
        }
        .hero-section h1 {
            font-size: 3rem;
            font-weight: bold;
        }
        .hero-section p {
            font-size: 1.2rem;
        }
        .btn-custom {
            background-color: #009688;
            color: #fff;
            margin: 5px;
        }
        .btn-custom:hover {
            background-color: #00796B;
            color: #fff;
        }
        /* Buttons */
        .btn {
            display: inline-block;
            padding: 12px 25px;
            border-radius: 5px;
            font-weight: bold;
            border: none;
            cursor: pointer;
        }
        .btn-primary {
            background: var(--accent-color);
            color: var(--light-text);
        }
        .btn-secondary {
            background: var(--primary-color);
            color: var(--light-text);
        }
        .btn-outline {
            background: transparent;
            color: var(--accent-color);
            border: 2px solid var(--accent-color);
        }
        .btn-outline:hover {
            background: var(--accent-color);
            color: #fff;
        }
        .btn-danger {
            background: var(--danger-color);
            color: #fff;
        }

        /* Foto Adila di hero */
        .foto-adila {
            position: absolute;
            bottom: 30px;
            right: 30px;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            border: 4px solid #f1f8e9; /* hijau muda lembut */
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            object-fit: cover;
            background-color: #fff;
            z-index: 10;
            animation: fadeIn 1.2s ease-in-out;
        }

        /* Services */
        .services-overview {
            padding: 80px 20px;
            text-align: center;
        }
        .service-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit,minmax(280px,1fr));
            gap: 20px;
        }
        .service-card {
            background: #fff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            transition: transform 0.3s;
        }
        .service-card:hover { transform: translateY(-5px); }
        .service-card .icon {
            font-size: 3em;
            color: var(--accent-color);
        }

        /* Why Choose Us */
        .why-choose-us {
            padding: 80px 20px;
            background: var(--light-bg);
            text-align: center;
        }
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit,minmax(280px,1fr));
            gap: 20px;
        }
        .feature-item {
            background: #fff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }
        .feature-item i {
            font-size: 2.5em;
            color: var(--accent-color);
            margin-bottom: 10px;
        }

        /* Footer */
        .main-footer {
            background: var(--primary-color);
            color: #fff;
            padding: 40px 20px;
            text-align: center;
        }
    </style>
</head>
<body>
<header class="main-header">
    <nav class="navbar">
        <div class="logo">
            <h2 style="color: var(--primary-color)">Klinik Sehat</h2>
        </div>
        <ul class="nav-links">
            <li><a href="{{ url('/') }}">Beranda</a></li>
            <li><a href="{{ url('/layanan') }}">Layanan</a></li>
            <li><a href="{{ url('/tentang') }}">Tentang Kami</a></li>
            <li><a href="{{ url('/artikel') }}">Artikel</a></li>
            <li><a href="{{ url('/kontak') }}">Kontak</a></li>

            {{-- Autentikasi Laravel --}}
            @guest
                <li><a href="{{ route('login') }}">Login</a></li>
                @if(Route::has('register'))
                    <li><a href="{{ route('register') }}">Register</a></li>
                @endif
            @else
                <li class="dropdown">
                    <a href="#">{{ Auth::user()->name }} <i class="fas fa-chevron-down"></i></a>
                    <div class="dropdown-menu">
                        <a href="{{ url('/dashboard') }}">Dashboard</a>
                        <a href="{{ route('logout') }}" class="btn-danger"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                           Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </nav>
</header>

<main>
    <!-- Hero -->
    <section class="hero-section">
        <!-- Tambahkan foto Adila -->
        <img src="{{ asset('img/foto-adila.jpg') }}" alt="Foto Adila" class="foto-adila">
        
        <h1>Kesehatan Anda Prioritas Kami</h1>
        <p>Konsultasi online dengan dokter profesional, cepat, mudah, dan aman.</p>
        <div class="hero-buttons">
            <a href="{{ url('/konsultasi') }}" class="btn btn-primary">Konsultasi Sekarang</a>
            <a href="{{ url('/layanan') }}" class="btn btn-secondary">Lihat Layanan</a>
        </div>
    </section>

    <!-- Services -->
    <section class="services-overview">
        <h2>Layanan Unggulan</h2>
        <div class="service-cards">
            <div class="service-card">
                <i class="fas fa-user-md icon"></i>
                <h3>Konsultasi Dokter</h3>
                <p>Konsultasi langsung dengan dokter spesialis dari rumah Anda.</p>
            </div>
            <div class="service-card">
                <i class="fas fa-notes-medical icon"></i>
                <h3>Rekam Medis Online</h3>
                <p>Akses riwayat kesehatan Anda kapan saja dengan aman.</p>
            </div>
            <div class="service-card">
                <i class="fas fa-pills icon"></i>
                <h3>Apotek Online</h3>
                <p>Pemesanan obat mudah dengan pengantaran cepat.</p>
            </div>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section class="why-choose-us">
        <h2>Mengapa Memilih Klinik Sehat?</h2>
        <div class="features-grid">
            <div class="feature-item">
                <i class="fas fa-user-nurse"></i>
                <h3>Dokter Berpengalaman</h3>
                <p>Tim dokter spesialis yang siap membantu Anda.</p>
            </div>
            <div class="feature-item">
                <i class="fas fa-shield-alt"></i>
                <h3>Privasi & Keamanan</h3>
                <p>Data Anda aman dengan sistem enkripsi modern.</p>
            </div>
            <div class="feature-item">
                <i class="fas fa-laptop-medical"></i>
                <h3>Teknologi Modern</h3>
                <p>Layanan berbasis teknologi terbaru untuk kenyamanan Anda.</p>
            </div>
        </div>
    </section>
</main>

<!-- Footer -->
<footer class="main-footer">
    <p>&copy; {{ date('Y') }} Klinik Sehat - Layanan Kesehatan Online.</p>
</footer>

</body>
</html>
