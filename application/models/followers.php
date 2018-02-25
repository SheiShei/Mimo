<?php

class followers extends CI_Model {
    
	private $table = "followers";
	
	public function create($data){
		$this->db->insert($this->table, $data);
		return TRUE;	
	}
	
	public function read($userid,$followerid){

		$this->db->select('*')
				 ->from($this->table)
				 ->where('user_id',' '.$userid.' ')
				 ->where('follower_id', ' '.$followerid.' ');

		$query=$this->db->get();

		return $query->result_array();		
	}
	
	public function update($data,$condition){
		$this->db->where($condition);
		$this->db->update($this->table, $data);
		return TRUE;	
	}
	
	public function del($data){
		$this->db->where($data);
		$this->db->delete($this->table);
		return TRUE;	
	}
}
