<?php
	require 'config/config.php';
  require 'includes/classes/Register.php';
  require 'includes/classes/User.php';
  
  $register = new Register($conn);
  echo "Reset Password";
?>