<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once("Auth.php");
class GameQuestion extends Auth {

	public function __construct(){
		parent::__construct();
	 	$this->load->model("game_md");
        $this->load->model("question_md");
	}

	public function index($game_id)
	{
		$data = array();


        if(!$this->game_md->isOwner($this->mem_id,$game_id)&&$game_id>0){
            echo "ไม่พบเกมส์ที่คุณเลือก";
            exit;
        }

        $data["question_no"] = $this->question_md->checkQuestionNo($game_id);

        if($post = $this->input->post()){
               
                $d["question"]  = $post["question"];
                $d["no"]        = $data["question_no"];
                $d["game_id"]   = $game_id;
                $this->question_md->save($d);
                if(isset($post["next"])){
                    
                }else if(isset($post["finish"])){

                }
        }

        
        $data["game_id"] = $game_id;
		$content["content"] = $this->load->view("gamequestion/index_tpl",$data,true);
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
