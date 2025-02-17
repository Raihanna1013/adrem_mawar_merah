<div class="product-page">
    <div class="product-page-header">
        <h1>Produk Adrem Merah</h1>
    </div>

    <div class="product-page-container" id="product-container">
        <?php if(!empty($produk)): ?>
            <?php foreach($produk as $item): ?>
            <div class="product-page-item">
                <div class="product-page-image">
                    <img src="<?= base_url('asset/img/'.$item['foto_barang']); ?>" alt="<?= $item['nama_barang'] ?>">
                </div>
                <div class="product-page-content">
                    <h2><?= $item['nama_barang'] ?></h2>
                    <div class="product-page-price">
                        Rp <?= number_format($item['harga_barang'], 0, ',', '.') ?>
                    </div>
                    <p class="product-page-desc"><?= $item['deskripsi_bar'] ?></p>
                    <a href="<?= base_url('detail_produk'.$item['id_barang']) ?>" class="product-page-button">Detail Produk</a>
                </div>
            </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="no-product">
                <p>Belum ada produk yang tersedia.</p>
            </div>
        <?php endif; ?>

        <!-- Pagination -->
        <nav aria-label="Page navigation" class="product-page-pagination">
            <?php echo $pagination; ?>
        </nav>
    </div>
</div>

<!-- Tambahkan jQuery jika belum ada -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    // Tangkap klik pada link pagination
    $(document).on('click', '.pagination a', function(e) {
        e.preventDefault();
        var page = $(this).attr('href');
        loadPage(page);
    });

    function loadPage(url) {
        $.ajax({
            url: url,
            type: 'get',
            dataType: 'json',
            success: function(response) {
                // Update konten produk
                var html = '';
                $.each(response.produk, function(index, item) {
                    html += '<div class="product-page-item">';
                    html += '<div class="product-page-image">';
                    html += '<img src="<?= base_url("asset/img/") ?>' + item.gambar_barang + '" alt="' + item.nama_barang + '">';
                    html += '</div>';
                    html += '<div class="product-page-content">';
                    html += '<h2>' + item.nama_barang + '</h2>';
                    html += '<div class="product-page-price">Rp ' + formatNumber(item.harga_barang) + '</div>';
                    html += '<p class="product-page-desc">' + item.deskripsi_barang + '</p>';
                    html += '<a href="<?= base_url("produk/detail/") ?>' + item.id_barang + '" class="product-page-button">Detail Produk</a>';
                    html += '</div>';
                    html += '</div>';
                });
                
                $('#product-container').find('.product-page-item').remove();
                $('#product-container').prepend(html);
                
                // Update pagination links
                $('.product-page-pagination').html(response.pagination);
                
                // Scroll ke atas halaman dengan animasi
                $('html, body').animate({
                    scrollTop: $('.product-page').offset().top
                }, 500);
            }
        });
    }

    function formatNumber(num) {
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
    }
});
</script>





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
    <div class="products-grid-wrapper">
        <div class="products-grid" id="product-container">
            <?php if(!empty($produk)): ?>
                <?php foreach($produk as $item): ?>
                <div class="product-item">
                    <div class="product-card">
                        <div class="product-info">
                            <img src="<?= base_url('asset/img/'.$item['foto_barang']); ?>" alt="<?= $item['nama_barang'] ?>"  width="200px" height="200px">
                            <h3 class="product-name"><?= $item['nama_barang'] ?></h3>
                            <p class="product-price">Rp <?= number_format($item['harga_barang'], 0, ',', '.') ?></p>
                            <div class="product-actions">
                                <a href="<?= base_url('produk/detail/'.$item['id_barang']) ?>" class="btn-detail">Lihat Detail</a>
                            </div>
                            <div class="product-actions">
                                <a href="https://wa.me/YOUR_NUMBER?text=Saya tertarik dengan produk <?= $item['nama_barang'] ?>" class="btn-whatsapp">
                                    <img src="<?= base_url('asset/img/whatsapp-icon.svg') ?>" alt="WhatsApp" class="whatsapp-icon">
                                    Pesan Sekarang
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

    <!-- Pagination -->
    <nav aria-label="Page navigation" class="product-page-pagination">
        <?php echo $pagination; ?>
    </nav>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Tangkap klik pada link pagination
    $(document).on('click', '.pagination a', function(e) {
        e.preventDefault();
        var page = $(this).attr('href');
        loadPage(page);
    });

    function loadPage(url) {
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            beforeSend: function() {
                $('#product-container').html('<div class="loading">Loading...</div>');
            },
            success: function(response) {
                if(response.produk) {
                    var html = '';
                    $.each(response.produk, function(index, item) {
                        html += '<div class="product-item">';
                        html += '<div class="product-card">';
                        html += '<div class="product-info">';
                        html += '<img src="' + '<?= base_url("asset/img/") ?>' + item.foto_barang + '" alt="' + item.nama_barang + '">';
                        html += '<h3 class="product-name">' + item.nama_barang + '</h3>';
                        html += '<p class="product-price">Rp ' + formatNumber(item.harga_barang) + '</p>';
                        html += '<div class="product-actions">';
                        html += '<a href="' + '<?= base_url("produk/detail/") ?>' + item.id_barang + '" class="btn-detail">Lihat Detail</a>';
                        html += '</div>';
                        html += '<div class="product-actions">';
                        html += '<a href="https://wa.me/YOUR_NUMBER?text=Saya tertarik dengan produk ' + item.nama_barang + '" class="btn-whatsapp">';
                        html += '<img src="' + '<?= base_url("asset/img/whatsapp-icon.svg") ?>' + '" alt="WhatsApp" class="whatsapp-icon">';
                        html += 'Pesan Sekarang</a>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                    });
                    
                    $('#product-container').html(html);
                    $('.product-page-pagination').html(response.pagination);
                } else {
                    console.error('No products data in response');
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', error);
                $('#product-container').html('<div class="error">Error loading products</div>');
            }
        });
    }

    function formatNumber(num) {
        return new Intl.NumberFormat('id-ID').format(num);
    }
});
</script>


