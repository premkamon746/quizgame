<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Play_Result_Md extends CI_Model { // คลาส Model_template สืบทอดคุณสมบัติของ CI_Model

	private $table = "play_result";


	function get($game_id,$member_id){
		return $this->db->get_where($this->table, array("game_id"=>$game_id,"member_id"=>$member_id));
	}

	function hasGameSave($game_id, $member_id){
		$query = $this->db->get_where($this->table, array("game_id"=>$game_id,"member_id"=>$member_id));
		if($query->num_rows() > 0){
			return true;
		}
		return false;
	}


	function getGameResultByPoint($point)
	{
		return $this->db->get_where($this->table, array("start_score <= "=>$point,"start_score >= "=>$point));
	}

	function getByGameId($game_id)
	{
		$this->db->order_by("id");
		return $this->db->get_where($this->table, array("game_id"=>$game_id));
	}

	function delete($game_id){
		return $this->db->delete($this->table, array("game_id"=>$game_id));
	}


	function save($game_id, $member_id,$data){
		//$data["status"] = "create";

		if(!$this->hasGameSave($game_id, $member_id)){
			$data["member_id"] = $member_id;
			$data["game_id"] = $game_id;
			$this->db->set("create_date","now()",false);
			$this->db->insert($this->table, $data);
			return $this->db->insert_id();
		}else{
			$where["member_id"] = $member_id;
			$where["game_id"] = $game_id;
			$this->db->where($where);

			$this->db->update($this->table, $data);
			return $this->db->insert_id();
		}

	}

	function save_batch($data){
		//$data["status"] = "create";

		$this->db->insert_batch($this->table, $data);
	}

	function update($data,$id){
		$this->db->set("update_date","now()",false);
		$this->db->where(array("id"=>$id));
		$this->db->update($this->table, $data);
		return $this->db->insert_id();
	}


}
