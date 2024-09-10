<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {
	protected $_data = [];

	function __construct()
	{
		parent::__construct();
		$this->load->model("User_model");
		$this->load->model("cart_model");
		$this->load->model("Kurir_model");
		$this->load->model("Product_model");
		$this->load->library("form_validation");
		$id = $this->session->userdata('id');
        $this->_data['user'] = $this->User_model->get_user($id);
        $this->_data['carts'] = $this->cart_model->get_cart_with_product($id);
        $this->_data['uniqcode'] = (int) str_pad(rand(0, 999), 3, '0', STR_PAD_LEFT);
        $this->_data['data_pengaturan'] = $this->db->get('pengaturan')->row();

        if (!$this->session->userdata("username")) redirect('auth/user_login');
        if ($this->session->userdata("role") == "admin") redirect('dashboard');
	}

    public function index()
	{
		$this->_data['total_weight'] = 0;
		foreach ($this->_data['carts'] as $items) {
			$this->_data['total_weight'] += ($items->weight * $items->qty);
		}

        $user = $this->_data['user'];
        $costs = $this->Kurir_model->getCost(240, $user->id_city, $this->_data['total_weight']);
        $costs = $costs['rajaongkir']['results'][0]['costs'];
		$this->_data['kurirs'] = $costs;
        $this->_data['kurir'] = $costs[0];
        $this->_data['ongkir'] = $costs[0]['cost'][0]['value'];
        $this->_data['title'] = "Toko Jajanan Lombok";
		
		$this->load->view('components/header', $this->_data);
		$this->load->view('checkout', $this->_data);
		$this->load->view('components/footer');
	}
}
