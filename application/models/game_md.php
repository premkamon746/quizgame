<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Game_Md extends CI_Model { // คลาส Model_template สืบทอดคุณสมบัติของ CI_Model

	private $table = "game";


	function get($id){
		return $this->db->get_where($this->table, array("id"=>$id));
	}

      function getAllPublic(){
            $this->db->order_by('create_date','desc');
		return $this->db->get_where($this->table, array("status"=>"public"));
	}

	function getOnePublic($id){
		return $this->db->get_where($this->table, array("id"=>$id, "status"=>"public"));
	}

	function getByMemberID($member_id){
		return $this->db->get_where($this->table, array("member_id"=>$member_id));
	}


	function isOwner($member_id,$game_id){
		$result =  $this->db->get_where($this->table, array("id"=>$game_id,"member_id"=>$member_id));
		//echo $this->db->last_query();
		if($result->num_rows() >0) return true;
		return false;
	}

	function setStatus($id,$status){
		$this->db->where(array("id"=>$id));
		$query =  $this->db->update($this->table, array("status"=>$status));
		return $query;
	}

	function setPublic($id){
		$this->db->where(array("id"=>$id));
		$query =  $this->db->update($this->table, array("status"=>"public"));

		return $query;
	}




	function save($data){
		$data["status"] = "create";
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


}
