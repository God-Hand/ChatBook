<!DOCTYPE html>
<html>
<head>
	<title>Index.php</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<style>
	.btn{
		border-radius: 0px;
	}
</style>
<body>
	<?php include("header.php"); ?>
	<div role="main" class="container">
		<div class="row">
			<?php
				include("profile_card.php");
			?>
			<div class="col-md-8">
				<div class="container card" style="height: 500px; width: 100%;">
					<div class="row">
				  	<button class="btn btn-default btn-block float-left personalInformation" type="button" data-toggle="collapse" data-target="#personalInformation" aria-expanded="false" aria-controls="personalInformation">personalInformation</button>
					  <div class="collapse multi-collapse" id="personalInformation">
				      <div class="card-body">
				        personalInformation
				      </div>
				    </div>
				  </div>
					<div class="row">
				  	<button class="btn btn-default btn-block float-left accountInformation" type="button" data-toggle="collapse" data-target="#accountInformation" aria-expanded="false" aria-controls="accountInformation">accountInformation</button>
					  <div class="collapse multi-collapse" id="accountInformation">
				      <div class="card-body">
				        accountInformation
				      </div>
				    </div>
				  </div>
				  <div class="row">
				  	<button class="btn btn-default btn-block float-left uploadPics" type="button" data-toggle="collapse" data-target="#uploadPics" aria-expanded="false" aria-controls="uploadPics">uploadPics</button>
					  <div class="collapse multi-collapse" id="uploadPics">
				      <div class="card-body">
				        uploadPics
				      </div>
				    </div>
				  </div>
					<div class="row">
				  	<button class="btn btn-default btn-block float-left deleteAccount" type="button" data-toggle="collapse" data-target="#deleteAccount" aria-expanded="false" aria-controls="deleteAccount">deleteAccount</button>
					  <div class="collapse multi-collapse" id="deleteAccount">
				      <div class="card-body">
				        deleteAccount
				      </div>
				    </div>
				  </div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>

<script>
	$('.basicInformation').click();
</script>