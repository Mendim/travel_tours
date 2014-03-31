<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class offers extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('trip_model');
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
    }

    public function index($first=0, $last=10) {
       $this->setData("trips", $this->trip_model->findAll($first, $last));

        var_dump($this->data);

       $this->loadView("offer/list");
    }

    public function details($id) {

    }

    public function create($id=NULL) {
        $this->form_validation->set_rules('title', 'Name', 'required');
        $this->form_validation->set_rules('duration', 'Duration', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required|integer|greater_than[0]');


        if($this->form_validation->run() == FALSE) {
            // redirect
            $this->setData('register_has_error', TRUE);
        } else {
            // Check DB
            $this->trip_model->create($this->input->post('id'), 
                $this->input->post('name'), 
                $this->input->post('description'), 
                $this->input->post('image'), 
                $this->input->post('price'), 
                $this->input->post('duration'),
                $this->data["email_user"],
                $this->getLang());
            redirect("offers/");

        }
        $this->loadView("offer/update");
    }

    public function update($id) {

        $this->loadView("offer/update");
    }


} 
