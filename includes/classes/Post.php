<?php
	/**
	class Post {
		private $username;
		private $conn;
		__construct($conn, $username) 									: construct post object for given username
		addPost( $user_to, $body, $target_file='') 			: insert post by the user
		getPost($post_id)																: get the post by its id
		deletePost($post_id) 														: delete post
		deleteAllPosts() 																: delete all post for user
		loadAllPosts($last_post_id, $limit)  						: load posts, where post_id< given post_id and specific limit 
		loadUserProfilePosts($last_post_id, $limit) 		: load posts, for current login user 
		loadProfilePosts($last_post_id, $name, $limit)  : load posts, of a particular user
	}
	*/
	class Post {
		private $username;
		private $conn;

		public function __construct($conn, $username){
			$this->conn = $conn;
			$this->username = $username;
		}

		public function addPost( $user_to, $body, $target_file='') {
			$query = mysqli_query($this->conn, "INSERT INTO posts VALUES (DEFAULT, '$this->username', '$user_to', '$body', '$target_file', DEFAULT, DEFAULT)");
			return mysqli_insert_id($this->conn);
		}

		public function getPost($post_id) {
			$query = mysqli_query($this->conn, "SELECT * FROM posts WHERE id='$post_id' AND deleted=0");
			return $query;
		}

		public function deletePost($post_id) {
			$query = mysqli_query($this->conn, "UPDATE posts SET deleted=1 WHERE post_id='$post_id'");
		}

		public function deleteAllPosts() {
			$query = mysqli_query($this->conn, "UPDATE posts SET deleted=1 WHERE user_to='$this->username' OR user_from='$this->username'");
		}

		public function loadAllPosts($last_post_id, $limit) {
			if ( $last_post_id == 0 ){
				$query = mysqli_query($this->conn, "SELECT * FROM posts WHERE deleted=0 ORDER BY post_id DESC LIMIT $limit");
			} else {
				$query = mysqli_query($this->conn, "SELECT * FROM posts WHERE post_id<'$last_post_id' AND deleted=0 ORDER BY post_id DESC LIMIT $limit");
			}
			return $query;
		}

		public function loadUserProfilePosts($last_post_id, $limit) {
			if ( $last_post_id == 0 ){
				$query = mysqli_query($this->conn, "SELECT * FROM posts WHERE deleted=0 AND (user_from='$this->username' OR user_to='$this->username') ORDER BY post_id DESC LIMIT $limit");
			} else {
				$query = mysqli_query($this->conn, "SELECT * FROM posts WHERE post_id<'$last_post_id' AND deleted=0 AND (user_from='$this->username' OR user_to='$this->username') ORDER BY post_id DESC LIMIT $limit");
			}
			return $query;
		}

		public function loadProfilePosts($last_post_id, $name, $limit) {
			if ( $last_post_id == 0 ){
				$query = mysqli_query($this->conn, "SELECT * FROM posts WHERE deleted=0 AND ((user_from='$this->username' AND user_to='$name') OR (user_from='$name' AND (user_to='' OR user_to='$this->username'))) ORDER BY post_id DESC LIMIT $limit");
			} else {
				$query = mysqli_query($this->conn, "SELECT * FROM posts WHERE post_id<'$last_post_id' AND deleted=0 AND ((user_from='$this->username' AND user_to='$name') OR (user_from='$name' AND (user_to='' OR user_to='$this->username'))) ORDER BY post_id DESC LIMIT $limit");
			}
			return $query;
		}
	}
?>