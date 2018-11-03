<?php
	require '../config/config.php';
	require 'classes/User.php';
	require '../functions/text_filter.php';

	$user = new User($conn, $_REQUEST['username']);
	$name  = removeSpaces($_REQUEST['name']);
	$data = $user->searchUsers($name);
	$str = "";
	while ($row = mysqli_fetch_array($data)) {
		$searched_user_profile_pic = "<a href='profile.php?profile_username=" . $row['username'] . "' style='text-decoration: none;' class='text-primary'> <img src='" . $row['profile_pic'] . "' alt='user_pic' class='align-self-start rounded-circle' style='width:40px;'> </a>";
		$searched_user_fullname = "<a href='profile.php?profile_username=" . $row['username'] . "' style='text-decoration: none;' class='text-primary'> <h6 class='text-primary' style='overflow:hidden;text-overflow: ellipsis;'>" . $row['first_name'] . " " . $row['last_name'] . "</h6> </a>";

		if ($user->getUsername() == $row['username']){
			$friend_button = "";
			$mutual_friends = "";
		}else{
			if ($user->isFriend($row['username'])){
				$friend_button = "<button class='btn btn-secondary'>Friend</button>";
			} else {
				$friend_button = "<button class='btn btn-primary'>Add Friend</button>";
			}
			$mutual_friends = "<small class='text-muted'>mutual friends : ". $user->getMutualFriendsCount($row['username']) . "</small>";
		}
		$str .= "<div class='dropdown-item container searcheduser'>
							<div class='row'>
								<div class='col-2'>" . $searched_user_profile_pic . "</div>
								<div class='col-6'>
									" . $searched_user_fullname . "<br>
									" . $mutual_friends . "
								</div>
								<div class='col-4'>" . $friend_button . "</div>
							</div>
						</div>";
	}
	$str .= "<a class='btn btn-primary btn-block btn-sm' href='#'>See All<a>";
	echo $str;
?>