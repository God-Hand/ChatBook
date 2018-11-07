<?php
	/*
	* value = 0 => remove friend
	* value = 1 => accept request
	* value = 2 => cancel request
	* value = 3 => add friend
	* value = 4 => reject request
	*/
	if(isset($_POST['username'])){
		require '../config/config.php';
		require 'classes/User.php';
		require 'classes/FriendRequest.php';
		require '../functions/text_filter.php';

		define('LIMIT', 5);
		
		$user = new User($conn, $_POST['username']);
		$request = new FriendRequest($conn , $_POST['username']);
		$name  = removeSpaces($_POST['name']);
		$str = "";
		if ($name != ''){
			$data = $user->searchUsers($name,LIMIT);
			while ($row = mysqli_fetch_array($data)) {
				$searched_user = $row['username'];
				$searched_user_profile_pic = "<a href='profile.php?profile_username=" . $searched_user . "' style='text-decoration: none;' class='text-primary'> <img src='" . $row['profile_pic'] . "' alt='user_pic' class='align-self-start rounded-circle' style='width:40px;'> </a>";
				$searched_user_fullname = "<a href='profile.php?profile_username=" . $searched_user . "' style='text-decoration: none;' class='text-primary'> <h6 class='text-primary' style='overflow:hidden;text-overflow: ellipsis;'>" . $row['first_name'] . " " . $row['last_name'] . "</h6> </a>";

				if ($user->getUsername() == $searched_user){
					$friend_button = "";
					$mutual_friends = "";
				}else{
					if ($user->isFriend($searched_user)){
						$friend_button = "<button id='" . $searched_user . "' class='btn btn-sm btn-danger float-right addfriend' onclick='friend(this)' value='0' onmouseleave='friendAction(this)'>Remove Friend</button>";
					} elseif ($request->didReceiveRequest($searched_user) == 1) {
						$friend_button = "<button id='" . $searched_user . "' class='btn btn-sm btn-success float-right addfriend' onclick='friend(this)' value='1' onmouseleave='friendAction(this)'>Accept Request</button>";
					} elseif ($request->didSendRequest($searched_user) == 1) {
						$friend_button = "<button id='" . $searched_user . "' class='btn btn-sm btn-warning float-right addfriend' onclick='friend(this)' value='2' onmouseleave='friendAction(this)'>Cancel Request</button>";
					} else {
						$friend_button = "<button id='" . $searched_user . "' class='btn btn-sm btn-success float-right addfriend' onclick='friend(this)' value='3' onmouseleave='friendAction(this)'>Add Friend</button>";
					}
					$mutual_friends = "<small class='text-muted'><em>mutual friends : ". $user->getMutualFriendsCount($searched_user) . "</em></small>";
				}
				$str .= "<div class='dropdown-item container searcheduser'>
									<div class='row'>
										<div class='col-2'>" . $searched_user_profile_pic . "</div>
										<div class='col-6' style='padding:0px;'>
											" . $searched_user_fullname . "<br>
											" . $mutual_friends . "
										</div>
										<div class='col-4'>" . $friend_button . "</div>
									</div>
								</div>";
			}
			if (mysqli_num_rows($data) > 0){
				$str .= "<a class='btn btn-primary btn-block btn-sm' href='search.php?name=" . $_POST['name'] . "'>See All<a>";
			}
		}
		echo $str;
	}
?>