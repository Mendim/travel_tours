<?php 
class User_model extends CI_Model {

	const TABLE_NAME = "user";

	var $email = "";
	var $password = "";
	var $phone = "";
	var $spoken_language = "";
	var $is_admin = 0;

	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	function create($email, $password, $phone) {
		$this->email = $email;
		$this->password = md5($password);
		$this->phone = $phone;
		$this->spoken_language = "en";
		$this->is_admin = 0;
		$this->db->insert($TABLE_NAME, $this);
	}

	function update($email, $password, $phone, $spoken_language, $is_admin) {
		$this->email = $email;
                $this->password = md5($password);
                $this->phone = $phone;
                $this->spoken_language = $spoken_language;
                $this->is_admin = $is_admin;
	
		$this->db->update(TABLE_NAME, $this);
	}

	function findById($email) {
		$this->db->where('email', $email);
		return $this->db->get();
	}

	function findAll($first, $last) {
		return $this->db->limit($first, $last).get();
	}
	
	function deleteById($email) {
		$this->db->delete($TABLE_NAME, array('email' => $email)); 
	}	


}
