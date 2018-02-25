<?php

class notif extends CI_Model {
    
	public function notifpost($postid=null){

		$this->db->select('users.picture,posts.id, posts.type, posts.likes, posts.comments, posts.posted_at,users.username, thoughts.body, audios.title,audios.genre,audios.cover,audios.path,audios.about,videos.url,videos.description,videos.name')
				->from('posts')
				->join('thoughts', 'thoughts.post_id = posts.id','left')
				->join('videos', 'videos.post_id = posts.id','left')
				->join('audios', 'audios.post_id = posts.id','left')
				->join('users','users.id = posts.user_id')
				->where('posts.id',$postid);

		$query=$this->db->get();

		return $query->result_array();	
	}
	public function notif($postid=null){

		$this->db->select('posts.user_id AS receiver, post_likes.user_id AS sender')
				->from('posts')
				->join('post_likes', 'post_likes.post_id = posts.id')
				->where('posts.id',$postid);

		$query=$this->db->get();

		return $query->result_array();	
	}
	public function cnotif($postid=null){

		$this->db->select('posts.user_id AS receiver, comments.user_id AS sender')
				->from('posts')
				->join('comments', 'comments.post_id = posts.id')
				->where('posts.id',$postid);

		$query=$this->db->get();

		return $query->result_array();	
	}
	public function create($data){
		$this->db->insert('notifications', $data);
		return TRUE;	
	}
	public function getnotif($userid){
		$this->db->select('notifications.id,notifications.status,notifications.sender, notifications.type, notifications.post_id,notifications.notifurl,notifications.date, users.username,users.picture')
				->from('notifications')
				->join('users', 'users.id = notifications.sender')
				->where('notifications.receiver',$userid)
				->order_by('notifications.date', 'ASC');

		$query=$this->db->get();

		return $query->result_array();
	}
}
