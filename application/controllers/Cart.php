<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {
	protected $_data = [];

	function __construct()
	{
		parent::__construct();
		$this->load->model("User_model");
		$this->load->model("cart_model");
		$this->load->model("Product_model");
		$this->load->library("form_validation");
		$id = $this->session->userdata('id');
        $this->_data['user'] = $this->User_model->get_user($id);
        $this->_data['carts'] = $this->cart_model->get_cart_with_product($id);

        if (!$this->session->userdata("username")) redirect('auth/user_login');
        if ($this->session->userdata("role") == "admin") redirect('dashboard');
	}
	
	public function index()
	{
        $user_id = $this->session->userdata('id');
		// $this->_data['cart_items'] = $this->cart_model->get_cart_with_product($user_id);
		$this->_data['title'] = "Toko Jajanan Lombok";
		
		$this->load->view('components/header', $this->_data);
		$this->load->view('cart_list', $this->_data);
		$this->load->view('components/footer');
	}

	public function add() 
	{
        $data = [
            "user_id" => $this->session->userdata('id'),
            "product_id" => $this->input->post("id_product"),
            "qty" => 1
        ];

        $data_cart = $this->cart_model->get_cart($data);

        if ($data_cart) {
            $data['qty'] = $data_cart->qty + 1;
            $this->cart_model->update($data_cart->id, $data);
        }else {
            $this->cart_model->insert($data);
        }

        return true;
	}

    public function remove()
    {
        if ($this->db->empty_table("carts")) redirect('cart');
    }

    public function remove_item_cart($cart_id)
    {
        if ($this->cart_model->delete($cart_id)) {
            $user_id = $this->session->userdata("id");
            $this->_data['carts'] = $this->cart_model->get_cart_with_product($user_id);
            return $this->load->view('partial/cart_list_template', $this->_data); 
        }    
    }

    public function api_get() {
        $carts = $this->cart_model->get_where($this->session->userdata('id'));
        echo count($carts);
    }

    public function api_add() 
    {
        $user_id = $this->session->userdata("id");
        $data = [
            "user_id" => $user_id,
            "product_id" => $this->input->post("id_product"),
            "qty" => $this->input->post("qty")
        ];

        $data_cart = $this->cart_model->get_cart($data);

        if ($data_cart) {
            $this->cart_model->update($data_cart->id, $data);
        }

        $this->_data['carts'] = $this->cart_model->get_cart_with_product($user_id);

        return $this->load->view('partial/cart_list_template', $this->_data);
    }

}
