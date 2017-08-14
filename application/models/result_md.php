<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Result_Md extends CI_Model { // คลาส Model_template สืบทอดคุณสมบัติของ CI_Model

	private $table = "result";


	function get($id){
		return $this->db->get_where($this->table, array("id"=>$id));
	}

	function getByGameId($game_id){
		$this->db->order_by("id");
		return $this->db->get_where($this->table, array("game_id"=>$game_id));
	}

	function delete($game_id){
		return $this->db->delete($this->table, array("game_id"=>$game_id));
	}


	function save($data){
		//$data["status"] = "create";
		$data["member_id"] = $this->session->userdata("member_id");
		$this->db->set("create_date","now()",false);
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
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