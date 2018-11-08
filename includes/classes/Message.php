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
				$query = mysqli_query($this->conn, "SELECT * FROM messages WHERE (user_to='$this->username' AND user_from='$user_from') OR (user_from='$this->username' AND user_to='$user_from')  AND deleted=0 ORDER BY message_id DESC LIMIT $limit");
			} else {
				$query = mysqli_query($this->conn, "SELECT * FROM messages WHERE message_id<'last_message_id' AND (user_to='$this->username' AND user_from='$user_from') OR (user_from='$this->username' AND user_to='$user_from')  AND deleted=0 ORDER BY message_id DESC LIMIT $limit");
			}
			return $query;
		}

		// return latest messages between user and other
		public function getLatestMessages($user_from, $last_message_id) {
			$query = mysqli_query($this->conn, "SELECT * FROM messages WHERE message_id>'$last_message_id' AND (user_to='$this->username' AND user_from='$user_from') OR (user_from='$this->username' AND user_to='$user_from')  AND deleted=0");
			return $query;
		}

		// return username array, to whom user interact
		public function getMessageSendersArray() {
			$senders = array();
			$query = mysqli_query($this->conn, "SELECT DISTINCT user_from FROM messages WHERE user_to='$this->username' OR user_from='$this->username' ORDER BY message_id DESC");
			while($row = mysqli_fetch_array($query)) {
				array_push($senders, $row['user_from']);
			}
			return $senders;
		}

		// return unreaded messages count
		public function getUnreadMessagesCount() {
			$query = mysqli_query($this->conn, "SELECT * FROM messages WHERE user_to='$this->username' AND deleted=0 AND  opened=0");
			return mysqli_num_rows($query);
		}

		// return new messages count
		public function getNewMessagesCount() {
			$query = mysqli_query($this->conn, "SELECT * FROM messages WHERE user_to='$this->username' AND deleted=0 AND viewed=0");
			return mysqli_num_rows($query);
		}

		// return new messages count
		public function getNewMessagesCountFromUser($user_from) {
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

		// read a message of a user
		public function readMessage($message_id) {
			$query = mysqli_query($this->conn, "UPDATE messages SET opened=1 WHERE message_id='$message_id'");
		}

		// read all messages of a user
		public function readMessages($user_from) {
			$query = mysqli_query($this->conn, "UPDATE messages SET opened=1 WHERE user_to='$this->username' AND user_from='$user_from'");
		}

		// delete a message of a user
		public function deleteMessage($message_id) {
			$query = mysqli_query($this->conn, "UPDATE messages SET deleted=1 WHERE message_id='$message_id'");
		}

		// delete all messages of a user
		public function deleteMessages($user_to) {
			$query = mysqli_query($this->conn, "UPDATE messages SET deleted=1 WHERE user_from='$this->username' AND user_to='$user_to'");
		}
	}
?>