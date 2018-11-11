<?php
	if(isset($_POST['message_id'])){
		require '../config/config.php';
		require 'classes/Message.php';
		$message = new Message($conn, $_SESSION['username']);
		$message->deleteMessage($_POST['message_id']);
	}
?>