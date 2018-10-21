<?php
	include('includes/classes/User.php');
	if (isset($_REQUEST['username'])) {
		$profile_user = new User($conn, $_REQUEST['username']);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>ChatBook - Profile.php</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<?php include("header.php"); ?>
	<div style="min-height:70px;">
	</div>
</body>
</html>