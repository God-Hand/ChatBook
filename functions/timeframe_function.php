<?php
	function getTimeFrame($interval) {

		if($interval->y >= 1) {	
			# check duration for years
			if($interval->y == 1) {
				$message = $interval->y . " year ago";
			} else {
				$message = $interval->y . " years ago";
			}
		} else if ($interval->m >= 1) { 
			# check duration for months and days
			if($interval->m == 1) {
				$message = $interval->m . " month ago";
			} else {
				$message = $interval->m . " months ago";
			}
		} else if($interval->d >= 1) {
			# check duration for days
			if($interval->d == 1) {
				$message = "Yesterday";
			} else {
				$message = $interval->d . " days ago";
			}
		} else if($interval->h >= 1) {
			# check duration for hours
			if($interval->h == 1) {
				$message = $interval->h . " hour ago";
			} else {
				$message = $interval->h . " hours ago";
			}
		} else if($interval->i >= 1) {
			# check duration for minutes
			if($interval->i == 1) {
				$message = $interval->i . " minute ago";
			} else {
				$message = $interval->i . " minutes ago";
			}
		} else {
			# duration in seconds
			$message = "Just now";	
		}

		return $message;
	}

	function getTimeFrameMin($interval) {

		if($interval->y >= 1) {	
			# check duration for years
			$message = $interval->y . " Y";
		} else if ($interval->m >= 1) { 
			# check duration for months
			$message = $interval->m . " M";
		} else if($interval->d >= 1) {
			# check duration for days
			$message = $interval->d . " d";
		} else if($interval->h >= 1) {
			# check duration for hours
			$message = $interval->h . " h";
		} else if($interval->i >= 1) {
			# check duration for minutes
			$message = $interval->i . " m";
		} else {
			$message = $interval->s . " s";	
		}

		return $message;
	}
?>