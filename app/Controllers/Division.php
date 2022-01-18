<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Division extends BaseController
{
    protected $divisionModel;
    public function __construct()
    {
        $this->divisionModel = new \App\Models\DivisionModel();
        //aktifkan url helper
        helper('url');
    }
    public function index()
    {
        // memasukan semua data dalam array
        $data['judul'] = 'CRUD DIVISION';
        //memanggil fungsi dari model
        // $data['division'] = $this->divisionModel->getData();
        $data['division'] = $this->divisionModel->findAll();
        //Menampilkan hasil ke view
        return view('division', $data);
    }
    public function save()
    {
        //ambil data dari form dan masukan ke array
        $data = [
            'div_id' => $this->request->getPost('div_id'),
            'division' => $this->request->getPost('division'),
            'is_aktif' => $this->request->getPost('is_aktif'),
        ];
        //menggunakan function Model Insert
        $this->divisionModel->insert($data);
        //kembali ke table employe
        return redirect()->to('/division');
    }
    public function edit($id)
    {
        $data['judul'] = 'EDIT DIVISION';
        //ambil data berdasarkan id yang dikirm
        // $data['employe'] = $this->employeModel->getDataByID($id);
        $data['division']=$this->divisionModel->where('div_id', $id)->findAll();
        //tampilkan data di view
        return view('edit_data_division', $data);
    }
    public function update()
    {
        //ambil data dari form dan masukan ke array
        $data = [
            'division' => $this->request->getPost('division'),
            'is_aktif' => $this->request->getPost('is_aktif'),
        ];
        //panggil fungsi ubah di model dan kirimkan datanya
        // $this->employeModel->ubah(['id' => $this->request->getPost('id')], $data);
        $this->divisionModel->update(['div_id' => $this->request->getPost('div_id')],$data);
        //kembali ke table employe
        return redirect()->to('/division');
    }
    public function destroy($id)
    {
        // hapus data berdasarkan id
        $this->divisionModel->delete($id);
        //kembali ke table employe
        return redirect()->to('/division');
    }

}
