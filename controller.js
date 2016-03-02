math.config({ number:'fraction'   });



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
		var cellVal = $('#'+id_table+x+leadingcol).text();
		$('#'+id_table+x+c).text(math.multiply( math.fraction(cellVal),math.fraction(1/cellVal)      ));  //RECIPROCAL
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
