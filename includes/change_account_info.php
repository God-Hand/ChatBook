<?php
  if(isset($_POST['username'])) {
    require '../config/config.php';
    require 'classes/User.php';
    $user = new User($conn, $_POST['username']);
    if(isset($_POST['firstname']) and !empty($_POST['firstname']))
    	$user->setFirstName($_POST['firstname']);
    if(isset($_POST['lastname']) and !empty($_POST['lastname']))
    	$user->setLastName($_POST['lastname']);
    if(isset($_POST['bio']) and !empty($_POST['bio']))
    	$user->setBio($_POST['bio']);
    if(isset($_POST['email']) and $user->getEmail()!=$_POST['email'] and !empty($_POST['email']))
    	echo $user->changeEmail($_POST['email']);
    else
    	echo 'email not changed';
  }
?>