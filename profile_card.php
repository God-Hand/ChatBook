<style type="text/css">

	/*Profile card*/
	.profile-card .card-img-block{
	    float:left;
	    width:100%;
	    height:150px;
	    overflow:hidden;
	}
	.profile-card .card-body{
	    position:relative;
	}
	.profile-card .profile {
	    border-radius: 50%;
	    position: absolute;
	    top: -62px;
	    left: 50%;
	    width:100px;
	    margin-left: -50px;
	}
	.profile-card .card-img-block{
	    position:relative;
	}
	.profile-card .card-img-block > .info-box{
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
	.profile-card .card-img-block:hover > .info-box{
	    opacity:1;
	    -webkit-transition: all 1s ease;
	    transition: all 1s ease;
	}
</style>

<div class="col-md-4">
	<div class="card profile-card shadow-lg p-3 mb-5 bg-white rounded">
    <div class="card-img-block">
      <div class="info-box bg-primary">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
      <img src="https://images.pexels.com/photos/965157/pexels-photo-965157.jpeg?auto=compress&cs=tinysrgb&h=650&w=940" >
    </div>
    <div class="card-body pt-5">
      <img src="https://randomuser.me/api/portraits/women/14.jpg" alt="profile-image" class="profile border border-primary"/>
      <h5>Gail Schmidt</h5>
      <p>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      <div><a href="#"><i class="fa fa-facebook"></i></a><a href="#"> <i class="fa fa-twitter"></i></a><a href="#"> <i class="fa fa-google-plus"></i></a></div>
    </div>
  </div>
</div>