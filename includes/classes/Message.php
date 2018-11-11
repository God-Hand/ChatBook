<?php
	/**
	class Message {
		private $username;
		private $conn;

		__construct($conn, $username) 										: create message object for username
		sendMessage($user_to, $body)											: send message to a particular user
		getMessages($user_from, $last_message_id, $limit) : return messages between user and other
		getLatestMessages($user_from, $last_message_id) 	: return latest messages between user and other
		deleteMessage($message_id)												: delete a message of a user
		deleteAllMessagesTo($user_to) 										: delete all messages of a user to user_to
		deleteAllMessages() 															: delete all messages of a user
	}
	*/
	class Message {
		private $username;
		private $conn;

		public function __construct($conn, $username){
			$this->conn = $conn;
			$this->username = $username;
		}

		public function sendMessage($user_to, $body) {
			$query = mysqli_query($this->conn, "INSERT INTO messages VALUES (default, '$this->username', '$user_to', '$body', default, default)");
		}

		public function getMessages($user_from, $last_message_id, $limit) {
			if ($last_message_id==0) {
				$query = mysqli_query($this->conn, "SELECT * FROM messages WHERE deleted=0 AND ((user_to='$this->username' AND user_from='$user_from') OR (user_from='$this->username' AND user_to='$user_from')) ORDER BY message_id DESC LIMIT $limit");
			} else {
				$query = mysqli_query($this->conn, "SELECT * FROM messages WHERE deleted=0 AND message_id<'$last_message_id' AND ((user_to='$this->username' AND user_from='$user_from') OR (user_from='$this->username' AND user_to='$user_from')) ORDER BY message_id DESC LIMIT $limit");
			}
			return $query;
		}

		public function getLatestMessages($user_from, $last_message_id) {
			$query = mysqli_query($this->conn, "SELECT * FROM messages WHERE message_id>'$last_message_id' AND deleted=0 AND ((user_to='$this->username' AND user_from='$user_from') OR (user_from='$this->username' AND user_to='$user_from'))");
			return $query;
		}

		public function deleteMessage($message_id) {
			$query = mysqli_query($this->conn, "UPDATE messages SET deleted=1 WHERE message_id='$message_id'");
		}

		public function deleteAllMessagesTo($user_to) {
			$query = mysqli_query($this->conn, "UPDATE messages SET deleted=1 WHERE user_from='$this->username' AND user_to='$user_to'");
		}

		public function deleteAllMessages(){
			$query = mysqli_query($this->conn, "UPDATE messages SET deleted=1 WHERE user_from='$this->username' OR user_to='$this->username'");
		}
	}
?>