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
}
