<?php

class Players extends CI_Model {
	
	// Constructor
	function __construct()
	{
		parent::__construct();
	}
	
	// Return all images in descending order of date
	function all() {
		$this->db->order_by("Cash");
		$query = $this->db->get('players');
		return $query->result_array();
	}
	
	// This totally doesn't work yet.. -B
	/*
	function get($pname) {
		// $query = $this->db->query('select * from players where Player = "' . $pname . '";');
		$query = $this->db->query('select * from players');
		return $query->result_array();
	}
	*/
	
	/*
	function newest() {
		$this->db->order_by("id", "desc");
		$this->db->limit(3);
		$query = $this->db->get('players');
		return $query->result_array();
	}
	*/
	
}