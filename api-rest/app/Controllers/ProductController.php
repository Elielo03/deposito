<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Api extends REST_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('ProductsModel');
    }

    public function getAll() {
        $productos = $this->Productos_model->getAll();
        $this->response($productos, REST_Controller::HTTP_OK);
    }

    public function productos_post() {
        $data = $this->post();
        $id = $this->Productos_model->insertar_producto($data);
        $this->response(['id' => $id], REST_Controller::HTTP_CREATED);
    }

    public function productos_put() {
        $id = $this->put('id');
        $data = $this->put();
        $this->Productos_model->actualizar_producto($id, $data);
        $this->response(['message' => 'Producto actualizado con éxito'], REST_Controller::HTTP_OK);
    }

    public function productos_delete() {
        $id = $this->delete('id');
        $this->Productos_model->eliminar_producto($id);
        $this->response(['message' => 'Producto eliminado con éxito'], REST_Controller::HTTP_OK);
    }
}