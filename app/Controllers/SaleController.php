<?php

namespace App\Controllers;
use App\Models\SaleModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use Exception;

class SaleController extends ResourceController {
    use ResponseTrait;

    public function getAll() {
       try {
        $model=new SaleModel();
        $data['sales'] = $model->orderBy('id', 'DESC')->findAll();
        return $this->respond($data);
       } catch (Exception $e) {
        return $this->response->setStatusCode(500);
       }
      
    }

    public function getById($id=null) {
        try {
            $model=new SaleModel();
            $data['sale'] = $model->where('id', $id)->first();
            return $this->respond($data);
        } catch (Exception $e) {
            return $this->response->setStatusCode(500);
        }
        

    }
    public function updateSale() {
       
        try {
            $model=new SaleModel();
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

    public function deleteSale($id=null) {   
        $model=new SaleModel();
            $model->where('id', $id)->delete();
            return $this->response->setStatusCode(204);
    }
    public function addSale() {
        try {
            $model=new SaleModel();
            $data = [
                'idCliente' => $this->request->getVar('idCliente'),
                'total'  => $this->request->getVar('total'),
                'totalArticulos'  => $this->request->getVar('totalArticulos'),
                'fecha'  => $this->request->getVar('fecha')
            ];
            $model->insert($data);
            return $this->response->setStatusCode(201);
        } catch (Exception $e) {
            return $this->response->setStatusCode(500);
        
        }
       
    }


    
}