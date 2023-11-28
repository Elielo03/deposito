<?php
namespace App\Models;
use CodeIgniter\Model;
class SaleModel extends Model {
    
    protected $table = 'venta';
    protected $primaryKey = 'id';
    protected $allowedFields = ['idCliente', 'total','totalArticulos','fecha'];
}
?>