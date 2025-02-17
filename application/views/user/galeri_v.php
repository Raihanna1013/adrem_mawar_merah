<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

  <div class="galeri-page-header">
        <h1>Galeri Produk UMKM Mawar Merah</h1>
    </div>
<!-- GALERI -->
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
                                <p class="card-text"><small class="text-muted"><?= date('d F Y', strtotime($item['tanggal_galeri'])) ?></small></p>
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
    <div class="gallery-page-pagination text-center"></div>
</div>

<!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    // Ambil semua elemen dengan class .gallery-item
    const galleryItems = document.querySelectorAll(".gallery-item");

    // Minimal 4 baris & 1 kolom, maksimal 3 kolom
    const minRows = 4;
    const minCols = 1;
    const maxCols = 3;
    
    const itemsPerRow = maxCols; // Maksimal 3 kolom per baris
    const rowsPerPage = minRows; // Minimal 4 baris per halaman
    const itemsPerPage = itemsPerRow * rowsPerPage; // Total item per halaman

    if (galleryItems.length === 0) {
        console.warn("Tidak ada elemen .gallery-item ditemukan.");
        return;
    }

    console.log("Jumlah elemen .gallery-item ditemukan:", galleryItems.length);

    // Hitung total halaman
    const totalPages = Math.ceil(galleryItems.length / itemsPerPage);
    let currentPage = 1;

    console.log("Total Gambar:", galleryItems.length);
    console.log("Total Halaman:", totalPages);

    // Fungsi untuk menampilkan halaman sesuai nomor
    function showPage(page) {
        galleryItems.forEach((item, index) => {
            if (index >= (page - 1) * itemsPerPage && index < page * itemsPerPage) {
                item.style.display = "block";
            } else {
                item.style.display = "none";
            }
        });
    }

    // Fungsi untuk membuat pagination
    function createPagination() {
        const paginationContainer = document.querySelector(".gallery-page-pagination");
        if (!paginationContainer) {
            console.error("Elemen .gallery-page-pagination tidak ditemukan.");
            return;
        }

        paginationContainer.innerHTML = "";
        const paginationList = document.createElement("ul");
        paginationList.classList.add("pagination");

        // Tombol "Prev"
        if (totalPages > 1) {
            const prevItem = document.createElement("li");
            prevItem.classList.add("page-item");
            if (currentPage === 1) prevItem.classList.add("disabled");

            const prevLink = document.createElement("span");
            prevLink.classList.add("page-link");
            prevLink.textContent = "«";
            prevLink.style.cursor = "pointer";

            prevLink.addEventListener("click", function () {
                if (currentPage > 1) {
                    currentPage--;
                    showPage(currentPage);
                    updatePagination();
                }
            });

            prevItem.appendChild(prevLink);
            paginationList.appendChild(prevItem);
        }

        // Nomor Halaman
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
                updatePagination();
            });

            listItem.appendChild(link);
            paginationList.appendChild(listItem);
        }

        // Tombol "Next"
        if (totalPages > 1) {
            const nextItem = document.createElement("li");
            nextItem.classList.add("page-item");
            if (currentPage === totalPages) nextItem.classList.add("disabled");

            const nextLink = document.createElement("span");
            nextLink.classList.add("page-link");
            nextLink.textContent = "»";
            nextLink.style.cursor = "pointer";

            nextLink.addEventListener("click", function () {
                if (currentPage < totalPages) {
                    currentPage++;
                    showPage(currentPage);
                    updatePagination();
                }
            });

            nextItem.appendChild(nextLink);
            paginationList.appendChild(nextItem);
        }

        paginationContainer.appendChild(paginationList);
    }

    function updatePagination() {
        document.querySelectorAll(".page-item").forEach(item => item.classList.remove("active"));
        const paginationItems = document.querySelectorAll(".page-item");
        paginationItems[currentPage].classList.add("active");
    }

    showPage(currentPage);
    createPagination();
});
</script>
<!-- Modal Gallery -->
<!-- <div id="galleryModal" class="modal">
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
</div> -->
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