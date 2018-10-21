<?php
	class Notification {
		private $username;
		private $conn;

		// construct notification object for username to send notifications
		public function __construct($conn, $username){
			$this->conn = $conn;
			$this->username = $username;
		}
		
		// return numbers of unread notifications
		public function getUnreadNotificationsCount() {
			$query = mysqli_query($this->conn, "SELECT * FROM notifications WHERE user_to='$this->username' AND opened=0 AND deleted=0");
			return mysqli_num_rows($row);
		}

		// return numbers of new notifications
		public function getNewNotificationsCount() {
			$query = mysqli_query($this->conn, "SELECT * FROM notifications WHERE user_to='$this->username' AND viewed=0 AND deleted=0");
			return mysqli_num_rows($row);
		}

		// return all of unread notifications
		public function getUnreadNotifications($last_id, $limit) {
			if ($last_id==0) {
				$query = mysqli_query($this->conn, "SELECT * FROM notifications WHERE user_to='$this->username' AND opened=0 AND deleted=0 ORDER BY id DESC LIMIT '$limit'");
			} else {
				$query = mysqli_query($this->conn, "SELECT * FROM notifications WHERE id<$last_id AND user_to='$this->username' AND opened=0 AND deleted=0 ORDER BY id DESC LIMIT '$limit'");
			}
			return $query;
		}

		// return all new notifications
		public function getNewNotifications($last_id, $limit) {
			if ($last_id==0) {
				$query = mysqli_query($this->conn, "SELECT * FROM notifications WHERE user_to='$this->username' AND viewed=0 AND deleted=0 ORDER BY id DESC LIMIT '$limit'");
			} else {
				$query = mysqli_query($this->conn, "SELECT * FROM notifications WHERE id<$last_id AND user_to='$this->username' AND viewed=0 AND deleted=0 ORDER BY id DESC LIMIT '$limit'");
			}
			return $query;
		}
		
		// return all notifications
		public function getViewedNotifications($last_id, $limit) {
			if ($last_id==0) {
				$query = mysqli_query($this->conn, "SELECT * FROM notifications WHERE user_to='$this->username' AND viewed=1 AND deleted=0 ORDER BY id DESC LIMIT '$limit'");
			} else {
				$query = mysqli_query($this->conn, "SELECT * FROM notifications WHERE id<$last_id AND user_to='$this->username' AND viewed=1 AND deleted=0 ORDER BY id DESC LIMIT '$limit'");
			}
			return $query;
		}

		// send notification to user_to
		public function sendNotification($user_to, $notification_body, $type, $link) {
			$query = mysqli_query($this->conn, "INSERT INTO notifications VALUES (DEFAULT, '$this->username', '$user_to', '$type', '$notification_body', '$link', DEFAULT, DEFAULT, DEFAULT, DEFAULT)");
			return mysql_insert_id($conn);
		}

		// update notification as viewed
		public function viewNotification($id) {
			$query = mysqli_query($this->conn, "UPDATE notifications SET viewed=1 WHERE id='$id' and deleted=0");
			return $query;
		}

		// set notification as readed
		public function readNotification($id) {
			$query = mysqli_query($this->conn, "UPDATE notifications SET opened=1 WHERE id='$id' and deleted=0");
			return $query;
		}

		// delete notification
		public function deleteNotification($id) {
			$query = mysqli_query($this->conn, "UPDATE notifications SET deleted=1, viewed=1 WHERE id='$id' and deleted=0");
			return $query;
		}

		// update all notifications as viewed
		public function viewAllNotifications() {
			$query = mysqli_query($this->conn, "UPDATE notifications SET viewed=1 WHERE user_to='$this->username' AND deleted=0");
			return $query;
		}

		// set all notifications as readed
		public function readAllNotifications() {
			$query = mysqli_query($this->conn, "UPDATE notifications SET opened=1 WHERE user_to='$this->username' AND deleted=0");
			return $query;
		}

		// delete all notifications
		public function deleteAllNotifications() {
			$query = mysqli_query($this->conn, "UPDATE notifications SET deleted=1, viewed=1 WHERE user_to='$this->username' AND deleted=0");
			return $query;
		}
	}
?>