<?php
namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\ClientModel;
use Exception;

class ClientController extends ResourceController{
    use ResponseTrait;

    public function getAll(){
        $model=new ClientModel();
        $data['clients'] = $model->orderBy('id', 'DESC')->findAll();
        return $this->respond($data);
    }

    public function getById($id=null) {
        try {
            $model=new ClientModel();
            $data['client'] = $model->where('id', $id)->first();
            return $this->respond($data);
        } catch (Exception $e) {
            return $this->response->setStatusCode(500);
        }
        
    }
    public function updateClient() {
       
        try {
            $model=new ClientModel();
            $data = [
                'id'=>$this->request->getVar('id'),
                'razon_social' => $this->request->getVar('razon_social'),
                'coordenadas'  => $this->request->getVar('coordenadas'),
                'referencia'  => $this->request->getVar('referencia'),
                'codigo_qr'  => $this->request->getVar('codigo_qr')
            ];
           
            $model->update($data['id'],$data);
            return $this->response->setStatusCode(201); 
        } catch (Exception $e) {
            return $this->response->setStatusCode(500);
        }
       
    }

    public function deleteClient($id=null) {   
        $model=new ClientModel();
            $model->where('id', $id)->delete();
            return $this->response->setStatusCode(204);
    }
    public function addClient() {
        try {
            $model=new ClientModel();
            $data = [
                'razon_social' => $this->request->getVar('razon_social'),
                'coordenadas'  => $this->request->getVar('coordenadas'),
                'referencia'  => $this->request->getVar('referencia'),
                'codigo_qr'  => $this->request->getVar('codigo_qr')
            ];
            $model->insert($data);
            return $this->response->setStatusCode(201);
        } catch (Exception $e) {
            return $this->response->setStatusCode(500);
        
    
        }
}
}
?>