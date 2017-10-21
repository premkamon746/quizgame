<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once("Auth.php");
class CreateGame extends Auth {

	public function __construct(){
		parent::__construct();
	 	$this->load->model("game_md");
		$this->load->model("result_md");
		$this->load->model("question_md");
		$this->load->model("answer_md");
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

			$d["show_score"] = isset($post["show_score"])?1:0;
			$d["show_total"] = isset($post["show_total"])?1:0;

			if($id > 0){

				if(isset($_FILES['userfile']['name'])&&$_FILES['userfile']['name']!=""){
					$ext = pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
					$file_name = uniqid('img_').".".$ext;
					$d["picture"] = $file_name;

					$data["message"] = $this->do_upload($id,$file_name);
				}


				$this->game_md->update($d,$id);
			}else{
				$id = '';
				if(isset($_FILES['userfile']['name'])&&$_FILES['userfile']['name']!=""){
					$ext = pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
					$file_name = uniqid('img_').".".$ext;
					$d["picture"] = $file_name;
					$id = $this->game_md->save($d);
					$data["message"] = $this->do_upload($id,$file_name);
				}
				redirect("creategame/index/$id");

			}

			//when the game have question
			// $query = $this->question_md->getByGameIDNO($id,1);
			//
			// 	if($query->num_rows() > 0){
			// 		$qid = $query->row()->id;
			// 		redirect("gamequestion/index/$id/$qid");
			// 	}else{
			// 		redirect("gamequestion/index/$id");
			// 	}
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
            $config['max_height']           = 1024;

            if (!file_exists($config['upload_path'])) {
						    mkdir($config['upload_path'], 0777);
						    echo "The directory  was successfully created.";

						}
						$msg = "";
            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('userfile'))
            {
                    //$error = array('error' => $this->upload->display_errors());
                    $msg =  $this->upload->display_errors();
                    //$this->load->view('upload_form', $error);
            }
            else
            {
                    //$data = array('upload_data' => $this->upload->data());
                    $msg =  $this->upload->data() ;
                    //$this->load->view('upload_success', $data);
            }

						return $msg;
    }

    public function finish($game_id){
    	$data = array();

	if(!$this->game_md->isOwner($this->mem_id,$game_id)&&$game_id>0){
		echo "ไม่พบเกมส์ที่คุณเลือก";
		exit;
	}

    	if($post = $this->input->post()){


    		if(isset($post["public"]))
    		{

    			$this->game_md->setPublic($game_id,"public");
    		}elseif (isset($post["test"])){

	    	}elseif (isset($post["back"])){

	    	}elseif (isset($post["unpublic"])){
	    		$this->game_md->setStatus($game_id,"unpublic");
	    	}
    	}

    	$query = $this->game_md->get($game_id);
    	if($query->num_rows() > 0 ){
    		$data["game"] = $query->row();
    	}

	$data["game_id"] = $game_id;
    	$content["content"] = $this->load->view("creategame/finish_tpl",$data,true);
		$this->load->view("layout_tpl",$content);
    }

    public function result($game_id){
	    $data = array();
	    $member_id = $this->mem_id;

	    if(!$this->game_md->isOwner($this->mem_id,$game_id)&&$game_id>0){
	    		echo "ไม่พบเกมส์ที่คุณเลือก";
	    		exit;
	    }


	    if($post = $this->input->post()){
		    $d = array();
		    //$res = $this->result_md->delete($game_id);

			//if($res){
				$this->load->library('upload');
			    $files = $_FILES;
			    for($i = 0; $i < count($post["result"]); $i++){
				    if(/*$post["result"][$i] !="" &&*/ $post["start_score"][$i] !="" && $post["end_score"][$i]!="")
					{

						//check empty file
						//echo $files['userfile']['name'][$i]."<br/>";
						$file_name = "";
						if(isset( $files['userfile']['name'][$i])&& $files['userfile']['name'][$i]!=""){
							$ext = pathinfo($files['userfile']['name'][$i], PATHINFO_EXTENSION);
							$file_name = uniqid('img_').".".$ext;
							//echo $file_name;
							$data["message"] = $this->do_multi_upload($game_id,$files,$file_name,$i);
						}
						//check empty file

						if($post["res_id"][$i] !=""){
							$d = array(
								"game_id" =>$game_id,
								"member_id" =>$member_id,
								"start_score" =>$post["start_score"][$i],
								"end_score" =>$post["end_score"][$i],
								"title" =>$post["title"][$i],
								"result" =>$post["result"][$i],
							);

							if($file_name !=""){
								$d["picture"] =$file_name;
							}
							$id = $post["res_id"][$i]; // get id from hidden field
							$this->result_md->update($d,$id);
						}else{
							$d = array(
								"game_id" =>$game_id,
								"member_id" =>$member_id,
								"start_score" =>$post["start_score"][$i],
								"end_score" =>$post["end_score"][$i],
								"title" =>$post["title"][$i],
								"result" =>$post["result"][$i],
							    "picture" =>$file_name
							);
							$this->result_md->save($d);

						}

				    }

			    }
			    //$this->result_md->save_batch($d);
			//}
	    }

	    $query = $this->answer_md->getTotalPoint($game_id);

	    $data["point"] = $query->row()->point;
	    $data["game_id"] = $game_id;
	    $data["result"] = $this->result_md->getByGameId($game_id);
	    $content["content"] = $this->load->view("creategame/result_tpl",$data,true);
	    $this->load->view("layout_tpl",$content);
    }

    function delete_res($gmae_id,$id){
	    $this->result_md->remove($gmae_id,$id);
	    redirect("creategame/result/$gmae_id");
    }


    private function do_multi_upload($game_id,$files ,$filename,$i)
	{
		$config['file_name']            = $filename;
		$config['upload_path']          = "./uploads/$game_id/";
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 1024;
		$config['max_width']            = 1024;
		$config['max_height']           = 1024;

		//print_r($config);


		$_FILES['userfile']['name']= $files['userfile']['name'][$i];
		$_FILES['userfile']['type']= $files['userfile']['type'][$i];
		$_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
		$_FILES['userfile']['error']= $files['userfile']['error'][$i];
		$_FILES['userfile']['size']= $files['userfile']['size'][$i];

		if (!file_exists($config['upload_path'])) {
						  mkdir($config['upload_path'], 0777);
						  //echo "The directory  was successfully created.";

					    }
		$msg = "";
		//$this->load->library('upload');
		$this->upload->initialize($config);
		if ( ! $this->upload->do_upload('userfile'))
		{
			//$error = array('error' => $this->upload->display_errors());
			$msg =  $this->upload->display_errors();
			//print_r($msg);
			//$this->load->view('upload_form', $error);
		}
		else
		{
			//$data = array('upload_data' => $this->upload->data());
			$msg =  $this->upload->data() ;
			//print_r($msg);
			//$this->load->view('upload_success', $data);
		}

		return $msg;
	}

  //   public function public($id){
  //   	$data = array();
  //   	if ($this->game_md->seetPublic($id)){
  //   		redirect("");
  //   	}
  //   	$content["content"] = $this->load->view("creategame/finish_tpl",$data,true);
		// $this->load->view("layout_tpl",$content);
  //   }
}
