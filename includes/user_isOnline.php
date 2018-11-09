<?php
	if(isset($_POST['name'])){
		require '../config/config.php';
		require 'classes/User.php';
		$name_user = new User($conn, $_POST['name']);
		if($name_user->isOnline()){
			echo "true";
		} else {
			echo "false";
		}
	}
?>