<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	protected $_data = [];

	function __construct()
	{
		parent::__construct();
        // load model
		$this->load->model("cart_model");
		$this->load->model("User_model");
		$this->load->model("Kurir_model");

        // load library
		$this->load->library(["form_validation", "upload"]);
        $this->_data['title'] = "Toko Jajanan Lombok";

        // mengambil data user yang sedang login
        $id = $this->session->userdata('id');
        $this->_data['user'] = $this->User_model->get_user($id);

        // mengambil data cart / keranjang
        $this->_data['carts'] = $this->cart_model->get_all_item();

        // mengambil data pengaturan
        $this->_data['data_pengaturan'] = $this->db->get('pengaturan')->row();

        // cek apakah user sudah login
        if (!$this->session->userdata("username")) redirect('auth/user_login');

        // arahkan ke dashboard jika role user admin
        if ($this->session->userdata("role") == "admin") redirect('dashboard');
	}
	
	public function profile()
	{
        $provinces = $this->Kurir_model->getProvince();
        $this->_data['provinces'] = $provinces['rajaongkir']['results'];

        $city = $this->Kurir_model->getCity($this->_data['user']->id_province);
        $this->_data['city'] = $city['rajaongkir']['results'];

        $this->load->view('components/header', $this->_data);
		$this->load->view('user_profile.php', $this->_data);
		$this->load->view('components/footer');

	}

    public function update()
    {
        $id=$this->session->userdata('id');
        $province = explode(",",$this->input->post('provinsi'));
        $city = explode(",",$this->input->post('kota'));
        
        $data = [
            "name" => $this->input->post('name'),
            "email" => $this->input->post('email'),
            "phone_number" => $this->input->post('phone_number'),
            "phone_number" => $this->input->post('phone_number'),
            "jk" => $this->input->post('jk'),
            "id_province" => $province[0],
            "province_name" => $province[1],
            "id_city" => $city[0],
            "city_name" => $city[1],
            "address" => $this->input->post('address'),
        ];

        if (!empty($_FILES['foto']['name'])) {
            $config['upload_path'] = './assets/img/users/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 1024;
            $ext = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
            $config['file_name'] = time() . '.' . $ext;
            $this->upload->initialize($config);

            if ($this->upload->do_upload('foto')) {
                $upload_data = $this->upload->data();
                if ($this->input->post('old_foto')) unlink('./assets/img/users/'.$this->input->post('old_foto'));
                $data['foto'] = $upload_data['file_name'];
            } else {
                $error = $this->upload->display_errors();
                echo json_encode(["status" => false,"msg" => $error]);
                return;
            }
        }

        if ($this->User_model->update($id, $data)) {
            echo json_encode(["status" => true, "msg" => "Profile berhasil diupdate"]);
            return;
        }

    }

    public function orders()
    {
        $user_id = $this->session->userdata('id');
        $orders = $this->db->get_where('orders', ['user_id' => $user_id])->result_array();
        $dataOrders = [];
        foreach ($orders as $order) {
            $order['total_item'] = $this->db->get_where('order_items', ['order_id' => $order['id']])->num_rows();
            $order_status = $order['order_status'];
            if (!isset($dataOrders[$order_status])) $dataOrders[$order_status] = [];

            $dataOrders[$order_status][] = $order;
        }

        $this->_data['orders'] = $dataOrders;

        $this->load->view('components/header', $this->_data);
		$this->load->view('user_order.php', $this->_data);
		$this->load->view('components/footer');
    }

    public function payment($order_id) 
    {
        $this->_data['order'] = $this->db->get_where('orders', ['id' => $order_id])->row();
        $this->_data['dataPayment'] = $this->db->get_where('payments', ['order_id' => $order_id])->row();
        if ($this->_data['order']->order_status !== "pending") {
            redirect('user/orders');
        }
        // var_dump( $this->_data['order']); die;
        $this->load->view('components/header', $this->_data);
		$this->load->view('payment', $this->_data);
		$this->load->view('components/footer');
    }

	public function change_password() 
	{
        $this->form_validation->set_rules("password", "Password", "required");
        $this->form_validation->set_rules("pasconf", "Confirm Password", "matches[password]|required");
        if ($this->form_validation->run() === false) {

            $this->load->view('components/header', $this->_data);
            $this->load->view('change_password.php', $this->_data);
            $this->load->view('components/footer');
        }else {
            $id = $this->session->userdata('id');
            $data = [
                "password" => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
            ];

            if ($this->User_model->update($id, $data)) {
                $this->session->set_userdata('success', "Password berhasil diubah!");
                redirect('user/change_password');
            }
        }   
	}

    public function get_kota($id_prov) 
    {
        $city = $this->Kurir_model->getCity($id_prov);
        $this->_data['city'] = $city['rajaongkir']['results'];

        echo json_encode([
            "status" => true,
            "option" => $this->load->view("partial/option_city", $this->_data, true) 
        ]);
    }
}
