<?php
	include ('header.php')
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="resources/bootstrap/css/bootstrap.min.css">
    <!-- Bootstrap 3.3.5 -->
    <script src="resources/bootstrap/js/bootstrap.min.js"></script>    
    <!-- jQuery 2.1.4 -->
    <script src="resources/plugins/jQuery/jQuery-2.1.4.min.js"></script>  
    <!-- match.js -->
    <script src="js/math.js"></script>  
    <!-- fraction.js -->
    <script src="resources/plugins/fraction/fraction.js"></script>  
    <!-- Ionicons -->
    <link href="resources/plugins/ionicons/css/ionicons.min.css" rel="stylesheet" type="text/css" />    
</head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Linear Algebra Matrix| Home </title>

<body >
 
	<div class="container-fluid">


		<section id="main" class="content">

			<div class="row" style='text-align:center'>
					<h1 class="text-primary"> <i style="font-size:50px" class="ion-ios-calculator"></i> Linear Algebra Matrix Calculator</h1>
			</div>

			<div class="row" style="margin-top:100px">
				<div class="col-md-3"></div> <!--blank-->
				<div class="col-md-2">
					<label> Number of Rows (m) </label>
					<select class="form-control input-lg" id="row">
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>						
					</select>
				</div>
				<div class="col-md-2">
					<label> Number of Columns (n) </label>
					<select class="form-control input-lg" id="col">
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>						
					</select>
				</div>			
				<div class="col-md-2">
					<label> Type </label>
					<select class="form-control input-lg" id="type">
						<option>RREF</option>
						<option>REF</option>				
					</select>
				</div>							
				<div class="col-md-3"></div> <!--blank-->			
			</div>

			<div class="row" style="margin-top:30px">
				<div class="col-md-5"></div> <!-- blank -->
				<div class="col-md-2">
					<button id="btn_generate" title="Generate Matrix Grid" class="btn btn-lg btn-block btn-success"> <i class="ion-checkmark"></i> Generate </button>
				</div>
				<div class="col-md-5"></div> <!-- blank -->			
			</div>


			<div id="div_grid" class="row" style="margin-top:30px; display:none; text-align:center"> <hr>		
					<h4 class="text-info"> <i class="ion-information-circled"></i> Input data on the fields below </h4>
					<small class="text-warning" style="font-style:italic"> Please enter the elements of the matrix (you can use integers or fractions - do not include a decimal point) e.g. (1/3). <br> All the entries left blank will be interpreted as zeros. 
							When you are done, click on the "Submit" button. </small>
					<br><br>
				<div class="col-md-4"></div> <!--blank-->
				<div class="col-md-4" id ="div_table">
					<table id="table_grid" class="table table-bordered table-condensed">
						<tbody>
						</tbody>
					</table>					
				</div>

				<div class="col-md-4"></div> <!--blank-->			
				<div class="row">
					<div class="col-md-5"></div><!--blank-->			
					<div class="col-md-2"> 
						<button id="btn_solve" class="btn btn-lg btn-block btn-success"> <i class="ion-edit"></i> Solve </button>	
					</div>
					<div class="col-md-5"></div><!--blank-->											
				</div>					
			</div><!--./div_grid-->


		</section>
	</div>


 

</body>
<section style="margin-top:100px">
	<?php include('footer.html'); ?>
</section>

<script src="controller.js"></script>

</html>


	



			
	
	
	



