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

		//log_message('debug', "request ppppppppppppppppppppppppppppppppppppp $game_id $no" );
		//log_message('debug', "store yyyyyyyyyyyyyyyyyyyyyy ".print_r($query->result(), TRUE) );

		// $pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';
		// if($pageWasRefreshed && !$this->input->post()) {
		//    redirect("post/game/$game_id");
		// }

		if($post = $this->input->post())
		{

			$point = 0;
			if(isset($post["choice"])) //submit on timeout (not choice data)
			{
				$point = $this->answer_md->getPlayPoint($post["choice"]);
			}
			$curent_point = $this->session->flashdata('point');
			$curent_point[$no] = $point;
			log_message('debug', "store yyyyyyyyyyyyyyyyyyyyyy ".print_r($curent_point, TRUE) );
			//print_r($curent_point);
			$this->session->set_flashdata('point',$curent_point);

		}

		if($query->num_rows() > 0){
			$data["qest"] = $query->row();
			$data["ans"] = $this->answer_md->getByQuestionId($data["qest"]->id);
		}else{

			$apoint = $this->session->flashdata('point');
			if(!is_array($apoint) || count($apoint) <= 0){
				redirect("post/game/$game_id");
			}

			$total_point = array_sum($apoint);
			//echo $total_point;
			// print_r($apoint);
			// exit;
			$query = $this->result_md->getGameResultByPoint($total_point);
			$d = array();
			$d["score"] = $total_point;
			if($query->num_rows() > 0)
			{
				$game_res = $query->row()->result;
				$d["result"] = $game_res;
			}

			$member_id = $this->session->userdata("member_id");
			$this->play_result_md->save($game_id, $member_id,$d);
			redirect("post/finish/$game_id/$member_id");
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

	public function finish($game_id,$member_id){
		$data = array();
		$data["game_id"] = $game_id;
		$data["gameinfo"] = $this->game_md->getOnePublic($game_id);

		//game point
		$query = $this->answer_md->getTotalPoint($game_id);
		$data["game_point"] = $query->row()->point;

		//user play this game point
		$sumpoint = $this->session->flashdata('point');

		$query = $this->play_result_md->get($game_id, $member_id);
		if($query->num_rows() > 0)
		{
			$data["game_res"] =  $query->row()->result;
			$data["total_point"] = $query->row()->score;
		}


		$content["content"] = $this->load->view("game/finish_tpl",$data,true);
		$this->load->view("layout_tpl",$content);
	}
}
