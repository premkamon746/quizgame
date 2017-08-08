<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once("Auth.php");
class CreateGame extends Auth {

	public function __construct(){
		parent::__construct();
	 	$this->load->model("game_md");
	}


	public function test(){
		print_r($_FILES);
	}

	public function index($id="")
	{
		$data = array();

		if(!$this->game_md->isOwner($this->mem_id,$id)&&$id>0){
			echo "ไม่พบเกมส์ที่คุณเลือก";
			exit;
		}

		if(($post = $this->input->post()) && $this->login){
			$d = array();
			$d["title"] = $post["title"];
			$d["detail"] = $post["detail"];
			$d["timelimit_type"] = $post["timelimit_type"];
			$d["time_limit"] = $post["time_limit"];

			if($id > 0){

				if(isset($_FILES['userfile']['name'])&&$_FILES['userfile']['name']!=""){
					$ext = pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
					$file_name = uniqid('img_').".".$ext;
					$d["picture"] = $file_name;

					$this->do_upload($id,$file_name);
				}


				$this->game_md->update($d,$id);
				redirect("gamequestion/index/$id");
			}else{
				$ext = pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
				$file_name = uniqid('img_').".".$ext;
				$d["picture"] = $file_name;
				$game_id = $this->game_md->save($d);
				$this->do_upload($game_id,$file_name);
				redirect("gamequestion/index/$game_id");
			}
		}

		if($id > 0){
			$data["game"] = $this->game_md->get($id);


		}
		$data["game_id"] = $id;
		$content["content"] = $this->load->view("creategame/index_tpl",$data,true);



		$this->load->view("layout_tpl",$content);
	}

	private function do_upload($game_id ,$filename)
    {
    		$config['file_name']            = $filename;
            $config['upload_path']          = "./uploads/$game_id/";
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 1024;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;

            if (!file_exists($config['upload_path'])) {
			    mkdir($config['upload_path'], 0777);
			    echo "The directory  was successfully created.";

			}
            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('userfile'))
            {
                    $error = array('error' => $this->upload->display_errors());
                    //echo $this->upload->display_errors();
                    //$this->load->view('upload_form', $error);
            }
            else
            {
                    $data = array('upload_data' => $this->upload->data());
                    //print_r( $this->upload->data());
                    //$this->load->view('upload_success', $data);
            }
    }
}
