<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends MY_Controller {

	const NB_ELEM_PAGE = 25;

	public function __construct() {
		parent::__construct();
		$this->load->model('user_model');
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));

	}


    public function index() {
            $this->load->view('welcome_message');
    }

	public function listAll($page) {
		$data['users'] = $this->user_model->findAll($page * User::NB_ELEM_PAGE, $page * User::NB_ELEM_PAGE + User::NB_ELEM_PAGE);
		$data['title'] = "Test for Nana";
		$this->load->view('user/list');
	}

    public function auth() {
        $scenario = $this->input->post('scenario');

        $data['register_has_error'] = FALSE;
        $data['login_has_error'] = FALSE;
        $data['register_ok'] = FALSE;

        if($scenario === "register") {
            $this->register($data);
        } else {
            $this->login($data);
        }
    }

    private function register($data) {

        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');

        if($this->form_validation->run() == FALSE) {
            // redirect
            $data['register_has_error'] = TRUE;

            echo "register";
        } else {
            // Check DB
            $this->user_model->create($this->input->post('email'),
                $this->input->post('password'),
                $this->input->post('phone'));

            $data['register_ok'] = TRUE;
            $data['register_success'] = "Your account is now saved. You can now login!";
        }
        $this->load->view("user/signup.php", $data);
    }

    private function login($data) {
        $mail = $this->input->post('auth_mail');
        $password = $this->input->post('auth_password');

        if(empty($mail) || empty($password)) {
            $data['login_has_error'] = TRUE;
            $data['auth_error'] = "Mail and password are mandatory";
            $this->load->view("user/signup.php", $data);
        } else {
            // form valid
            $user = $this->user_model->findById($mail);
            if(isset($user["password"]) && $user["password"] === md5($password)) {
                $this->session->set_userdata('login_state', TRUE);
                $this->session->set_userdata('email', $user->email);
                $this->session->set_userdata('display_name', $user->firstname." ".$user->lastname);
                redirect("/");
            } else {
                $data['login_has_error'] = TRUE;
                $data['auth_error'] = "The password you entered is wrong!!";
                $this->load->view("user/signup.php", $data);
            }
        }


    }



} 

