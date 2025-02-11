<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h2>Daftar Produk</h2>
        <div id="center_button">
        <button onclick="location.href='berita_baru'">Tambah Berita</button>
        </div>
        <table>
        <thead>
                <tr>
                    <th>Judul Berita</th>
                    <th>Gambar Berita</th>
                    <th>Isi Berita</th>
                    <th>Tanggal Berita</th>
                    <th>Aksi</th>  <!-- Menambahkan kolom aksi -->
                </tr>
            </thead>
        <tbody>
        <?php if (!empty($berita)) : ?>
         <?php foreach ($berita as $brt): ?>
        <tr>
            <td><?php echo $brt['judul_berita']; ?></td>
            <td><?php echo $brt['isi_berita']; ?></td>
            <td><?php echo $brt['gambar_berita']; ?></td>
            <td><?php echo $brt['tanggal_berita']; ?></td>
            <td><a href="<?php echo site_url('admin/berita/editberita/'.$brt['id_berita']);?>">Edit</a>
            |<a href="<?php echo site_url('admin/berita/hapus_berita/'.$brt['id_berita']);?>">Hapus</a></td>
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