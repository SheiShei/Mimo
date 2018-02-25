<?php

class getBrowse extends CI_Model {
    
	public function getartistsearch(){
		$this->db->select('users.id,users.username,users.picture,about.career,about.followers')
				->from('users')
				->join('about', 'about.user_id = users.id')
				->order_by('rand()')
				->limit(10);
		$query=$this->db->get();

		return $query->result_array();
	}
	public function getaudiosearch(){
		$this->db->select('users.username,posts.id,posts.posted_at,posts.likes,posts.comments,audios.about,audios.cover,audios.title,audios.path,audios.genre,audios.views')
				->from('posts')
				->join('users', 'users.id = posts.user_id')
				->join('audios', 'audios.post_id = posts.id')
				->order_by('views', 'DESC')
				->limit(10);

		$query=$this->db->get();

		return $query->result_array();
	}
	public function getvideosearch(){
		$this->db->select('users.picture,users.username,posts.id,posts.posted_at,posts.likes,posts.comments,videos.description,videos.name,videos.url,videos.plays')
				->from('posts')
				->join('users', 'users.id = posts.user_id')
				->join('videos', 'videos.post_id = posts.id')
				->order_by('plays', 'DESC')
				->limit(10);

		$query=$this->db->get();

		return $query->result_array();
	}
}
