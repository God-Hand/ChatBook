<?php
	require '../config/config.php';
	require 'classes/Notification.php';
	$notification = new Notification($conn, $_SESSION['username']);
	$notification->deleteNotification($_POST['id']);
?>