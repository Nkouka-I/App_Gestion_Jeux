<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Game_model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}

	public function get_games_filtered($search = null, $sort_by = 'name', $sort_order = 'ASC') 
	{
	    if (!empty($search)) {
	        $sql = "SELECT id, name, releaseYear, price, posterId
	        		FROM game 
	        		WHERE name LIKE '%" .$search. "%' ORDER BY " .$sort_by. " " .$sort_order;
	        $query = $this->db->query($sql);
	    } else {
	        $sql = "SELECT id, name, releaseYear, price, posterId
	        		FROM game 
	        		ORDER BY " .$sort_by. " " .$sort_order;
	        $query = $this->db->query($sql);
	    }
	    
	    return $query->result_array();
	}

	public function get_games_genre_filter($genre_id)
	{
		$sql = "SELECT g.id, g.name, g.releaseYear, g.price, g.posterId
				FROM game g JOIN game_genre gg ON g.id = gg.gameId
				WHERE gg.genreId = ?";

		$query = $this->db->query($sql, array($genre_id));
    	return $query->result_array();
	}

	public function get_games_category_filter($category_id) 
	{
	    $sql = "SELECT g.id, g.name, g.releaseYear, g.price, g.posterId
	    		FROM game g JOIN game_category gc ON g.id = gc.gameId 
	            WHERE gc.categoryId = ?";
	            
	    $query = $this->db->query($sql, array($category_id));
	    return $query->result_array();
	}

	public function get_game_genres_details($game_id) 
	{
	    $sql = "SELECT g.* 
	    		FROM genre g JOIN game_genre gg ON g.id = gg.genreId 
	            WHERE gg.gameId = ?";
	    $query = $this->db->query($sql, array($game_id));
	    return $query->result_array();
	}

	public function get_game_categories_details($game_id) 
	{
	    $sql = "SELECT c.* FROM category c 
	            JOIN game_category gc ON c.id = gc.categoryId 
	            WHERE gc.gameId = ?";
	    $query = $this->db->query($sql, array($game_id));
	    return $query->result_array();
	}

	public function get_genre_of_a_game($game_id) {
	    $sql = "SELECT genreId 
	    		FROM game_genre 
	    		WHERE gameId = ?";
	    $query = $this->db->query($sql, array($game_id));
	    return array_column($query->result_array(), 'genreId');
	}

	public function get_category_of_a_game($game_id) {
	    $sql = "SELECT categoryId 
	    		FROM game_category 
	    		WHERE gameId = ?";
	    $query = $this->db->query($sql, array($game_id));
	    return array_column($query->result_array(), 'categoryId');
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

	public function get_game_info($id) {
	    $sql = "SELECT g.*, d.name AS developer_name, p.jpeg AS game_image
	    		FROM game g JOIN developer d ON g.developerId = d.id LEFT JOIN poster p ON p.id = g.posterId
	    		WHERE g.id = ?";

	    $query = $this->db->query($sql, array($id));
	    return $query->row_array();
	}

	public function insert_game($data) 
	{
	    $sql = "INSERT INTO game (name, releaseYear, price, metacritic, developerId, shortDescription, windows, linux, mac) 
	            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
	    
	    $this->db->query($sql, array(
	    	$data['name'],
			$data['releaseYear'],
			$data['price']*100,
			$data['metacritic'],
			$data['developerId'],
			$data['shortDescription'],
			$data['windows'],
			$data['linux'],
			$data['mac'])
		);
		return $this->db->insert_id();
	}

	public function insert_poster($game_id, $poster_data)
	{
	    $sql = "INSERT INTO poster (id, jpeg) 
	    		VALUES (?, ?)";
	    return $this->db->query($sql, array($game_id, $poster_data));
	}

	public function update_game($id, $data) 
	{
	    $sql = "UPDATE game 
	            SET name = ?, 
	                releaseYear = ?, 
	                price = ?, 
	                metacritic = ?, 
	                developerId = ?, 
	                shortDescription = ?, 
	                windows = ?, 
	                linux = ?, 
	                mac = ? 
	            WHERE id = ?";
	            
	    return $this->db->query($sql, array(
	        $data['name'],
	        $data['releaseYear'],
	        $data['price']*100,
	        $data['metacritic'],
	        $data['developerId'],
	        $data['shortDescription'],
	        $data['windows'],
	        $data['linux'],
	        $data['mac'],
	        $id)
		);
	}

	public function delete_game($id) {
	    $sql = "DELETE FROM game WHERE id = ?";
	    
	    return $this->db->query($sql, array($id));
	}

	public function get_developers() {
	    $sql = "SELECT * 
	    		FROM developer 
	    		ORDER BY name ASC";
	    $query = $this->db->query($sql);
	    return $query->result_array();
	}

	public function update_game_genres($game_id, $genre_ids) 
	{
	    $sql_delete = "DELETE FROM game_genre WHERE gameId = ?";
	    $this->db->query($sql_delete, array($game_id));

	    if (!empty($genre_ids) && is_array($genre_ids)) {
	        foreach ($genre_ids as $genre_id) {
	            $sql_insert = "INSERT INTO game_genre (gameId, genreId) VALUES (?, ?)";
	            $this->db->query($sql_insert, array($game_id, $genre_id));
	        }
	    }
	}

	public function update_game_categories($game_id, $category_ids) 
	{
	    $sql_delete = "DELETE FROM game_category WHERE gameId = ?";
	    $this->db->query($sql_delete, array($game_id));

	    if (!empty($category_ids) && is_array($category_ids)) {
	        foreach ($category_ids as $category_id) {
	            $sql_insert = "INSERT INTO game_category (gameId, categoryId) VALUES (?, ?)";
	            $this->db->query($sql_insert, array($game_id, $category_id));
	        }
	    }
	}
}