<!DOCTYPE html>
<html>
<head>
	<title>Index.php</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<?php include("header.php"); ?>
	<div style="padding-top: 70px;">
		<div role="main" class="container">
			<div class="row">
				<?php
					include("profile_card.php");
					include("infinite_post_loading.php");
				?>
			</div>
		</div>
	</div>
</body>
</html>