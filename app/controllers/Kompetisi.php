<?php

class Kompetisi extends Controller{
    public function index()
    {
        $data['judul'] = 'Kompetisi';
        $this->view('template/header', $data);
        $this->view('kompetisi/index', $data);
        $this->view('template/footer', $data);
        
    }
}