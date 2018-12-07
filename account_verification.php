<?php
	require 'config/config.php';
  require 'includes/classes/Register.php';
  require 'includes/classes/User.php';
  
  $register = new Register($conn);
  if($register->verifyAccount($_REQUEST['email'], $_REQUEST['token'])){
  	header("location: index.php");
  }
?>