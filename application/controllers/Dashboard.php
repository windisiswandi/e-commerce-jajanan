<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	protected $_data = [];

    function __construct() 
    {
        parent::__construct();
		$this->load->model("Category_model");
		$this->load->model("Product_model");
		$this->load->model("order_model");
		$this->load->library(["form_validation", "upload"]);

        $this->_data["products"] = $this->Product_model->get_all_products();
        $this->_data["pelanggans"] = $this->db->get_where('users', ['role' => 'user'])->result();
        $sql = 'SELECT * FROM `orders` 
                ORDER BY FIELD(order_status, "packed", "pending", "shipped", "delivered", "cancelled") ASC,
                        `order_date` DESC  
                LIMIT 6';
        $query = $this->db->query($sql);
        $this->_data["orderan"] = $this->db->query($sql)->result();
        $this->_data["orders"] = $this->db->get('orders')->result();

        if (!$this->session->userdata("email")) {
            redirect('Auth/login');
        }else {
            if($this->session->userdata("role") != "admin") redirect("/");
        }
    }
	
	public function index()
	{
        $this->_data['title'] = "Dashboard";
        $this->_data['dashboard'] = true;
		$this->load->view('dashboard/header', $this->_data);
		$this->load->view('dashboard/index', $this->_data);
		$this->load->view('dashboard/footer');
	}

// Kategori
    public function kategori() 
    {
        $this->_data['title'] = "Dashboard | Kategori";
        $this->_data['kategori'] = true;

        $this->form_validation->set_rules('category_name', 'Name', 'required');
        $this->_data['categories'] = $this->Category_model->get_all_categories();

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('dashboard/header', $this->_data);
            $this->load->view('dashboard/kategori', $this->_data);
            $this->load->view('dashboard/footer');
        } else {
            $data = ['category_name' => $this->input->post('category_name')];
            if($this->Category_model->insert_category($data)) {
                $this->session->set_userdata('success', '<div class="alert alert-warning alert-dismissible fade show" role="alert">Kategori berhasil <strong>ditambahkan!</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
    
                redirect('Dashboard/kategori');
            }

        }
    }

    public function kategori_update($id) 
    {
        $this->form_validation->set_rules('category_name', 'Name', 'required');

        $data = [
            'category_name' => $this->input->post('category_name'),
        ];

        if($this->Category_model->update_category($id, $data)) {
            $this->session->set_userdata('success', '<div class="alert alert-success alert-dismissible fade show" role="alert">Kategori berhasil <strong>diupdate!</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');

            redirect('Dashboard/kategori');
        }
    }

    public function kategori_delete($id) 
    {
        if($this->Category_model->delete_category($id)) {
            $this->session->set_userdata('success', '<div class="alert alert-success alert-dismissible fade show" role="alert">Kategori berhasil <strong>dihapus!</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');

            redirect('Dashboard/kategori');
        }
    }
