<?php
namespace App\Models;
use CodeIgniter\Model;
class ProductsModel extends Model {
    
    protected $table = 'productos';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre', 'descripcion','precio'];
}
?>