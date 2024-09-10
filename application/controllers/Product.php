<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
	protected $_data = [];

	function __construct()
	{
		parent::__construct();
		$this->load->model("cart_model");
		$this->load->model("User_model");
		$this->load->model("Product_model");
		$this->load->library("form_validation");
		$id = $this->session->userdata('id');
        $this->_data['user'] = $this->User_model->get_user($id);
        $this->_data['carts'] = $this->cart_model->get_where($id);
		$this->_data['data_pengaturan'] = $this->db->get('pengaturan')->row();
	}
	
	public function index()
	{
		$this->_data['products'] = $this->Product_model->get_all_products();
		$this->_data['title'] = "Toko Jajanan Lombok";
		if (isset($_GET['search'])) $this->_data['products'] = $this->Product_model->get_product_search($_GET['search']);
		$this->load->view('components/header', $this->_data);
		$this->load->view('home', $this->_data);
		$this->load->view('components/footer');
	}

	public function detail($id) 
	{
		$this->_data['product'] = $this->Product_model->get_product($id);
		$this->_data['title'] = "Toko Jajanan Lombok";
		$this->load->view('components/header', $this->_data);
		$this->load->view('product_detail.php', $this->_data);
		$this->load->view('components/footer');
	}

}
