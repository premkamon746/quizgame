<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member_Md extends CI_Model { // คลาส Model_template สืบทอดคุณสมบัติของ CI_Model

	private $table = "member";

	function save($data){
		$data["status"] = "active";
		$this->db->set("create_date","now()",false);
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	/*function getByFacebookID($fbid){
		return $this->db->get_where($this->table,array("fbid"=>$fbid, "status"=>"active"));
	}

	function getByID($id){
		return $this->db->get_where($this->table,array("id"=>$id, "status"=>"active"));
	}*/

      function getMemberInfo($fbid){
		$result = $this->db->get_where($this->table,array("fbid"=>$fbid));
		return $result;
	}

	function isFbIDExists($fbid){
		$result = $this->db->get_where($this->table,array("fbid"=>$fbid));
		if($result->num_rows() > 0){
			return $result->row()->id;
		}
		return false;
	}

	function isEmailExists($email){
		$result = $this->db->get_where($this->table,array("email"=>$email));
		if($result->num_rows() > 0){
			return true;
		}
	}

}
