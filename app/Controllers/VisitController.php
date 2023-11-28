<?php

namespace App\Controllers;
use App\Models\VisitModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use Exception;
date_default_timezone_set('America/Los_Angeles');

$script_tz = date_default_timezone_get();

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
            
            $date =
             date('Y-m-d H:i:s', strtotime($this->request->getVar('fecha')) 
            );
         
           
            $data = [
                'id'=>$this->request->getVar('id'),
                'idCliente' => $this->request->getVar('idCliente'),
                'fecha'  => $date 
            ];
            echo json_encode($data);
           
            $model->update($data['id'],$data);
            return $this->response->setStatusCode(201); 
        } catch (Exception $e) {
            echo 'Message: ' .$e->getMessage();
            //return $this->response->setStatusCode(500);
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
            $date =
            date('Y-m-d H:i:s', strtotime($this->request->getVar('fecha')) 
           );
            $data = [
                'idCliente' => $this->request->getVar('idCliente'),
                'fecha'  => $date
            ];
            $model->insert($data);
            return $this->response->setStatusCode(201);
        } catch (Exception $e) {
            return $this->response->setStatusCode(500);
        
        }
       
    }


    
}