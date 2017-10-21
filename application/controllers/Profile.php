<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once("Auth.php");
class Profile extends Auth {

	public function __construct(){
		parent::__construct();
	 	$this->load->model("member_md");
	}

	public function index($id="")
	{
		$data = array();
		$member_id = $this->session->userdata("member_id");
		if($post = $this->input->post()){
			if(isset($post["display_name"])&&$post["display_name"]!=""){
				$d = array();
				$d["display_name"] =$post["display_name"];
				$this->member_md->update_profile($member_id,$d);
			}
		}

		$mquery = $this->member_md->getMemberInfoById($member_id);
		$data["display_name"] = $mquery->row()->display_name;
		$content["content"] = $this->load->view("profile/index_tpl",$data,true);
		$this->load->view("layout_tpl",$content);
	}

}
