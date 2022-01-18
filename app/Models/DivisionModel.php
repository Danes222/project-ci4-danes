<?php

namespace App\Models;

use CodeIgniter\Model;

class DivisionModel extends Model
{
    //membuat properti untuk Model
    protected $db;
    //tambahkan properti untuk nama table
    protected $table = 'divisions';
    protected $primaryKey = 'div_id';
    protected $allowedFields = ['div_id', 'division', 'is_aktif', 'created_at', 'updated_at'];
}