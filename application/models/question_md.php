<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Question_Md extends CI_Model { // คลาส Model_template สืบทอดคุณสมบัติของ CI_Model

	private $table = "question";


	function get($id){
		$query = $this->db->get_where($this->table, array("id"=>$id));
		return $query;
	}

	function getByGameID($game_id){
		$query = $this->db->get_where($this->table, array("game_id"=>$game_id));
		return $query;
	}

	function getByGameIDNO($game_id,$no){
		$query = $this->db->get_where($this->table, array("game_id"=>$game_id,"no"=>$no));
		return $query;
	}

	function getByMemberID($member_id){
		return $this->db->get_where($this->table, array("member_id"=>$member_id));
	}

	function getIDByNo($member_id,$game_id,$qno){
		return  $this->db->get_where("question",array("member_id"=>$member_id,"game_id"=>$game_id,"no"=>$qno));
	}


	function isOwner($member_id,$game_id){
		$result =  $this->db->get_where($this->table, array("id"=>$game_id,"member_id"=>$member_id));
		//echo $this->db->last_query();
		if($result->num_rows() >0) return true;
		return false;
	}

	function checkQuestionNo($game_id){
		$query = $this->db->get_where($this->table, array("game_id"=>$game_id));
		return $query->num_rows()+1;
	}


      function getAllQuestion($game_id){
            $member_id = $this->session->userdata("member_id");
            return $this->db->get_where($this->table, array("game_id"=>$game_id,"member_id"=>$member_id ));
      }

	function save($data){
		//$data["status"] = "create";
		$data["member_id"] = $this->session->userdata("member_id");

		$this->db->set("create_date","now()",false);
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	function update($data,$id,$no=""){
		$where = array("id"=>$id);
		if($no !=""){
			$where["no"] = $no;
		}
		$this->db->set("update_date","now()",false);
		$this->db->where($where);
		$this->db->update($this->table, $data);
		return $this->db->insert_id();
	}

	function updaeImage($member_id,$game_id,$no,$pic){
		$this->db->set("update_date","now()",false);
		$this->db->where(array("member_id"=>$member_id,"game_id"=>$game_id,"no"=>$no));
		$this->db->update($this->table,array("picture"=>$pic));

	}


}
