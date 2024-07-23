<?php

class Auth extends CI_Controller {
    private $_data = [];
    function __construct()
    {
        parent::__construct();
        $this->load->library("form_validation");
    }

    public function login()
    {
        $this->_data["title"] = "Login";
        if ($this->session->userdata("username")) {
            redirect("Dashboard");
        }else {
            if ($this->input->post("username")) {
                $username = $this->input->post("username");
                $password = $this->input->post("password");
                $user = $this->db->get_where("users", ["username" => $username])->row_array();
                
                if ($user) {

                    if (password_verify($password, $user["password"]) && $user['role'] == "admin") {
                        $data = [
                            "username" => $user["username"],
                            "email" => $user["email"],
                            "role" => $user["role"],
                        ];
                        $this->session->set_userdata($data);
                        redirect("Dashboard");
                    }else {
                        $this->session->set_userdata("errorLogin", '<div class="alert alert-danger" role="alert">Email atau password tidak valid</div>');
                        redirect("Auth/login");
                    }

                }else {
                    $this->session->set_userdata("errorLogin", '<div class="alert alert-danger" role="alert">
                        Email atau password tidak valid
                        </div>');
                    redirect("Auth/login");
                }
                
            }else {
                $this->load->view("dashboard/login", $this->_data);
            }
        }
    }

    public function user_login() 
    {
        $this->_data["title"] = "Login";
        if ($this->session->userdata("username")) {
            redirect("/");
        }else {
            if ($this->input->post("username")) {
                $username = $this->input->post("username");
                $password = $this->input->post("password");
                $user = $this->db->get_where("users", ["username" => $username])->row_array();
                
                if ($user) {

                    if (password_verify($password, $user["password"]) && $user['role'] == "user") {
                        $data = [
                            "id" => $user["id"],
                            "username" => $user["username"],
                            "email" => $user["email"],
                            "role" => $user["role"],
                        ];
                        $this->session->set_userdata($data);
                        redirect("Dashboard");
                    }else {
                        $this->session->set_userdata("errorLogin",  true);
                        redirect("Auth/user_login");
                    }

                }else {
                    $this->session->set_userdata("errorLogin", true);
                    redirect("Auth/user_login");
                }
                
            }else {
                $this->load->view("login", $this->_data);
            }
        }
    }

    public function logout() 
    {
        $role = $this->session->userdata('role');
        $this->session->sess_destroy();
        if ($role == "admin") redirect('Auth/login');
        else redirect("/");
    }
    
    public function user_register()
    {
        // var_dump(filter_var("windi@gami.s", FILTER_VALIDATE_EMAIL)); die;
        $this->form_validation->set_rules("password", "Password", "required");
        $this->form_validation->set_rules("pasconf", "Confirm Password", "matches[password]|required");
        $this->form_validation->set_rules("email", "Email", "trim|required|is_unique[users.email]");

        if ($this->form_validation->run() == false) {
            $this->load->view('register');
        }else {
            $data = [
                "name" => $this->input->post("first_name")." ".$this->input->post("second_name"),
                "username" => $this->input->post("username"),
                "phone_number" => $this->input->post("phone_number"),
                "address" => $this->input->post("address"),
                "email" => $this->input->post("email"),
                "password" => password_hash($this->input->post("password"), PASSWORD_DEFAULT),
                "role" => "user",
            ];

            if ($this->db->insert("users", $data)) {
                 $ses_data = [
                    "username" => $this->db->insert_id(),
                    "username" => $data["username"],
                    "email" => $data["email"],
                    "role" => $data["role"],
                ];
                $this->session->set_userdata($ses_data);
                redirect("/");
            }
        }
    }

    public function register()
    {
        // var_dump(filter_var("windi@gami.s", FILTER_VALIDATE_EMAIL)); die;
        $this->_data["title"] = "Register";
        $this->form_validation->set_rules("name_user", "Name User", "required|trim");
        $this->form_validation->set_rules("password", "Name User", "required|trim");
        $this->form_validation->set_rules("repeat_password", "Name User", "matches[password]|required");
        $this->form_validation->set_rules("email", "Email", "trim|required|valid_email|is_unique[user.email]");
        $this->form_validation->set_message("required", "You must be fill ini this field");
        $this->form_validation->set_message("valid_email", "Email is not valid");
        $this->form_validation->set_message("is_unique", "This email already exists");
        $this->form_validation->set_message("matches", "not matches");

        if ($this->form_validation->run() == false) {
            $this->load->view("Auth_templates/header", $this->_data);
            $this->load->view("register");
            $this->load->view("Auth_templates/footer");
        }else {
            $name_database = "user_".uniqid();
            $data = [
                "name_user" => $this->input->post("name_user"),
                "email" => $this->input->post("email"),
                "password" => password_hash($this->input->post("password"), PASSWORD_DEFAULT),
                "is_active" => false,
                "date_created" => date("Y-m-d"),
                "role_id" => 2,
                "name_database" => $name_database,
                "token" => base64_encode(random_bytes(32))
            ];

            $this->db->query("CREATE DATABASE $name_database");
            $this->sendemail($data["token"], 'verify');
            if ($this->db->insert("user", $data)) {
                $this->session->set_userdata("sregister", true);
                redirect("Auth/login");
            }
        }
    }

    public function activation()
    {
        $email = $_GET["email"];
        $token = $_GET["token"];

        $cekEmail = $this->db->get_where("user", ["email" => $email]);
        if ($cekEmail->num_rows()) {
            if ($cekEmail->row_array()["is_active"]) {
                $this->session->set_userdata("errorLogin", '<div class="alert alert-success" role="alert">Account has already active</div>');
            }else {
                $cekToken = $cekEmail->row_array();
                if ($cekToken["token"] == $token) {
                    $this->db->where("email", $email);
                    $this->db->update("user", ["is_active" => 1, "token" => ""]);
                    $this->session->set_userdata("errorLogin", '<div class="alert alert-success" role="alert">Your account has been successfully activated</div>');
    
                }else {
                    $this->session->set_userdata("errorLogin", '<div class="alert alert-danger" role="alert">Token is not valid</div>');
                }
            }
        }else {
            $this->session->set_userdata("errorLogin", '<div class="alert alert-danger" role="alert">Email is not valid</div>');
        }

        redirect("Auth/login");
    }

    function sendemail($token, $for)
    {
        $email = $this->input->post("email");
        $name = $this->input->post("name_user");
        $messageVerify = "
            <div style='margin: 0 auto; max-width: 450px; padding:0 10px;'>
                <div class='box-content' style='margin-top: 50px;max-width: 450px;border: 5px solid #2e59d9; padding:20px 50px; text-align:center;'>
                
                    <h3>Hi $name</h3>
                    <p>You have successfully created a <b>Lombok Printing</b> Account, Please click on the link below to Verify your email address and complete registration<p>
                    <br><br>
                    <a style='text-decoration: none; font-size: 13px; color: white; width: fit-content; background:#2e59d9; border-radius: 10px; padding:10px 20px;' target='_blank' href='".base_url("Auth/activation?email=$email&token=$token")."'>Verify Your Email</a>
                    <br><br><br>
                    <span style='font-size: 14px; color: #767676; margin-bottom: 10px;'>or copy and paste this link into your browser</span>
                    <a target='_blank' href='".base_url("Auth/activation?email=$email&token=$token")."'>".base_url("Auth/activation?email=$email&token=$token")."</a>
                    <br><br>
                    <span style='font-size: 14px; color: #767676; margin-bottom: 10px;'>Don't replay this message</span>
                
                    </div>
                <br><br>
                <span style='font-size: 12px; color: #767676; margin-bottom: 10px;'>Follow us on Instagram & Facebook</span>
            </div>";

        $config = [
            "protocol" => "smtp",
            "smtp_host" => "ssl://smtp.googlemail.com",
            "smtp_user" => "twinner400@gmail.com",
            "smtp_pass" => "adijaya+62",
            "smtp_port" => 465,
            "mailtype" => "html",
            "charset" => "utf-8",
            "newline" => "\r\n"
        ];

        $this->email->initialize($config);
        $this->email->from("twinner400@gmail.com");
        $this->email->to($email);

        if (strtolower($for) == 'verify') {
            $this->email->subject("Account Activation");
            $this->email->message($messageVerify);
        }

        if($this->email->send()){
            return true;
        }else {
            echo $this->email->print_debugger(); die;
        }
    }

}