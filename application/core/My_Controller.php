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

		$this->cbUrl =  "http://".$_SERVER['HTTP_HOST']."/m6star/$class/callback?rd=".uri_string();
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
			$member_id = $this->member_md->isFbIDExists($fbid);
			if(!$member_id){
				$data["name"] = $user->name;
				$data["email"] = $user->email;
				$data["fbid"] = $fbid;
				$result = $this->member_md->save($data);
				if($result > 0){
					$this->session->set_userdata("login","login");
		        $this->session->set_userdata("member_id",$result);
		        redirect($this->input->get("rd"));
				}

			}else{
				$this->session->set_userdata("login","login");
		    $this->session->set_userdata("member_id",$member_id);
		    redirect($this->input->get("rd"));
			}

		}catch(Exception $e){
			echo $e->getMessage();
		}

	}

    public function logout($class,$method){
        $this->session->unset_userdata("login");
        $this->session->unset_userdata("member_id");
        redirect("$class/$method");
    }
}
?>
