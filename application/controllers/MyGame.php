<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once("Auth.php");
class MyGame extends Auth {

	public function __construct(){
		parent::__construct();
	 	$this->load->model("game_md");
	}

	public function index($id="")
	{
		$data = array();
		$member_id = $this->session->userdata("member_id");
		$data["mygame"] = $this->game_md->getByMemberID($member_id);
		$content["content"] = $this->load->view("mygame/index_tpl",$data,true);
		$this->load->view("layout_tpl",$content);
	}

	
}
