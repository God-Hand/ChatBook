<?php
	require '../config/config.php';
	require 'classes/User.php';
	require '../functions/text_filter.php';

	$user = new User($conn, $_REQUEST['username']);
	$name  = removeSpaces($_REQUEST['name']);
	$name = secureText($conn , $name);
	$data = $user->searchUsers($name);
	$str = "";
	while (mysqli_fetch_array($data)) {
		$str .= "<div>
								" . $row['username'] . "
						</div>";
	}
	echo $str;
?>