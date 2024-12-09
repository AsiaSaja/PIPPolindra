<?php

class Admin_model
{
    private $table = 'admin'; // Nama tabel di database
    private $db;

    public function __construct()
    {
        $this->db = new Database(); // Memanggil class Database untuk koneksi
    }

    /**
     * Login Admin
     * @param string $username
     * @param string $password
     * @return array|bool - Mengembalikan data admin jika valid, atau false jika gagal
     */
    public function login($username, $password)
    {
        // Query untuk mendapatkan data admin berdasarkan username
        $query = "SELECT * FROM " . $this->table . " WHERE username = :username";
        $this->db->query($query);
        $this->db->bind(':username', $username);

        $admin = $this->db->single(); // Mendapatkan hasil sebagai array asosiatif

        // Debugging untuk memastikan query berhasil
        error_log("Query username: $username");
        error_log("Query result: " . json_encode($admin));

        // Jika data admin ditemukan, cek password
        if ($admin) {
            // Opsi 1: Jika password di database tidak di-hash
            if ($admin['password'] === $password) {
                return $admin; // Login berhasil
            }

            // Opsi 2: Jika password di database di-hash (gunakan jika hashing aktif)
            // if (password_verify($password, $admin['password'])) {
            //     return $admin; // Login berhasil
            // }
        }

        return false; // Login gagal
    }

    /**
     * Daftar Admin
     * @return array - Mengembalikan seluruh data admin
     */
    public function getAllAdmin()
    {
        $query = "SELECT * FROM " . $this->table;
        $this->db->query($query);
        return $this->db->resultSet(); // Mengembalikan semua hasil query
    }
    /**
     * Ambil data admin berdasarkan username
     * @param string $username
     * @return array|bool - Mengembalikan data admin jika ditemukan, atau false jika tidak ada
     */
    public function getAdminByUsername($username)
    {
        $query = "SELECT * FROM $this->table WHERE username = :username";
        $this->db->query($query);
        $this->db->bind(':username', $username);
        return $this->db->single(); // Mengembalikan satu baris hasil query
    }


    /**
     * Tambah Admin
     * @param array $data
     * @return bool - Mengembalikan true jika berhasil, false jika gagal
     */
    public function addAdmin($data)
    {
        $query = "INSERT INTO " . $this->table . " (username, password) VALUES (:username, :password)";
        $this->db->query($query);

        $this->db->bind(':username', $data['username']);
        $this->db->bind(':password', $data['password']); // Pastikan hashing password jika perlu

        return $this->db->execute();
    }

    /**
     * Fungsi untuk registrasi admin baru
     * @param string $username
     * @param string $hashedPassword
     * @return bool - Mengembalikan true jika berhasil, false jika gagal
     */
    public function register($username, $hashedPassword)
    {
        // Periksa apakah username sudah ada
        $query = "SELECT * FROM $this->table WHERE username = :username";
        $this->db->query($query);
        $this->db->bind(':username', $username);
        $this->db->execute();
        
        if ($this->db->rowCount() > 0) {
            return false; // Username sudah ada
        }

        // Insert data baru
        $query = "INSERT INTO $this->table (username, password) VALUES (:username, :password)";
        $this->db->query($query);
        $this->db->bind(':username', $username);
        $this->db->bind(':password', $hashedPassword);

        $this->db->execute();
        return true; // Mengembalikan true jika berhasil
    }
}
