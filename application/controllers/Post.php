<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once("Auth.php");
class Post extends Auth {

	function __construct(){
		parent::__construct();
		$this->load->model("game_md");
		$this->load->model("question_md");
		$this->load->model("answer_md");
	}

	public function game($id)
	{
		$data = array();
		$data["game_id"] = $id;
		$data["result"] = $this->game_md->getOnePublic($id);
		$content["bef_login"] = $this->load->view("game/showdetail_tpl",$data,true);
		$content["content"] = $this->load->view("game/index_tpl",$data,true);
		$this->load->view("layout_tpl",$content);
	}

	public function comment($game_id,$no=1){
		$data = array();
		$query = $this->question_md->getByGameIDNO($game_id,$no);

		if($post = $this->input->post()){
			if($query->num_rows() <= 0){
				redirect("post/finish/$game_id");
			}
		}

		if($query->num_rows() > 0){
			$data["qest"] = $query->row();
			$data["ans"] = $this->answer_md->getByQuestionId($data["qest"]->id);
		}

		$data["no_next"] = $no+1;
		$data["game_id"] = $game_id;
		$content["content"] = $this->load->view("game/comment_tpl",$data,true);
		$this->load->view("layout_tpl",$content);
	}

	public function finish($id){
		$data = array();
		$data["game_id"] = $id;
		$data["result"] = $this->game_md->getOnePublic($id);
		$content["content"] = $this->load->view("game/finish_tpl",$data,true);
		$this->load->view("layout_tpl",$content);
	}
}
