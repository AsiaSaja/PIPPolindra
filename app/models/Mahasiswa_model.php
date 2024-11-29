<?php

class Mahasiswa_model {
    private $table = 'mahasiswa';
    private $db;
    
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllmahasiswa() 
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    // Fungsi untuk mendapatkan user berdasarkan NIM dan password
    public function Login($nim, $password)
    {
        // Hash password jika diperlukan (misalnya MD5)
        $hashedPassword = $password;

        // Query untuk mencari mahasiswa
        $query = 'SELECT * FROM ' . $this->table . ' WHERE nim = :nim AND password = :password';
        $this->db->query($query); // Gunakan $this->db, bukan static::$db

        // Bind parameter
        $this->db->bind(':nim', $nim);
        $this->db->bind(':password', $hashedPassword);

        // Ambil data user
        return $this->db->single();
    }
}
