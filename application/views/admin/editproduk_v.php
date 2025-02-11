<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="<?php echo site_url('admin/produk/updatedata/' . $produk->id_barang); ?>" method="POST" enctype="multipart/form-data">
    <label for="nama_barang">Nama Barang</label>
    <input type="text" id="nama_barang" name="nama_barang" value="<?php echo $produk->nama_barang; ?>" required> <br>

    <label for="harga_barang">Harga Barang</label>
    <input type="text" id="harga_barang" name="harga_barang" value="<?php echo $produk->harga_barang; ?>" required> <br>

    <label for="jumlah_barang">Jumlah Barang</label>
    <input type="number" id="jumlah_barang" name="jumlah_barang" value="<?php echo $produk->jumlah_barang; ?>" required> <br>

    <label for="foto_barang">Foto Barang</label>
    <input type="file" id="foto_barang" name="foto_barang"> <br>
    <p>Foto Saat Ini: <img src="<?php echo base_url('asset/img/' . $produk->foto_barang); ?>" width="100"></p>

    <label for="deskripsi_barang">Deskripsi Barang</label>
    <textarea id="deskripsi_barang" name="deskripsi_barang" rows="4" required><?php echo $produk->deskripsi_barang; ?></textarea> <br>

    <label for="link_produk">Link Produk</label>
    <input type="text" id="link_produk" name="link_produk" value="<?php echo $produk->link_produk; ?>" required> <br>

    <button type="submit">Update Produk</button>
</form>

</body>
</html>