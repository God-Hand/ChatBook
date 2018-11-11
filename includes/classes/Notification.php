<?php
	/**
	class Notification {
		private $username;
		private $conn;
		__construct($conn, $username) 			: construct notification object for username to send notifications
		getUnreadNotificationsCount() 			: return numbers of unread notifications
		getNotifications($last_id, $limit) 	: return all notifications
		sendNotification($user_to, $notification_body, $type, $link) : send notification to user_to
		deleteNotification($id)							: delete notification
		deleteNotifications($post_id) 			: delete notification
		readAllNotifications($first) 				: set all notifications as readed
		deleteAllNotifications() 						: delete all notifications
	}
	*/
	class Notification {
		private $username;
		private $conn;

		public function __construct($conn, $username){
			$this->conn = $conn;
			$this->username = $username;
		}
		
		public function getUnreadNotificationsCount() {
			$query = mysqli_query($this->conn, "SELECT * FROM notifications WHERE user_to='$this->username' AND viewed=0 AND deleted=0");
			return mysqli_num_rows($query);
		}
		
		public function getNotifications($last_id, $limit) {
			if ($last_id==0) {
				$query = mysqli_query($this->conn, "SELECT * FROM notifications WHERE user_to='$this->username' AND deleted=0 ORDER BY id DESC LIMIT $limit");
			} else {
				$query = mysqli_query($this->conn, "SELECT * FROM notifications WHERE id<'$last_id' AND user_to='$this->username' AND deleted=0 ORDER BY id DESC LIMIT $limit");
			}
			return $query;
		}

		public function sendNotification($user_to, $notification_body, $type, $link) {
			$query = mysqli_query($this->conn, "INSERT INTO notifications (user_from, user_to, type, notification_body, link) VALUES ('$this->username', '$user_to', '$type', '$notification_body', '$link')");
		}

		public function deleteNotification($id) {
			$query = mysqli_query($this->conn, "UPDATE notifications SET deleted=1 WHERE id='$id'");
			return $query;
		}

		public function deleteNotifications($post_id) {
			$link = "&post_id=" . $post_id;
			$query = mysqli_query($this->conn, "UPDATE notifications SET deleted=1 WHERE link LIKE '%$link%' and deleted=0");
			return $query;
		}

		public function readAllNotifications($first) {
			$query = mysqli_query($this->conn, "UPDATE notifications SET viewed=1 WHERE user_to='$this->username' AND deleted=0 AND id<='$first'");
			return $query;
		}

		public function deleteAllNotifications() {
			$query = mysqli_query($this->conn, "UPDATE notifications SET deleted=1 WHERE user_to='$this->username' OR  user_from='$this->username' AND deleted=0");
			return $query;
		}
	}
?>