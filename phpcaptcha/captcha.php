<?php
	require "./phptextClass.php";
	require '../config/config.php';
	$phptextObj = new phptextClass();
	$phptextObj->phpcaptcha('#4f4f4f','#adadad',160,40,5,20);	
 ?>