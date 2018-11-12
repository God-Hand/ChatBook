<?php
	if(isset($_POST['limit']) and isset($_POST['last_id'])){
		require '../config/config.php';
		require 'classes/User.php';
		require 'classes/Notification.php';
		require '../functions/timeframe_function.php';
		$user = new User($conn, $_SESSION['username']);
		$notification = new Notification($conn, $_SESSION['username']);
		$str = "";
		$last_id = $_POST['last_id'];
		$data_query = $notification->getNotifications($last_id, $_POST['limit']);
		if (mysqli_num_rows($data_query) == 0 and $_POST['last_id'] == 0) {
				$str .= "<input type='hidden' id='noMoreNotifications' value='true'><div class='card'><p class='text-muted p-3 m-2 bg-light'> No Notifications </p></div>";
		} elseif (mysqli_num_rows($data_query) == 0) {
			$str .= "<input type='hidden' id='noMoreNotifications' value='true'><div class='card'><p class='text-muted p-3 m-2 bg-light'> No more notifications to show! </p></div>";
		} else {
			while ($row = mysqli_fetch_array($data_query)) {
				$id = $row['id'];
				$last_id = $id;
				$user_from = $row['user_from'];
				$notification_body = $row['notification_body'];
				$link = $row['link'];
				$user_from_obj = new User($conn, $user_from);
				$user_from_fullname = "<a href='profile.php?profile_username=" . $user_from . "'>" .$user_from_obj->getFirstAndLastName() . "</a>";
				$notification_box = $user_from_fullname . " " . $notification_body;
				$now_date = date("Y-m-d H:i:s");
				$notification_datetime = new DateTime($row['notification_time']);
				$now_datetime = new DateTime($now_date);
				$notification_time_in_text = getTimeFrame($now_datetime->diff($notification_datetime));
				if($row['viewed']==0){
					$alert_class = 'alert-dark';
				} else {
					$alert_class = 'alert-secondary';
				}

				$str .= "<div id='" . $id . "' class='row notification'>
									<div class='alert " . $alert_class . " col-12' role='alert'>
								  	<p class='m-0'>
								  		" . $notification_box . "
								  	</p>
								  	<a href='" . $link . "' class='btn btn-primary btn-sm'>See</a>
								  	<button id='" . $id . "' class='btn btn-danger btn-sm' onclick='DeleteNotification(this)'>Delete</button>
								  	<p class='float-right text-muted'><small>" . $notification_time_in_text . "</small></p>
								  	</div>
									</div>
								</div>";
			}
			if ($last_id == $_POST['last_id']){
				$str .= "<input type='hidden' id='noMoreNotifications' value='true'><div class='card'><p class='text-muted p-3 m-2 bg-light'> No Notifications </p></div>";
			} else {
				$str .= "<input type='hidden' id='noMoreNotifications' value='false'>";
			}
		}
		echo $str;
	}
?>