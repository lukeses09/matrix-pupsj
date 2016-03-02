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
    <!-- FRACTION-->
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

<script>
$('#btn_generate').click(function(){
	$(this).removeClass('btn-success');
	var row = $('#row').val();
	var col = $('#col').val();	
	$('#div_grid').css('display','block');
      $('html, body').animate({
          scrollTop: $("#table_grid").offset().top
      }, 1000);   	 
   create_table(row,col);
});

function create_table(m,n){
	var rows = m; //here's your number of rows and columns
	var cols = n;
	var table = $('#table_grid');
	$("#table_grid tr").remove();	
	for(var r = 0; r < rows; r++)
	{
	    var tr = $('<tr style="width:20px">');
	    for (var c = 0; c < cols; c++)
	        $('<td> <div id="celldiv'+r+''+c+'"><input id="cell'+r+''+c+'" type="text" class="form-control"></div> </td>').appendTo(tr); //fill in your cells with something meaningful here
	    tr.appendTo(table);
	}

	table.appendTo('#div_table'); //Add your resulting table to the DOM, I'm using the body tag for example
}

$('#btn_solve').click(function(){
	initial();

})

function initial(){
	$('#btn_solve').prop('disabled',true);
	var rows = $('#row').val();
	var cols = $('#col').val();	
	var append = ' <hr style="margin-top:50px">';
	append += '<div class="row"> <div class="col-md-3"></div> <div class="col-md-6" style="text-align:center"> <h2 class="text-info"><i class="ion-ios-list-outline"></i> Solution: </h2></div> <div class="col-md-3"></div> </div>';
	append += ' <div id="div_initial" class="row" style="margin-top:15px"> ';
	append += '<div class="col-md-3"></div>';
	append += '<div class="col-md-4" id="div_initial_table"> ';
	append += '<table id="table_initial" class="table table-condensed table-bordered"> <tbody></tbody> </table> ';
	append += '</div> <div class="col-md-2"> <h5> Given Matrix </h5> </div> <div class="col-md-3"></div> ';
	$('#main').after(append);

	var table = $('#table_initial');
	$("#table_initial tr").remove();	
	for(var r = 0; r < rows; r++)
	{
	    var tr = $('<tr style="width:20px">');
	    for (var c = 0; c < cols; c++)
	        $('<td id="initial'+r+''+c+'">'+ $('#cell'+r+''+c).val() +'</td>').appendTo(tr); //fill in your cells with something meaningful here
	    tr.appendTo(table_initial);
	}

	table.appendTo('#div_initial_table'); //Add your resulting table to the DOM, I'm using the body tag for example	

	$('#div_initial').css('display','block');
      $('html, body').animate({
          scrollTop: $("#table_grid").offset().top
      }, 1000);   	
  $('#div_grid').css('display','none');
  compute();
}

function compute(){
	var row = $('#row').val();
	var col = $('#col').val();
	lead1(row,col);	
}

function lead1(row, col){
	var first = $('#initial00').val();
	if(first==1){}
	else{
		copyTable('op0_','STEP 1: Lead Entry for 1st Row',row,col,'initial');
	}
}

function copyTable(id_table,desc,rows,cols,copyfrom){
	var append = ' <hr style="margin-top:15px">';
		append += ' <div id="div_"'+id_table+' class="row" style="margin-top:15px"> ';
		append += '<div class="col-md-3"></div>';
		append += '<div class="col-md-4"> ';
		append += '<table id="'+id_table+'" class="table table-condensed table-bordered"> <tbody></tbody> </table> ';
		append += '</div> <div class="col-md-2"> <h5> '+desc+' </h5> </div> <div class="col-md-3"></div> ';
		$('#div_'+copyfrom).after(append);

		var table = $('#'+id_table);
		for(var r = 0; r < rows; r++)
		{
		    var tr = $('<tr style="width:20px">');
		    for (var c = 0; c < cols; c++)
		        $('<td id="'+id_table+''+r+''+c+'">'+ $('#'+copyfrom+r+''+c).text() +'</td>').appendTo(tr); //fill in your cells with something meaningful here
		    tr.appendTo('#'+id_table);
		}

		table.appendTo('#'+id_table); //Add your resulting table to the DOM, I'm using the body tag for example	
		create_lead(0,cols,id_table,0);
}

function create_lead(x,y,id_table,leadingcol){
	for (var c = 0; c < y; c++){
		$('#'+id_table+x+c).text( ( (1/$('#'+id_table+x+leadingcol).text()) * $('#'+id_table+x+c).text()) );
		alert(new Fraction(0.3435));
	}

}

function validate(){
	var rows = $('#row').val();
	var cols = $('#col').val();	

	var err = false;

	for(var r = 0; r < rows; r++)
	{
	  for (var c = 0; c < cols; c++){
	  	if( isNaN($('#cell'+r+''+c).val()) == true  )
	  		$('#celldiv'+r+''+c).addClass('has-error');
	  	else{
	  		$('#celldiv'+r+''+c).removeClass('has-error');	  		
	  	}
	  }
	}	
}

function fractodeci(a){
	var split = a.split('/');
	var result = parseInt(split[0], 10) / parseInt(split[1], 10);
	return result;bbbb
}

</script>

</html>


	



			
	
	
	



