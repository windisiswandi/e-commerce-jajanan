<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {
	protected $_data = [];

	function __construct()
	{
		parent::__construct();
        date_default_timezone_set("Asia/Makassar");
		$this->load->model("cart_model");
		$this->load->model("order_model");
		$this->load->model("Product_model");
		$this->load->model("User_model");
		$this->load->library("upload");
		$id = $this->session->userdata('id');
        $this->_data['user'] = $this->User_model->get_user($id);
        $this->_data['carts'] = $this->cart_model->get_where($id);
        $this->_data['data_pengaturan'] = $this->db->get('pengaturan')->row();

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
            'ongkir' => $this->input->post('ongkir'),
            'kurir' => $this->input->post('kurir'),
            'kode_unik' => $this->input->post('kode_unik'),
            'estimasi' => $this->input->post('estimasi'),
            'total_weight' => $this->input->post('total_weight'),
            'order_status' => $payment == 'transfer' ? 'pending' : 'packed',
        ];

        foreach ($dataCarts as $item) {
            $product = $this->Product_model->get_product($item->product_id);
            
            if ($product->stock < $item->qty) {
                $this->session->set_userdata('error', "Stock tidak mencukupi");
                redirect('cart');
            }
        }

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
        $dataPayment = $this->input->post('data_payment') ? true:false;
        $data = [
            "user_id" => $user_id,
            "order_id" => $order_id,
            "bank_name" => $this->input->post('bank_name'),
            "no_rekening" => $this->input->post('no_rekening'),
            "atas_nama" => $this->input->post('atas_nama'),
        ];

        if (!empty($_FILES['bukti_transfer']['name'])) {
            // var_dump($_FILES['bukti_transfer']); die;
            $config['upload_path'] = './assets/img/bukti_transfer/';
            $config['allowed_types'] = 'jpg|jpeg|png|webp|jpe';
            $config['max_size'] = 1024;
            $ext = pathinfo($_FILES['bukti_transfer']['name'], PATHINFO_EXTENSION);
            $config['file_name'] = time() . '.' . $ext;
            $this->upload->initialize($config);

            if ($this->upload->do_upload('bukti_transfer')) {
                $upload_data = $this->upload->data();
                $data['foto'] = $upload_data['file_name'];
            } else {
                $error = $this->upload->display_errors();
                
                $this->session->set_userdata('errorFile', $error);
                redirect('user/payment/'.$order_id);
            }

        }else{
            $this->session->set_userdata('errorFile', "Wajib upload bukti pembayaran");
            redirect('user/payment/'.$order_id);
        }

        if ($dataPayment) {
            $this->db->where('order_id', $order_id);
            if ($this->db->update("payments", $data)) {
                $this->db->where('id', $order_id)->update('orders', ['order_status' => 'packed']);
                $this->session->set_userdata('success', "Kami akan mengonfirmasi pembayaran anda terlebih dahulu sebelum paket dikirim.");
                redirect('user/orders');
            }
        }else {
            if ($this->db->insert("payments", $data)) {
                $this->db->where('id', $order_id)->update('orders', ['order_status' => 'packed']);
                $this->session->set_userdata('success', "Kami akan mengonfirmasi pembayaran anda terlebih dahulu sebelum paket dikirim.");
                redirect('user/orders');
            }
        }
    }

    public function invoice($order_id)
    {
        $this->_data['orders'] = $this->order_model->get_order_with_user($order_id);
        $this->_data['title'] = "Toko Jajanan Lombok";

        $this->load->view('components/header', $this->_data);
		$this->load->view('invoice', $this->_data);
		$this->load->view('components/footer');
    }

    public function delivered($order_id)
    {
        $data = [
            "date_delivered" => date("Y-m-d H:i:s"),
            "order_status" => "delivered",
        ];

        if ($this->order_model->update($order_id, $data)) {
            $this->session->set_userdata('success', "Terimkasih telah berbelanja di toko kami.");
            redirect('user/orders');
        }
    }

    public function cancel($order_id)
    {
        if ($this->db->where('id', $order_id)->update('orders', ['order_status'=>'cancelled', "catatan_pembatalan" => "Dibatalkan oleh pelanggan"])) {
            redirect('user/orders');
        }
    }

}
