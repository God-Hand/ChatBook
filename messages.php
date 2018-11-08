<!DOCTYPE html>
<html>
<head>
	<title>Chatbook - Messages</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<?php include("header.php"); ?>


<style>
.list-group{
  min-height: 2px;
  width: 100%;
  overflow-y:scroll;
}
.list-group-item:active{
	background-color:#f1f1f1;
}
::-webkit-scrollbar {
	width: 5px;
}
::-webkit-scrollbar-track {
	background: #f1f1f1; 
}
::-webkit-scrollbar-thumb {
	background: #888; 
}
::-webkit-scrollbar-thumb:hover {
	background: #555; 
}
.has-search .form-control {
    padding-left: 2.375rem;
}
.has-search .form-control-feedback {
    position: absolute;
    z-index: 2;
    display: block;
    width: 2.375rem;
    height: 2.375rem;
    line-height: 2.375rem;
    text-align: center;
    pointer-events: none;
    color: #aaa;
}
.resize-box{
	max-width: 200px;
}
.text-truncate{
	max-width:inherit;
}
</style>
	<div role="main" class="container">
		<div class="row">
			<div class="col-md-4">
				<div class=" border border-default">
					<div class="form-group has-search">
				    <span class="fa fa-search form-control-feedback"></span>
				    <input id="senderSearch" type="text" class="form-control" placeholder="Search..." onkeyup="searchMessageUser(this)">
				  </div>
					<div class="list-group">
					  
					</div>
				</div>
				<br>
			</div>
			<div class="col-md-8">
				<iframe src="message_card.php?user_to=arpit_gupta1541532293" class="border border-default" style="height:514px;width:100%;">
					
				</iframe>
			</div>
		</div><br/>
	</div>
</body>
</html>
<script>

	function searchMessageUser(obj) {
		var newWidth = $('#senderSearch').width() - 50 + "px";
		console.log(newWidth);
		$.post('includes/senderSearch.php', { name : obj.value, width : newWidth }, function(data){
		$.post('includes/senderSearch.php', { name : obj.value, last_message_id : 0}, function(data){
			$('.list-group').empty();
			$('.list-group').html(data);
			resizeContent();
		});
	}

	$('.list-group').scroll(function(){
		var $this = $(this);
    var height = this.scrollHeight - $this.height();
    var scroll = $this.scrollTop();
    var name = $('#senderSearch').val();
		var last_message_id = $('.messageSenders:last').attr('id');
		var noMoreMessageSenders = $('.list-group').find('#noMoreMessageSenders').val();
    var isScrolledToEnd = (scroll >= height);
    $(".scroll-pos").text(scroll);
    $(".scroll-height").text(height);
    if (isScrolledToEnd || noMoreMessageSenders=='false') {
      $.post('includes/senderSearch.php', { name : name, last_message_id : last_message_id}, function(data){
				$this.append(data);
				resizeContent();
			});
    }
	});

	$(document).ready(function(){
		$('#senderSearch').val('').trigger('keyup');
    $(window).resize(function() {
        resizeContent();
    });
	});

	function resizeContent() {
		$('.resize-box').css({
	    "maxWidth": $('.resize-box').parent().width() - 50 + "px"
	  });
	}
</script>