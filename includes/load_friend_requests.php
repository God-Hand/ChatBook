<?php
	require '../config/config.php';
	require 'classes/FriendRequest.php';
	require 'classes/User.php';

	if(isset($_POST['username'])){
		define('LIMIT', 10);
		$user = new User($conn, $_POST['username']);
		$request = new FriendRequest($conn, $_POST['username']);
		$data_query = $request->getAllFriendRequests($_POST['last_request_id'],LIMIT);
		$str = "";
		if (mysqli_num_rows($data_query) == 0) {
			$str .= "<input type='hidden' id='noMoreRequests' value='true'><p class='text-muted' style='padding-left:15px;' id='noMoreRequestsText'>No More Requests.</p>";
		} else {
			while ($row = mysqli_fetch_array($data_query)) {
				$request_id = $row['request_id'];
				$user_from = $row['user_from'];
				$user_to = $row['user_to'];
				$request_time = $row['request_time'];
				$last_request_id =$request_id;

				$user_from_obj = new User($conn, $user_from);

				$str .= "<div id='" . $row['request_id'] . "' class='col-12 request' style='margin-top: 15px;'>
		              <div class='card' id='id'>
		                <div class='card-body media'>
		                  <img src='" . $user_from_obj->getProfilePic() . "' style='width:60px;height:60px;border-radius:50%;'>
		                  <div class='media-body' style='margin-left:5px;'>
		                    <h6>" . $user_from_obj->getFirstAndLastName() . "</h6><small class='text-muted'>
		                    <em>" . $user_from_obj->getMutualFriendsCount($user_to) . " mutual friends</em></small>
		                  </div>
		                  <div class='form-row' style='width:30%;'>
		                    <div class='col-xs-6'>
		                      <button class='btn btn-sm width-60 btn-success'> Accept</button>
		                    </div>
		                    <div class='col-xs-6'>
		                      <button class='btn btn-sm width-60 btn-danger'> Reject</button>
		                    </div>
		                  </div>
		                </div>
		              </div>
		            </div>";
			}
			if ($last_request_id == $_POST['last_request_id']){
				$str .= "<input type='hidden' id='noMoreRequests' value='true'><p class='text-muted' id='noMoreRequestsText' style='padding-left:15px;'>No More Requests.</p>";
			} else {
				$str .= "<input type='hidden' id='noMoreRequests' value='false'>";
			}
		}
		echo $str;
	}
?>