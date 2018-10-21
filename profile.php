<!DOCTYPE html>
<html>
<head>
	<title>ChatBook - Profile.php</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<?php
		include('includes/classes/User.php');
		if (isset($_REQUEST['profile_username'])) {
			$profile_user = new User($conn, $_REQUEST['profile_username']);
		} else {
			header('Location:index.php');
		}
	?>
	<?php include("header.php"); ?>
	<div style="min-height:70px;">
	</div>
</body>
</html>