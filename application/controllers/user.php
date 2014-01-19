<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	const NB_ELEM_PAGE = 25;

	public function __construct() {
		parent::__construct();
		$this->load->model('user_model');
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



} 

