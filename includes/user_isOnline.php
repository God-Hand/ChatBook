<?php
	if(isset($_POST['name'])){
		$name_user = new User($conn, $_POST['name']);
		echo $user->isOnline();
	}
?>