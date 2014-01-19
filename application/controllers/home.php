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
		$selectedLang = $this->input->post('language');
		if(!isset($selectedLang)) 
		{
			$selectedLang = "english";
		} 

		$this->lang->load('common', $selectedLang); 

	}

} 
