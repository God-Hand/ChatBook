<?php
	/**
	class PostLike {
		private $conn;
		private $username;
		__construct($conn, $username) : create postLike object to like and dislike operation
		postLikesCount($post_id) 			: get post likes 
		isUserLikePost($post_id) 			: check wheather user likes the post or not
		deleteAllLikes() 							: delete like by user
		likeThePost($post_id, $value) : like the given post_id
	}
	*/
	class PostLike {
		private $conn;
		private $username;

		function __construct($conn, $username) {
			$this->conn = $conn;
			$this->username = $username;
		}

		public function postLikesCount($post_id) {
			$query = mysqli_query($this->conn, "SELECT count(*) as postlikescount FROM post_likes WHERE post_id='$post_id' AND liked=1");
			$row = mysqli_fetch_array($query);
			return $row['postlikescount'];
		}

		public function isUserLikePost($post_id) {
			$query = mysqli_query($this->conn, "SELECT liked FROM post_likes WHERE post_id='$post_id' AND username='$this->username'");
			if (mysqli_num_rows($query) != 0) {
				$row = mysqli_fetch_array($query);
				return $row['liked'];
			}
			return 0;
		}

		public function deleteAllLikes(){
			$query = mysqli_query($this->conn, "DELETE FROM post_likes WHERE username='$this->username'");
		}

		public function likeThePost($post_id, $value) {
			$delete_query = mysqli_query($this->conn, "DELETE FROM post_likes WHERE post_id='$post_id' AND username='$this->username'");
			$insert_query = mysqli_query($this->conn, "INSERT INTO post_likes Values ('$this->username', '$value','$post_id')");
		}
	}
?>