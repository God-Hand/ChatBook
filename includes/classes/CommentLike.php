<?php
	class CommentLike {
		private $conn;
		private $username;

		// create commentLike object to like and dislike operation
		function __construct($conn, $username) {
			$this->conn = $conn;
			$this->username = $username;
		}

		// get comment likes 
		public function commentLikesCount($comment_id) {
			$query = mysqli_query($this->conn, "SELECT * FROM comment_likes WHERE comment_id='$comment_id' AND liked=1");
			return mysqli_num_rows($query);
		}

		// check wheather user likes the comment or not
		public function isUserLikeComment($comment_id) {
			$query = mysqli_query($this->conn, "SELECT liked FROM comment_likes WHERE comment_id='$comment_id' AND username='$this->username'");
			if (mysqli_num_rows($query) != 0) {
				$row = mysqli_fetch_array($query);
				return $row['liked'];
			}
			return 0;
		}

		// delete the previous like by user where comment_id = '$comment_id'
		public function deletePreviousLike($comment_id) {
			$delete_query = mysqli_query($this->conn, "DELETE FROM comment_likes WHERE comment_id='$comment_id AND username='$this->username'");
		}

		// like the given comment_id
		public function likeTheComment($comment_id) {
			deletePreviousLike($comment_id);
			$insert_query = mysqli_query($this->conn, "INSERT INTO comment_likes Values ('$this->username', 0,'$comment_id')");
		}

		// unlike the given comment_id 
		public function unLikeTheComment($comment_id) {
			deletePreviousLike($comment_id);
			$insert_query = mysqli_query($this->conn, "INSERT INTO comment_likes Values ('$this->username', 1,'$comment_id')");
		}
	}
?>