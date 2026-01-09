<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Penerimaan Siswa Baru - SMK Jaya')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* CSS Tambahan untuk Tampilan Awal yang Elegan */
        .hero-section {
            background: linear-gradient(to right, #2466f7ff, #2466f7ff); /* Gradient dari biru muda ke toska */
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
            color: #264bb1ff;
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
            color: #6284f1ff;
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
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/dashboard') }}">Penerimaan Siswa Baru</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNavbar">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <!-- Dropdown Admin -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="menuDataLayanan" data-bs-toggle="dropdown">
                            Admin
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="menuAdmin">
                            <li><a class="dropdown-item" href="{{ route('berkaspendaftaran.index') }}">Berkas Pendaftaran</a></li>
                             <li><a class="dropdown-item" href="{{ route('nilaiseleksi.index') }}">Nilai Seleksi</a></li>
                            <li><a class="dropdown-item" href="{{ route('pengumuman.index') }}">Pengumuman</a></li>
                        </ul>
                    </li>

                    <!-- Dropdown Data Calon Siswa -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="menuMaster" data-bs-toggle="dropdown">
                            Data Calon Siswa
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="menuCalonSiswa">
                            <li><a class="dropdown-item" href="{{ route('calonsiswa.index') }}">Calon Siswa</a></li>
                            <li><a class="dropdown-item" href="{{ route('jurusan.index') }}">Jurusan</a></li>
                            <li><a class="dropdown-item" href="{{ route('pendaftaran.index') }}">Pendaftaran</a></li>
                           
                        </ul>
                    </li>

                    <!-- Dropdown Laporan -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="menuLaporan" data-bs-toggle="dropdown">
                           Laporan
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="menuLaporan">
                            <li><a class="dropdown-item" href="{{ route('laporan.index') }}">Laporan </a></li>
                            <li><a class="dropdown-item" href="{{ route('rekapdata.index') }}">Rekap Data</a></li>
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
                    <h1 class="animate_animated animate_fadeInDown">Layanan Penerimaan Siswa Baru </h1>
                    <p class="lead animate_animated animate_fadeInUp">
                        Sistem Penerimaan Siswa Baru berbasis web untuk pendaftaran online, seleksi, dan pengumuman secara mudah dan terintegrasi.
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