<?php endforeach; ?>
<?php endif; ?>

<?php if (!empty($produk)): ?>
    <?php foreach ($produk as $item): ?>


        <div class="row"></div>
        <!-- Left: Product Image -->
        <div class="col-md-6 text-center">
   
        <img src="<?= base_url('asset/img/' . $produk->foto_barang); ?>" alt="<?= $produk->nama_barang; ?>" class="img-fluid">
      </div>

            <!-- Right: Product Info -->
            <div class="col-md-6">
            <h1 class="product-title"><?= $produk->nama_barang; ?></h1>
            <div class="product-price">Rp <?= number_format($produk->harga_barang, 0, ',', '.'); ?></di>

            <h2 class="mt-3">Deskripsi Barang</h2>

            <p><?= $produk->deskripsi_barang; ?></p>


            <div class="container product-detail-container">

            <div class="product-images">
                <div class="main-image">
                <img src="<?= base_url('asset/img/' . $produk->foto_barang); ?>" alt="<?= $produk->nama_barang; ?>" class="img-fluid">
                </div>
              </div>

            <!-- Right: Product Info -->
            <div class="product-info">
            <h1 class="product-title"><?= $produk->nama_barang; ?></h1>
            <div class="product-price">Rp <?= number_format($produk->harga_barang, 0, ',', '.'); ?></div>

            <h2 class="mt-3">Deskripsi Barang</h2>

            <p><?= $produk->deskripsi_barang; ?></p>
            

            <!-- Order Section -->
            <div class="order-section">
                <h3 class="order-title">Dapat Pesan Di</h3>
                <div class="order-buttons">
                    <a href="#" class="btn-order whatsapp">
                        <img src="<?= base_url('assets/image/whatsapp.png'); ?>" alt="WhatsApp">
                        Pesan Lewat WA
                    </a>
                    <a href="#" class="btn-order instagram">
                        <img src="<?= base_url('assets/image/instagram.png'); ?>" alt="Instagram">
                        Pesan Lewat DM
                    </a>
                    <a href="#" class="btn-order shopee">
                        <img src="<?= base_url('assets/image/shopee.png'); ?>" alt="Shopee">
                        Pesan Lewat Shopee
                    </a>
                </div>
            </div>
        </div> 
        
  
    </div>
   
</div>



