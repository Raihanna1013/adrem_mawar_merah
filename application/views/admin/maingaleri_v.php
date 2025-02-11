<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h2>Daftar Galeri</h2>
        <div id="center_button">
        <button onclick="location.href='galeri/galeri_baru'">Tambah Berita</button>
        </div>
        <table>
        <thead>
                <tr>
                    <th>Judul Galeri</th>
                    <th>Gambar Galeri</th>
                    <th>Aksi</th>  <!-- Menambahkan kolom aksi -->
                </tr>
            </thead>
        <tbody>
        <?php if (!empty($galeri)) : ?>
         <?php foreach ($galeri as $glr): ?>
        <tr>
            <td><?php echo $glr['judul_galeri']; ?></td>
            <td><?php echo $glr['gambar_galeri']; ?></td>
            <td><a href="<?php echo site_url('admin/galeri/edit_galeri/'.$glr['id_galeri']);?>">Edit</a>|
            <a href="<?php echo site_url('admin/galeri/hapus_galeri/'.$glr['id_galeri']);?>">Hapus</a></td>
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