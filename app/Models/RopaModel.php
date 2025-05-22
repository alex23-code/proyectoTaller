<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'ropa';
    protected $primaryKey = 'ropa_id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = 'false';

    protected $allowedFields = ['marca', 'ropa_precio', 'stock', 'ropa_estado', 'ropa_categoria', 'ropa_talla'];

    protected $useTimestamps = false;
    protected $createdField = '';
    protected $updatedField = '';
    protected $deletedField = '';

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
}