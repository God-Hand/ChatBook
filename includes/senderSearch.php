<?php
	if(isset($_POST['name'])){
		require '../config/config.php';
		require 'classes/User.php';
		require 'classes/Message.php';
		require '../functions/text_filter.php';

		$name  = removeSpaces($_POST['name']);
		$name = strip_tags($name);
		$message_user = new Message($conn, $_SESSION['username']);
		if (empty($name)){
			$str = "";
			for ($i=0; $i < 10; $i++) { 
				$str .= "<li class='list-group-item list-group-item-action'>
							  	<div class='media'>
									  <img class='mr-1' src='assets/images/profile_pics/defaults/profile_pic.png' style='width:40px;border-radius:50%;' alt='username'>
									  <div class='media-body'>
									  	<div class='float-left resize-box'>
									  		<h6 class='m-0 d-inline-block text-truncate'>Jitendra sharma</h6><br/>
									  		<p class='m-0 d-inline-block text-truncate' >hi friend...</p>
									  	</div>
									  	<div class='float-right'>
									    	<span class='float-right badge badge-success badge-pill'>12</span><br/>
									    	<small class='float-right'><em>12d ago</em></small>
									  	</div>
									  </div>
									</div>
							  </li>";		
			}
			echo $str;
		}
	}
?>


<!---
  <li class="list-group-item list-group-item-action">
  	<div class="media">
		  <img class="mr-1" src="assets/images/profile_pics/arpit_gupta15415322931541581420.png" style="width:40px;border-radius:50%;" alt="username">
		  <div class="media-body">
		  	<div class="float-left resize-box">
		  		<h6 class="m-0 d-inline-block text-truncate" style="max-width: inherit;">Jitendra Sharma</h6><br/>
		  		<p class="m-0 d-inline-block text-truncate"  style="max-width: inherit;">hi friend...</p>
		  	</div>
		  	<div class="float-right">
		    	<span class="float-right badge badge-success badge-pill">12</span><br/>
		    	<small class="float-right"><em>12d ago</em></small>
		  	</div>
		  </div>
		</div>
  </li>
--->