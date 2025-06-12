<?php

namespace App\Models;

use CodeIgniter\Model;

class TalleModel extends Model
{
    protected $table      = 'talle';
    protected $primaryKey = 'id_talle';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['descripción'];
}