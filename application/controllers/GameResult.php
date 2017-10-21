<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once("Auth.php");
class GameResult extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model("game_md");
		$this->load->model("question_md");
		$this->load->model("answer_md");
		$this->load->model("result_md");
		$this->load->model("play_result_md");
	}

	public function score($game_id,$member_id){
		$data = array();
		$data["game_id"] = $game_id;
		$data["gameinfo"] = $this->game_md->getOnePublic($game_id);

		//game point
		$game = $this->answer_md->getTotalPoint($game_id);
		$data["game_point"] = $game->row()->point;
	//print_r($game->result());

		//user play this game point
		$sumpoint = $this->session->flashdata('point');

		$query = $this->play_result_md->get($game_id, $member_id);


		if($query->num_rows() > 0)
		{
			$data["game_res"] =  $query->row()->result;
			$data["total_point"] = $query->row()->score;
			$data["picture"] = $query->row()->picture;
			$data["title"] = $query->row()->title;
		}


		$content["content"] = $this->load->view("gameresult/score_tpl",$data,true);
		$this->load->view("layout_tpl",$content);
	}
}
