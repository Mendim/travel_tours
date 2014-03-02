<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {

    //define("NB_ELEM_PAGE",25);
    public function __construct() {
        parent::__construct();
    }


    public function index()
    {
//        $data["title"] = "Title test";
        $this->loadView('home/welcome');
    }

    public function contact()
    {
        $this->loadView('home/contact');
    }

} 
