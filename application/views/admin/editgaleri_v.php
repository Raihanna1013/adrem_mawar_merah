<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Form Edit Galeri</h1>

    <form action="<?php echo site_url('admin/galeri/update_galeri/' . $galeri->id_galeri); ?>" method="POST" enctype="multipart/form-data">
    <label for="judul_galeri">Judul Galeri</label>
    <input type="text" id="judul_galeri" name="judul_galeri" value="<?php echo $galeri->judul_galeri; ?>" required> <br>

    <label for="gambar_galeri">Foto Galeri</label>
    <input type="file" id="gambar_galeri" name="gambar_galeri"> <br>

    <button type="submit">Update Galeri</button>
</form>


</body>
</html>