<div class="product-detail-container">
            <!-- Left Side - Product Images -->
            <div class="product-images">
                <div class="main-image">
                <img src="<?= base_url('asset/img/' . $produk->foto_barang); ?>" alt="<?= $produk->nama_barang; ?>" class="img-fluid">
                </div>
                <!-- <div class="thumbnail-list">
                    <img src="<?= base_url('uploads/products/thumb1.jpg'); ?>" class="thumb-img">
                    <img src="<?= base_url('uploads/products/thumb2.jpg'); ?>" class="thumb-img">
                    <img src="<?= base_url('uploads/products/thumb3.jpg'); ?>" class="thumb-img">
                </div> -->
            </div>

            <!-- Right Side - Product Info -->
            <div class="product-info">
                <h1 class="product-title"><?= $produk->nama_barang; ?></h1>
                <div class="product-price">Rp <?= number_format($produk->harga_barang, 0, ',', '.'); ?></div>
                
                <div class="product-details">
                    <h2>Detail Product</h2>
                    <ul>
                        <li><span>Kondisi:</span> Baru</li>
                        <li><span>Min. Pemesanan:</span> 1 Buah</li>
                    </ul>
                </div>

                <p><?= $produk->deskripsi_barang; ?></p>
            </div>

            <!-- Order Section -->
            <div class="order-section">
                <h3 class="order-title">Dapat Pesan Di</h3>
                <div class="order-buttons">
                    <a href="#" class="btn-order whatsapp">
                        <img src="<?= base_url('images/whatsapp.png'); ?>" alt="WhatsApp">
                        Pesan Lewat WA
                    </a>
                    <a href="#" class="btn-order instagram">
                        <img src="<?= base_url('images/instagram.png'); ?>" alt="Instagram">
                        Pesan Lewat DM
                    </a>
                    <a href="#" class="btn-order shopee">
                        <img src="<?= base_url('images/shopee.png'); ?>" alt="Shopee">
                        Pesan Lewat Shopee
                    </a>
                </div>
            </div>
        </div>

        .about-us-text {
  position: absolute;
  top: 20px;
  right: 40px;
  color: white;
  font-weight: 500;
  font-size: 18px;
}


#about .col-md-6 {
  flex: 1;
  padding: 20px;
}

#about .row {
  display: flex;
  align-items: center; /* Menyamakan tinggi antara gambar dan teks */
  justify-content: space-between;
  flex-wrap: wrap;
  margin: 0;
}



#about .container{
  padding-top: 70px;
}
.heading{
  text-align: center;
  margin-bottom: 50px;
  color: black;
  font-size: 30px;
  font-weight: bold;
}
.heading span{
  color: #b2744c;
}
/* #about .card {
  max-width: 100%;
  text-align: center;
}

#about .card img {
  max-width: 100%;
  height: auto;
  border-radius: 10px;
  display: block;
  margin: 0 auto;
} */


#about .about-content {
  text-align: left;
}

#about h3 {
  font-size: 28px;
  font-weight: 600;
  color: #333;
}


#about-btn {
  background-color: #B22222;
  color: white;
  padding: 10px 20px;
  border-radius: 5px;
  font-weight: 500;
  border: none;
  cursor: pointer;
  transition: 0.3s;
  display: inline-block;
}
#about-btn:hover {
  background-color: #B22222;
  color: #fbe9e7;
}
@media screen and (max-width: 768px) {
  #about .row {
    flex-direction: column;
    text-align: center;
  }

  #about .col-md-6 {
    width: 100%;
    padding: 10px;
  }

  #about .about-content {
    text-align: center;
  }
}
/* about */

/* Responsive styling for About section */
@media (max-width: 768px) {
  #about .card {
    width: 100%;
    margin-bottom: 30px;
  }

  #about .card img {
    width: 100%;
    height: auto;
    max-height: 434px;
  }

  #about h3 {
    font-size: 28px;
    font-weight: 600;
    color: #333;
  }

  #about p {
    text-align: center;
    padding: 0 15px;
  }

  #about-btn {
    display: block;
    margin: 0 auto;
    margin-top: 20px;
  }
}

@media (max-width: 576px) {
  #about .container {
    padding: 20px;
  }

  #about h3 {
    font-size: 24px;
  }

  #about p {
    font-size: 16px;
  }

  #about-btn {
    padding: 8px 16px;
    font-size: 14px;
  }
}

/* About section */
.about {
  margin-bottom: 0;
  padding-bottom: 60px;
}


<div class="news-item">
            <div class="news-info">
              <h4><?= $item['judul_berita'] ?></h4>
              <div class="news-meta">
                <span><i class="far fa-calendar"></i> <?= date('d F Y', strtotime($item['tanggal_berita'])) ?></span>
              </div>
            </div>
            <button class="read-btn">Baca Selengkapnya</button>
          </div>


            <label for="gambar_profil">Foto Dokumentasi</label>
                <input type="file" id="gambar_profil" name="gambar_profil"> <br>
                <small>Foto Saat Ini:</small>
                <img src="<?php echo base_url('asset/img/' . $profil->gambar_profil); ?>" width="100">


            </div>

            background-color: #f5f5dc;
            color: #228B22;