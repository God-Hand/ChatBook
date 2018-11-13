<?php
	if(!isset($_SESSION['username'])){
		echo "<script>window.location = 'index.php';</script>";
		return 0;
	}
?>