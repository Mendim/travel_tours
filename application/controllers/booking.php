<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class booking extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('booking_model');
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
    }



    public function send($id = NULL)
    {
        if (!$this->data["email"]) {
            $this->output->set_status_header('401');
            redirect("user/auth");
            return;
        }

        if(isset($id))
            $this->setData("booking", $this->booking_model->findById($id));
        else
            $this->setData("booking", new Booking_model());

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('start_date', 'Start Date', 'required');
        $this->form_validation->set_rules('meeting_point', 'Meeting Point', 'required');
        $this->form_validation->set_rules('number_of_persons', 'Number of Persons', 'required|integer|greater_than[0]');


        if ($this->form_validation->run() == FALSE) {
            // redirect
            $this->setData('register_has_error', TRUE);
        } else {
            // Check DB
            $this->trip_model->create($this->input->post('id'),
                $this->input->post('start_date'),
                $this->input->post('end_date'),
                $this->input->post('meeting_point'),
                $this->input->post('comment'),
                $this->input->post('trip_id'),
                $this->input->post('number_of_persons'),
                $this->data["email_user"],
                $this->getLang());
            redirect("booking/thank_you");

        }
        $this->loadView("booking/form");

    }
} 
