<?php
	if(isset($_POST['first'])){
		require '../config/config.php';
	  require 'classes/Notification.php';
	  $notification = new Notification($conn, $_SESSION['username']);
	  $notification->readAllNotifications($_POST['first']);
	}
?>