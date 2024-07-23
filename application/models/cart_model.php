<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cart_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_all_item() {
        return $this->db->get('carts')->result();
    }

    public function get_cart($data) {
        return $this->db->get_where('carts', [
            'user_id'=>$data['user_id'],
            'product_id'=>$data['product_id'],
            ])->row();
    }

    public function get_where($id) {
        $this->db->where("user_id", $id);
        return $this->db->get('carts')->result();
    }
    
    public function insert($data) {
        return $this->db->insert('carts', $data);
    }

    public function update($id, $data) {
        return $this->db->where('id', $id)->update('carts', $data);
    }

    public function delete($id) {
        return $this->db->where('id', $id)->delete('carts');
    }

    public function get_cart_with_product($user_id) {
        $this->db->select('carts.id as cart_id, carts.*, products.*');
        $this->db->from('carts');
        $this->db->join('products', 'products.id = carts.product_id'); // Inner join by default
        $this->db->where("carts.user_id", $user_id);
        $query = $this->db->get();
        return $query->result();
    }
}
