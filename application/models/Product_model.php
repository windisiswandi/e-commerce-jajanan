<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Makassar");
    }

    public function get_all_products() {
        return $this->db->get('products')->result();
    }

    public function get_product($id) {
        return $this->db->get_where('products', ['id' => $id])->row();
    }

    public function get_product_search($keyword) {
        $this->db->like('product_name', $keyword);
        return $this->db->get('products')->result();
    }

    public function insert_product($data) {
        return $this->db->insert('products', $data);
    }

    public function update_product($id, $data) {
        return $this->db->where('id', $id)->update('products', $data);
    }

    public function delete_product($id) {
        return $this->db->where('id', $id)->delete('products');
    }

    public function get_total_sales() {
        $this->db->select('SUM(products.product_price * order_items.qty) AS total_sales');
        $this->db->from('order_items');
        $this->db->join('products', 'order_items.product_id = products.id');
        $this->db->join('orders', 'orders.id = order_items.order_id');
        $this->db->where('MONTH(orders.order_date)', date('m'));
        $this->db->where('YEAR(orders.order_date)', date('Y'));
        $this->db->where_in('orders.order_status', ['shipped', 'delivered']);
        
        $query = $this->db->get();
        $total_sales = $query->row()->total_sales ? query->row()->total_sales : 0;
        return $total_sales;
    }

    public function get_total_modal() {
        $this->db->select('SUM(products.product_modal * order_items.qty) AS total_modal');
        $this->db->from('order_items');
        $this->db->join('products', 'order_items.product_id = products.id');
        $this->db->join('orders', 'orders.id = order_items.order_id');
        $this->db->where('MONTH(orders.order_date)', date('m'));
        $this->db->where('YEAR(orders.order_date)', date('Y'));
        $this->db->where_in('orders.order_status', ['shipped', 'delivered']);

        $query = $this->db->get();
        return $query->row()->total_modal;
    }
}
