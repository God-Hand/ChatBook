<?php
	/*
	* value = 0 => remove friend
	* value = 1 => accept request
	* value = 2 => cancel request
	* value = 3 => add friend
	* value = 4 => reject request
	*/
	if(isset($_POST['limit']) and isset($_POST['name'])){
		require '../config/config.php';
		require 'classes/User.php';
		require 'classes/FriendRequest.php';
		require '../functions/text_filter.php';
		
		$user = new User($conn, $_SESSION['username']);
		$request = new FriendRequest($conn , $_SESSION['username']);
		$name  = removeSpaces($_POST['name']);
		$name = strip_tags($name);
		$str = "";
		if ($name != ''){
			$data = $user->searchUsers($name,$_POST['limit']);
			while ($row = mysqli_fetch_array($data)) {
				$searched_user = $row['username'];
				$searched_user_profile_pic = "<a href='profile.php?profile_username=" . $searched_user . "' style='text-decoration: none;' class='text-primary' target='_blank'> <img src='" . $row['profile_pic'] . "' alt='user_pic' class='align-self-start rounded-circle' style='width:40px;'> </a>";
				$searched_user_fullname = "<a href='profile.php?profile_username=" . $searched_user . "' style='text-decoration: none;' class='text-primary' target='_blank'> <h6 class='text-primary'>" . $row['first_name'] . " " . $row['last_name'] . "</h6> </a>";

				if ($user->getUsername() == $searched_user){
					$mutual_friends = "";
				}else{
					$mutual_friends = "<small class='text-muted'><em>mutual friends : ". $user->getMutualFriendsCount($searched_user) . "</em></small>";
				}
				$str .= "<div class='dropdown-item container searcheduser'>
									<div class='row'>
										<div class='col-8'>
											<div class='media'>
											  " . $searched_user_profile_pic . "
											  <div class='media-body pl-1'>
											    " . $searched_user_fullname . $mutual_friends . "
											  </div>
											</div>
										</div>
									</div>
								</div>";
			}
			if (mysqli_num_rows($data) > 0 and $_POST['requestby']==1){
				$str .= "<a id='seeAll' class='btn btn-primary btn-block btn-sm' href='search.php?name=" . $_POST['name'] . "'>See All<a>";
			}
		}
		echo $str;
	}
?>