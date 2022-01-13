<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    //membuat properti untuk Model
    protected $db;
    //tambahkan properti untuk nama table
    protected $table = 'admins';
    protected $primaryKey = 'id_admin';
    protected $allowedFields = ['id_admin', 'username', 'password', 'created_at', 'updated_at'];
}