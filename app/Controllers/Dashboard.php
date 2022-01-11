<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    protected $employeModel;
    public function __construct()
    {
        $this->employeModel = new \App\Models\EmployeModel();
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
        // $data['employe'] = $this->employeModel->getData();
        $data['employe'] = $this->employeModel->findAll();
        //Menampilkan hasil ke view
        return view('tampil_data', $data);
    }
    public function save()
    {
        //ambil data dari form dan masukan ke array
        $data = [
            'id' => $this->request->getPost('id'),
            'nama' => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
            'gender' => $this->request->getPost('gender'),
            'gaji' => $this->request->getPost('gaji')
        ];
        //menggunakan function Model Insert
        $this->employeModel->insert($data);
        //kembali ke table employe
        return redirect()->to('/dashboard/employe');
    }

    // EDIT

    public function edit($id)
    {
        $data['judul'] = 'Edit Employe';
        //ambil data berdasarkan id yang dikirm
        // $data['employe'] = $this->employeModel->getDataByID($id);
        $data['employe']=$this->employeModel->where('id', $id)->findAll();
        //tampilkan data di view
        return view('edit_data', $data);
    }
    public function update()
    {
        //ambil data dari form dan masukan ke array
        $data = [
            'nama' => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
            'gender' => $this->request->getPost('gender'),
            'gaji' => $this->request->getPost('gaji')
        ];
        //panggil fungsi ubah di model dan kirimkan datanya
        // $this->employeModel->ubah(['id' => $this->request->getPost('id')], $data);
        $this->employeModel->update(['id' => $this->request->getPost('id')],$data);
        //kembali ke table employe
        return redirect()->to('/dashboard/employe');
    }


    // END EDIT
    public function destroy($id)
    {
        // hapus data berdasarkan id
        $this->employeModel->delete($id);
        //kembali ke table employe
        return redirect()->to('/dashboard/employe');
    }
}
