<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk</title>
</head>
<body>
  
        <h2>Daftar Produk</h2>
        <div id="center_button">
        <button onclick="location.href='produk/tambah_produk'">Back to Home</button>
        </div>
        <table>
        <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Gambar Produk</th>
                    <th>Bahan Produk</th>
                    <th>Ukuran Produk</th>
                    <th>Harga</th>
                    <th>Aksi</th>  <!-- Menambahkan kolom aksi -->
                </tr>
            </thead>
        <tbody>
        <?php if (!empty($products)) : ?>
         <?php foreach ($products as $product): ?>
        <tr>
            <td><?php echo $product['nama_barang']; ?></td>
            <td><?php echo $product['harga_barang']; ?></td>
            <td><?php echo $product['jumlah_barang']; ?></td>
            <td><?php echo $product['deskripsi_barang']; ?></td>
            <td><?php echo $product['link_produk']; ?></td>
            <td><a href="<?php echo site_url('admin/produk/editproduk/'.$product['id_barang']);?>">Edit</a>|
            <a href="<?php echo site_url('admin/produk/hapus_produk/'.$product['id_barang']);?>">Hapus</a></td>
        </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr><td colspan="5">Tidak ada produk tersedia.</td></tr>
    <?php endif; ?>
        </tbody>

        <tr>
           
        </tr>
    </table>
</body>
</html>