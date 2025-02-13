<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Gaweo Kaos</title>
    
    <!-- CSS Libraries -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('asset/style/home_admin.css')?>">

    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin: 0;
            padding: 0;
            width: 100%;
            min-height: 100vh;
            background-color: #f8f9fa; /* Warna latar belakang */
            overflow-x: hidden; /* Mencegah scrolling horizontal */
        }

        .main-content {
            width: 100%;
            max-width: 1200px; /* Membatasi lebar maksimal konten */
            margin: 0 auto; /* Memastikan elemen berada di tengah */
            padding: 0;
        }

        .container {
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
            max-width: 100%;
        }

        .main-content {
            margin-top: 72px; /* Height of navbar + some spacing */
            padding: 0;
            width: 100%;
        }

        .welcome-section {
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            color: black;
            padding: 2rem;
            width: 100%;
        }

        .welcome-section h1 {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }

        .stats-container {
            padding: 2rem;
            width: 100%;
        }

        .stat-card {
            background: white;
            border-radius: 10px;
            padding: 1.5rem;
            margin-bottom: 1rem;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
            height: 100%;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-card h2 {
            color: var(--primary-color);
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }

        .stat-card .number {
            font-size: 2rem;
            font-weight: bold;
            color: var(--accent-color);
        }

        .stat-card .icon {
            font-size: 2.5rem;
            color: var(--accent-color);
            margin-bottom: 1rem;
        }

        .container {
            padding-right: 15px;
            padding-left: 15px;
            max-width: 100%;
        }

        @media (max-width: 768px) {
            .welcome-section {
                text-align: center;
            }

            .welcome-section h1 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar (menggunakan navbar bawaan Bootstrap) -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <img src="<?= base_url('asset/image/logoadrem.png'); ?>" alt="Logo" width="40px" height="40px">
        <a class="navbar-brand" href="">  Admin Adrem Merah</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="<?php echo site_url('admin/Dashboard'); ?>">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('admin/Produk'); ?>">Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('admin/Berita'); ?>">Berita</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('admin/Galeri'); ?>">Galeri</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="main-content">
        <!-- Welcome Section -->
        <div class="welcome-section">
            <div class="container">
                <h1>Selamat Datang</h1>
                <p class="lead">Kelola bisnis Anda dengan mudah dan efisien melalui dashboard admin Adrem Merah.</p>
            </div>
        </div>

        <!-- Stats Container -->
        <!-- <div class="stats-container">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="stat-card text-center">
                            <i class="fas fa-box icon"></i>
                            <h2>Total Produk</h2>
                            <div class="number"><?php echo number_format($total_produk, 0, ',', '.'); ?></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="stat-card text-center">
                            <i class="fas fa-shopping-cart icon"></i>
                            <h2>Total Pesanan</h2>
                            <div class="number"><?php echo number_format($total_pesanan, 0, ',', '.'); ?></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="stat-card text-center">
                            <i class="fas fa-money-bill-wave icon"></i>
                            <h2>Total Pembayaran</h2>
                            <div class="number">Rp <?php echo number_format($total_pembayaran ?? 0, 0, ',', '.'); ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>