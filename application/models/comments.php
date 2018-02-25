<?php

class comments extends CI_Model {
    
	private $table = "comments";
	
	public function create($data){
		$this->db->insert($this->table, $data);
		return TRUE;	
	}
	public function getcom($postid){

		$this->db->select('comments.comment, users.username, users.picture, comments.posted_at')
				->from('comments')
				->join('users', 'users.id = comments.user_id','left')
				->where('comments.post_id',$postid)
				->order_by('comments.posted_at', 'DESC');

		$query=$this->db->get();

		return $query->result_array();		

		// SELECT comments.comment, users.username, comments.posted_at FROM comments LEFT JOIN users ON users.id = comments.user_id WHERE comments.post_id = 28
	}
	public function aftercom($postid){

		$this->db->select('comments.comment, users.username, users.picture, comments.posted_at, posts.comments,posts.id')
				->from('comments')
				->join('users', 'users.id = comments.user_id','left')
				->join('posts', 'posts.id = comments.post_id','left')
				->where('comments.id',$postid);

		$query=$this->db->get();

		return $query->result_array();		

		// SELECT comments.comment, users.username, comments.posted_at FROM comments LEFT JOIN users ON users.id = comments.user_id WHERE comments.post_id = 28
	}
	public function c(){
		$id = $this->db->insert_id();
		return $id;	
	}
}
