<?php
class ProductsModel extends CI_Model {
    
    public function getAll() {
        $query = $this->db->get('productos');
        return $query->result();
    }

    public function insertar_producto($data) {
        $this->db->insert('productos', $data);
        return $this->db->insert_id();
    }

    public function actualizar_producto($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('productos', $data);
    }

    public function eliminar_producto($id) {
        $this->db->where('id', $id);
        $this->db->delete('productos');
    }
}
?>