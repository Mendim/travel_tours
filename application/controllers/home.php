<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	
	//define("NB_ELEM_PAGE",25);


        public function index()
        {
		$data["title"] = "Title test";
                $this->load->view('template', $data);
        }

} 
