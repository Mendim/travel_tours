<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class booking extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();

        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_user' => 'XXX@gmail.com',
            'smtp_pass' => 'password',
            'smtp_timeout' => '7',
            'mailtype'  => 'html',
            'charset'   => 'utf8'
        );

        $this->load->model('booking_model');
        $this->load->model('trip_model');
        $this->load->model('user_model');
        $this->load->library('form_validation');
        $this->load->library('email',$config);
        $this->load->helper(array('form', 'url'));
    }


    public function prepare($id)
    {
        if (!$this->data["email_user"]) {
            redirect("user/auth");
            return;
        }
        if(isset($id)) {
            $this->setData("tomorrow",date('Y-m-d H:i:s', mktime(0, 0, 9, date("m")  , date("d")+1, date("Y"))));
            //$this->setData("tomorrow",date_format($tomorrow, "Y-m-dTH:i:s:Z"));
            $this->setData("trip", $this->trip_model->findById($id));
            $booking = new Booking_model();
            $booking->trip_id = $id;
            $this->setData("booking", $booking);
            $this->setData("lang", $this->getLang());
            $this->loadView("booking/form");
        }

        else{
            redirect("offers/");
        }
    }

    private function sendMail($from, $subject, $body) {
        $this->email->set_newline("\r\n");

        $this->email->from('XXX@gmail.com', 'Irish Guided Tours');
        $this->email->to('XXX@gmail.org');
        $this->email->reply_to($from);

        $this->email->subject($subject);
        $this->email->message($body);

        $this->email->send();    }


    public function send($id = NULL)
    {
        if (!$this->data["email_user"]) {
            $this->output->set_status_header('401');
            redirect("user/auth");
            return;
        }

        if(isset($id))
            $this->setData("booking", $this->booking_model->findById($id));
        else
            $this->setData("booking", new Booking_model());

        $this->form_validation->set_rules('start_date', 'Start Date', 'required');
        $this->form_validation->set_rules('meeting_point', 'Meeting Point', 'required');
        $this->form_validation->set_rules('number_of_persons', 'Number of Persons', 'required|integer|greater_than[0]');

        $trip =  $this->trip_model->findById($this->input->post('trip_id'));
        var_dump($this->input->post('trip_id'));

        if ($this->form_validation->run() == FALSE) {
            // redirect
            $this->setData('register_has_error', TRUE);
            $this->setData('trip', $trip );
            $this->setData("tomorrow",date('Y-m-d H:i:s', mktime(0, 0, 9, date("m")  , date("d")+1, date("Y"))));
            $this->loadView("booking/form");
        } else {

            $start_date = strtotime($this->input->post('start_date')) ;
            $end_date = $start_date + $trip->duration*24*60*60;


            $booking_id = $this->booking_model->create(NULL,
                $this->input->post('start_date'),
                date('Y-m-d H:i:s',$end_date),
                $this->input->post('meeting_point'),
                $this->input->post('comment'),
                $trip->id,
                $this->input->post('number_of_persons'),
                $this->data["email_user"],
                $this->getLang());

            $booking = $this->booking_model->findById($booking_id);
            $user =  $this->user_model->findById($this->session->userdata('email'));

            $body =
            '<b>You have a new booking!</b><br /><br />'
            .'Trip: '.$trip->name.'<br />'
            .'Start date: '.$booking->start_date.'<br />'
            .'End date: '.$booking->end_date.'<br />'
            .'Number of people: '.$booking->number_of_persons.'<br />'
            .'Comments: '.$booking->comment.'<br /><br />'
            .'Request done by: '.$user["firstname"].' '.$user["lastname"].'<br />'
            .'Contact phone number: '.$user["phone"].'<br />'
            .'Spoken language:  '.$user["spoken_language"];

            $this->sendMail($this->data["email_user"], "Booking request", $body);

            $this->loadView("booking/thanks");

        }


    }
} 
