<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adrem Mawar Merah</title>
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
 <!-- navbar -->
 <nav class="navbar">
 <a href="<?= base_url(); ?>" class="navbar-brand">
    <img src="<?= base_url('asset/image/logoadrem.png'); ?>" alt="Logo">
  </a>
  <div class="menu-container">
    <a href="<?= base_url(); ?>" class="menu-item">Beranda</a>
    
    <div class="menu-item dropdown">
      <span>Tentang Kami</span>
      <div class="dropdown-menu">
        <a href="<?= base_url('tentang_kami'); ?>" class="dropdown-item">Profil Usaha</a>
        <a href="<?= base_url('organisasi'); ?>" class="dropdown-item">Organisasi</a>
        <a href="<?= base_url('sertifikat'); ?>" class="dropdown-item">Sertifikat</a>
      </div>
    </div>
    
    <a href="<?= base_url('produk'); ?>" class="menu-item">Produk</a>
    
    
    <div class="menu-item dropdown">
      <span>Berita</span>
      <div class="dropdown-menu">
        <a href="<?= base_url('berita'); ?>" class="dropdown-item">Berita</a>
        <a href="<?= base_url('galeri-foto'); ?>" class="dropdown-item">Galeri Foto</a>
      </div>
    </div>
    
    <a href="<?= base_url('galeri'); ?>" class="menu-item">Galeri Foto</a>
  </div>
</nav>

<!-- Headline -->
      <!-- home section -->
      <section class="home-section">
    <div class="content">
      <h3>Start Your Day With a <br> Fresh Coffee</h3>
      <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Libero, fugit
         <br>ipsum dolor sit amet consectetur.
      </p>
      <button id="btn" >Shop Now</button>
    </div>
   </section>

<!-- home section -->

    </div>

      <!-- Widget Produk -->
      <section class="widget-section">
      <div class="container">
            <!-- Widget 1: Lihat Etalase Produk Kami -->
            <div class="widget red">
                <br>
                <h2>Lihat Etalase<br>Produk Kami</h2><br>
                <button class="button">Lihat Produk</button>
                <img class="product-image" src="asset/image/adrem.png" alt="Produk" />
            </div>
            <div class="right-column">
                <!-- Widget 2: 100% Produk UMKM -->
                <div class="widget small-widget light-yellow widget-horizontal">
                    <h3>100% Produk<br>UMKM</h3>
                    <img class="product-image-left" src="image.png" alt="Produk" />
                </div>
                <!-- Widget 3: Kunjungi Galeri Produk Kami -->
                <div class="widget small-widget light-gray">
                    <h3>Kunjungi Galeri<br>Produk Kami</h3>
                    <img class="product-image-small-2" src="asset/image/adrem.png" alt="Produk" />
                </div>
            </div>
        </div>
        </section>
 <!-- Produk Adrem -->
<!-- Tentang adrem -->
<!-- about section -->
<!-- about section -->
<div class="container">
<section class="about-section">
        <div class="about-image">
            <img src="<?= base_url('images/adrem.jpg'); ?>" alt="Adrem Mawar Merah">
        </div>
        <div class="about-content">
            <h2>Tentang Adrem<br>Mawar Merah</h2>
            <p>Lorem ipsum dolor sit amet consectetur. Risus venenatis molestie sed tellus mauris sed fermentum egestas amet. Dapibus tincidunt pellentesque posuere accumsan.</p>
            <a href="Tentang_Kami" class="info-button">Info Lebih Lanjut</a>
        </div>
    </section>
</div>
<!-- Location Section - dipindahkan ke sini -->
<section class="location-section">
  <div class="container">
    <div class="row">
      <div class="col-md-7">
        <div class="map-container">
          <iframe 
            src="https://www.google.com/maps/embed?pb=YOUR_MAPS_EMBED_CODE"
            width="100%" 
            height="450" 
            style="border:0;" 
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade">
          </iframe>
        </div>
      </div>
      <div class="col-md-5">
        <div class="location-content">
          <h2>Temukan Kami disini!</h2>
          <p>Hubungi Kontak dibawah ini untuk selengkapnya</p>
          <div class="social-links">
            <a href="#" class="social-link">
              <img src="path/to/whatsapp-icon.png" alt="WhatsApp">
            </a>
            <a href="#" class="social-link">
              <img src="path/to/shopee-icon.png" alt="Shopee">
            </a>
            <a href="#" class="social-link">
              <img src="path/to/instagram-icon.png" alt="Instagram">
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>

