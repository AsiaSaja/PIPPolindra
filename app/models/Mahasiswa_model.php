<?php

class Mahasiswa_model {
    private $table = 'mahasiswa';
    private $db;

    public function __construct()
    {
        $this->db = new Database; // Menggunakan database wrapper
    }

    // Ambil semua data mahasiswa
    public function getAllMahasiswa()
    {
        $this->db->query("SELECT * FROM $this->table");
        return $this->db->resultSet();
    }

    // Ambil data mahasiswa berdasarkan ID
    public function getMahasiswaById($id)
    {
        $this->db->query("SELECT * FROM $this->table WHERE id = :id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    // Tambah data mahasiswa
    public function tambahMahasiswa($data)
    {
        $query = "INSERT INTO $this->table (nama, nim, prodi, angkatan) 
                  VALUES (:nama, :nim, :prodi, :angkatan)";
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('prodi', $data['prodi']);
        $this->db->bind('angkatan', $data['angkatan']);

        return $this->db->execute();
    }

    // Ubah data mahasiswa
    public function updateMahasiswa($data)
    {
        $query = "UPDATE $this->table SET 
                    nama = :nama, 
                    nim = :nim, 
                    prodi = :prodi, 
                    angkatan = :angkatan 
                  WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('prodi', $data['prodi']);
        $this->db->bind('angkatan', $data['angkatan']);

        return $this->db->execute();
    }

    // Hapus data mahasiswa
    public function deleteMahasiswa($id)
    {
        $this->db->query("DELETE FROM $this->table WHERE id = :id");
        $this->db->bind('id', $id);

        return $this->db->execute();
    }
}
