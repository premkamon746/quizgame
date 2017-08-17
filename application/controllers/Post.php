<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once("Auth.php");
class Post extends Auth {

	function __construct(){
		parent::__construct();
		$this->load->model("game_md");
		$this->load->model("question_md");
		$this->load->model("answer_md");
		$this->load->model("result_md");
		$this->load->model("play_result_md");
	}

	public function game($id)
	{
		$data = array();
		$data["game_id"] = $id;
		$query = $this->game_md->getOnePublic($id);

		if($query->num_rows() > 0){
			$res = $query->row();
			$data["res"] = $res;
			$this->session->set_userdata("time_limit",$res->time_limit);
			$this->session->set_userdata("timelimit_type",$res->timelimit_type);
		}
		//echo $this->session->userdata("timelimit_type");


		$content["bef_login"] = $this->load->view("game/showdetail_tpl",$data,true);
		$content["content"] = $this->load->view("game/index_tpl",$data,true);
		$this->load->view("layout_tpl",$content);
	}

	public function comment($game_id,$no=1){
		$data = array();
		$query = $this->question_md->getByGameIDNO($game_id,$no);

		// $pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';
		// if($pageWasRefreshed ) {
		//
		//    redirect("post/game/$game_id");
		// }

		if($post = $this->input->post())
		{
			$point = $this->answer_md->getPlayPoint($post["choice"]);

			if(	$this->session->flashdata('point') )
			{

				$curent_point = $this->session->flashdata('point');
				$sumpoint = $curent_point+$point;
				$this->session->set_flashdata('point',$sumpoint);
				//echo "next record : ".$curent_point;
			}else{
				//echo "start record : ".$point;
				$this->session->set_flashdata('point',$point);
			}
		}

		if($query->num_rows() > 0){
			$data["qest"] = $query->row();
			$data["ans"] = $this->answer_md->getByQuestionId($data["qest"]->id);
		}else{
			redirect("post/finish/$game_id");
		}

		$time_limit = $this->session->userdata("time_limit");
		$timelimit_type = $this->session->userdata("timelimit_type");

		$data["time"] = $time_limit;
		$data["timetype"] = $timelimit_type;

		$data["no_next"] = $no+1;
		$data["no"] = $no;
		$data["game_id"] = $game_id;

		$data["game_title"] = $this->game_md->get($game_id);

		$content["content"] = $this->load->view("game/comment_tpl",$data,true);
		$this->load->view("layout_tpl",$content);
	}

	public function finish($game_id){
		$data = array();
		$data["game_id"] = $game_id;
		$data["result"] = $this->game_md->getOnePublic($game_id);

		//game point
		$query = $this->answer_md->getTotalPoint($game_id);
		$data["game_point"] = $query->row()->point;

		//user play this game point
		$sumpoint = $this->session->flashdata('point');

		
		$data["total_point"] = $sumpoint;
		$query = $this->result_md->getGameResultByPoint($sumpoint);

		if($query->num_rows() > 0)
		{
				$data["game_res"] = $query->row()->result;

		}
		$content["content"] = $this->load->view("game/finish_tpl",$data,true);
		$this->load->view("layout_tpl",$content);
	}
}
