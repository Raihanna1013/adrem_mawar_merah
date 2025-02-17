<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Tambah Produk</title>
    <!-- Menambahkan link Bootstrap untuk tabel -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('asset/css/home_admin.css'); ?>">

    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

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
                    <a class="nav-link " href="<?php echo site_url('Admin/Dashboard'); ?>">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="<?php echo site_url('Admin/Produk'); ?>">Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('Admin/Berita'); ?>">Berita</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="<?php echo site_url('Admin/tentang'); ?>">Tentang Kami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('Admin/Galeri'); ?>">Galeri</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container mt-4">
        <h2>Tambah Sertifikat</h2>

        <!-- Cek jika ada flashdata success -->
        <?php if ($this->session->flashdata('success')): ?>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Produk Berhasil Ditambahkan!',
                    text: '<?php echo $this->session->flashdata('success'); ?>',
                    showConfirmButton: true
                });
            </script>
        <?php endif; ?>

        <!-- Form untuk tambah produk -->
        <form action="<?php echo site_url('Admin/Tentang/tambah_sertifikataction'); ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
            
            <div class="form-group">
                <label for="deskripsi_sertifikat">Deskripsi</label>
                <input type="text" class="form-control" id="deskripsi_sertifikat" name="deskripsi_sertifikat"  required>
            </div>

            <div class="form-group">
                <label for="gambar_sertifikat">Foto Dokumentasi</label>
                <input type="file" class="form-control" id="gambar_sertifikat" name="gambar_sertifikat">
            </div>

            <button type="submit" class="btn btn-primary">Tambah Data Profil</button>
        </form>

    </div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
