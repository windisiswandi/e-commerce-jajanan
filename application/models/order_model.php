<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class order_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_all_item() {
        return $this->db->get('orders')->result();
    }

    public function get_cart($data) {
        return $this->db->get_where('orders', [
            'user_id'=>$data['user_id'],
            'product_id'=>$data['product_id'],
            ])->row();
    }

    public function get_where($id) {
        $this->db->where("user_id", $id);
        return $this->db->get('orders')->result();
    }
    
    public function insert($data) {
        return $this->db->insert('orders', $data);
    }

    public function update($id, $data) {
        return $this->db->where('id', $id)->update('orders', $data);
    }

    public function delete($id) {
        return $this->db->where('id', $id)->delete('orders');
    }

    public function get_order_with_user() {
        $this->db->select('orders.id as order_id, orders.*, users.*');
        $this->db->from('orders');
        $this->db->join('users', 'users.id = orders.user_id'); // Inner join by default
        $query = $this->db->get();
        return $query->result_array();
    }
}
