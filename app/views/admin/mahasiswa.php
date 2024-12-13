<div class="container mt-4">
    <h2>Kelola Mahasiswa</h2>

    <!-- Tombol Tambah Mahasiswa -->
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalTambahMahasiswa">
        Tambah Mahasiswa
    </button>

    <!-- Tabel Data Mahasiswa -->
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Prodi</th>
                <th>Angkatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['mahasiswa'] as $index => $mahasiswa): ?>
            <tr>
                <td><?= $index + 1; ?></td>
                <td><?= htmlspecialchars($mahasiswa['nim']); ?></td>
                <td><?= htmlspecialchars($mahasiswa['nama']); ?></td>
                <td><?= htmlspecialchars($mahasiswa['prodi']); ?></td>
                <td><?= htmlspecialchars($mahasiswa['angkatan']); ?></td>
                <td>
                    <!-- Tombol Edit -->
                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalEditMahasiswa<?= $mahasiswa['id']; ?>">
                        Edit
                    </button>
                    
                    <!-- Tombol Hapus -->
                    <form action="<?= BASEURL; ?>/admin/hapus_mahasiswa/<?= $mahasiswa['id']; ?>" method="post" class="d-inline">
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?');">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>

            <!-- Modal Edit Mahasiswa -->
            <div class="modal fade" id="modalEditMahasiswa<?= $mahasiswa['id']; ?>" tabindex="-1" aria-labelledby="modalEditMahasiswaLabel<?= $mahasiswa['id']; ?>" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="<?= BASEURL; ?>/admin/edit_mahasiswa/<?= $mahasiswa['id']; ?>" method="post" class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalEditMahasiswaLabel<?= $mahasiswa['id']; ?>">Edit Mahasiswa</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="nim<?= $mahasiswa['id']; ?>" class="form-label">NIM</label>
                                <input type="text" class="form-control" id="nim<?= $mahasiswa['id']; ?>" name="nim" value="<?= htmlspecialchars($mahasiswa['nim']); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="nama<?= $mahasiswa['id']; ?>" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama<?= $mahasiswa['id']; ?>" name="nama" value="<?= htmlspecialchars($mahasiswa['nama']); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="prodi<?= $mahasiswa['id']; ?>" class="form-label">Prodi</label>
                                <input type="text" class="form-control" id="prodi<?= $mahasiswa['id']; ?>" name="prodi" value="<?= htmlspecialchars($mahasiswa['prodi']); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="angkatan<?= $mahasiswa['id']; ?>" class="form-label">Angkatan</label>
                                <input type="text" class="form-control" id="angkatan<?= $mahasiswa['id']; ?>" name="angkatan" value="<?= htmlspecialchars($mahasiswa['angkatan']); ?>" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Modal Tambah Mahasiswa -->
<div class="modal fade" id="modalTambahMahasiswa" tabindex="-1" aria-labelledby="modalTambahMahasiswaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="<?= BASEURL; ?>/admin/tambah_mahasiswa" method="post" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahMahasiswaLabel">Tambah Mahasiswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="nim" class="form-label">NIM</label>
                    <input type="text" class="form-control" id="nim" name="nim" required>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="mb-3">
                    <label for="prodi" class="form-label">Prodi</label>
                    <input type="text" class="form-control" id="prodi" name="prodi" required>
                </div>
                <div class="mb-3">
                    <label for="angkatan" class="form-label">Angkatan</label>
                    <input type="text" class="form-control" id="angkatan" name="angkatan" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
