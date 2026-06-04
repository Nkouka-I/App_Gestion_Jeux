<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Game extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('game_model');
        $this->load->helper('url');
    }

    public function index() {
        $search = $this->input->get('search');
        $sort_by = $this->input->get('sort') ? $this->input->get('sort') : 'name';
        $sort_order = $this->input->get('order') ? $this->input->get('order') : 'ASC';
        $genre_id = $this->input->get('genre');
        $category_id = $this->input->get('category');

        if (!empty($genre_id)) {
            $data['games'] = $this->game_model->get_games_genre($genre_id);
        } elseif (!empty($category_id)) {
            $data['games'] = $this->game_model->get_games_category($category_id);
        } else {
            $data['games'] = $this->game_model->get_games_filtered($search, $sort_by, $sort_order);
        }

        $data['genres'] = $this->game_model->get_genres();
        $data['categories'] = $this->game_model->get_categories();
        
        $data['current_search'] = $search;
        $data['current_sort'] = $sort_by;
        $data['current_order'] = $sort_order;

        $this->load->view('game/test', $data);
    }

    public function detail($id) {
        $data['game'] = $this->game_model->get_game_id($id);
        
        if (empty($data['game'])) {
            show_404();
        }

        $this->load->view('game/details', $data);
    }

    public function delete($id = NULL) {
        if ($id === NULL) {
            show_404();
        }
        $this->game_model->delete_game($id);
        redirect('game/test');
    }
}