<?php

class Kompetisi_model {
    private $table = 'kompetisi';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // Ambil semua data kompetisi
    public function getAllKompetisi()
    {
        $this->db->query("SELECT * FROM $this->table");
        return $this->db->resultSet();
    }

    // Ambil data kompetisi berdasarkan ID
    public function getKompetisiById($id)
    {
        $this->db->query("SELECT * FROM $this->table WHERE id = :id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    // Tambah data kompetisi
    public function tambahKompetisi($data)
    {
        $query = "INSERT INTO $this->table (nama, deskripsi, tanggal, lokasi) 
                  VALUES (:nama, :deskripsi, :tanggal, :lokasi)";
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('deskripsi', $data['deskripsi']);
        $this->db->bind('tanggal', $data['tanggal']);
        $this->db->bind('lokasi', $data['lokasi']);

        return $this->db->execute();
    }

    // Ubah data kompetisi
    public function updateKompetisi($data)
    {
        $query = "UPDATE $this->table SET 
                    nama = :nama, 
                    deskripsi = :deskripsi, 
                    tanggal = :tanggal, 
                    lokasi = :lokasi 
                  WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('deskripsi', $data['deskripsi']);
        $this->db->bind('tanggal', $data['tanggal']);
        $this->db->bind('lokasi', $data['lokasi']);

        return $this->db->execute();
    }

    // Hapus data kompetisi
    public function deleteKompetisi($id)
    {
        $this->db->query("DELETE FROM $this->table WHERE id = :id");
        $this->db->bind('id', $id);

        return $this->db->execute();
    }
}
