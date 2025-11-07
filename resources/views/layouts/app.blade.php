<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Edukasi Interaktif - Solusi Cerdas untuk Dunia Pendidikan')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* CSS Tambahan untuk Tampilan Awal yang Elegan */
        .hero-section {
            background: linear-gradient(to right, #198745ff, #20c997); /* Gradient dari hijau ke toska */
            color: white;
            padding: 100px 0;
            text-align: center;
            min-height: calc(100vh - 56px); /* Menyesuaikan tinggi agar mengisi viewport */
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hero-section h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .hero-section .lead {
            font-size: 1.5rem;
            margin-bottom: 40px;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }

        .hero-section .btn {
            font-size: 1.2rem;
            padding: 15px 30px;
            border-radius: 50px; /* Tombol lebih membulat */
            transition: all 0.3s ease;
        }

        .hero-section .btn-light {
            background-color: white;
            color: #198754;
            border: 2px solid white;
        }

        .hero-section .btn-light:hover {
            background-color: transparent;
            color: white;
            border-color: white;
        }

        .hero-section .btn-outline-light {
            color: white;
            border: 2px solid white;
        }

        .hero-section .btn-outline-light:hover {
            background-color: white;
            color: #20c997;
        }

        /* Penyesuaian jika ada footer */
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .container.mt-4 {
            flex-grow: 1;
        }
    </style>

    @stack('styles')
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/dashboard') }}">Kesehatan</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNavbar">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <!-- Dropdown Data Layanan Kami -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="menuDataLayanan" data-bs-toggle="dropdown">
                            Data Layanan Kami
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="menuDataLayanan">
                            <li><a class="dropdown-item" href="{{ route('pendaftaranpasien.index') }}">Pendaftaran Pasien</a></li>
                            <li><a class="dropdown-item" href="{{ route('pemeriksaandokter.index') }}">Pemeriksaan Dokter</a></li>
                            <li><a class="dropdown-item" href="{{ route('pemeriksaanlaboratorium.index') }}">Pemeriksaan Laboratorium</a></li>
                            <li><a class="dropdown-item" href="{{ route('pembayaran.index') }}">Pembayaran</a></li>
                            <li><a class="dropdown-item" href="{{ route('resepobat.index') }}">Resep Obat</a></li>
                            <li><a class="dropdown-item" href="{{ route('rekammedis.index') }}">Rekam medis</a></li>
                        </ul>
                    </li>

                    <!-- Dropdown Data Master -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="menuMaster" data-bs-toggle="dropdown">
                            Data Master
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="menuMaster">
                            <li><a class="dropdown-item" href="{{ route('dokter.index') }}">Dokter</a></li>
                            <li><a class="dropdown-item" href="{{ route('pasien.index') }}">Pasien</a></li>
                            <li><a class="dropdown-item" href="{{ route('poli.index') }}">Poli</a></li>
                        </ul>
                    </li>

                    <!-- Dropdown Laporan -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="menuLaporan" data-bs-toggle="dropdown">
                           Laporan
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="menuLaporan">
                            <li><a class="dropdown-item" href="{{ route('laporankunjungan.index') }}">Laporan Kunjungan</a></li>
                            <li><a class="dropdown-item" href="{{ route('laporankeuangan.index') }}">Laporan Keuangan</a></li>
                            <li><a class="dropdown-item" href="{{ route('laporanobat.index') }}">Laporan Obat</a></li>
                        </ul>
                    </li>
                </ul>

                <!-- Bagian kanan navbar -->
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name ?? 'Guest' }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="dropdown-item" type="submit">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid p-0">
        @yield('content')

        @if (!trim($__env->yieldContent('content')))
            <section class="hero-section">
                <div class="container">
                    <h1 class="animate_animated animate_fadeInDown">Layanan Kesehatan Online</h1>
                    <p class="lead animate_animated animate_fadeInUp">
                        Platform kesehatan digital untuk membantu Anda berkonsultasi dengan dokter, memantau kesehatan, dan mendapatkan layanan medis secara mudah dan efisien.
                    </p>
                    <div class="mt-4 animate_animated animatefadeInUp animate_delay-1s">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="btn btn-light me-3">
                                <i class="bi bi-speedometer2 me-2"></i> Pergi ke Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-light me-3">
                                <i class="bi bi-box-arrow-in-right me-2"></i> Login
                            </a>
                            <a href="{{ route('register') }}" class="btn btn-outline-light">
                                <i class="bi bi-person-plus me-2"></i> Daftar Sekarang
                            </a>
                        @endauth
                    </div>
                </div>
            </section>
        @endif
    </div>

    <div class="container mt-4">
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Terjadi kesalahan:</strong>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    @stack('scripts')
</body>
</html>
