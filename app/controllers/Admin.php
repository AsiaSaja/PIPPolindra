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
}