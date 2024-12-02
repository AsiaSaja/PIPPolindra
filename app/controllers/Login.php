<?php

class Login extends Controller
{
    public function index()
    {
        // Mulai session jika belum dimulai
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Redirect ke dashboard jika admin sudah login
        if (isset($_SESSION['admin'])) {
            header('Location: ' . BASEURL . '/admin/dashboard');
            exit;
        }

        $data['title'] = 'Login';
        $data['error'] = isset($_GET['error']) ? htmlspecialchars($_GET['error']) : ''; // Kirim pesan error ke view
        $this->view('login/index', $data); // Tampilkan view login
    }

    public function proses()
    {
        // Pastikan request menggunakan POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Ambil data dari form login
            $username = htmlspecialchars(trim($_POST['username']));
            $password = htmlspecialchars(trim($_POST['password']));

            // Debugging input
            error_log("Form Input - Username: $username");
            error_log("Form Input - Password: $password");

            // Validasi input
            if (empty($username)) {
                header('Location: ' . BASEURL . '/login?error=Username+tidak+boleh+kosong');
                exit;
            }

            if (empty($password)) {
                header('Location: ' . BASEURL . '/login?error=Password+tidak+boleh+kosong');
                exit;
            }

            // Validasi login melalui model Admin_model
            $adminModel = $this->model('Admin_model');
            $admin = $adminModel->login($username, $password);

            if ($admin) {
                // Mulai session dan simpan data admin jika login berhasil
                if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                }

                $_SESSION['admin'] = $admin; // Simpan data admin di session
                header('Location: ' . BASEURL . '/admin/dashboard');
                exit;
            } else {
                // Log kesalahan login untuk debugging
                error_log("Login gagal untuk username: $username", 0);

                // Login gagal, arahkan kembali ke halaman login dengan pesan error
                header('Location: ' . BASEURL . '/login?error=Username+atau+password+salah');
                exit;
            }
        } else {
            // Jika request bukan POST, arahkan ke halaman login
            header('Location: ' . BASEURL . '/login');
            exit;
        }
    }

    public function logout()
    {
        // Mulai session jika belum dimulai
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        session_destroy(); // Hapus semua data session
        header('Location: ' . BASEURL . '/login');
        exit;
    }
}
