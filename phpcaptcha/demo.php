<?php session_start();

if(isset($_POST['Submit'])){
	// code for check server side validation
	if(empty($_SESSION['captcha_code'] ) || strcasecmp($_SESSION['captcha_code'], $_POST['captcha_code']) != 0){  
		$msg="<span style='color:red'>The Validation code does not match!</span>";// Captcha verification is incorrect.		
	}else{// Captcha verification is Correct. Final Code Execute here!		
		$msg="<span style='color:green'>The Validation code has been matched.</span>";		
	}
}	
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>PHP Secure Professional Captcha.</title>
<link href="./css/style.css" rel="stylesheet">
<script type='text/javascript'>
function refreshCaptcha(){
	var img = document.images['captchaimg'];
	img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
}
</script>
</head>
<body>
<div id="frame0">
  <h1>PHP Secure Professional Captcha Demo.</h1>
  <p>More tutorials <a href="http://www.w3schools.in/">www.w3schools.in</a></p>
</div>
<br>

<form action="" method="post" name="form1" id="form1" >
  <table width="400" border="0" align="center" cellpadding="5" cellspacing="1" class="table">
    <?php if(isset($msg)){?>
    <tr>
      <td colspan="2" align="center" valign="top"><?php echo $msg;?></td>
    </tr>
    <?php } ?>
    <tr>
      <td align="right" valign="top"> Validation code:</td>
      <td><img src="captcha.php?rand=<?php echo rand();?>" id='captchaimg'><br>
        <label for='message'>Enter the code above here :</label>
        <br>
        <input id="captcha_code" name="captcha_code" type="text">
        <br>
        Can't read the image? click <a href='javascript: refreshCaptcha();'>here</a> to refresh.</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input name="Submit" type="submit" onclick="return validate();" value="Submit" class="button1"></td>
    </tr>
  </table>
</form>
</body>
</html>