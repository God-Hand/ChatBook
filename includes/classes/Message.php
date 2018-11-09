<?php
	class Message {
		private $username;
		private $conn;

		// create message object for username
		public function __construct($conn, $username){
			$this->conn = $conn;
			$this->username = $username;
		}

		// send message to a particular user
		public function sendMessage($user_to, $body) {
			$query = mysqli_query($this->conn, "INSERT INTO messages VALUES (default, '$this->username', '$user_to', '$body', default, default, default, default)");
			return mysqli_insert_id($conn);
		}

		// return messages between user and other
		public function getMessages($user_from, $last_message_id, $limit) {
			if ($last_message_id==0) {
				$query = mysqli_query($this->conn, "SELECT * FROM messages WHERE deleted=0 AND ((user_to='$this->username' AND user_from='$user_from') OR (user_from='$this->username' AND user_to='$user_from')) ORDER BY message_id DESC LIMIT $limit");
			} else {
				$query = mysqli_query($this->conn, "SELECT * FROM messages WHERE message_id<'last_message_id' AND deleted=0 AND ((user_to='$this->username' AND user_from='$user_from') OR (user_from='$this->username' AND user_to='$user_from')) ORDER BY message_id DESC LIMIT $limit");
			}
			return $query;
		}

		// return latest messages between user and other
		public function getLatestMessages($user_from, $last_message_id) {
			$query = mysqli_query($this->conn, "SELECT * FROM messages WHERE message_id>'$last_message_id' AND deleted=0 AND ((user_to='$this->username' AND user_from='$user_from') OR (user_from='$this->username' AND user_to='$user_from'))");
			return $query;
		}

		// return new messages count
		public function getNewMessagesCount() {
			$query = mysqli_query($this->conn, "SELECT * FROM messages WHERE user_to='$this->username' AND deleted=0 AND viewed=0");
			return mysqli_num_rows($query);
		}

		// return new messages count
		public function getNewMessagesCountUserFrom($user_from) {
			$query = mysqli_query($this->conn, "SELECT * FROM messages WHERE user_to='$this->username' AND user_from='$user_from' AND deleted=0 AND viewed=0");
			return mysqli_num_rows($query);
		}

		// view a message by it's message_id
		public function viewMessage($message_id) {
			$query = mysqli_query($this->conn, "UPDATE messages SET viewed=1 WHERE message_id='$message_id'");
		}

		// view all messages of a user
		public function viewMessages($user_from) {
			$query = mysqli_query($this->conn, "UPDATE messages SET viewed=1 WHERE user_to='$this->username' AND user_from='$user_from'");
		}

		// delete a message of a user
		public function deleteMessage($message_id) {
			$query = mysqli_query($this->conn, "UPDATE messages SET deleted=1 WHERE message_id='$message_id'");
		}

		// delete all messages of a user
		public function deleteMessages($user_to) {
			$query = mysqli_query($this->conn, "UPDATE messages SET deleted=1 WHERE user_from='$this->username' AND user_to='$user_to'");
		}

		// delete all messages of a user
		public function deleteAllMessages(){
			$query = mysqli_query($this->conn, "UPDATE messages SET deleted=1 WHERE user_from='$this->username' OR user_to='$this->username'");
		}
	}
?>