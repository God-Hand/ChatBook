<?php
	require 'config/config.php';
	require('includes/classes/User.php');
	require('includes/classes/Message.php');
	require('functions/text_filter.php');
	if (!isset($_REQUEST['user_to']) or empty($_REQUEST['user_to'])) {
		echo $_SESSION['username'];
		echo $_REQUEST['user_to'];
		echo "<div class='p-3 mb-2 bg-light text-muted' style='margin:10px'>
						Wrong Usename
					</div>";
		return 0;
	}
?>

<html>
<body>
<?php
	$user = new User($conn, $_SESSION['username']);
	$user_to_obj = new User($conn, strip_tags($_REQUEST['user_to']));
?>
hi
</body>
</html>

