<?php

namespace App\Controllers;
use App\Models\VisitModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use Exception;

class VisitController extends ResourceController {
    use ResponseTrait;

    public function getAll() {
       try {
        $model=new VisitModel();
        $data['visitas'] = $model->orderBy('id', 'DESC')->findAll();
        return $this->respond($data);
       } catch (Exception $e) {
        return $this->response->setStatusCode(500);
       }
      
    }

    public function getById($id=null) {
        try {
            $model=new VisitModel();
            $data['visita'] = $model->where('id', $id)->first();
            return $this->respond($data);
        } catch (Exception $e) {
            return $this->response->setStatusCode(500);
        }
        

    }
    public function updateVisit() {
       
        try {
            $model=new VisitModel();
            $data = [
                'id'=>$this->request->getVar('id'),
                'idCliente' => $this->request->getVar('idCliente'),
                'fecha'  => $this->request->getVar('fecha')
            ];
           
            $model->update($data['id'],$data);
            return $this->response->setStatusCode(201); 
        } catch (Exception $e) {
            return $this->response->setStatusCode(500);
        }
       
    }

    public function deleteVisit($id=null) {   
        $model=new VisitModel();
            $model->where('id', $id)->delete();
            return $this->response->setStatusCode(204);
    }
    public function addVisit() {
        try {
            $model=new VisitModel();
            $data = [
                'idCliente' => $this->request->getVar('idCliente'),
                'fecha'  => $this->request->getVar('fecha')
            ];
            $model->insert($data);
            return $this->response->setStatusCode(201);
        } catch (Exception $e) {
            return $this->response->setStatusCode(500);
        
        }
       
    }


    
}