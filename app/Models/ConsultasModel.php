<?php
namespace App\Models;
use CodeIgniter\Model;

class CategoriaModel extends Model{
    protected $table      = 'consultas';
    protected $primaryKey = 'NumPedido';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['Nombre', 'Apellido', 'Mail', 'NumTelefono', 'Comentario', ''];
}