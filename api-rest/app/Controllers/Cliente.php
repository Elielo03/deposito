<?php
namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\ClienteModel;

class Cliente extends ResourceController{
    use ResponseTrait;

    public function getAll(){
        echo "H3";
        $model=new ClienteModel();
        $data['clientes'] = $model->orderBy('id', 'DESC')->findAll();
        return $this->respond($data);
    }
}