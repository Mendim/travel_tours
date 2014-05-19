<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Booking_model extends CI_Model {

	const TABLE_NAME = "booking";

	var $id = "";
	var $start_date = "";
	var $end_date = "";
	var $meeting_point = "";
	var $comment = "";
	var $trip_id = "";
	var $number_of_persons = "";
    var $main_contact = "";
    var $lang = "";


	function __construct() {
		parent::__construct();
	}

    function create($id=NULL, $start_date, $end_date, $meeting_point, $comment, $trip_id, $number_of_persons, $main_contact, $lang) {
        $this->id = $id;
        $this->start_date = $start_date;
		$this->end_date = $end_date;
		$this->meeting_point = $meeting_point;
		$this->comment = $comment;
		$this->trip_id = $trip_id;
        $this->number_of_persons = $number_of_persons;
        $this->main_contact = $main_contact;
        $this->lang = $lang;
		$this->db->insert(Booking_model::TABLE_NAME, $this);
        return $this->db->insert_id();
	}

    function updateData() {
        $idToUpdate = $this->id;
        unset($this->id);
        $this->db->where('id', $idToUpdate);
        $this->db->update(Booking_model::TABLE_NAME ,$this);
    }


	function findById($id) {
		$this->db->where('id', $id);
        $resArray = $this->db->get(Booking_model::TABLE_NAME)->result();
		return empty($resArray) ? null : $resArray[0];
	}

	function findAll($first, $last) {
        return $this->db->get(Booking_model::TABLE_NAME)->result();
        //return $this->db->limit($first, $last)->get(Trip_model::TABLE_NAME)->result();
	}
	
	function deleteById($id) {
		$this->db->delete(Booking_model::TABLE_NAME, array('id' => $id));
	}	


} 
