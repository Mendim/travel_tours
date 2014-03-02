<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class offers extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
    }

    public function index() {
       $this->setData("trips", []);


       $this->loadView("offer/list");
    }

    public function details($id) {

    }

    public function create() {

        $this->loadView("offer/update");
    }

    public function update($id) {

        $this->loadView("offer/update");
    }


} 