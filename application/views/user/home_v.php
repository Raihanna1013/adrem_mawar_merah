<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adrem Mawar Merah</title>
   <link rel="stylesheet" href="asset/style/style.css">
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
<nav class="navbar navbar-expand-lg" style="background-color: #F5F5DC;">
    <div class="container">
        <a class="navbar-brand" href="#" style="color:rgb(48, 12, 12);">Gaweo Kaos</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Beranda</a>
                </li>

                <!-- Dropdown Tentang Kami -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="tentangKamiDropdown" role="button" data-bs-toggle="dropdown">
                        Tentang Kami
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Profil Perusahaan</a></li>
                        <li><a class="dropdown-item" href="#">Visi & Misi</a></li>
                        <li><a class="dropdown-item" href="#">Tim Kami</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Produk</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Cara Pesan</a>
                </li>

                <!-- Dropdown Berita -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="beritaDropdown" role="button" data-bs-toggle="dropdown">
                        Berita
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Berita Terkini</a></li>
                        <li><a class="dropdown-item" href="#">Artikel & Blog</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Galeri Foto</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Headline -->
<section id="home">
    <div class="content">
      <h3>ADREM MERAH <br>  KHAS BANTUL</h3>
      <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Libero, fugit
         <br>ipsum dolor sit amet consectetur.
      </p>
      <button id="btn">Shop Now</button>
    </div>
   </section>
</div>

<!-- Tentang adrem -->
<!-- about section -->
<div class="about" id="about">
  <div class="container">
  <div class="heading">About <span>Us</span></div>
    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <img src="./images/about.png" alt="">
        </div>
      </div>
      <div class="col-md-6">
        <h3>What Makes Our Coffee Special?</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum minima numquam porro consequuntur ipsum, nulla aliquam amet quam consequatur expedita.
          <br><br>Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque minus dicta quia maxime! Suscipit rerum similique non perferendis maiores rem, cumque explicabo exercitationem deserunt illum in aperiam natus impedit recusandae?
          <br><br>Lorem ipsum dolor sit amet consectetur adipisicing elit. Id rem voluptates harum, quis excepturi voluptatum!
         </p>
         <button id="about-btn">Learn More.</button>
      </div>
    </div>
  </div>
</div>
<!-- about section -->



<!-- Bootstrap 5.3 Bundle JS (Sudah termasuk Popper.js) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
