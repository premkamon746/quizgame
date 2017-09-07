<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Content extends MY_Controller {

	public $login = false;
	public $mem_id;

	function policy(){
		$data = array();
		$content["content"] = $this->load->view("content/policy_tpl",$data,true);
		$this->load->view("layout_tpl",$content);
	}
}
