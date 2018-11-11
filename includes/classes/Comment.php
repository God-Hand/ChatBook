<?php
	/**
	class Comment {
		private $username;
		private $conn;

		__construct($conn, $username) : construct comment object for given username
		addComment( $body, $post_id)  : insert comment by the user
		getComment($comment_id)  			: get the comment by its id
		deleteComment($comment_id) 		: delete comment
		deleteAllComments()  					: delete all comments by user
		deleteComments($post_id) 			: delete comments for a given post_id
		loadUserComments()   					: return those comments, which are commented_by user
		loadAllComments($post_id, $last_comment_id, $limit) : load posts, where comment_id< given comment_id and post_id=$post_id , limit='$limit'
		getNumOfComments($post_id)  	: return number of comments by the user
		getCommentPostId($comment_id) : return post_id for a comment_id
	}
	*/
	class Comment {
		private $username;
		private $conn;

		// construct comment object for given username
		public function __construct($conn, $username) {
			$this->conn = $conn;
			$this->username = $username;
		}

		public function addComment( $body, $post_id) {
			$query = mysqli_query($this->conn, "INSERT INTO comments VALUES (default, '$this->username', '$body', DEFAULT, DEFAULT, '$post_id')");
		}

		public function getComment($comment_id) {
			$query = mysqli_query($this->conn, "SELECT * FROM comments WHERE comment_id='$comment_id' AND  deleted=0");
			return $query;
		}

		public function deleteComment($comment_id) {
			$query = mysqli_query($this->conn, "UPDATE comments SET deleted=1 WHERE comment_id='$comment_id'");
		}

		public function deleteAllComments() {
			$query = mysqli_query($this->conn, "UPDATE comments SET deleted=1 WHERE commented_by='$this->username'");
		}

		public function deleteComments($post_id) {
			$query = mysqli_query($this->conn, "UPDATE comments SET deleted=1 WHERE post_id='$post_id'");
		}

		public function loadUserComments() {
			$query = mysqli_query($this->conn, "SELECT * FROM comments WHERE commented_by='$this->username' AND deleted=0 ORDER BY comment_id DESC");
			return $query;
		}

		public function loadAllComments($post_id, $last_comment_id, $limit) {
			if ( $last_comment_id == 0 ){
				$query = mysqli_query($this->conn, "SELECT * FROM comments WHERE post_id='$post_id' AND deleted=0 ORDER BY comment_id DESC LIMIT $limit");
			} else {
				$query = mysqli_query($this->conn, "SELECT * FROM comments WHERE comment_id<'$last_comment_id' AND post_id='$post_id' AND deleted=0 ORDER BY comment_id DESC LIMIT $limit");
			}
			return $query;
		}

		public function getNumOfComments($post_id) {
			$query = mysqli_query($this->conn, "SELECT count(*) as commentcount FROM comments WHERE post_id='$post_id' AND deleted=0");
			$row = mysqli_fetch_array($query);
			return $row['commentcount'];
		}

		// return post_id for a comment_id
		public function getCommentPostId($comment_id){
			$query = mysqli_query($this->conn, "SELECT post_id FROM comments WHERE comment_id='$comment_id'");
			$row = mysqli_fetch_array($query);
			return $row['post_id'];
		}
	}
?>