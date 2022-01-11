<?php

namespace App\Models;

use CodeIgniter\Model;

class EmployeModel extends Model
{
    //membuat properti untuk Model
    protected $db;
    //tambahkan properti untuk nama table
    protected $table = 'employes';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'nama', 'alamat', 'gender', 'gaji'];

    // public function getDataByID($id)
    // {
    //     $builder = $this->db->table($this->table);
    //     //ambil data berdasarkan id
    //     //SELECT * FROM employe WHERE id='$id'
    //     return $data = $builder->getWhere(['id' => $id])->getResultArray();
    // }
    // public function ubah($data, $key)
    // {
    //     $builder = $this->db->table($this->table);
    //     //ubah data dalam tabel
    //     //update employe set field1, field2 WHERE id='$id'
    //     $builder->update($data, $key);
    // }
    public function hapus($key)
    {
        $builder = $this->db->table($this->table);
        //hapus data sesuai id
        //DELETE FROM employe WHERE id='$id'
        $builder->delete($key);
    }

    // public function __construct()
    // {
    //     parent::__construct();
    //     //koneksikan ke database
    //     $this->db = db_connect();
    // }
    // public function getData()
    // {
    //     // //query
    //     // $query = "SELECT * FROM employes";
    //     // //ambil data dan jadikan array
    //     // $data = $this->db->query($query)->getResultArray();
    //     // return $data;
    //     $builder = $this->db->table($this->table);
    //     return $data = $builder->get()->getResultArray();
    // }
}
