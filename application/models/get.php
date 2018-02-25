<?php

class get extends CI_Model {
	
	public function create($table,$data){
		$this->db->insert($table, $data);
		return TRUE;	
	}
	
	public function read($table, $condition=null,$selector=null){
		if($selector==null) $selector = '*';
		$this->db->select($selector);
		$this->db->from($table);	
		if( isset($condition) ) $this->db->where($condition);
		$query=$this->db->get();

		return $query->result_array();		
	}
	
	public function update($table, $data,$condition){
		$this->db->where($condition);
		$this->db->update($table, $data);
		return TRUE;	
	}
	
	public function del($table, $data){
		$this->db->where($data);
		$this->db->delete($table);
		return TRUE;	
	}
	public function id(){
		$id = $this->db->insert_id();
		return $id;	
	}
}
