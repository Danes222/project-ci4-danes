<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    protected $employeModel;
    public function __construct()
    {
        $this->employeModel=new \App\Models\EmployeModel();
        //aktifkan url helper
        helper('url');
    }
    public function index()
    {
        $data['judul'] = 'Laman Home';
        $data['isi'] = 'Lorem ipsum dolor sit amet';
        return view('dashboard', $data);
    }
    public function gallery()
    {
        $data['judul'] = 'Laman Gallery';
        return view('gallery', $data);
    }
    public function about()
    {
        $data['judul'] = 'Laman About';
        $data['isi'] = 'Ini adalah halaman about';
        return view('about', $data);
    }

    // Kalkulator
    public function kalkulator()
    {
        $data = array(
            "judul" => "Kalkulator Sederhana",
            "angka1" => 0,
            "angka2" => 0,
            "hasil" => 0,
        );
        return view("kalkulator2", $data);
    }

    public function proses()
    {
        $data = array(
            "judul" => "Kalkulator Sederhana",
            "angka1" => $this->request->getPost('angka1'),
            "angka2" => $this->request->getPost('angka2'),
            "hasil" => $this->request->getPost('angka1') * $this->request->getPost('angka2'),
        );
        return view("kalkulator2", $data);
    }

    // Database
    public function employe()
    {
        // memasukan semua data dalam array
        $data['judul'] = 'CRUD Employe';
        //memanggil fungsi dari model
        $data['employe'] = $this->employeModel->getData();
        //Menampilkan hasil ke view
        return view('tampil_data', $data);
    }
}
