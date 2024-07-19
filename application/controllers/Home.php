<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	protected $_data = [];
	
	public function index()
	{
		$this->load->view('components/header', ["title" => "Toko Jajanan Lombok"]);
		$this->load->view('home');
		$this->load->view('components/footer');
	}

}
