<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	
	//define("NB_ELEM_PAGE",25);
	public function __construct() {
		parent::__construct();
		$this->checkLang();
	}


        public function index()
        {
		//$data["title"] = "Title test";
                $this->load->view('home/welcome');
        }

	/**
    	 *i FIXME create a common class to manage language and store selected lan in session
 	 */ 
	private function checkLang() 
	{
		$lang = $this->session->userdata('language');
		$selectedLang = $this->input->get('language');
		if(!isset($lang)) 
		{
			$lang = "english";
		} 

		$this->lang->load('common', $lang); 

	}


	public function changeLang() 
	{
		$selectedLang = $this->input->post('language');
                if(isset($selectedLang))        
                {
			$this->session->set_userdata("language", $selectedLang);
                }

		$this->load->view('home/welcome');
	}

} 
