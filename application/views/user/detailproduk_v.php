<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adrem Merah | Detail Produk</title>

    <link rel="stylesheet" href="asset/style/style.css?v=2">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">


    <!-- Font Poppin -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

</head>
<body>
<div class="all-content">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #FDF6E7;">
        <div class="container">
            <!-- Logo -->
            <a href="<?= base_url(); ?>" class="navbar-brand">
                <img src="<?= base_url('asset/image/logoadrem.png'); ?>" alt="Logo" height="50">
            </a>

            <!-- Toggle Button for Mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menu -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item" style="margin-left: 10px;">
                        <a href="<?= base_url(); ?>" class="nav-link" style="color: #B22222; font-size: 14px;">Beranda</a>
                    </li>

                    <!-- Dropdown Tentang Kami -->
                    <li class="nav-item dropdown" style="margin-left: 10px;">
                        <a class="nav-link dropdown-toggle" href="#" id="tentangKamiDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #B22222; font-size: 14px;">
                            Tentang Kami
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="tentangKamiDropdown" style="background-color: #FDF6E7;">
                            <li><a class="dropdown-item" href="<?= base_url('profil-usaha'); ?>" style="color: #B22222; font-size: 14px;">Profil Usaha</a></li>
                            <li><a class="dropdown-item" href="<?= base_url('organisasi'); ?>" style="color: #B22222; font-size: 14px;">Organisasi</a></li>
                            <li><a class="dropdown-item" href="<?= base_url('sertifikat'); ?>" style="color: #B22222; font-size: 14px;">Sertifikat</a></li>
                        </ul>
                    </li>

                    <li class="nav-item" style="margin-left: 10px;">
                        <a href="<?= base_url('produk'); ?>" class="nav-link" style="color: #B22222; font-size: 14px;">Produk</a>
                    </li>

                    <li class="nav-item" style="margin-left: 10px;">
                        <a href="<?= base_url('cara-pesan'); ?>" class="nav-link" style="color: #B22222; font-size: 14px;">Cara Pesan</a>
                    </li>

                    <!-- Dropdown Berita -->
                    <li class="nav-item dropdown" style="margin-left: 10px;">
                        <a class="nav-link dropdown-toggle" href="#" id="beritaDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #B22222; font-size: 14px;">
                            Berita
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="beritaDropdown" style="background-color: #FDF6E7;">
                            <li><a class="dropdown-item" href="<?= base_url('berita'); ?>" style="color: #B22222; font-size: 14px;">Berita</a></li>
                            <li><a class="dropdown-item" href="<?= base_url('galeri-foto'); ?>" style="color: #B22222; font-size: 14px;">Galeri Foto</a></li>
                        </ul>
                    </li>

                    <li class="nav-item" style="margin-left: 10px;">
                        <a href="<?= base_url('galeri-foto'); ?>" class="nav-link" style="color: #B22222; font-size: 14px;">Galeri Foto</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
