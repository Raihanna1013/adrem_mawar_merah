<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Form Tambah Berita</h1>

    <form action="<?php echo site_url('admin/berita/tambah_berita'); ?>" method="POST" enctype="multipart/form-data">
    <label for="judul_berita">Judul Berita</label>
    <input type="text" id="judul_berita" name="judul_berita" required> <br>

    <label for="gambar_berita">Foto Berita</label>
    <input type="file" id="gambar_berita" name="gambar_berita" required> <br>
    
    <label for="isi_berita">Deskripsi Berita</label>
    <textarea id="isi_berita" name="isi_berita" rows="4" required></textarea> <br>

    <label for="tanggal_berita">Tanggal Berita</label>
    <input type="datetime-local" id="tanggal_berita" name="tanggal_berita" required> <br>

    <button type="submit">Tambah Berita</button>
</form>

</body>
</html>