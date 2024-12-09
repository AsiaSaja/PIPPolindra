<?php

class Admin extends Controller{
    public function index()
    {
        $data['judul'] = 'Admin Dashboard';
        $data['user'] = ['nama'];
        $this->view('template/admin-head', $data);
        $this->view('admin/dashboard', $data);
        $this->view('template/admin-foot', $data);
    }

    public function kelola_mahasiswa()
    {
        $data['judul'] = 'Admin Dashboard';
        $data['user'] = ['nama'];
        $this->view('template/admin-head', $data);
        $this->view('admin/mahasiswa', $data);
        $this->view('template/admin-foot', $data);
    }

    public function kelola_kompetisi()
    {
        $data['judul'] = 'Admin Dashboard';
        $data['user'] = ['nama'];
        $this->view('template/admin-head', $data);
        $this->view('admin/kompetisi', $data);
        $this->view('template/admin-foot', $data);
    }

    public function kelola_prestasi()
    {
        $data['judul'] = 'Admin Dashboard';
        $data['user'] = ['nama'];
        $this->view('template/admin-head', $data);
        $this->view('admin/prestasi', $data);
        $this->view('template/admin-foot', $data);
    }
}