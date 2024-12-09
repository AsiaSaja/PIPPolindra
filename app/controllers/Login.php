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
    
            // Validasi input
            if (empty($username) || empty($password)) {
                header('Location: ' . BASEURL . '/login?error=Semua+kolom+harus+diisi');
                exit;
            }
    
            // Validasi login melalui model Admin_model
            $adminModel = $this->model('Admin_model');
            $admin = $adminModel->getAdminByUsername($username);
    
            if ($admin) {
                // Verifikasi password menggunakan password_verify
                if (password_verify($password, $admin['password'])) {
                    // Mulai session dan simpan data admin jika login berhasil
                    if (session_status() === PHP_SESSION_NONE) {
                        session_start();
                    }
    
                    $_SESSION['admin'] = $admin; // Simpan data admin di session
                    header('Location: ' . BASEURL . '/admin/dashboard');
                    exit;
                } else {
                    // Password salah
                    header('Location: ' . BASEURL . '/login?error=Username+atau+password+salah');
                    exit;
                }
            } else {
                // Username tidak ditemukan
                header('Location: ' . BASEURL . '/login?error=Username+atau+password+salah');
                exit;
            }
        } else {
            // Jika request bukan POST, arahkan ke halaman login
            header('Location: ' . BASEURL . '/login');
            exit;
        }
    }
    

    public function register()
    {
        $data['title'] = 'Register';
        $data['error'] = isset($_GET['error']) ? htmlspecialchars($_GET['error']) : ''; // Kirim pesan error ke view
        $this->view('login/register', $data); // Tampilkan view register
    }

    public function prosesRegister()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = htmlspecialchars(trim($_POST['username']));
            $password = htmlspecialchars(trim($_POST['password']));
            $confirmPassword = htmlspecialchars(trim($_POST['confirm_password']));
    
            // Validasi input
            if (empty($username) || empty($password) || empty($confirmPassword)) {
                header('Location: ' . BASEURL . '/login/register?error=Semua+kolom+harus+diisi');
                exit;
            }
    
            if ($password !== $confirmPassword) {
                header('Location: ' . BASEURL . '/login/register?error=Konfirmasi+password+tidak+sesuai');
                exit;
            }
    
            // Hash password
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    
            // Debugging untuk melihat input
            error_log("Username: $username");
            error_log("Password: $password");
            error_log("Hashed Password: $hashedPassword");
    
            // Panggil model Admin untuk proses registrasi
            $adminModel = $this->model('Admin_model');
            $registerResult = $adminModel->register($username, $hashedPassword);
    
            // Debugging untuk hasil register
            // error_log("Register Result: " . json_encode($registerResult));
    
            if ($registerResult) {
                // Jika berhasil, redirect ke halaman login dengan pesan sukses
                header('Location: ' . BASEURL . '/login?success=Registrasi+berhasil.+Silahkan+login');
                exit;
            } else {
                // Jika gagal, redirect ke halaman register dengan pesan error
                header('Location: ' . BASEURL . '/login/register?error=Username+sudah+digunakan');
                exit;
            }
        } else {
            // Jika request bukan POST, redirect ke halaman register
            header('Location: ' . BASEURL . '/login/register');
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
