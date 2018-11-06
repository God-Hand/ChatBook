<?php
	class Post {
		private $username;
		private $conn;

		// construct post object for given username
		public function __construct($conn, $username){
			$this->conn = $conn;
			$this->username = $username;
		}

		// insert post by the user
		public function addPost( $user_to, $body, $target_file='') {
			$query = mysqli_query($this->conn, "INSERT INTO posts VALUES (DEFAULT, '$this->username', '$user_to', '$body', '$target_file', DEFAULT, DEFAULT, DEFAULT)");
		}

		// get the post by its id
		public function getPost($post_id) {
			$query = mysqli_query($this->conn, "SELECT * FROM posts WHERE id='$post_id'  AND deleted=0 AND user_closed=0");
			return $query;
		}

		// delete post
		public function deletePost($post_id) {
			$query = mysqli_query($this->conn, "UPDATE posts SET deleted=1 WHERE post_id='$post_id'");
		}

		// load posts, where post_id< given post_id and specific limit 
		public function loadAllPosts($last_post_id, $limit) {
			if ( $last_post_id == 0 ){
				$query = mysqli_query($this->conn, "SELECT * FROM posts WHERE deleted=0 AND user_closed=0 ORDER BY post_id DESC LIMIT $limit");
			} else {
				$query = mysqli_query($this->conn, "SELECT * FROM posts WHERE post_id<'$last_post_id' AND deleted=0 AND user_closed=0 ORDER BY post_id DESC LIMIT $limit");
			}
			return $query;
		}
	}
?>