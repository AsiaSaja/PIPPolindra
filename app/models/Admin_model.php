<?php

class Admin_model {
    private $table = 'admin';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function Login($username, $password)
    {
        // Hash password jika diperlukan (misalnya MD5)
        $hashedPassword = $password;

        // Query untuk mencari mahasiswa
        $query = 'SELECT * FROM ' . $this->table . ' WHERE username = :username AND password = :password';
        $this->db->query($query); // Gunakan $this->db, bukan static::$db

        // Bind parameter
        $this->db->bind(':username', $username);
        $this->db->bind(':password', $hashedPassword);

        // Ambil data user
        return $this->db->single();
    }
}