<?php
namespace App\Models;
use CodeIgniter\Model;

class ConsultasModel extends Model{
    protected $table      = 'consultas';
    protected $primaryKey = 'idMensaje';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['Nombre', 'Correo', 'NumTelefono','Consulta'];

    
}