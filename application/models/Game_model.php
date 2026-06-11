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

	public function get_games_genre($genre_id)
	{
		$sql = "SELECT g.* 
				FROM game g JOIN game_genre gg ON g.id = gg.gameId
				WHERE gg.genreId = ".$genre_id;

		$query = $this->db->query($sql);
    	return $query->result_array();
	}

	public function get_games_category($category_id) 
	{
	    $sql = "SELECT g.* 
	    		FROM game g JOIN game_category gc ON g.id = gc.gameId 
	            WHERE gc.categoryId = ".$category_id;
	            
	    $query = $this->db->query($sql);
	    return $query->result_array();
	}

	public function get_genres() 
	{
    	$sql = "SELECT * 
    			FROM genre";
    	$query = $this->db->query($sql);
	    return $query->result_array();
	}

	public function get_categories() {
	    $sql = "SELECT * 
	    		FROM category";
	    $query = $this->db->query($sql);
	    return $query->result_array();
	}

	public function get_game_id_dev_poster($id) {
	    $sql = "SELECT g.*, d.name AS developer_name, p.jpeg AS game_image
	    		FROM game g JOIN developer d ON g.developerId = d.id LEFT JOIN poster p ON p.id = g.posterId
	    		WHERE g.id = ".$id;

	    $query = $this->db->query($sql);
	    return $query->row_array();
	}
}
