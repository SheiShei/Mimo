<?php

class getposts extends CI_Model {
    

	public function readthoughts($userid=null){

		$this->db->select('users.picture,posts.id, posts.likes, posts.comments, posts.posted_at,users.username, thoughts.body')
				->from('posts')
				->join('thoughts', 'thoughts.post_id = posts.id')
				->join('users', 'users.id = posts.user_id')
				->where('posts.user_id',' '.$userid.' ')
				->where('posts.type',1)
				->order_by('posts.posted_at', 'DESC');

		$query=$this->db->get();

		return $query->result_array();		
	}
	public function readaudios($userid=null){

		$this->db->select('users.picture,posts.id, posts.likes, posts.comments, posts.posted_at,users.username, audios.title,audios.genre,audios.cover,audios.path,audios.about,audios.views')
				->from('posts')
				->join('audios', 'audios.post_id = posts.id')
				->join('users', 'users.id = posts.user_id')
				->where('posts.user_id',' '.$userid.' ')
				->where('posts.type',2)
				->order_by('posts.posted_at', 'DESC');

				//SELECT `users`.`picture`, `posts`.`id`, `posts`.`likes`, `posts`.`comments`, `posts`.`posted_at`, `users`.`username`, audios.title,audios.genre,audios.cover
				// FROM `posts`
				// JOIN audios ON `audios`.`post_id` = `posts`.`id`
				// JOIN `users` ON `users`.`id` = `posts`.`user_id`
				// WHERE users.id = 1
				// AND posts.type = 2
				// ORDER BY `posts`.`posted_at` DESC

		$query=$this->db->get();

		return $query->result_array();		
	}
	public function readvideos($userid=null){

		$this->db->select('users.picture,posts.id, posts.likes, posts.comments, posts.posted_at,users.username, videos.url,videos.description,videos.name,videos.plays')
				->from('posts')
				->join('videos', 'videos.post_id = posts.id')
				->join('users', 'users.id = posts.user_id')
				->where('posts.user_id',' '.$userid.' ')
				->where('posts.type',3)
				->order_by('posts.posted_at', 'DESC');

		$query=$this->db->get();

		return $query->result_array();		
	}
	public function allposts($userid=null){

		$this->db->select('users.picture,posts.id, posts.type, posts.likes, posts.comments, posts.posted_at,users.username, thoughts.body, audios.title,audios.genre,audios.cover,audios.path,audios.about,audios.views,videos.url,videos.description,videos.name,videos.plays')
				->from('posts')
				->join('thoughts', 'thoughts.post_id = posts.id','left')
				->join('videos', 'videos.post_id = posts.id','left')
				->join('audios', 'audios.post_id = posts.id','left')
				->join('followers', 'followers.user_id = posts.user_id', 'left')
				->join('users','users.id = posts.user_id')
				->where('followers.follower_id',$userid)
				// ->or_where('posts.user_id',$userid)
				->order_by('posts.posted_at', 'DESC');

		$query=$this->db->get();

		return $query->result_array();	
	}
	public function newthoughts($postid=null){

		$this->db->select('users.picture,posts.id, posts.likes, posts.comments, posts.posted_at,users.username, thoughts.body')
				->from('posts')
				->join('thoughts', 'thoughts.post_id = posts.id')
				->join('users', 'users.id = posts.user_id')
				->where('posts.id',' '.$postid.' ');

		$query=$this->db->get();

		return $query->result_array();		
	}

	public function newaudios($postid=null){

		$this->db->select('users.picture,posts.id, posts.likes, posts.comments, posts.posted_at,users.username, audios.title,audios.genre,audios.cover,audios.path,audios.about')
				->from('posts')
				->join('audios', 'audios.post_id = posts.id')
				->join('users', 'users.id = posts.user_id')
				->where('posts.id',' '.$postid.' ');

		$query=$this->db->get();

		return $query->result_array();		
	}
	public function newvideos($userid=null){

		$this->db->select('users.picture,posts.id, posts.likes, posts.comments, posts.posted_at,users.username, videos.url,videos.description,videos.name')
				->from('posts')
				->join('videos', 'videos.post_id = posts.id')
				->join('users', 'users.id = posts.user_id')
				->where('posts.user_id',' '.$userid.' ');

		$query=$this->db->get();

		return $query->result_array();		
	}
	public function getcollections($userid){
		$this->db->select('collections.id,collections.name,users.username')
			->from('collections')
			->join('users','users.id = collections.user_id')
			->where('collections.user_id',$userid);

			$query=$this->db->get();

		return $query->result_array();		

	}
	public function getcollectionsonglists($postid){
		$this->db->select('collection_songs.id,collection_songs.post_id,posts.posted_at,audios.title,audios.genre,audios.cover,audios.path,posts.user_id')
			->from('collection_songs')
			->join('posts','posts.id = collection_songs.post_id')
			->join('audios','audios.post_id = collection_songs.post_id')
			->where('collection_songs.collection_id',$postid);

			$query=$this->db->get();

		return $query->result_array();
	}

	public function getcolsong($colid){
		$this->db->select('collection_songs.id,collection_songs.post_id,posts.posted_at,audios.title,audios.genre,audios.cover,audios.path,posts.user_id')
			->from('collection_songs')
			->join('posts','posts.id = collection_songs.post_id')
			->join('audios','audios.post_id = collection_songs.post_id')
			->where('collection_songs.collection_id',$colid);

			$query=$this->db->get();

		return $query->result_array();
	}

}
