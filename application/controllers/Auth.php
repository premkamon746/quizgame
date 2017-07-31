<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {

	public $login = false;
	public $mem_id;
	function __construct(){
		parent::__construct();
		if($this->session->userdata("login")!="login"){
			
		}else{
			$this->login = true;
			$this->mem_id = $this->session->userdata("member_id");
		}
	}
}
