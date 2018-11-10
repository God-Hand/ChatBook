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
		$data_query = $message->getLatestMessages($_POST['name'], $_POST['last_message_id']);
		if(mysqli_num_rows($data_query)!=0){

			while($row = mysqli_fetch_array($data_query)){
				$message_id = $row['message_id'];
				$message_body = replaceURLToLink($row['message_body']);
				$message_time = $row['time'];
				$message_datetime_text = date("d-M-y h:iA", strtotime($message_time));

				if( $row['user_from'] == $user->getUsername()){
					$message_by = "You";
					$str .= "<div class='row float-right ml-0 message' id='" . $message_id . "'>
										<div class='col-12 alert bg-success text-white'>
											<div class='media'>
											  <div class='media-body'>
											    <h6 class='m-0'>" . $message_by . "<a id='" . $message_id . "' class='btn btn-sm text-light text-secondary pr-0 float-right' onclick='deleteMessage(this)'><i class='fa fa-times'></i></a></h6>
											    <p class='m-0'>" . $message_body . "</p>
											    <small class='float-right'><em>" . $message_datetime_text . "</em></small>
											  </div>
											</div>
										</div>
									</div>";
				} else {
					$message_by = $fullname;
					$str .= "<div class='row float-left mr-0 message' id='" . $message_id . "'>
										<div class='col-12 alert bg-primary text-white'>
											<div class='media'>
											  <div class='media-body'>
											    <h6 class='m-0'>" . $message_by . "</h6>
											    <p class='m-0'>" . $message_body . "</p>
											    <small class='float-right'><em>" . $message_datetime_text . "</em></small>
											  </div>
											</div>
										</div>
									</div>";
				}
			}
			echo $str;
		} else {
			echo "nothing";
		}
	}
?>