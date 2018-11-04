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
		public function addPost( $user_to, $body) {
			$query = mysqli_query($this->conn, "INSERT INTO posts VALUES (DEFAULT, '$this->username', '$user_to', '$body', '', DEFAULT, DEFAULT, DEFAULT)");
			return mysqli_insert_id($this->conn);
		}

		public function uploadImage($post_id, $file) {
		  $temp = explode(".", $file["name"]);
		  $target_dir = "assets/images/post_pics/";
		  $newfilename = $this->username . round(microtime(true)) . '.' . end($temp);
		  $target_file = $target_dir . basename($newfilename);
		  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		  if ($file["size"] > 200000) {
		    return "Sorry, your file is too large.";
		  }
		  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
		    return "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		  }

		  // if everything is ok, try to upload file
		  if (move_uploaded_file($file["tmp_name"], $target_file)) {
		  	$query = mysqli_query($this->conn, "UPDATE posts SET image='$target_file' WHERE post_id='$post_id'");
		  	if ($query) {
		    	return "The file ". $file["name"]. " has been uploaded.";
		    }
		  }
		  return "Sorry, there was an error while uploading your file.";
		}

		// delete empty body and null image post
		public function deleteWastePost($post_id){
			$query = mysqli_query($this->conn, "DELETE FROM posts WHERE post_id='$post_id'");
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

		// return those posts, which are either user_from or user_to username
		public function loadUserPosts() {
			if ( $last_post_id == 0 ){
				$query = mysqli_query($this->conn, "SELECT * FROM posts WHERE (user_from='$this->username' OR user_to='$this->username') AND deleted=0 AND user_closed=0 ORDER BY post_id DESC LIMIT $limit");
			} else {
				$query = mysqli_query($this->conn, "SELECT * FROM posts WHERE post_id<'$last_post_id' AND (user_from='$this->username' OR user_to='$this->username') AND deleted=0 AND user_closed=0 ORDER BY post_id DESC LIMIT $limit");
			}
			return $query;
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

		// return wheather there are more posts or not
		public function haveMorePosts($last_post_id) {
			$query = mysqli_query($this->conn, "SELECT * FROM posts WHERE post_id<'$last_post_id' AND deleted=0 AND user_closed=0 ORDER BY post_id DESC");
			if (mysqli_num_rows($query) == 0){
				return false;
			} else {
				return true;
			}
		}
	}
?>