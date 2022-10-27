<?php

namespace App\Models;
use CodeIgniter\Model;

class ClienteModel extends Model{
    protected $table = 'clientes';
    protected $primaryKey = 'id';
    protected $allowedFields = ['razon_social', 'cordenadas'.'referencia', 'codigo_qr'];
} 