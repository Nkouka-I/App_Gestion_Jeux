<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Game extends CI_Controller {

	public function __construct() 
	{
        parent::__construct();

        $this->load->model('game_model');
    }

    public function index() {
        
        $data['games'] = $this->game_model->get_all_games();
        
        $this->load->view('game/test', $data);
    }
}
