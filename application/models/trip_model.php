<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Trip_model extends CI_Model {

	const TABLE_NAME = "trip";

	var $id = "";
	var $name = "";
	var $description = "";
	var $image = "";
	var $price = "";
	var $duration = "";
	var $last_edit = "";
	var $lang = "";
	var $author = "";

	function __construct() {
		parent::__construct();
	}

    function create($id=NULL, $name, $description, $image, $price, $duration, $author, $lang) {
        $this->id = $id;
        $this->name = $name;
		$this->description = $description;
		$this->image = $image;
		$this->price = $price;
		$this->duration = $duration;
        $this->last_edit = getdate();
        $this->author = $author;
		return $id == NULL ? $this->db->insert(Trip_model::TABLE_NAME, $this) : $this->db->update(Trip_model::TABLE_NAME, $this);
	}


	function findById($id) {
		$this->db->where('id', $id);
		return $this->db->get();
	}

	function findAll($first, $last) {
		return $this->db->limit($first, $last)->get(Trip_model::TABLE_NAME)->result();
	}
	
	function deleteById($id) {
		$this->db->delete(Trip_model::TABLE_NAME, array('id' => $id));
	}	


} 
