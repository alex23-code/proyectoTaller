<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'personas';
    protected $primaryKey = 'persona_id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['persona_apellido', 'persona_nombre', 'persona_telefono',
    'persona_mail', 'persona_password', 'perfil_id', 'persona_estado'];

}
