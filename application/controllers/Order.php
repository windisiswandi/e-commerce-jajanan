<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {
	protected $_data = [];

	function __construct()
	{
		parent::__construct();
        date_default_timezone_set("Asia/Makassar");
		$this->load->model("cart_model");
		// $this->load->model("User_model");
		// $this->load->model("Product_model");
		// $this->load->library("form_validation");
		// $id = $this->session->userdata('id');
        // $this->_data['user'] = $this->User_model->get_user($id);
        // $this->_data['carts'] = $this->cart_model->get_where($id);

        if (!$this->session->userdata("username")) redirect('auth/user_login');
        if ($this->session->userdata("role") == "admin") redirect('dashboard');
	}

	public function add() 
	{
		$user_id = $this->session->userdata('id');
        $dataCarts = $this->cart_model->get_cart_with_product($user_id);
        $payment = $this->input->post('payment_method');
        $data = [
            'user_id' => $user_id,
            'order_number' => 'T'.$user_id.date("ymdhis"),
            'order_date' => date("Y-m-d H:i:s"),
            'total_amount' => $this->input->post('total_amount'),
            'payment_method' => $payment,
            'order_status' => $payment == 'transfer' ? 'pending' : 'packed',
        ];

        if($this->db->insert("orders", $data)) {
            $order_id=$this->db->insert_id();
            foreach ($dataCarts as $item) {
                $this->db->insert('order_items', [
                    'order_id' => $order_id,
                    'product_id' => $item->product_id,
                    'qty' => $item->qty
                ]);
            }
        }

        if ($this->db->where('user_id', $user_id)->delete('carts')) {
            redirect('user/orders');
        }
	}

    public function payment($order_id) 
    {
        $user_id = $this->session->userdata('id');
        $data = [
            "user_id" => $user_id,
            "order_id" => $order_id,
            "bank_name" => $this->input->post('bank_name'),
            "no_rekening" => $this->input->post('no_rekening'),
            "atas_nama" => $this->input->post('atas_nama'),
            "foto" => "tews",
        ];

        if ($this->db->insert("payments", $data)) {
            $this->db->where('id', $order_id)->update('orders', ['order_status' => 'packed']);
            $this->session->set_userdata('success', true);
            redirect('user/orders');
        }
    }

    public function cancel($order_id)
    {
        if ($this->db->where('id', $order_id)->update('orders', ['order_status'=>'cancelled'])) {
            redirect('user/orders');
        }
    }

}
