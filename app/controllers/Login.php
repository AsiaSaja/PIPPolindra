<?php

class Login extends Controller {
    
    public function index()
    {
        // Mulai session hanya jika belum dimulai
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_SESSION['admin'])) {
            $data['admin'] = $_SESSION['admin'];  // Kirimkan data user ke view
        } else {
            $data['admin'] = null;  // Jika tidak ada user, set null
        }
        
        // Jika pengguna sudah login, arahkan ke home
        if (isset($_SESSION['admin'])) {
            header('Location: ' . BASEURL . '/home');
            exit;
        }
        
        $data['title'] = 'Login';
        $data['error'] = isset($_GET['error']) ? 'Invalid username or password' : ''; // Menangani error

        // Kirim data ke view
        $this->view('login/index', $data);
    }

    public function proses()
    {
        // Pastikan metode request adalah POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Ambil data dari form
            $nim = htmlspecialchars(trim($_POST['username']));
            $password = htmlspecialchars(trim($_POST['password']));

            // Validasi input
            if (empty($username) || empty($password)) {
                header('Location: ' . BASEURL . '/login?error=1');
                exit;
            }

            // Gunakan model Mahasiswa untuk validasi login
            $adminModel = $this->model('Admin_model');
            $admin = $adminModel->Login($username, $password);

            // Jika login berhasil
            if ($admin) {
                if (session_status() === PHP_SESSION_NONE) {
                    session_start();  // Pastikan session dimulai
                }

                $_SESSION['admin'] = $admin;  // Simpan data user dalam session
                header('Location: ' . BASEURL . '/home');
                exit;
            } else {
                // Jika login gagal, log error dan arahkan kembali ke halaman login dengan error
                error_log("Login gagal untuk username: $username", 0);
                header('Location: ' . BASEURL . '/login?error=1');
                exit;
            }
        } else {
            // Jika bukan POST request, arahkan kembali ke halaman login
            header('Location: ' . BASEURL . '/login');
            exit;
        }
    }

    public function logout()
    {
        // Pastikan session dimulai sebelum logout
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        session_destroy(); // Hapus semua data session
        header('Location: ' . BASEURL . '/login');
        exit;
    }
}
