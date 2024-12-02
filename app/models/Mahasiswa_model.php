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
    // public function Login($nim, $password)
    // {
        
    //     $hashedPassword = $password;

        
    //     $query = 'SELECT * FROM ' . $this->table . ' WHERE nim = :nim AND password = :password';
    //     $this->db->query($query); 
        
    //     $this->db->bind(':nim', $nim);
    //     $this->db->bind(':password', $hashedPassword);

       
    //     return $this->db->single();
    // }
}
