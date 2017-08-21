<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Answer_Md extends CI_Model { // คลาส Model_template สืบทอดคุณสมบัติของ CI_Model

	private $table = "answer";


	function get($id){
		return $this->db->get_where($this->table, array("id"=>$id));
	}

	function getByQuestionId($question_id){
		return $this->db->get_where($this->table, array("question_id"=>$question_id));
	}

	function getByMemberID($member_id){

		return $this->db->get_where($this->table, array("member_id"=>$member_id));
	}

	function getPlayPoint($aid){
		$result =  $this->db->get_where($this->table, array("id"=>$aid));
		//echo $this->db->last_query();
		if($result->num_rows() > 0){
			return $result->row()->point;
		}
		return 0;
	}

	function getTotalPoint($game_id){
		$this->db->select_sum('point');
		return $this->db->get_where($this->table, array("game_id"=>$game_id));
	}

	function getTotalPointMembId($game_id,$member_id){
		$this->db->select_sum('point');
		return $this->db->get_where($this->table, array("game_id"=>$game_id,"member_id"=>$member_id));
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

	function updaeImage($member_id,$game_id,$qno,$no,$pic){
		$this->load->model("question_md");
		$query = $this->question_md->getIDByNo($member_id,$game_id,$qno);
		echo $this->db->last_query();
		if($query->num_rows() > 0){
			$qid = $query->row()->id;
			$this->db->set("update_date","now()",false);
			$this->db->where(array("member_id"=>$member_id,"question_id"=>$qid, "no"=>$no));
			$this->db->update($this->table,array("picture"=>$pic));
			echo $this->db->last_query();
		}
	}




	function save($data){
		//$data["status"] = "create";
		$data["member_id"] = $this->session->userdata("member_id");
		$this->db->set("create_date","now()",false);
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	function update($data,$id){
		$this->db->set("update_date","now()",false);
		$this->db->where(array("id"=>$id));
		$this->db->update($this->table, $data);
		return $this->db->insert_id();
	}

	function deleteByQstID($qst_id){
		return $this->db->delete($this->table, array("question_id"=>$qst_id));
	}


}
