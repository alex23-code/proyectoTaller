<?php

namespace App\Models;

use CodeIgniter\Model;

class Tipo_Model extends Model
{
    protected $table      = 'tipo';
    protected $primaryKey = 'id_tipo';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['descripción'];
}