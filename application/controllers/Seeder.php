<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seeder extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
    }
	
	public function index()
    {

        $data = [
            [
                'username' => 'admin',
                'email' => 'admin@example.com',
                'password' => password_hash('admin', PASSWORD_DEFAULT),
                'role' => 'admin'
            ],
            [
                'username' => 'pel1',
                'email' => 'pelanggan1@example.com',
                'password' => password_hash('pelanggan1', PASSWORD_DEFAULT),
                'role' => 'user'
            ]
        ];

        foreach ($data as $user) {
            $this->User_model->insert($user);
        }
        echo "Success";
    
    }

}