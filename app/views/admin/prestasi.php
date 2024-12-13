<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>Kelola Prestasi</h1>
        <a href="<?= BASEURL; ?>/admin/tambah_prestasi" class="btn btn-primary mb-3">Tambah Prestasi</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Mahasiswa</th>
                    <th>Kompetisi</th>
                    <th>Peringkat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach ($data['prestasi'] as $pres): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $pres['mahasiswa']; ?></td>
                    <td><?= $pres['kompetisi']; ?></td>
                    <td><?= $pres['peringkat']; ?></td>
                    <td>
                        <a href="<?= BASEURL; ?>/admin/edit_prestasi/<?= $pres['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="<?= BASEURL; ?>/admin/hapus_prestasi/<?= $pres['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>
</html>