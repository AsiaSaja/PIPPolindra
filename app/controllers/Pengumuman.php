<?php

class Pengumuman extends Controller {
    public function index(){
        $data['judul'] = 'Pengumuman';
        $this->view('template/header', $data);
        $this->view('pengumuman/index', $data);
        $this->view('template/footer', $data);
    }
}