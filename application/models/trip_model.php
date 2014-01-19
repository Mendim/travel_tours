class TripModel extends CI_Model {

	const $TABLE_NAME = "trip";

	var $id = "";
	var $description = "";
	var $icon = "":
	var $price = "";
	var $duration = "";
	var $last_edit = "";

	function __construct() {
		parent::__construct();
	}

	function create($description, $icon, $price, $duration) {
		$this->description = $description;
		$this->icon = $icon;
		$this->price = $price;
		$this->duration = $duration;
		$this->last_edit = new Date();
		$this->db->insert($TABLE_NAME, $this);
	}

	function update($description, $icon, $price, $duration) {
		$this->description = $description;
		$this->icon = $icon;
		$this->price = $price;
		$this->duration = $duration;
		$this->last_edit = new Date();
	
		$this->db->update(TABLE_NAME, $this);
	}

	function findById($id) {
		$this->db->where('id', $id);
		return $this->db->get();
	}

	function findAll($first, $last) {
		return $this->db->limit($first, $last).get();
	}
	
	function deleteById($id) {
		$this->db->delete($TABLE_NAME, array('id' => $id)); 
	}	


} 
