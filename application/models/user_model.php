<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

	const TABLE_NAME = "user";

	var $email = "";
	var $password = "";
	var $phone = "";
	var $spoken_language = "";
	var $is_admin = 0;
    var $firstname= "";
    var $lastname = "";

	function __construct() {
		parent::__construct();
	}

	function create($email, $password, $phone) {
		$this->email = $email;
		$this->password = md5($password);
		$this->phone = $phone;
		$this->spoken_language = "en";
		$this->is_admin = 0;
		$this->db->insert(User_model::TABLE_NAME, $this);
	}

	function update($email, $password, $phone, $spoken_language, $is_admin) {
		$this->email = $email;
                $this->password = md5($password);
                $this->phone = $phone;
                $this->spoken_language = $spoken_language;
                $this->is_admin = $is_admin;
	
		$this->db->update(User_model::TABLE_NAME, $this);
	}

	function findById($email) {
		$result = $this->db->where('email', $email)->get(User_model::TABLE_NAME)->result_array();
        return (count($result) > 0 ? $result[0] : NULL);
	}

	function findAll($first, $last) {
		return $this->db->limit($first, $last).get();
	}
	
	function deleteById($email) {
		$this->db->delete(User_model::TABLE_NAME, array('email' => $email));
	}	


}
