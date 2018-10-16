<style type="text/css">
	@import url('https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700');
	@import url('https://fonts.googleapis.com/css?family=Libre+Baskerville:400,700');
	body{
	    font-family: 'Open Sans', sans-serif;
	}
	*:hover{
	    -webkit-transition: all 1s ease;
	    transition: all 1s ease;
	}
	section{
	    float:left;
	    width:100%;
	    background: #fff;  /* fallback for old browsers */
	    padding:30px 0;
	}
	h1{float:left; width:100%; color:#232323; margin-bottom:30px; font-size: 14px;}
	h1 span{font-family: 'Libre Baskerville', serif; display:block; font-size:45px; text-transform:none; margin-bottom:20px; margin-top:30px; font-weight:700}
	h1 a{color:#131313; font-weight:bold;}

	/*Profile card 4*/
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
	    border: 3px solid rgba(255, 255, 255, 1);
	    margin-left: -50px;
	}
	.profile-card .card-img-block{
	    position:relative;
	}
	.profile-card .card-img-block > .info-box{
	    position:absolute;
	    background:rgba(217,11,225,0.6);
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
	.profile-card h5{
	    font-weight:600;
	    color:#d90be1;
	}
	.profile-card .card-text{
	    font-weight:300;
	    font-size:15px;
	}
	.profile-card .icon-block{
	    float:left;
	    width:100%;
	}
	.profile-card .icon-block a{
	    text-decoration:none;
	}
	.profile-card i {
	  display: inline-block;
	    font-size: 16px;
	    color: #d90be1;
	    text-align: center;
	    border: 1px solid #d90be1;
	    width: 30px;
	    height: 30px;
	    line-height: 30px;
	    border-radius: 50%;
	    margin:0 5px;
	}
	.profile-card i:hover {
	  background-color:#d90be1;
	  color:#fff;
	}
</style>

<div class="col-md-4">
	<div class="card profile-card">
    <div class="card-img-block">
      <div class="info-box">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
      <img class="img-fluid" src="https://images.pexels.com/photos/965157/pexels-photo-965157.jpeg?auto=compress&cs=tinysrgb&h=650&w=940" alt="Card image cap">
    </div>
    <div class="card-body pt-5">
      <img src="https://randomuser.me/api/portraits/women/14.jpg" alt="profile-image" class="profile"/>
      <h5 class="card-title text-center">Gail Schmidt</h5>
      <p class="card-text text-center">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      <div class="icon-block text-center"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"> <i class="fa fa-twitter"></i></a><a href="#"> <i class="fa fa-google-plus"></i></a></div>
    </div>
  </div>
</div>