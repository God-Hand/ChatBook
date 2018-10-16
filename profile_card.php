<style type="text/css">

	/*Profile card*/
	.profile-card .profile-card-img-block{
	    float:left;
	    width:100%;
	    height:150px;
	    overflow:hidden;
	}
	.profile-card .profile-card-body{
	    position:relative;
	}
	.profile-card .profile {
	    position: absolute;
	    top: -62px;
	    left: 50%;
	    width:100px;
	    margin-left: -50px;
	}
	.profile-card .profile-card-img-block{
	    position:relative;
	}
	.profile-card .profile-card-img-block > .profile-info-box{
	    position:absolute;
	    width:100%;
	    height:100%;
	    color:#fff;
	    padding:20px;
	    text-align:center;
	    font-size:14px;
	   -webkit-transition: 1s ease;
	    transition: 1s ease;
	    opacity:0;
	}
	.profile-card .profile-card-img-block:hover > .profile-info-box{
			border-radius: .25rem!important;
	    opacity:1;
	    -webkit-transition: all 1s ease;
	    transition: all 1s ease;
	}
</style>

<div class="col-md-4">
	<div class="card profile-card shadow-lg p-3 mb-5 bg-white rounded">
    <div class="profile-card-img-block">
      <div class="profile-info-box bg-primary">
      	info about user
      </div>
      <img class="rounded" src="https://images.pexels.com/photos/965157/pexels-photo-965157.jpeg?auto=compress&cs=tinysrgb&h=650&w=940" >
    </div>
    <div class="profile-card-body pt-5">
      <img src="https://randomuser.me/api/portraits/women/14.jpg" alt="profile-image" class="rounded profile border border-default"/>
      <h5>Gail Schmidt</h5>
      <hr>
			<p><i class="fa fa-pencil"></i> Friends</p>
			<p><i class="fa fa-home"></i> Posts</p>
			<p><input type="button" class="" name="" value="Edit"></p>
    </div>
  </div>
</div>