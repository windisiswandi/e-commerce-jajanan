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
        $this->db->where("id", $id);
        return $this->db->get('orders')->row();
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

    public function get_order_with_user($order_id = null) {
                
        if ($order_id) {
            $this->db->select('orders.id as order_id, orders.*, users.name, users.address, users.id as user_id');
            $this->db->from('orders');
            $this->db->join('users', 'users.id = orders.user_id');
            $this->db->where('orders.id', $order_id);
            $query = $this->db->get()->row_array();

            $payment = $this->db->get_where("payments", ['order_id' => $order_id])->row_array();
            if ($payment) $query = array_merge($query, $payment);
            
            $this->db->select('order_items.product_id as item_product_id, order_items.qty, products.id as product_id, products.*');
            $this->db->from('order_items');
            $this->db->join('products', 'products.id = order_items.product_id');
            $this->db->where('order_items.order_id', $order_id);
            $query['items']=$this->db->get()->result_array();

        }else {
            $this->db->select('orders.id as order_id, orders.*, users.name');
            $this->db->from('orders');
            $this->db->join('users', 'users.id = orders.user_id');
            $query = $this->db->get()->result_array();
        }
        
        return $query;
    }
}
