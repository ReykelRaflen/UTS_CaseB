<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Aplikasi Pemesanan Tiket Konser</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* semua CSS kamu tetap ada, tidak ada yang dihapus */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            font-family: 'Segoe UI', sans-serif;
            background-color: #f4f6fa;
            color: #2c3e50;
        }
        header, footer {
            background: #4b3f72;
            color: white;
            text-align: center;
            padding: 1rem;
        }
        header h1 {
            font-size: 2rem;
            font-weight: 600;
        }
        .container {
            flex: 1;
            max-width: 1000px;
            margin: 0 auto;
            padding: 2rem;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.04);
        }
        table {
            width: 100%;
            background: white;
            border-collapse: collapse;
            margin: 1rem 0;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 6px rgba(0,0,0,0.05);
        }
        table th, table td {
            padding: 0.8rem;
            border: 1px solid #e0e0e0;
            text-align: center;
        }
        .btn {
            padding: 0.4rem 1rem;
            background: #6c63ff;
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            margin: 0.2rem;
            transition: 0.3s ease;
        }
        .btn:hover {
            background: #5848c2;
            transform: scale(1.05);
        }
        .pagination {
            display: flex;
            justify-content: flex-end;
            margin-top: 1rem;
        }
        .pagination .page-item.active .page-link {
            background-color: #6c63ff;
            border-color: #6c63ff;
            color: white;
        }
        .pagination .page-link {
            color: #4b3f72;
        }
        footer {
            font-size: 0.9rem;
            font-weight: 300;
            margin-top: auto;
        }
        @media (max-width: 768px) {
            header h1 {
                font-size: 1.5rem;
            }
            .container {
                padding: 1rem;
            }
            table th, table td {
                padding: 0.6rem;
                font-size: 0.9rem;
            }
        }
        form input,
        form select {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 1rem;
            background-color: #fdfdfd;
            transition: 0.3s;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        }
        form input:focus,
        form select:focus {
            border-color: #6c63ff;
            box-shadow: 0 0 5px rgba(108, 99, 255, 0.4);
            outline: none;
        }
        form h2 {
            font-weight: 600;
            margin-bottom: 1rem;
            color: #4b3f72;
        }
        form .btn {
            background-color: #6c63ff;
            font-weight: 500;
            letter-spacing: 0.5px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        form .btn:hover {
            background-color: #5848c2;
            transform: scale(1.03);
        }
        @media (max-width: 768px) {
            form {
                padding: 1rem;
            }
            form input,
            form select {
                font-size: 0.95rem;
            }
        }

            /* === Custom Navbar Style === */
  

    /* Style untuk link navbar */
    .custom-navbar .nav-link {
        color: #2c3e50; /* Warna teks navbar jadi abu gelap, jelas dan tegas */
        font-weight: 600;
        margin-left: 15px;
        transition: color 0.3s ease; /* Smooth transisi saat hover */
    }

    /* Hover effect untuk link navbar */
    .custom-navbar .nav-link:hover {
        color: #6c63ff; /* Saat hover, teks berubah jadi ungu cerah */
    }

    /* Aktif link navbar (halaman yang sedang dibuka) */
    .custom-navbar .nav-link.active {
        border-bottom: 2px solid #6c63ff; /* Garis bawah ungu cerah untuk tandai aktif */
        color: #6c63ff; /* Warna teks aktif ungu cerah */
    }

    /* Navbar brand (logo/tulisan TiketKonser) */
    .custom-navbar .navbar-brand {
        color: #4b3f72; /* Warna brand lebih bold ungunya */
        font-weight: bold;
        font-size: 1.2rem;
        transition: color 0.3s ease;
    }

    /* Hover untuk brand */
    .custom-navbar .navbar-brand:hover {
        color: #6c63ff; /* Saat hover brand juga ungu cerah */
    }
        
    </style>
</head>
<body>

<header>
    <h1>Aplikasi Pemesanan Tiket Konser</h1>
</header>

<!-- Mulai Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark custom-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ route('pemesanans.index') }}">🎵 TiketKonser</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('pemesanans.index') ? 'active' : '' }}" href="{{ route('pemesanans.index') }}">Daftar Pemesanan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('pemesanans.create') ? 'active' : '' }}" href="{{ route('pemesanans.create') }}">Tambah Pemesanan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('pemesanans.riwayat') ? 'active' : '' }}" href="{{ route('pemesanans.riwayat') }}">Riwayat Dihapus</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Akhir Navbar -->


<div class="container">
    @yield('content')
</div>

<footer>
    &copy; 2025 Aplikasi Tiket Konser | Reykel Raflen Awang
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
