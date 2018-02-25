<?php

class getSearch extends CI_Model {
    
	public function getlistsearch($like){
		$this->db->select('username,fullname')
				->from('users')
				->like('username',$like)
				->or_like('fullname',$like)
				->limit(10);

		$query=$this->db->get();

		return $query->result_array();	
	}
	public function getartistsearch($like,$id){
		$this->db->select('users.id,users.username,users.picture,about.career,about.followers')
				->from('users')
				->join('about', 'about.user_id = users.id')
				->like('users.username',$like)
				->or_like('users.fullname',$like);

		$query=$this->db->get();

		return $query->result_array();
	}
	public function getthoughtsearch($like){
		$this->db->select('users.username,users.picture,posts.id,thoughts.body,posts.posted_at,posts.likes,posts.comments')
				->from('posts')
				->join('users', 'users.id = posts.user_id')
				->join('thoughts', 'thoughts.post_id = posts.id')
				->like('users.username',$like)
				->or_like('users.fullname',$like)
				->or_like('thoughts.body', $like)
				->order_by('posts.posted_at', 'DESC');

		$query=$this->db->get();

		return $query->result_array();
	}
	public function getaudiosearch($like){
		$this->db->select('users.picture,users.username,posts.id,posts.posted_at,posts.likes,posts.comments,audios.about,audios.cover,audios.title,audios.path,audios.genre,audios.views')
				->from('posts')
				->join('users', 'users.id = posts.user_id')
				->join('audios', 'audios.post_id = posts.id')
				->like('users.username',$like)
				->or_like('users.fullname',$like)
				->or_like('audios.about', $like)
				->or_like('audios.title', $like)
				->order_by('posts.posted_at', 'DESC');

		$query=$this->db->get();

		return $query->result_array();
	}
	public function getvideosearch($like){
		$this->db->select('users.picture,users.username,posts.id,posts.posted_at,posts.likes,posts.comments,videos.description,videos.name,videos.url,videos.plays')
				->from('posts')
				->join('users', 'users.id = posts.user_id')
				->join('videos', 'videos.post_id = posts.id')
				->like('users.username',$like)
				->or_like('users.fullname',$like)
				->or_like('videos.description', $like)
				->or_like('videos.name', $like)
				->order_by('posts.posted_at', 'DESC');

		$query=$this->db->get();

		return $query->result_array();
	}
}
