<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Game_model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}

	public function get_all_games() {
    	$sql = "SELECT * FROM game";
    	$query = $this->db->query($sql); 
    	return $query->result_array();
	}

	public function get_games_filtered($search = null, $sort_by = 'name', $sort_order = 'ASC') 
	{
	    if (!empty($search)) {
	        $sql = "SELECT * 
	        		FROM game 
	        		WHERE name LIKE '%" .$search. "%' ORDER BY " .$sort_by. " " .$sort_order;
	        $query = $this->db->query($sql);
	    } else {
	        $sql = "SELECT * 
	        		FROM game 
	        		ORDER BY " .$sort_by. " " .$sort_order;
	        $query = $this->db->query($sql);
	    }
	    
	    return $query->result_array();
	}
}
