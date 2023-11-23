<?php

namespace App\Controllers;
use App\Models\ProductsModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
defined('BASEPATH') OR exit('No direct script access allowed');



class Api extends ResourceController {

    public function __construct() {
       
    }

    public function getAll() {
        $model=new ProductsModel();
        $data['products'] = $model->orderBy('id', 'DESC')->findAll();
        return $this->respond($data);

      
    }

    
}