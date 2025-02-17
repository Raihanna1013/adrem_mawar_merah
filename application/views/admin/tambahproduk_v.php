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
                    <a class="nav-link active" href="<?php echo site_url('Admin/Produk'); ?>">Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('Admin/Berita'); ?>">Berita</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('Admin/Tentang'); ?>">Tentang Kami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('Admin/Galeri'); ?>">Galeri</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container mt-4">
        <h2>Tambah Produk Baru</h2>

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
        <form action="<?php echo site_url('Admin/Produk/tambah_proses'); ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama_barang">Nama Produk</label>
                <input type="text" class="form-control" id="nama_barang" name="nama_barang" required>
            </div>

            <div class="form-group">
                <label for="harga_barang">Harga Produk</label>
                <input type="number" class="form-control" id="harga_barang" name="harga_barang" step="0.01" required>
            </div>

            <div class="form-group">
                <label for="jumlah_barang">Jumlah Barang</label>
                <input type="number" class="form-control" id="jumlah_barang" name="jumlah_barang"  required>
            </div>

            <div class="form-group">
                <label for="foto_barang">Foto Produk</label>
                <input type="file" class="form-control" id="foto_barang" name="foto_barang" required>
            </div>

            <div class="form-group">
                <label for="deskripsi_barang">Deskripsi Barang</label>
                <textarea type="number" class="form-control" id="deskripsi_barang" name="deskripsi_barang"  required></textarea>
            </div>

            <div class="form-group">
                <label for="link_produk">Link Produk</label>
                <input type="text" class="form-control" id="link_produk" name="link_produk" required>
            </div>

            <button type="submit" class="btn btn-primary">Tambah Produk</button>
        </form>

    </div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
