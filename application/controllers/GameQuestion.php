<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once("Auth.php");
class GameQuestion extends Auth {

	public function __construct(){
		parent::__construct();
	 	$this->load->model("game_md");
        	$this->load->model("question_md");
		$this->load->model("answer_md");
	}

	public function index($game_id="", $qest_id="")
	{
		if(!$this->game_md->isOwner($this->mem_id,$game_id)&&$game_id>0){
		    echo "ไม่พบเกมส์ที่คุณเลือก";
		    return;
		}

		$data = array();
		$data["game_id"] = $game_id;
		$data["question_id"] = $qest_id;

		$data["all_question"] = $this->question_md->getAllQuestion($game_id);

		$data["answer"] = [1,2,3,4,5];

		$question_no = $this->question_md->checkQuestionNo($game_id);

		if($qest_id > 0){
			$question = $this->question_md->get($qest_id);
			$data["question"] = $question->row();
			$answer =  $this->answer_md->getByQuestionId($qest_id);
			if($answer->num_rows() > 0){
				$data["answer"] = $answer->result();
			}
			$question_no = $data["question"]->no;
		}




		$data["question_no"] = $question_no;
	        if($post = $this->input->post() ){


			if(!$this->validPoint($post["point"])){
			      $data["message"] = "กรุณาให้คะแนนข้อที่ตอบถูกอย่างน้อย 1 ข้อ";
				$content["content"] = $this->load->view("gamequestion/index_tpl",$data,true);
				$this->load->view("layout_tpl",$content);
				return;
		      }

			  $i = 0;
			  $question_id = 0;

			if($qest_id == ""){
				foreach($_FILES['userfile']['name'] as $n){
					$save = array();
					$picture = "";


					if($i==0){ //save question
						if($n != ""){
							$ext = pathinfo($n, PATHINFO_EXTENSION);
							$picture = "{$game_id}_{$question_no}.{$ext}";
						}
						$save = array("question"=>$post["choice"][$i],
								"picture"	=>$picture,
								"no"		=>$question_no,
								"game_id"	=>$game_id
							);

						$question_id = $this->question_md->save($save);
						if($question_id <=0){
							$data["message"] = "เกิดข้อผิดพลาดในการบันทึกคำถามกรุณาลองใหม่";
							break;
						}
					}else{ //save answer
						if($n != ""){
							$ext = pathinfo($n, PATHINFO_EXTENSION);
							$picture = "{$game_id}_{$question_no}{$i}in.{$ext}";
						}
						if(($post["choice"][$i]!="") || ($n != "")){
							$save = array("answer"		=>$post["choice"][$i],
									"picture"		=>$picture,
									"no"			=>$i,
									"question_id"	=>$question_id,
									"point"	=>$post["point"][$i]
							);
							$this->answer_md->save($save);
						}
					} // end if check quesion
					$picture = "";
					$i++;
				}
			}else{
				$iq = $qest_id+1;
				$qcount = $this->question_md->get($iq);
				if($qcount->num_rows() > 0){
					redirect("gamequestion/index/$game_id/{$iq}");
				}else{
					redirect("gamequestion/index/$game_id");
				}
			}
        }//if post



		$content["content"] = $this->load->view("gamequestion/index_tpl",$data,true);
		$this->load->view("layout_tpl",$content);
	}


	private function validPoint($point){
		foreach ($point as $p){
			if ($p > 0) return true;
		}
		return false;
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
