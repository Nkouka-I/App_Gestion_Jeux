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

        $data['games'] = $this->game_model->get_games_filtered($search, $sort_by, $sort_order);
        
        $data['current_search'] = $search;
        $data['current_sort'] = $sort_by;
        $data['current_order'] = $sort_order;

        $this->load->view('game/test', $data);
    }

    public function delete($id = NULL) {
        if ($id === NULL) {
            show_404();
        }
        $this->game_model->delete_game($id);
        redirect('game/test');
    }
}