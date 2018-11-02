<?php
	class Comment {
		private $username;
		private $conn;

		// construct comment object for given username
		public function __construct($conn, $username) {
			$this->conn = $conn;
			$this->username = $username;
		}

		// insert comment by the user
		public function addComment( $body, $post_id) {
			$query = mysqli_query($this->conn, "INSERT INTO comments VALUES (default, '$this->username', '$body', DEFAULT, DEFAULT, DEFAULT, '$post_id')");
		}

		// get the comment by its id
		public function getComment($comment_id) {
			$query = mysqli_query($this->conn, "SELECT * FROM comments WHERE comment_id='$comment_id' AND  deleted=0 AND user_closed=0");
			return $query;
		}

		// delete comment
		public function deleteComment($comment_id) {
			$query = mysqli_query($this->conn, "UPDATE comments SET deleted=1 WHERE comment_id='$comment_id'");
		}

		// delete comment
		public function deleteComments($post_id) {
			$query = mysqli_query($this->conn, "UPDATE comments SET deleted=1 WHERE post_id='$post_id'");
		}

		// return those comments, which are commented_by user
		public function loadUserComments() {
			$query = mysqli_query($this->conn, "SELECT * FROM comments WHERE commented_by='$this->username' AND deleted=0 ORDER BY comment_id DESC");
			return $query;
		}

		// load posts, where comment_id< given comment_id and post_id=$post_id , limit='$limit'
		public function loadAllComments($post_id, $last_comment_id, $limit) {
			if ( $last_comment_id == 0 ){
				$query = mysqli_query($this->conn, "SELECT * FROM comments WHERE post_id='$post_id' AND deleted=0 AND user_closed=0 ORDER BY comment_id DESC LIMIT $limit");
			} else {
				$query = mysqli_query($this->conn, "SELECT * FROM comments WHERE comment_id<'$last_comment_id' AND post_id='$post_id' AND deleted=0 AND user_closed=0 ORDER BY comment_id DESC LIMIT $limit");
			}
			return $query;
		}

		// return number of comments by the user
		public function getNumOfComments($post_id) {
			$query = mysqli_query($this->conn, "SELECT * FROM comments WHERE commented_by='$this->username' AND post_id='$post_id' AND deleted=0 AND user_closed=0");
			return mysqli_num_rows($query);
		}

		// return post_id for a comment_id
		public function getCommentPostId($comment_id){
			$query = mysqli_query($this->conn, "SELECT post_id FROM comments WHERE comment_id='$comment_id'");
			$row = mysqli_fetch_array($query);
			return $row['post_id'];
		}
	}
?>