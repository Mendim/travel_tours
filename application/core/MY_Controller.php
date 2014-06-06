<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    protected $data;

	public function __construct() {
		parent::__construct();
		$this->checkLang();

        $emailUser = $this->session->userdata('email');
        if(isset($emailUser)) {
            $this->data["email_user"] = $emailUser;
        }
        $isAdmin = $this->session->userdata('is_admin');
        $this->data["is_admin"] = isset($isAdmin) ? $isAdmin : false;

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


    public function setLang() {
        $selectedLang = $this->input->get('language');
        $redirect_to = $this->input->get('redirect_to');
        if(isset($selectedLang))
        {
            $this->session->set_userdata("language", $selectedLang);
        }
        redirect($redirect_to);
    }

    protected function getLang() {
		$selectedLang = $this->session->userdata('language');
		if(!isset($selectedLang))
		{
			$selectedLang = $this->config->item('language');
        }
        return $selectedLang;
    
    }

    protected function setData($key, $value) {
        $this->data[$key] = $value;
    }

    protected function loadView($viewName) {
        $this->load->view($viewName, $this->data);
    }

}
