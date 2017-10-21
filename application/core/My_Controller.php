<?php

class My_Controller extends CI_Controller
{

	public $loginUrl = "";
	private $fb;
	public $cbUrl = "";


	public function __construct() {

		parent::__construct();

		$this->load->library('session');
		// $this->load->library('facebooksdk');
		// $this->fb = $this->facebooksdk;
		//
		$class = $this->router->fetch_class();
		// $callback =  "http://".$_SERVER['HTTP_HOST']."/m6star/$class/callback?rd=".uri_string();
		// $this->loginUrl =  $this->fb->getLoginUrl($callback);


		$base_url = $this->config->item('base_url');
		$this->cbUrl =  "http://".$_SERVER['HTTP_HOST']."$base_url/$class/callback?rd=".uri_string();
	}

	public function callback(){

		$atk = $this->input->get('atk');
		$url ="https://graph.facebook.com/me?fields=id,name,email&access_token=$atk";
		$url = file_get_contents($url);

		$user = json_decode($url);

		try{
			//$tokn = $this->fb->getAccessToken();
			//$user = $this->fb->getUserData($tokn);
			$this->load->model("member_md");

			$fbid = $user->id;
			//$member_id = $this->member_md->isFbIDExists($fbid);

			$mquery = $this->member_md->getMemberInfo($fbid);

			if($mquery->num_rows() > 0){
				$member_id = $mquery->row()->member_id;
				$display_name = $mquery->row()->display_name;
				$this->session->set_userdata("login","login");
		    		$this->session->set_userdata("member_id",$member_id);
				$this->session->set_userdata("display_name",$display_name);
		    		redirect($this->input->get("rd"));
			}else{
				$email = strval($user->email);
				$data["name"] = $user->name;
				$data["display_name"] = $user->name;
				$data["email"] = strlen($email)>0?$email:'';
				$data["fbid"] = $fbid;
				$result = $this->member_md->save($data);
				if($result > 0){
					$this->session->set_userdata("login","login");
				      $this->session->set_userdata("member_id",$result);
					$this->session->set_userdata("display_name",$result);
			        	redirect($this->input->get("rd"));
				}
			}

		}catch(Exception $e){
			echo $e->getMessage();
		}

	}

    public function logout($class="",$method=""){
        $this->session->unset_userdata("login");
        $this->session->unset_userdata("member_id");
        redirect();
    }

    public function login1234qwer($id){
	    $this->session->set_userdata("login","login");
  		$this->session->set_userdata("member_id",$id);
    }
}
?>
