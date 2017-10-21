<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model("game_md");
	}

	public function index()
	{
		$data = array();
		$data["result"] = $this->game_md->getAllPublic();
		$content["content"] = $this->load->view("home/index_tpl",$data,true);
		$this->load->view("layout_tpl",$content);
	}
}
