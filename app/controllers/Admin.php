<?php

class Admin extends Controller
{
    public function index()
    {
        $data['judul'] = 'Admin Dashboard';
        $this->view('template/admin-head', $data);
        $this->view('admin/dashboard', $data);
        $this->view('template/admin-foot', $data);
    }

    // ============================
    // Kelola Mahasiswa
    // ============================
    public function kelola_mahasiswa()
    {
        $data['judul'] = 'Kelola Mahasiswa';
        $data['mahasiswa'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
        $this->view('template/admin-head', $data);
        $this->view('admin/mahasiswa', $data);
        $this->view('template/admin-foot', $data);
    }

    public function tambah_mahasiswa()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->model('Mahasiswa_model')->tambahMahasiswa($_POST)) {
                header('Location: ' . BASEURL . '/admin/kelola_mahasiswa?success=tambah');
                exit;
            } else {
                header('Location: ' . BASEURL . '/admin/kelola_mahasiswa?error=tambah_failed');
                exit;
            }
        }
    }

    public function edit_mahasiswa($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->model('Mahasiswa_model')->updateMahasiswa($_POST, $id)) {
                header('Location: ' . BASEURL . '/admin/kelola_mahasiswa?success=edit');
                exit;
            } else {
                header('Location: ' . BASEURL . '/admin/kelola_mahasiswa?error=edit_failed');
                exit;
            }
        }
    }

    public function hapus_mahasiswa($id)
    {
        if ($this->model('Mahasiswa_model')->deleteMahasiswa($id)) {
            header('Location: ' . BASEURL . '/admin/kelola_mahasiswa?success=hapus');
            exit;
        } else {
            header('Location: ' . BASEURL . '/admin/kelola_mahasiswa?error=hapus_failed');
            exit;
        }
    }

    // ============================
    // Kelola Kompetisi
    // ============================
    public function kelola_kompetisi()
    {
        $data['judul'] = 'Kelola Kompetisi';
        $data['kompetisi'] = $this->model('Kompetisi_model')->getAllKompetisi();
        $this->view('template/admin-head', $data);
        $this->view('admin/kelola-kompetisi', $data);
        $this->view('template/admin-foot', $data);
    }

    public function tambah_kompetisi()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->model('Kompetisi_model')->tambahKompetisi($_POST)) {
                header('Location: ' . BASEURL . '/admin/kelola_kompetisi?success=tambah');
                exit;
            } else {
                header('Location: ' . BASEURL . '/admin/kelola_kompetisi?error=tambah_failed');
                exit;
            }
        }
    }

    public function hapus_kompetisi($id)
    {
        if ($this->model('Kompetisi_model')->hapusKompetisi($id)) {
            header('Location: ' . BASEURL . '/admin/kelola_kompetisi?success=hapus');
            exit;
        } else {
            header('Location: ' . BASEURL . '/admin/kelola_kompetisi?error=hapus_failed');
            exit;
        }
    }
}
