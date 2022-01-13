<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Admin extends BaseController
{
    protected $adminModel;
    public function __construct()
    {
        $this->adminModel = new \App\Models\AdminModel();
        //aktifkan url helper
        helper('url');
    }
    public function index()
    {
        // memasukan semua data dalam array
        $data['judul'] = 'CRUD ADMIN';
        //memanggil fungsi dari model
        // $data['admin'] = $this->adminModel->getData();
        $data['admin'] = $this->adminModel->findAll();
        //Menampilkan hasil ke view
        return view('admin', $data);
    }
    public function save()
    {
        //ambil data dari form dan masukan ke array
        $data = [
            'id_admin' => $this->request->getPost('id_admin'),
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
        ];
        //menggunakan function Model Insert
        $this->adminModel->insert($data);
        //kembali ke table employe
        return redirect()->to('/admin');
    }
    public function edit($id)
    {
        $data['judul'] = 'EDIT ADMIN';
        //ambil data berdasarkan id yang dikirm
        // $data['employe'] = $this->employeModel->getDataByID($id);
        $data['admin']=$this->adminModel->where('id_admin', $id)->findAll();
        //tampilkan data di view
        return view('edit_data_admin', $data);
    }
    public function update()
    {
        //ambil data dari form dan masukan ke array
        $data = [
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
        ];
        //panggil fungsi ubah di model dan kirimkan datanya
        // $this->employeModel->ubah(['id' => $this->request->getPost('id')], $data);
        $this->adminModel->update(['id_admin' => $this->request->getPost('id_admin')],$data);
        //kembali ke table employe
        return redirect()->to('/admin');
    }
    public function destroy($id)
    {
        // hapus data berdasarkan id
        $this->adminModel->delete($id);
        //kembali ke table employe
        return redirect()->to('/admin');
    }

}
