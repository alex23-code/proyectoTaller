<?php
namespace App\Models;
use CodeIgniter\Model;

class Consultas_Model extends Model{
    protected $table      = 'consultas';
    protected $primaryKey = 'idMensaje';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

     protected $allowedFields = ['Nombre','Apellido' , 'Correo', 'NumTelefono','Consulta', 'leido'];

    protected $useTimestamps = false;
    protected $createdField = '';
    protected $updatedField = '';
    protected $deletedField = '';

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
}