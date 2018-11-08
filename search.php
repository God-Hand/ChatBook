<!DOCTYPE html>
<html>
<head>
	<title>Chatbook - Search</title>
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
			<div class="col-md-8">
				<div class="input-group" style="width:100%;">
	        <input type="text" class="form-control dropdown" onkeyup="SearchUsers(this)" name="q" placeholder="Search..." autocomplete="off" id="searchusers" value="" width="auto">
	        <div class="input-group-postpend">
	          <button class="btn btn-primary float-right" type="submit"><i class="fa fa-search"></i></button>
	        </div>
	      </div><br/>
	      <div class="searchedResult card">
        </div>
			</div>
		</div>
	</div>
</body>
</html>

<?php
	if(isset($_REQUEST['name'])){
		echo "<script>
						$(document).ready(function($) {
						  $('#searchusers').val('" . $_REQUEST['name'] . "').trigger('keyup'); 
						});
					</script>";
	} else {
		echo "<script>
						$(document).ready(function($) {
						  $('#searchusers').val('').trigger('keyup'); 
						});
					</script>";
	}
?>
<script>
	function SearchUsers(obj){
    var username = '<?php echo $user->getUsername(); ?>';
    $.post("includes/search.php", {name:obj.value, limit:5, requestby:2}, function(data) {
      $('.searchedResult').empty();
      if(data != ''){
        $('.searchedResult').html(data);
      } else {
      	$('.searchedResult').html("<input type='hidden' id='noMoreComments' value='true'><div class='p-3 mb-2 bg-light text-muted' style='margin:10px'>No such name users found</div>");
      }
    });
  }
</script>