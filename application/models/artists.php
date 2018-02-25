<?php

class artists extends CI_Model {
	public function mimoartists(){

		$this->db->select('users.id,users.username,users.picture, about.followers')
				->from('about')
				->join('users', 'users.id = about.user_id')
				->order_by('about.followers', 'DESC')
				->limit(10);
		$query=$this->db->get();

		return $query->result_array();		
	}
	
	
}
