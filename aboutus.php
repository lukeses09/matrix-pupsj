<?php
	include ('header.php')
?>
<style type="text/css">
	


img {
    width: 25%;
    margin: 0 auto;
}

#section1{
	background-color:#C9C1D9;
	height: 100px;
    text-align: center;

}

#section3{

	background-color:#35e5b4;
	height: 200px;

}

/****************Effect 7: second border slides up ******************/
.cl-effect-7 a {
	padding: 12px 10px 10px;
	color: #566473;
	text-shadow: none;
	font-weight: 700;
}

.cl-effect-7 a::before,
.cl-effect-7 a::after {
	position: absolute;
	top: 100%;
	left: 0;
	width: 100%;
	height: 3px;
	background: #566473;
	content: '';
	-webkit-transition: -webkit-transform 0.3s;
	-moz-transition: -moz-transform 0.3s;
	transition: transform 0.3s;
	-webkit-transform: scale(0.85);
	-moz-transform: scale(0.85);
	transform: scale(0.85);
}

.cl-effect-7 a::after {
	opacity: 0;
	-webkit-transition: top 0.3s, opacity 0.3s, -webkit-transform 0.3s;
	-moz-transition: top 0.3s, opacity 0.3s, -moz-transform 0.3s;
	transition: top 0.3s, opacity 0.3s, transform 0.3s;
}

.cl-effect-7 a:hover::before,
.cl-effect-7 a:hover::after,
.cl-effect-7 a:focus::before,
.cl-effect-7 a:focus::after {
	-webkit-transform: scale(1);
	-moz-transform: scale(1);
	transform: scale(1);
}

.cl-effect-7 a:hover::after,
.cl-effect-7 a:focus::after {
	top: 0%;
	opacity: 1;
}



</style>



<link rel="stylesheet" type="text/css" href="aboutus.css"> <!--========================CSS of About us=====================-->
<link rel="stylesheet" type="text/css" href="css/mywall.min.css"> <!--=================Percentage and Color of Skills======-->
<link rel="stylesheet" type="text/css" href="canvas/font-awesome.min.css"> <!--=======================Symbols==============-->

<script src="textillate/jquery.fittext.js"></script>	

<script src="textillate/jquery.lettering.js"></script>

<script src="textillate/jquery.textillate.js"></script>

<!--<div class="container">
	<div class="row">
		<div class="col-md-3">

				<img id="d1" src="images/rap.jpg">

				<div class="contenthover">
    <h3>Lorem ipsum dolor</h3>
    <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum pulvinar ante quis augue lobortis volutpat. </p>
    <p><a href="#" class="mybutton">Lorem ipsum</a></p>
</div>
			</div>

	</div>

</div>-->
<section id="section1">
	<nav class="cl-effect-7">
	<a>Moses</a>
	<a>Shile</a>
	<a>Kamille</a>
	<a>Jerome</a>
	<a>Kris</a>
	<a>Seryo</a>


</nav>


</section>

	<div id="info1">
	<section id="section2">

		
		<div class="jumbotron container-fluid">
			
			<div class="text-center">
				<img src="images/moses.jpg" class="img-circle img-responsive" alt="Circular holding">
				<h1 style="color:white;">Moses Jerome C. Lucas </h1>
				<p style="color:white;"> Programmer of this Linear Algebra Matrix Calculator.<br> 
					A Partial Requirement for the fullfilment of the Subject Linear Algebra.<br>
					Special Thanks to PUP San Juan, and to our professor 'Jeffrey Costales'</p>
			</div>
		
	</div></section>


	<section>
	<style>
		footer{
			background: #4D3382;
			color: white;
			font-size: 20px;
			padding: 20px;
	
		}
	</style>

		<footer>
			<div class="container">
				<div class="row">
					
					<div class="container">
					<div class="col-sm-6 col-sm-offset-6">

					</div>
					</div>
					
				        <small>Copyright &copy; 2015<?php if(date("Y")!=2015)echo" - ".date("Y")."";?> <text class="text-blue">PUP San Juan Matrix </text></strong> All rights reserved.


				</div>
			</div>

		</footer>

		</section>
	</div>
</div>


	



			
	
	
	


<script src="js/ContentHover.js"></script>
	
<script type="text/javascript">
$('document').ready(function(){


	$('.tlt').textillate({
		loop:true,
		 out: { effect: 'flipOutY' }

	});

	$('.info').on('click',function(){
		var infoId = $(this).attr('data-infoid');
		$('#'+infoId).fadeOut(1000).fadeIn(800);

	});

});



	







</script>