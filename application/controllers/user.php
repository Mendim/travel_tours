<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends MY_Controller {

	const NB_ELEM_PAGE = 25;

	public function __construct() {
		parent::__construct();
//		$this->load->model('user_model');
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));

	}


        public function index()
        {
                $this->load->view('welcome_message');
        }

	public function listAll($page) {
		$data['users'] = $this->user_model->findAll($page * User::NB_ELEM_PAGE, $page * User::NB_ELEM_PAGE + User::NB_ELEM_PAGE);
		$data['title'] = "Test for Nana";
		$this->load->view('user/list');
	}

    public function auth() {
        $data['has_error'] = FALSE;
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');

        if($this->form_validation->run() == FALSE) {
            // redirect
            $data['has_error'] = TRUE;
            $this->load->view("user/signup.php", $data);
        } else {
            // Check DB

            $this->load->view("user/signup.php", $data);
        }

    }



} 

