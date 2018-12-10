<?php
	use PHPMailer\PHPMailer\PHPMailer;
	require 'vendor/autoload.php';
	if(isset($_POST['email'])){
		$mail = new PHPMailer;
		$mail->isSMTP();
		$mail->SMTPDebug = 2;
		$mail->Host = 'smtp.gmail.com';
		$mail->Port = 587;
		$mail->SMTPSecure = 'tls';
		$mail->SMTPAuth = true;
		$mail->Username = "jitendra.sharma_cs16@gla.ac.in";
		$mail->Password = "**********";
		$mail->setFrom('jitendra.sharma_cs16@gla.ac.in', 'Chatbook');
		$mail->addAddress($_POST['email']), 'John Doe');
		$mail->Subject = $_POST['subject'];
		if (strcmp($_POST['subject'], "Confirm your account") == 0){
			$mail->Body = "<body bgcolor='#f9f9f9'>
	<h3 style='margin:0px;margin-bottom:10px;'>Confirm your account</h3>
	<p style='margin:0px;'>click the link below to confirm your account</p>
	<a href='" . $_SERVER['HTTP_HOST'] . "/recoverPassword.php?email=" . $POST['email'] . "&confirm_code=" . $POST['code'] . "' target='_blank' style='text-decoration:none;'>" . $_SERVER['HTTP_HOST'] . "/confirm_account.php?email=" . $POST['email'] . "&confirm_code=" . $POST['code'] . "</a>
</body>";
		} else {
			$mail->Body = "<body bgcolor='#f9f9f9'>
	<h3 style='margin:0px;margin-bottom:10px;'>Change Password</h3>
	<p style='margin:0px;'>this link is valid for half hour. after the receiving the mail.</p>
	<a href='" . $_SERVER['HTTP_HOST'] . "/recoverPassword.php?email=" . $POST['email'] . "&confirm_code=" . $POST['code'] . "' target='_blank' style='text-decoration:none;'>" . $_SERVER['HTTP_HOST'] . "/recover_password.php?email=" . $POST['email'] . "&confirm_code=" . $POST['code'] . "</a>
</body>";
		}
		$mail->isHTML(true);
		if (!$mail->send()) {
		    echo "Mailer Error: " . $mail->ErrorInfo;
		} else {
		    echo "Message sent!";
		}
	}
?>