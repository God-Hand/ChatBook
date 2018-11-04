<!DOCTYPE html>
<html>
<head>
	<title>Index.php</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<?php include("header.php"); ?>
	<div style="min-height:70px;">
	</div>
	<div role="main" style="padding: 0px 10px;">
		<div class="row">
			<?php
				include("profile_card.php");
				include("infinite_post_loading.php");
			?>
		</div>
	</div>
</body>
</html>