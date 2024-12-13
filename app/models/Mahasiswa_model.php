<?php

class Mahasiswa_model {
    private $table = 'mahasiswa';
    private $db;

    public function __construct()
    {
        $this->db = new Database; // Menggunakan database wrapper
    }

    // ============================
    // Ambil Semua Data Mahasiswa
    // ============================
    public function getAllMahasiswa()
    {
        try {
            $this->db->query("SELECT * FROM $this->table");
            return $this->db->resultSet();
        } catch (Exception $e) {
            // Log error jika perlu
            return false; // Return false jika terjadi kesalahan
        }
    }

    // ============================
    // Ambil Data Mahasiswa Berdasarkan ID
    // ============================
    public function getMahasiswaById($id)
    {
        try {
            $this->db->query("SELECT * FROM $this->table WHERE id = :id");
            $this->db->bind('id', $id);
            return $this->db->single();
        } catch (Exception $e) {
            return false;
        }
    }

    // ============================
    // Tambah Data Mahasiswa
    // ============================
    public function tambahMahasiswa($data)
    {
        // Validasi input
        if (empty($data['nama']) || empty($data['nim']) || empty($data['prodi']) || empty($data['angkatan'])) {
            return false; // Jika ada input kosong, langsung return false
        }

        try {
            $query = "INSERT INTO $this->table (nama, nim, prodi, angkatan) 
                      VALUES (:nama, :nim, :prodi, :angkatan)";
            $this->db->query($query);
            $this->db->bind('nama', htmlspecialchars($data['nama']));
            $this->db->bind('nim', htmlspecialchars($data['nim']));
            $this->db->bind('prodi', htmlspecialchars($data['prodi']));
            $this->db->bind('angkatan', htmlspecialchars($data['angkatan']));

            return $this->db->execute();
        } catch (Exception $e) {
            return false;
        }
    }

    // ============================
    // Ubah Data Mahasiswa
    // ============================
    public function updateMahasiswa($data, $id)
    {
        // Validasi input
        if (empty($data['nama']) || empty($data['nim']) || empty($data['prodi']) || empty($data['angkatan'])) {
            return false; // Jika ada input kosong, langsung return false
        }

        try {
            $query = "UPDATE $this->table SET 
                        nama = :nama, 
                        nim = :nim, 
                        prodi = :prodi, 
                        angkatan = :angkatan 
                      WHERE id = :id";
            $this->db->query($query);
            $this->db->bind('id', $id);
            $this->db->bind('nama', htmlspecialchars($data['nama']));
            $this->db->bind('nim', htmlspecialchars($data['nim']));
            $this->db->bind('prodi', htmlspecialchars($data['prodi']));
            $this->db->bind('angkatan', htmlspecialchars($data['angkatan']));

            return $this->db->execute();
        } catch (Exception $e) {
            return false;
        }
    }

    // ============================
    // Hapus Data Mahasiswa
    // ============================
    public function deleteMahasiswa($id)
    {
        try {
            $this->db->query("DELETE FROM $this->table WHERE id = :id");
            $this->db->bind('id', $id);

            return $this->db->execute();
        } catch (Exception $e) {
            return false;
        }
    }
}
