<!DOCTYPE html>
<html>
<head>
	<title>Chatbook - friend requests</title>
</head>
<style>
  .width-60{
    width: 60px;
  }
</style>
<body>
	<?php include("header.php"); ?>
	<div role="main" class="container">
		<div class="row">
      <div class="col-md-4">
        <?php include("profile_card.php") ?>
      </div>
			<div class="col-md-8">
        <div class="container card">
          <div class="row">
            <?php include("infinite_friend_request_loading.php"); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>