<!-- News Section -->
<section class="news-section">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="news-intro">
          <h2>Berita Terbaru</h2>
          <p>Ikuti terus informasi dan berita terbaru seputar Adrem Mawar Merah untuk mendapatkan update terkini.</p>
          <button class="read-more-btn">Lihat Semua</button>
        </div>
      </div>
      <div class="col-md-8">
        <div class="news-listings">
          <div class="news-item">
            <div class="news-info">
              <h4>Pembukaan Cabang Baru Adrem Mawar Merah</h4>
              <div class="news-meta">
                <span><i class="far fa-calendar"></i> 20 Maret 2024</span>
                <span><i class="far fa-user"></i> Admin</span>
                <span><i class="far fa-folder"></i> Pengumuman</span>
              </div>
            </div>
            <button class="read-btn">Baca Selengkapnya</button>
          </div>

          <div class="news-item">
            <div class="news-info">
              <h4>Promo Spesial Ramadhan</h4>
              <div class="news-meta">
                <span><i class="far fa-calendar"></i> 15 Maret 2024</span>
                <span><i class="far fa-user"></i> Admin</span>
                <span><i class="far fa-folder"></i> Promo</span>
              </div>
            </div>
            <button class="read-btn">Baca Selengkapnya</button>
          </div>

          <div class="news-item">
            <div class="news-info">
              <h4>Menu Baru: Adrem Varian Coklat</h4>
              <div class="news-meta">
                <span><i class="far fa-calendar"></i> 10 Maret 2024</span>
                <span><i class="far fa-user"></i> Admin</span>
                <span><i class="far fa-folder"></i> Produk</span>
              </div>
            </div>
            <button class="read-btn">Baca Selengkapnya</button>
          </div>

          <div class="news-item">
            <div class="news-info">
              <h4>Tips Menyimpan Kue Adrem Agar Tahan Lama</h4>
              <div class="news-meta">
                <span><i class="far fa-calendar"></i> 5 Maret 2024</span>
                <span><i class="far fa-user"></i> Admin</span>
                <span><i class="far fa-folder"></i> Tips</span>
              </div>
            </div>
            <button class="read-btn">Baca Selengkapnya</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Gallery Section -->
<section class="gallery-section">
  <div class="container">
    <div class="gallery-grid">
      <div class="gallery-item">
        <div class="gallery-card">
          <img src="asset/image/adrem.png" alt="Tempat Wisata Yogyakarta Terbaru Hits">
          <div class="badge info">INFO</div>
          <div class="gallery-overlay">
            <h4>Tempat Wisata Yogyakarta Terbaru Hits</h4>
            <span class="date">21 December 2023</span>
          </div>
        </div>
      </div>

      <div class="gallery-item">
        <div class="gallery-card">
          <img src="path/to/image2.jpg" alt="Ruang Lukisan Keraton Yogyakarta">
          <div class="badge info">INFO</div>
          <div class="gallery-overlay">
            <h4>Ruang Lukisan Keraton Yogyakarta</h4>
            <span class="date">13 June 2024</span>
          </div>
        </div>
      </div>

      <div class="gallery-item">
        <div class="gallery-card">
          <img src="path/to/image3.jpg" alt="Wisata Lebaran di Yogyakarta">
          <div class="badge info">INFO</div>
          <div class="gallery-overlay">
            <h4>Wisata Lebaran di Yogyakarta</h4>
            <span class="date">April 2024</span>
          </div>
        </div>
      </div>

      <!-- Tambahkan item galeri lainnya dengan pola yang sama -->
    </div>
  </div>
</section>

<!-- Modal Gallery -->
<div id="galleryModal" class="modal">
  <span class="close-modal" onclick="closeModal()">&times;</span>
  <button class="modal-prev" onclick="changeSlide(-1)">&#10094;</button>
  <button class="modal-next" onclick="changeSlide(1)">&#10095;</button>
  
  <div class="modal-content">
    <img id="modalImage" src="">
    <div class="modal-caption">
      <h3 id="modalTitle"></h3>
      <p id="modalDate"></p>
    </div>
    <button class="load-more">Tampilkan Lebih Banyak</button>
  </div>
</div>

<!-- Bootstrap 5.3 Bundle JS (Sudah termasuk Popper.js) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Footer -->
<footer class="footer">
  <div class="container">
    <div class="footer-content">
      <!-- Logo Column -->
      <div class="footer-logo">
        <img src="<?php echo base_url('asset/image/logoadrem.png'); ?>" alt="Logo">
      </div>

      <!-- Company Column -->
      <div class="footer-column">
        <h3>Company</h3>
        <ul>
          <li><a href="#">About</a></li>
          <li><a href="#">Press</a></li>
          <li><a href="#">Events</a></li>
          <li><a href="#" class="request-demo">Request Demo <i class="fas fa-arrow-right"></i></a></li>
        </ul>
      </div>

      <!-- Our Service Column -->
      <div class="footer-column">
        <h3>Our Service</h3>
        <ul>
          <li><a href="#">Official Store</a></li>
          <li><a href="#">Product</a></li>
          <li><a href="#">Style brand</a></li>
        </ul>
      </div>

      <!-- Resources Column -->
      <div class="footer-column">
        <h3>Resources</h3>
        <ul>
          <li><a href="#">Help Center</a></li>
          <li><a href="#">Blog</a></li>
          <li><a href="#">Tutorials</a></li>
          <li><a href="#">FAQs</a></li>
        </ul>
      </div>

      <!-- Support Column -->
      <div class="footer-column">
        <h3>Support</h3>
        <ul>
          <li><a href="#">Contact Us</a></li>
          <li><a href="#">Developers</a></li>
          <li><a href="#">Documentation</a></li>
          <li><a href="#">Integrations</a></li>
        </ul>
      </div>

      <!-- Social Media Column -->
      <div class="footer-column">
        <h3>Social media</h3>
        <div class="social-links">
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-facebook"></i></a>
          <a href="#"><i class="fab fa-tiktok"></i></a>
        </div>
      </div>
    </div>
    <br>

    <!-- Footer Bottom -->

</footer>

</body>
</html>
