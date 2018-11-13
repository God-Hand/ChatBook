<?php
	if(isset($_POST['last_request_id']) and isset($_POST['limit'])){
		require '../config/config.php';
		require 'classes/FriendRequest.php';
		require 'classes/User.php';

		$user = new User($conn, $_SESSION['username']);
		$request = new FriendRequest($conn, $_SESSION['username']);
		$data_query = $request->getAllFriendRequests($_POST['last_request_id'],$_POST['limit']);
		$str = "";
		if (mysqli_num_rows($data_query) == 0 and $_POST['last_request_id'] == 0) {
			$str .= "<input type='hidden' id='noMoreRequests' value='true'><div class='col-12 mb-0'><p class='text-muted card p-3 m-0 bg-light'> 
									No Requests</p></div>";
		} elseif (mysqli_num_rows($data_query) == 0) {
			$str .= "<input type='hidden' id='noMoreRequests' value='true'><div class='col-12 mb-0'><p class='text-muted card p-3 m-0 bg-light'> No More Requests </p></div>";
		} else {
			while ($row = mysqli_fetch_array($data_query)) {
				$request_id = $row['request_id'];
				$user_from = $row['user_from'];
				$user_to = $row['user_to'];
				$request_time = $row['request_time'];
				$last_request_id =$request_id;
				$user_from_obj = new User($conn, $user_from);

				if ($user_to == $user->getUsername()){
					$user_from_obj = new User($conn, $user_from);
					$str .= "<div id='" . $request_id . "' class='col-sm-6 request'>
										<div class='card profile-card shadow p-3 mb-4 bg-white rounded'>
									    <div class='profile-card-img-block'>
									      <div class='profile-info-box bg-primary'>
									      	" . $user_from_obj->getBio() . "
									      </div>
									      <img class='rounded cover-img' src='" . $user_from_obj->getCoverPic() . "' id='profilecoverimage'>
									    </div>
											<div class='media friend-profile-media'>
											  <img class='mr-1 padding-5-circle friend-profile-pic' src='" . $user_from_obj->getProfilePic() . "' alt='username'>
											  <div class='media-body pl-1'>
											  	<div class='float-left resize-box'>
											  		<h6 class='m-0 d-inline-block text-truncate text-white' style='max-width: inherit;'>" . $user_from_obj->getFirstAndLastName() . "</h6><br/>
											  		<div><a href='profile.php?profile_username=" . $user_from . "' class='btn btn-primary btn-sm float-left'>See Profile</a></div>
											  	</div>
											  </div>
											</div>
											<div class='row pt-3'>
												<div class='col-6 pr-0'>
			                      <button id='" . $request_id . "' class='btn btn-sm btn-success btn-block' value='" . $user_from . "' onclick='acceptRequest(this);deleteRequest(this)' value='1'>Accept</button>
		                    </div>
		                    <div class='col-6'>
		                      <button id='" . $request_id . "' class='btn btn-sm width-60 btn-danger btn-block' value='" . $user_from . "' onclick='rejectRequest(this);deleteRequest(this);'> Reject</button>
		                    </div>
											</div>
										</div>
									</div>";
				} elseif ($user_from == $user->getUsername()) {
					$user_to_obj = new User($conn, $user_to);
					$str .= "<div id='" . $request_id . "' class='col-sm-6 request'>
										<div class='card profile-card shadow p-3 mb-4 bg-white rounded'>
									    <div class='profile-card-img-block'>
									      <div class='profile-info-box bg-primary'>
									      	" . $user_to_obj->getBio() . "
									      </div>
									      <img class='rounded cover-img' src='" . $user_to_obj->getCoverPic() . "' id='profilecoverimage'>
									    </div>
											<div class='media friend-profile-media'>
											  <img class='mr-1 padding-5-circle friend-profile-pic' src='" . $user_to_obj->getProfilePic() . "' alt='username'>
											  <div class='media-body pl-1'>
											  	<div class='float-left resize-box'>
											  		<h6 class='m-0 d-inline-block text-truncate text-white' style='max-width: inherit;'>" . $user_to_obj->getFirstAndLastName() . "</h6><br/>
											  		<div><a href='profile.php?profile_username=" . $user_to . "' class='btn btn-primary btn-sm float-left'>See Profile</a></div>
											  	</div>
											  </div>
											</div>
											<button id='" . $user_to . "' class='btn btn-warning btn-sm addfriend mt-3' onclick='friend(this);friendAction(this);' value='2'>Cancel Request</button>
										</div>
									</div>";
				}
			}
			if ($last_request_id == $_POST['last_request_id']){
				$str .= "<input type='hidden' id='noMoreRequests' value='true'><div class='col-12 mb-0'><p class='text-muted card p-3 m-0 bg-light'> No More Requests </p></div>";
			} else {
				$str .= "<input type='hidden' id='noMoreRequests' value='false'>";
			}
		}
		echo $str;
	}
?>