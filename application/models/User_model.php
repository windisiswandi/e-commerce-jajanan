<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function get_user($id)
    {
        return $this->db->get_where('users', ['id' => $id])->row();
    }
    public function insert($data) {
        return $this->db->insert('users', $data);
    }

    public function update($id, $data)
    {
        return $this->db->where('id', $id)->update('users', $data);
    }
}
