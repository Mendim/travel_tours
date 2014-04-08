<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class offers extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('trip_model');
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '100';
        $config['max_width']  = '1024';
        $config['max_height']  = '768';
        $this->load->library('upload', $config);
    }

    public function index($first=0, $last=10) {
        $this->setData("trips", $this->trip_model->findAll($first, $last));

        $this->loadView("offer/list");
    }

    public function details($id) {

    }

    public function create($id=NULL) {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('duration', 'Duration', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required|integer|greater_than[0]');


        if($this->form_validation->run() == FALSE) {
            // redirect
            $this->setData('register_has_error', TRUE);
        } else {
        //    if (!$this->upload->do_upload("image")) {
        //        $error = array('error' => $this->upload->display_errors());
        //        var_dump($error);;
        //    
        //    } else {
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
        //    }

        }
        $this->loadView("offer/update");
    }

    public function update($id) {

        $this->loadView("offer/update");
    }

    public function upload() {
        // Allowed extentions.
        $allowedExts = array("gif", "jpeg", "jpg", "png");

        // Get filename.
        $temp = explode(".", $_FILES["file"]["name"]);

        // Get extension.
        $extension = end($temp);

        // An image check is being done in the editor but it is best to
        // check that again on the server side.
        if ((($_FILES["file"]["type"] == "image/gif")
            || ($_FILES["file"]["type"] == "image/jpeg")
            || ($_FILES["file"]["type"] == "image/jpg")
            || ($_FILES["file"]["type"] == "image/pjpeg")
            || ($_FILES["file"]["type"] == "image/x-png")
            || ($_FILES["file"]["type"] == "image/png"))
            && in_array($extension, $allowedExts)) { 
                // Generate new random name.
                $name = sha1(microtime()) . "." . $extension;

                // Save file in the uploads folder.
                move_uploaded_file($_FILES["file"]["tmp_name"], "uploads/" . $name);

                // Generate response.
                $response = new StdClass;
                $response->link = base_url() . "/uploads/" . $name;
                //echo stripslashes(json_encode($response));
                $this->output
                    ->set_content_type('application/json')
                    ->set_output(stripslashes(json_encode($response)));
            }

    }


} 