// end kategori
// produk
    public function products() {
        $this->_data['title'] = "Dashboard";
        $this->_data['product'] = true;
		$this->load->view('dashboard/header', $this->_data);
		$this->load->view('dashboard/product');
		$this->load->view('dashboard/footer');
    }

    public function product_create() {
        $this->form_validation->set_rules('product_name', 'Name', 'required');
        $this->form_validation->set_rules('product_modal', 'Harga Modal', 'required|numeric');
        $this->form_validation->set_rules('stock', 'Stock', 'required|numeric');
        $this->form_validation->set_rules('description', 'Deskripsi', 'required');
        $this->form_validation->set_rules('product_price', 'Harga Jual', 'required|numeric');

        if ($this->form_validation->run() === FALSE) {
            $this->_data['title'] = "Dashboard";
            $this->_data['product'] = true;
            $this->_data['categories'] = $this->Category_model->get_all_categories();
            $this->load->view('dashboard/header', $this->_data);
            $this->load->view('dashboard/product_create');
            $this->load->view('dashboard/footer');
        } else {
            $data = [
                'product_name' => $this->input->post('product_name'),
                'description' => $this->input->post('description'),
                'product_price' => $this->input->post('product_price'),
                'product_modal' => $this->input->post('product_modal'),
                'stock' => $this->input->post('stock'),
                'category_id' => $this->input->post('category_id'),
            ];

            if (!empty($_FILES['foto']['name'])) {
                $config['upload_path'] = './assets/img/products/';
                $config['allowed_types'] = 'jpg|jpeg|png|webp|jpe';
                $config['max_size'] = 1024;
                $ext = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
                $config['file_name'] = time() . '.' . $ext;
                $this->upload->initialize($config);

                if ($this->upload->do_upload('foto')) {
                    $upload_data = $this->upload->data();
                    $data['foto'] = $upload_data['file_name'];
                } else {
                    $error = $this->upload->display_errors();
                    $this->session->set_userdata('errorFile', $error);
                    redirect('dashboard/product_create');
                }
            }

            
            if($this->Product_model->insert_product($data)) {
                $this->session->set_userdata('success', '<div class="alert alert-warning alert-dismissible fade show" role="alert">Product berhasil <strong>ditambahkan!</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
    
                redirect('Dashboard/products');
            }
        }
    }

    public function product_edit($id) {
        $this->form_validation->set_rules('product_name', 'Name', 'required');
        $this->form_validation->set_rules('product_modal', 'Harga Modal', 'required|numeric');
        $this->form_validation->set_rules('stock', 'Stock', 'required|numeric');
        $this->form_validation->set_rules('description', 'Deskripsi', 'required');
        $this->form_validation->set_rules('product_price', 'Harga Jual', 'required|numeric');

        if ($this->form_validation->run() === FALSE) {
            $this->_data['title'] = "Dashboard";
            $this->_data['product'] = true;
            $this->_data['pct'] = $this->Product_model->get_product($id);
            $this->_data['categories'] = $this->Category_model->get_all_categories();
            $this->load->view('dashboard/header', $this->_data);
            $this->load->view('dashboard/product_edit', $this->_data);
            $this->load->view('dashboard/footer');
        } else {
            $data = [
                'product_name' => $this->input->post('product_name'),
                'description' => $this->input->post('description'),
                'product_price' => $this->input->post('product_price'),
                'product_modal' => $this->input->post('product_modal'),
                'stock' => $this->input->post('stock'),
                'category_id' => $this->input->post('category_id'),
            ];

            if (!empty($_FILES['foto']['name'])) {
                // var_dump(mime_content_type($_FILES['foto']['tmp_name'])); die;

                $config['upload_path'] = './assets/img/products/';
                $config['allowed_types'] = 'jpg|jpeg|png|webp|jpe';
                $config['max_size'] = 1024;
                $ext = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
                $config['file_name'] = time() . '.' . $ext;
                $this->upload->initialize($config);

                if ($this->upload->do_upload('foto')) {
                    $upload_data = $this->upload->data();
                    if ($this->input->post('old_foto')) unlink('./assets/img/products/'.$this->input->post('old_foto'));
                    $data['foto'] = $upload_data['file_name'];
                } else {
                    $error = $this->upload->display_errors();
                    
                    $this->session->set_userdata('errorFile', $error);
                    redirect('dashboard/product_edit/'.$id);
                }
            }

            
            if($this->Product_model->update_product($id, $data)) {
                $this->session->set_userdata('success', '<div class="alert alert-warning alert-dismissible fade show" role="alert">Product berhasil <strong>diupdate!</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
    
                redirect('Dashboard/products');
            }
        }
    }

    public function product_delete($id) {
        $product = $this->Product_model->get_product($id);
        if ($product->foto) unlink('./assets/img/products/'.$product->foto);
        
        if($this->Product_model->delete_product($id)) {
            $this->session->set_userdata('success', '<div class="alert alert-warning alert-dismissible fade show" role="alert">Product berhasil <strong>dihapus!</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');

            redirect('Dashboard/products');
        }
    }
// end product
// pesanan
    public function pesanan()
    {
        $this->_data['title'] = "Pesanan";
        $this->_data['pesanan'] = true;

        $orders = $this->order_model->get_order_with_user();
        $dataOrders = [];

        foreach($orders as $order) {
            $order['total_item'] = $this->db->get_where('order_items', ['order_id' => $order['id']])->num_rows();
            $status = $order['order_status'];
            if (!isset($dataOrders[$status])) $dataOrders[$status] = [];

            $dataOrders[$status][] = $order;
        }

        $this->_data['orders']=$dataOrders;
		$this->load->view('dashboard/header', $this->_data);
		$this->load->view('dashboard/pesanan', $this->_data);
		$this->load->view('dashboard/footer');
    }
// end pesanan
// pelanggans
    public function pelanggan()
    {
        $this->_data['title'] = "Pelanggan";
		$this->load->view('dashboard/header', $this->_data);
		$this->load->view('dashboard/pelanggan', $this->_data);
		$this->load->view('dashboard/footer');
    }
}
