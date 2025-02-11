<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
</head>
<body>
<form action="<?php echo site_url('admin/produk/tambah_proses'); ?>" method="POST" enctype="multipart/form-data">
    <label for="nama_barang">Nama Barang</label>
    <input type="text" id="nama_barang" name="nama_barang" required> <br>

    <label for="harga_barang">Harga Barang</label>
    <input type="text" id="harga_barang" name="harga_barang" required> <br>

    <label for="jumlah_barang">Jumlah Barang</label>
    <input type="number" id="jumlah_barang" name="jumlah_barang" required> <br>

    <label for="foto_barang">Foto Barang</label>
    <input type="file" id="foto_barang" name="foto_barang"> <br>

    <label for="deskripsi_barang">Deskripsi Barang</label>
    <textarea id="deskripsi_barang" name="deskripsi_barang" rows="4" required></textarea> <br>

    <label for="link_produk">Link Produk</label>
    <input type="text" id="link_produk" name="link_produk" required> <br>

    <button type="submit">Tambah Produk</button>
</form>

</body>
</html>
