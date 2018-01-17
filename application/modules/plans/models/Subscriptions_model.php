<?php
class Subscriptions_model extends CI_Model {

	private $table  = '';
	
	function __construct(){
		
	  	parent::__construct();
	  	$this->table = 'cb_subscriptions';
	}
	
	/**
	 * This function is used to get subscriptions
	 */
	public function get_subscriptions($fields = null, $where = array(), $offset = null, $limit = null) {
		
		if($fields){
			$this->db->select($fields);
		}
		return $this->db->get_where($this->table, $where, $limit, $offset)->result();
    }
}