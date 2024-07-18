<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	protected $_data = [];
	
	public function index()
	{
		$this->load->view('home', ["name" => "windisiswandi"]);
	}

}
