<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->checkLang();
    }
    
    
    public function checkLang() 
    {

		$selectedLang = $this->session->userdata('language');
		if(!isset($selectedLang))
		{
			$selectedLang = $this->config->item('language');
		}
		$this->lang->load('common', $selectedLang);

    }


    public function  setLang() {
        $selectedLang = $this->input->get('language');
        if(isset($selectedLang))        
        {
            $this->session->set_userdata("language", $selectedLang);
        }
        redirect("home")    ;
//        $this->load->view('home/welcome');
    }

}

