<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PSB Online - SMK Jaya</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        :root {
            --primary: #1E88E5;
            --secondary: #1565C0;
            --accent: #42A5F5;
            --bg-light: #F4F6F8;
            --text-dark: #333;
            --text-light: #fff;
        }

        body {
            margin: 0;
            font-family: "Roboto", sans, serif;
            background: var(--bg-light);
            color: var(--text-dark);
        }

        h1, h2, h3 {
            font-family: "Roboto", sans serif;
            font-weight: bold;
        }

        p, li, a {
            font-family: "Roboto", sans serif;
            font-size: 16px;
        }

        /* HEADER */
        header {
            background: var(--text-light);
            padding: 15px 0;
            box-shadow: 0 2px 6px rgba(0,0,0,.1);
        }

        .navbar {
            max-width: 1200px;
            margin: auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .nav-links {
            list-style: none;
            display: flex;
            gap: 20px;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--primary);
            font-weight: bold;
        }

        /* HERO */
        .hero {
            background: 
                        url("{{ asset('img/sekolah.jpg') }}") center/cover no-repeat;
            color: #fff;
            padding: 120px 20px;
            text-align: center;
            border-bottom-left-radius: 25px;
            border-bottom-right-radius: 25px;
        }

        .hero h1 {
            font-size: 3rem;
            margin-bottom: 10px;
        }

        .hero p {
            font-size: 1.2rem;
        }

        .btn {
            display: inline-block;
            padding: 12px 28px;
            margin: 10px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
        }

        .btn-primary {
            background: var(--accent);
            color: #fff;
        }

        .btn-secondary {
            background: var(--secondary);
            color: #fff;
        }

        /* FEATURES */
        .section {
            padding: 80px 20px;
            text-align: center;
        }

        .grid {
            max-width: 1200px;
            margin: auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px,1fr));
            gap: 25px;
        }

        .card {
            background: #fff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(45, 146, 214, 0.08);
        }

        .card i {
            font-size: 3em;
            color: var(--primary);
            margin-bottom: 10px;
        }

        /* FOOTER */
        footer {
            background: var(--primary);
            color: #fff;
            text-align: center;
            padding: 30px;
        }
    </style>
</head>

<body>

<header>
    <nav class="navbar">
        <h2 style="color:var(--primary)">SMK JAYA</h2>
        <ul class="nav-links">
            <li><a href="/">Beranda</a></li>
            <li><a href="#alur">Alur PSB</a></li>
            <li><a href="#pengumuman">Pengumuman</a></li>
            <li><a href="#kontak">Kontak</a></li>

            @guest
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
            @else
                <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
            @endguest
        </ul>
    </nav>
</header>

<!-- HERO -->
<section class="hero">
    <h1>Penerimaan Siswa Baru</h1>
    <p>SMK Jaya Tahun Ajaran {{ date('Y') }}/{{ date('Y')+1 }}</p>

    <a href="{{ route('login') }}" class="btn btn-primary">Daftar Sekarang</a>
    <a href="#alur" class="btn btn-secondary">Lihat Alur PSB</a>
</section>

<!-- FITUR -->
<section class="section" id="alur">
    <h2>Fitur Sistem PSB</h2>
    <div class="grid">

        <div class="card">
            <i class="fas fa-user-edit"></i>
            <h3>Pendaftaran Online</h3>
            <p>Calon siswa melakukan pendaftaran secara online melalui website.</p>
        </div>

        <div class="card">
            <i class="fas fa-folder-open"></i>
            <h3>Seleksi Berkas</h3>
            <p>Panitia memverifikasi data dan berkas calon siswa.</p>
        </div>

        <div class="card">
            <i class="fas fa-chart-line"></i>
            <h3>Penilaian</h3>
            <p>Penilaian berdasarkan kriteria akademik dan non-akademik.</p>
        </div>

        <div class="card">
            <i class="fas fa-bullhorn"></i>
            <h3>Pengumuman</h3>
            <p>Hasil seleksi diumumkan secara online dan transparan.</p>
        </div>

        <div class="card">
            <i class="fas fa-file-alt"></i>
            <h3>Laporan</h3>
            <p>Admin dapat mencetak laporan data pendaftar dan hasil seleksi.</p>
        </div>

    </div>
</section>

<footer id="kontak">
    <p>&copy; {{ date('Y') }} SMK Jaya | Sistem Penerimaan Siswa Baru</p>
</footer>

</body>
</html>
