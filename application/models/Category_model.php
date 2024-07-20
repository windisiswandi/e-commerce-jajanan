<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_all_categories() {
        return $this->db->get('categories')->result();
    }
    
    public function insert_category($data) {
        return $this->db->insert('categories', $data);
    }

    public function update_category($id, $data) {
        return $this->db->where('id', $id)->update('categories', $data);
    }

    public function delete_category($id) {
        return $this->db->where('id', $id)->delete('categories');
    }
}
