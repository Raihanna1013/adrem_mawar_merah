<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo base_url('asset/css/home_adm.css')?>">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f6f9;
            /* padding-top: 60px; Agar konten tidak tertutup navbar */
        }

        .container {
            margin-top: 30px;
        }

        h2 {
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
        }

        .table {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }

        .table th {
            background-color: #007bff;
            color: #fff;
        }

        .table img {
            width: 70px;
            height: auto;
            border-radius: 5px;
        }

        .btn {
            border-radius: 5px;
            padding: 5px 10px;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-warning {
            background-color: #ffc107;
            border: none;
        }

        .btn-warning:hover {
            background-color: #e0a800;
        }

        .btn-danger {
            background-color: #dc3545;
            border: none;
        }

        .btn-danger:hover {
            background-color: #c82333;
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
                    <a class="nav-link  " href="<?php echo site_url('Admin/Dashboard'); ?>">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('Admin/Produk'); ?>">Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="<?php echo site_url('Admin/Berita'); ?>">Berita</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('Admin/Tentang'); ?>">Tentang Kami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="<?php echo site_url('Admin/Galeri'); ?>">Galeri</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container mt-5">
        <h2>List Berita</h2>

        <!-- Tombol Tambah Produk -->
        <a href="<?php echo site_url('Admin/Berita/berita_baru'); ?>" class="btn btn-primary mb-3">Tambah List Berita</a>

        <!-- Tabel Produk dengan Bootstrap -->
        <table class="table table-striped table-bordered">
        <thead>
                <tr>
                    <th>Judul Berita</th>
                    <th>Gambar Berita</th>
                    <th>Isi Berita</th>
                    <th>Tanggal Berita</th>
                    <th>Aksi</th>  <!-- Menambahkan kolom aksi -->
                </tr>
            </thead>
        <tbody>
        <?php if (!empty($berita)) : ?>
         <?php foreach ($berita as $brt): ?>
        <tr>
            <td><?php echo $brt['judul_berita']; ?></td>
            <td><img src="<?php echo base_url('/asset/img/' . $brt['gambar_berita']); ?>" alt="Gambar Berita"></td>
            <td><?php echo $brt['isi_berita']; ?></td>
            <td><?php echo $brt['tanggal_berita']; ?></td>
            <td><a href="<?php echo site_url('Admin/Berita/editberita/'.$brt['id_berita']);?>">Edit</a>
            |<a href="<?php echo site_url('Admin/Berita/hapus_berita/'.$brt['id_berita']);?>">Hapus</a></td>
        </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr><td colspan="5">Tidak ada produk tersedia.</td></tr>
    <?php endif; ?>
        </tbody>
        </table>
    </div>

    <!-- Script Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>