<?php
	require '../config/config.php';
	require 'classes/User.php';
	if(isset($_SESSION['page'])){
		echo $_SESSION['page'];
		$_SESSION['page']-=1;
		if($_SESSION['page']==0){
			echo $_SESSION['page'];
			$user = new User($conn, $_SESSION['username']);
			$user->setOffline();
		}
	}
?>