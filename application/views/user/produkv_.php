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
    <div class="d-flex justify-content-center">
        <?= $pagination; ?>
        </div>
    </div>

    <div class="product-page-pagination"></div> <!-- Pagination Container -->
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const itemsPerRow = 4; // Maksimal 4 produk per baris
        const maxColumns = 8; // Maksimal 8 kolom per halaman
        const productItems = document.querySelectorAll(".product-item");
        const totalRows = Math.ceil(productItems.length / itemsPerRow);
        const totalPages = Math.ceil(totalRows / 2); // 2 baris per halaman
        let currentPage = 1;

        console.log("Total Produk:", productItems.length);
        console.log("Total Baris:", totalRows);
        console.log("Total Halaman:", totalPages);

        function showPage(page) {
            productItems.forEach((item, index) => {
                const rowNumber = Math.floor(index / itemsPerRow) + 1; // Hitung baris produk
                if (rowNumber > (page - 1) * 2 && rowNumber <= page * 2) {
                    item.style.display = "block";
                } else {
                    item.style.display = "none";
                }
            });
        }

        function createPagination() {
            const paginationContainer = document.querySelector(".product-page-pagination");
            paginationContainer.innerHTML = "";

            console.log("Membuat pagination...");

            const paginationList = document.createElement("ul");
            paginationList.classList.add("pagination");

            for (let i = 1; i <= totalPages; i++) {
                const listItem = document.createElement("li");
                listItem.classList.add("page-item");
                if (i === currentPage) listItem.classList.add("active");

                const link = document.createElement("span");
                link.classList.add("page-link");
                link.textContent = i;
                link.style.cursor = "pointer";

                link.addEventListener("click", function () {
                    currentPage = i;
                    showPage(currentPage);
                    document.querySelectorAll(".page-item").forEach(item => item.classList.remove("active"));
                    listItem.classList.add("active");
                });

                listItem.appendChild(link);
                paginationList.appendChild(listItem);
            }

            paginationContainer.appendChild(paginationList);
        }

        showPage(currentPage);
        createPagination();
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