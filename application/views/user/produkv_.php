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
<nav class="navbar">
 <a href="<?= base_url(); ?>" class="navbar-brand">
    <img src="<?= base_url('asset/image/logoadrem.png'); ?>" alt="Logo">
  </a>
  <div class="menu-container">
    <a href="<?= base_url(); ?>" class="menu-item">Beranda</a>
    
    <div class="menu-item dropdown">
      <span>Tentang Kami</span>
      <div class="dropdown-menu">
        <a href="<?= base_url('profil-usaha'); ?>" class="dropdown-item">Profil Usaha</a>
        <a href="<?= base_url('organisasi'); ?>" class="dropdown-item">Organisasi</a>
        <a href="<?= base_url('sertifikat'); ?>" class="dropdown-item">Sertifikat</a>
      </div>
    </div>
    
    <a href="<?= base_url('produk'); ?>" class="menu-item">Produk</a>
    
    <a href="<?= base_url('cara-pesan'); ?>" class="menu-item">Cara Pesan</a>
    
    <div class="menu-item dropdown">
      <span>Berita</span>
      <div class="dropdown-menu">
        <a href="<?= base_url('berita'); ?>" class="dropdown-item">Berita</a>
        <a href="<?= base_url('galeri-foto'); ?>" class="dropdown-item">Galeri Foto</a>
      </div>
    </div>
    
    <a href="<?= base_url('galeri-foto'); ?>" class="menu-item">Galeri Foto</a>
  </div>
</nav>

        <div class="search-container">
            <button class="kategori-button">
                <span>Kategori</span>
                <img src="path/to/menu-icon.svg" alt="menu icon">
            </button>
            
            <div class="search-wrapper">
                <input type="text" class="search-input" placeholder="Blouse">
                <svg class="search-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
            </div>
        </div>
    <div class="products-container">
        <div class="products-grid" width="301px">
            <div class="product-card">
            <div class="product-info">
            <img src="asset/image/adrem.png" alt="Adrem Mawar Merah" width="200px" height="200px" >
                <h3 class="product-name">Adrem Mawar Merah</h3>
                <p class="product-price">Rp 82.000</p>
               <div class="product-actions">
                    <a href="produk/detail_produk" class="btn-detail" align-items ="center">Lihat Detail</a>
                  </div> 
                  <br>
                  <div class="product-actions">
                    <a href="#" class="btn-whatsapp">
                        <img src="whatsapp-icon.svg" alt="WhatsApp" class="whatsapp-icon">
                        Pesan Sekarang
                    </a>
                </div>
                  
            </div>
        </div>

    </div>
</div>


<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
</body>
</html>