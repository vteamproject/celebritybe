<?php
class Plans_model extends CI_Model {

	private $table  = '';

	function __construct(){            
		
	  	parent::__construct();
	  	$this->table = 'cb_plans';
	}
	
	/**
	 * This function is used to get plans
	 */
	public function get_plans($fields = null, $where = array(), $offset = null, $limit = null) {
		
		if($fields){
			$this->db->select($fields);
		}
		return $this->db->get_where($this->table, $where, $limit, $offset)->result();
    }
}