<?php

class Prestasi extends Controller{
    public function index()
    {
        $data['judul'] = 'Prestasi';
        $this->view('template/header', $data);
        $this->view('prestasi/index', $data);
        $this->view('template/footer', $data);
    }

}