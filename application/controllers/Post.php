<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once("Auth.php");
class Post extends Auth {

	function __construct(){
		parent::__construct();
		$this->load->model("game_md");
	}

	public function game($id)
	{
		$data = array();
		$data["result"] = $this->game_md->getOnePublic($id);
		$content["bef_login"] = $this->load->view("game/showdetail_tpl",$data,true);
		$content["content"] = $this->load->view("game/index_tpl",$data,true);
		$this->load->view("layout_tpl",$content);
	}
}
