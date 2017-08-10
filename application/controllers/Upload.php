<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once("Auth.php");

class Upload extends Auth {

public function __construct(){
		parent::__construct();
	 	$this->load->model("game_md");
        	$this->load->model("question_md");
		$this->load->model("answer_md");
	}

	public function picture($game_id,$question_no,$no=""){

		if(!$this->game_md->isOwner($this->mem_id,$game_id)){
			echo "ไม่พบเกมส์ที่คุณเลือก";
			exit;
		}


		if($no != ""){
			$no = "_".$no;
		}

		$ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
		$file_name = "{$game_id}_{$question_no}{$no}.$ext";
		$upload = $this->do_upload($game_id,$file_name);
		if($upload){
			$member_id = $this->session->userdata("member_id");
			if($no > 0){
				$this->answer_md->updaeImage($member_id,$game_id,$question_no,$no,$file_name);
			}else{
				$this->question_md->updaeImage($member_id,$game_id,$question_no,$file_name);
			}
		}

	}

	private function do_upload($game_id ,$filename)
    {
    		$config['file_name']            = $filename;
            $config['upload_path']          = "./uploads/$game_id/";
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 1024;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;
            $config['overwrite'] = TRUE;

   //          if (!file_exists($config['upload_path'])) {
			//     mkdir($config['upload_path'], 0777);
			//     echo "The directory  was successfully created.";

			// }

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('image'))
            {
                    $error = array('error' => $this->upload->display_errors());
                    //echo $this->upload->display_errors();
                    //$this->load->view('upload_form', $error);
			  return false;
            }
            else
            {
                    $data = $this->upload->data();
                    $file_name = $data["file_name"];
                    echo base_url()."uploads/$game_id/$file_name?t=".time();
                    //$this->load->view('upload_success', $data);
			  return true;
            }
		return false;
    }
}
