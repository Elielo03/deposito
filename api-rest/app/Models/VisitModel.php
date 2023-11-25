<?php
namespace App\Models;
use CodeIgniter\Model;
class VisitModel extends Model {
    
    protected $table = 'visita';
    protected $primaryKey = 'id';
    protected $allowedFields = ['idCliente', 'fecha'];
}
?>