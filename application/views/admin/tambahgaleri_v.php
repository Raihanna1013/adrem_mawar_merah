<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Form Tambah Galeri</h1>

    <form action="<?php echo site_url('admin/galeri/tambah_galeri'); ?>" method="POST" enctype="multipart/form-data">
    <label for="judul_galeri">Judul Berita</label>
    <input type="text" id="judu_galeri" name="judul_galeri" required> <br>

    <label for="gambar_galeri">Foto Berita</label>
    <input type="file" id="gambar_galeri" name="gambar_galeri" required> <br>

    <button type="submit">Tambah Berita</button>
</form>

</body>
</html>