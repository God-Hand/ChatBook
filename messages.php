<!DOCTYPE html>
<html>
<head>
	<title>Chatbook - Messages</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<?php include("header.php"); ?>
	<div role="main" class="container">
		<div class="row">
			<div class="col-md-4">
				<?php include("profile_card.php"); ?>
			</div>
			<?php include("infinite_post_loading.php"); ?>
		</div>
	</div>
</body>
</html>