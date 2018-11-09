<?php
	if(isset($_POST['body']) and isset($_POST['name'])){
		require '../config/config.php';
		require 'classes/Message.php';
		require '../function/text_filter.php';

		$body = removeSpaces($_POST['body']);
		$body = secureText($body);
		$message = new Message($conn, $_SESSION['username']);
		$message->sendMessage($_POST['name'], $body);
	}
?>