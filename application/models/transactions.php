<?php

class Transactions extends CI_Model {
	
	// Constructor
	function __construct()
	{
		parent::__construct();
	}
	
	function all() {
		$this->db->order_by("DateTime");
		$query = $this->db->get('transactions');
		return $query->result_array();
	}
	
}