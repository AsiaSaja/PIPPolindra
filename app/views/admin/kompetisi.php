<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>Kelola Kompetisi</h1>
        <a href="<?= BASEURL; ?>/admin/tambah_kompetisi" class="btn btn-primary mb-3">Tambah Kompetisi</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Kompetisi</th>
                    <th>Deskripsi</th>
                    <th>Tanggal</th>
                    <th>Lokasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach ($data['kompetisi'] as $komp): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $komp['nama_kompetisi']; ?></td>
                    <td><?= $komp['deskripsi']; ?></td>
                    <td><?= $komp['tanggal']; ?></td>
                    <td><?= $komp['lokasi']; ?></td>
                    <td>
                        <a href="<?= BASEURL; ?>/admin/edit_kompetisi/<?= $komp['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="<?= BASEURL; ?>/admin/hapus_kompetisi/<?= $komp['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>
</html>