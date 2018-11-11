<?php
	/**
	class CommentLike {
		private $conn;
		private $username;
		__construct($conn, $username) 			: create commentLike object to like and dislike operation
		commentLikesCount($comment_id) 			: get comment likes 
		isUserLikeComment($comment_id) 			: check wheather user likes the comment or not
		deleteAllLikes()										: delete like by user
		likeTheComment($comment_id, $value) : like the given comment_id
	}
	*/
	class CommentLike {
		private $conn;
		private $username;

		function __construct($conn, $username) {
			$this->conn = $conn;
			$this->username = $username;
		}

		public function commentLikesCount($comment_id) {
			$query = mysqli_query($this->conn, "SELECT count(*) as commentlikecount FROM comment_likes WHERE comment_id='$comment_id' AND liked=1");
			$row = mysqli_fetch_array($query);
			return $row['commentlikecount'];
		}

		public function isUserLikeComment($comment_id) {
			$query = mysqli_query($this->conn, "SELECT liked FROM comment_likes WHERE comment_id='$comment_id' AND username='$this->username'");
			if (mysqli_num_rows($query) != 0) {
				$row = mysqli_fetch_array($query);
				return $row['liked'];
			}
			return 0;
		}

		public function deleteAllLikes(){
			$query = mysqli_query($this->conn, "DELETE FROM comment_likes WHERE username='$this->username'");
		}

		public function likeTheComment($comment_id, $value) {
			$delete_query = mysqli_query($this->conn, "DELETE FROM comment_likes WHERE comment_id='$comment_id' AND username='$this->username'");
			$insert_query = mysqli_query($this->conn, "INSERT INTO comment_likes Values ('$this->username', '$value','$comment_id')");
		}
	}
?>