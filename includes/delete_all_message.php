<?php
	if(isset($_POST['name'])){
		require '../config/config.php';
		require 'classes/Message.php';

		$message = new Message($conn, $_SESSION['username']);
		$message->deleteAllMessage($_POST['name']);
	}
?>