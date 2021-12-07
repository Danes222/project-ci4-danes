<?php

namespace App\Models;

use CodeIgniter\Model;

class EmployeModel extends Model
{
    //membuat properti untuk Model
    protected $db;
    public function __construct()
    {
        parent::__construct();
        //koneksikan ke database
        $this->db = db_connect();
    }
    public function getData()
    {
        //query
        $query = "SELECT * FROM employes";
        //ambil data dan jadikan array
        $data = $this->db->query($query)->getResultArray();
        return $data;
    }
}
