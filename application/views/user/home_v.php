<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adrem Mawar Merah</title>
    <link rel="stylesheet" href="asset/style/style.css?v=2">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- bootstrap links -->


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
        <a href="<?= base_url('galeri'); ?>" class="dropdown-item">Galeri Foto</a>
      </div>
    </div>
    
    <a href="<?= base_url('galeri'); ?>" class="menu-item">Galeri Foto</a>
  </div>
</nav>

<!-- Headline -->
<!-- home section -->
<section id="home" >
  
    <div class="content">
      <h3>Start Your Day With <br> a Fresh Coffee</h3>
      <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Libero, fugit
         <br>ipsum dolor sit amet consectetur.
      </p>
      <br>
      <a href="tentang_kami"  class="button">Info Lebih Lanjut</a>
    </div>
</section>

<!-- home section -->


      <!-- Widget Produk -->
      <section class="widget-section">
      <div class="container">
            <!-- Widget 1: Lihat Etalase Produk Kami -->
            <div class="widget red">
                <br>
                <h2>Lihat Etalase<br>Produk Kami</h2><br>
                <a href="produk" class="button">Lihat Produk</a>
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
<div class="about" id="about">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <img src="./asset/image/adrem.png" alt="">
        </div>
      </div>
      <div class="col-md-6">
        <h3>What Makes Our Coffee Special?</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum minima numquam porro consequuntur ipsum, nulla aliquam amet quam consequatur expedita.
          <br><br>Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque minus dicta quia maxime! Suscipit rerum similique non perferendis maiores rem, cumque explicabo exercitationem deserunt illum in aperiam natus impedit recusandae?
          <br><br>Lorem ipsum dolor sit amet consectetur adipisicing elit. Id rem voluptates harum, quis excepturi voluptatum!
         </p>
         <a href="tentang_kami" id="about_button" class="button">Lebih Lanjut</a>
      </div>
    </div>
  </div>
</div>
<!-- Location Section - dipindahkan ke sini -->
<section class="location">
  <div class="container">
    <div class="row">
      <div class="col-md-7">
        <div class="map-container">
          <iframe
           src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.294926978352!2d110.2755814!3d-7.9684417!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7b010b273afa23%3A0x9f840724e5c3ad6d!2sAdrem%20Mawar%20Merah%20Mbak%20Tini!5e0!3m2!1sid!2sid!4v1739712991227!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
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
          <h2>Temukan Kami di sini!</h2>
          <p>Hubungi kontak di bawah ini untuk selengkapnya</p>
          <div class="social-links">
            <a href="https://wa.me/6282227175035" class="social-link">
              <img src="asset/image/waputih1.png" alt="WhatsApp">
            </a>
            <a href="https://id.shp.ee/josziRe" class="social-link">
              <img src="asset/image/shopeeputih2.png" alt="Shopee">
            </a>
            <a href="https://www.instagram.com/mawarmerah.umkm?igsh=eHowYjZyN2ZpODBy&utm_source=qr" class="social-link">
              <img src="asset/image/igputih2.png" alt="Instagram">
            </a>
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
          <a href="<?= base_url('berita') ?>" class="read-more-btn">Lihat Detail</a>
        </div>
      </div>
      <div class="col-md-8">
    <div class="news-listings">
        <?php if (!empty($berita)): ?>
            <?php foreach ($berita as $item): ?>
                <div class="news-item" style="display: flex; align-items: center; gap: 15px; padding: 15px 0; border-bottom: 1px solid #ddd;">
                    <!-- Gambar kecil -->
                    <div class="news-thumb" style="flex-shrink: 0;">
                        <img src="<?= base_url('asset/img/' . (is_array($item) ? $item['gambar_berita'] : $item->gambar_berita)); ?>" 
                             alt="Thumbnail Berita" 
                             style="width: 100px; height: 100px; object-fit: cover; border-radius: 5px;">
                    </div>
                    
                    <!-- Informasi berita -->
                    <div class="news-info" style="flex-grow: 1; display: flex; flex-direction: column; justify-content: center;">
                        <h4 style="margin: 0; font-weight: bold;">
                            <?= is_array($item) ? $item['judul_berita'] : $item->judul_berita; ?>
                        </h4>
                        <div class="news-meta" style="color: #777; font-size: 14px; margin: 5px 0;">
                            <span>
                                <i class="far fa-calendar"></i>
                                <?= date('d F Y', strtotime(is_array($item) ? $item['tanggal_berita'] : $item->tanggal_berita)); ?>
                            </span>
                        </div>
                    </div>

                    <!-- Tombol Baca Selengkapnya -->
                    <div class="news-action">
                        <button class="read-btn" style="background: #b22222; color: white; border: none; padding: 8px 15px; border-radius: 5px; cursor: pointer;">
                            Baca Selengkapnya
                        </button>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="no-news">
                <p>Belum ada berita yang tersedia.</p>
            </div>
        <?php endif; ?>
    </div>
</div>
    </div>
  </div>
</section>

<!-- Gallery Section -->
<div class="gallery-section">
    <div class="container">
        <div class="gallery-grid">
            <?php if (!empty($galeri)): ?>
                <?php foreach ($galeri as $item): ?>
                    <div class="gallery-item">
                        <div class="gallery-card">
                            <img src="<?= base_url('asset/img/' . $item['gambar_galeri']); ?>" alt="<?= $item['judul_galeri'] ?>">
                            <div class="gallery-overlay">
                                <h5 class="card-title"><?= $item['judul_galeri'] ?></h5>
                                <p class="card-text tanggal-galeri">
                                    <small><?= date('d F Y', strtotime($item['tanggal_galeri'])) ?></small>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-center">Tidak ada galeri yang tersedia.</p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Pagination -->
</div>

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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
