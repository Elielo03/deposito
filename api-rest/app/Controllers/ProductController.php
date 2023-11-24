<?php

namespace App\Controllers;
use App\Models\ProductsModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use Exception;

class ProductController extends ResourceController {
    use ResponseTrait;

    public function getAll() {
       try {
        $model=new ProductsModel();
        $data['products'] = $model->orderBy('id', 'DESC')->findAll();
        return $this->respond($data);
       } catch (Exception $e) {
        return $this->response->setStatusCode(500);
       }
      
    }

    public function getById($id=null) {
        try {
            $model=new ProductsModel();
            $data['product'] = $model->where('id', $id)->first();
            return $this->respond($data);
        } catch (Exception $e) {
            return $this->response->setStatusCode(500);
        }
        

    }
    public function updateProduct() {
       
        try {
            $model=new ProductsModel();
            $data = [
                'id'=>$this->request->getVar('id'),
                'nombre' => $this->request->getVar('nombre'),
                'descripcion'  => $this->request->getVar('descripcion'),
                'precio'  => $this->request->getVar('precio')
            ];
           
            $model->update($data['id'],$data);
            return $this->response->setStatusCode(201); 
        } catch (Exception $e) {
            return $this->response->setStatusCode(500);
        }
       
    }

    public function deleteProduct($id=null) {   
        $model=new ProductsModel();
            $model->where('id', $id)->delete();
            return $this->response->setStatusCode(204);
    }
    public function addProduct() {
        try {
            $model=new ProductsModel();
            $data = [
                'nombre' => $this->request->getVar('nombre'),
                'descripcion'  => $this->request->getVar('descripcion'),
                'precio'  => $this->request->getVar('precio')
            ];
            $model->insert($data);
            return $this->response->setStatusCode(201);
        } catch (Exception $e) {
            return $this->response->setStatusCode(500);
        
        }
       
    }


    
}