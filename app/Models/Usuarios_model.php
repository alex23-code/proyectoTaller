<?php

namespace App\Models;

use CodeIgniter\Model;

class Usuarios_Model extends Model
{
    protected $table      = 'personas';
    protected $primaryKey = 'persona_id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['persona_apellido', 'persona_nombre', 'persona_telefono',
    'persona_email', 'persona_password', 'perfil_id', 'persona_estado'];
    
    protected $useTimestamps = false;
    protected $createdField = '';
    protected $updatedField = '';
    protected $deletedField = '';

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
}
