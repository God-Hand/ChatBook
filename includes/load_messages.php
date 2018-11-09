<?php
	if(isset($_POST['name'])){
		require '../config/config.php';
		require 'classes/User.php';
		require 'classes/Message.php';
		require '../functions/timeframe_function.php';
		require '../functions/text_filter.php';

		$user = new User($conn, $_SESSION['username']);
		$name = $_POST['name'];
		$fullname = $_POST['fullname'];
		$message = new Message($conn, $user->getUsername());
		
		$str = "";
		$data_query = $message->getMessages($_POST['name'], $_POST['last_message_id'],$_POST['limit']);
		if(mysqli_num_rows($data_query)!=0){
			
			while($row = mysqli_fetch_array($data_query)){
				$message_by = "<a href='profile.php?profile_username=" . $user->getUsername() . "'>You</a>";
				if( $row['user_from'] == $user->getUsername()){
					$str .= "<div class='row float-right ml-0 message'>
										<div class='col-12 alert bg-success text-white'>
											<div class='media'>
											  <div class='media-body'>
											    <h6 class='m-0'>" . $message_by . "<a id='message_id' class='btn btn-sm text-light text-secondary pr-0 float-right' onclick='deleteMessage(this)'><i class='fa fa-times'></i></a></h6>
											    <p class='m-0'>hi friend.
											    	How are you? long time, no see
											    </p>
											    <small class='float-right'><em>12days ago</em></small>
											  </div>
											</div>
										</div>
									</div>";
				}
			}
			echo "<div class='row float-left mr-0 message'>
				<div class='col-12 alert bg-primary text-white'>
					<div class='media'>
					  <div class='media-body'>
					    <h6 class='m-0'>Jitendra Sharma</h6>
					    <p class='m-0'>hi friend.
					    	How are you? long time, no see
					    </p>
					    <small class='float-right'><em>12days ago</em></small>
					  </div>
					</div>
				</div>
			</div>
			";
		}
	}
?>