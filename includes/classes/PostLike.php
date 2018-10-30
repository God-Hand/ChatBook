<?php
	class PostLike {
		private $conn;
		private $username;

		// create postLike object to like and dislike operation
		function __construct($conn, $username) {
			$this->conn = $conn;
			$this->username = $username;
		}

		// get post likes 
		public function postLikesCount($post_id) {
			$query = mysqli_query($this->conn, "SELECT * FROM post_likes WHERE post_id='$post_id' AND liked=1");
			return mysqli_num_rows($query);
		}

		// check wheather user likes the post or not
		public function isUserLikePost($post_id) {
			$query = mysqli_query($this->conn, "SELECT liked FROM post_likes WHERE post_id='$post_id' AND username='$this->username'");
			if (mysqli_num_rows($query) != 0) {
				$row = mysqli_fetch_array($query);
				return $row['liked'];
			}
			return 0;
		}

		// like the given post_id
		public function likeThePost($post_id, $value) {
			$delete_query = mysqli_query($this->conn, "DELETE FROM post_likes WHERE post_id='$post_id' AND username='$this->username'");
			$insert_query = mysqli_query($this->conn, "INSERT INTO post_likes Values ('$this->username', '$value','$post_id')");
		}
	}
?>