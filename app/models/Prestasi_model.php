<?php

class Prestasi_model {
    private $table = 'prestasi';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // Ambil semua data prestasi
    public function getAllPrestasi()
    {
        $this->db->query("SELECT * FROM $this->table");
        return $this->db->resultSet();
    }

    // Ambil data prestasi berdasarkan ID
    public function getPrestasiById($id)
    {
        $this->db->query("SELECT * FROM $this->table WHERE id = :id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    // Tambah data prestasi
    public function tambahPrestasi($data)
    {
        $query = "INSERT INTO $this->table (mahasiswa_id, kompetisi_id, peringkat) 
                  VALUES (:mahasiswa_id, :kompetisi_id, :peringkat)";
        $this->db->query($query);
        $this->db->bind('mahasiswa_id', $data['mahasiswa_id']);
        $this->db->bind('kompetisi_id', $data['kompetisi_id']);
        $this->db->bind('peringkat', $data['peringkat']);

        return $this->db->execute();
    }

    // Ubah data prestasi
    public function updatePrestasi($data)
    {
        $query = "UPDATE $this->table SET 
                    mahasiswa_id = :mahasiswa_id, 
                    kompetisi_id = :kompetisi_id, 
                    peringkat = :peringkat 
                  WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('mahasiswa_id', $data['mahasiswa_id']);
        $this->db->bind('kompetisi_id', $data['kompetisi_id']);
        $this->db->bind('peringkat', $data['peringkat']);

        return $this->db->execute();
    }

    // Hapus data prestasi
    public function deletePrestasi($id)
    {
        $this->db->query("DELETE FROM $this->table WHERE id = :id");
        $this->db->bind('id', $id);

        return $this->db->execute();
    }
}
