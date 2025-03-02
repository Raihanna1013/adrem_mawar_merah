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
<div class="product-page-header">
        <h1>Produk Adrem Merah</h1>
    </div>
    <div class="search-container">
            <button class="kategori-button">
                <span>Kategori</span>
                <img src="path/to/menu-icon.svg" alt="menu icon">
            </button>
            
            <div class="search-wrapper">
                <input type="text" class="search-input" placeholder="Cari Produk">
                <svg class="search-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
            </div>
    </div>
    <div class="products-container">
    <div class="products-grid-wrapper">
        <div class="products-grid" id="product-container">
            <?php if (!empty($produk)): ?>
                <?php foreach ($produk as $item): ?>
                <div class="product-item">
                    <div class="product-card">
                        <div class="product-info">
                            <img src="<?= base_url('asset/img/' . $item['foto_barang']); ?>" alt="<?= $item['nama_barang'] ?>">
                            <h3 class="product-name"><?= $item['nama_barang'] ?></h3>
                            <p class="product-price">Rp <?= number_format($item['harga_barang'], 0, ',', '.') ?></p>
                            <div class="product-actions">
                                <a href="<?= base_url('detail_produk/' . $item['id_barang']) ?>" class="btn-detail">Lihat Detail</a>
                            </div>
                            <div class="product-actions">
                            <a href="https://wa.me/6282227175035?text=Saya tertarik dengan produk <?= $item['nama_barang'] ?>" class="btn-whatsapp">
                                    <img src="<?= base_url('asset/image/waijo.svg') ?>" alt="WhatsApp" class="whatsapp-icon">
                                    Pesan Sekarang
                                </a>

                            </div>

                        </div>
                    </div>
                    </div>
                    <?php endforeach; ?>
                <?php endif; ?>
                  <!-- Pagination -->

          </div>

          <nav aria-label="Page navigation" class="news-page-pagination">
            <?php echo $pagination; ?>
        </nav>
      </div>
</div>
<!-- Tambahkan jQuery jika belum ada -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $(document).on('click', '.pagination a', function(e) {
        e.preventDefault();
        var pageUrl = $(this).attr('href');
        loadPage(pageUrl);
    });

    function loadPage(url) {
    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            console.log(response); // Debugging response JSON

            if (response.produk.length > 0) {
                var html = '';
                $.each(response.produk, function(index, item) {
                    html += '<div class="product-item">';
                    html += '<div class="product-card">';
                    html += '<div class="product-info">';
                    html += '<img src="<?= base_url("asset/img/") ?>' + item.foto_barang + '" alt="' + item.nama_barang + '">';
                    html += '<h3 class="product-name">' + item.nama_barang + '</h3>';
                    html += '<p class="product-price">' + formatPrice(item.harga_barang) + '</p>';
                    html += '<div class="product-actions">';
                    html += '<a href="<?= base_url("detail_produk/") ?>' + item.id_barang + '" class="btn-detail">Lihat Detail</a>';
                    html += '</div>';
                    
                    // ✅ Tambahkan Button WhatsApp di sini
                    html += '<div class="product-actions">';
                    html += '<a href="https://wa.me/6282227175035?text=Saya tertarik dengan produk ' + encodeURIComponent(item.nama_barang) + '" class="btn-whatsapp">';
                    html += '<img src="<?= base_url("asset/image/waijo.svg") ?>" alt="WhatsApp" class="whatsapp-icon">';
                    html += ' Pesan Sekarang';
                    html += '</a>';
                    html += '</div>';
                    
                    html += '</div>'; // product-info
                    html += '</div>'; // product-card
                    html += '</div>'; // product-item
                });

                $('#product-container').html(html);
                $('.news-page-pagination').html(response.pagination); // Perbaikan class pagination
            } else {
                $('#product-container').html('<p>Belum ada produk yang tersedia.</p>');
            }
        },
        error: function(xhr, status, error) {
            console.log("AJAX Error: " + status + " - " + error);
        }
    });
}


    function formatPrice(number) {
        return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(number);
    }
});
</script>



<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
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