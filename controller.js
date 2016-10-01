var mx = new Array([]);
var row;
var col;

$('#btn_generate').click(function(){
	$(this).removeClass('btn-success');
	row = $('#row').val();
	col = $('#col').val();	

	for(var i=0; i<row; i++){
		mx[i] = [];
	}//to declare 2D arrays

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

	for(var x=0; x<row; x++){
		//var cell = new Array();
		for(var y=0; y<col; y++){
			mx[x][y] = $('#cell'+x+y).val();
		}
	}
	/* ---------------------------------- */
	show_given();

	var o=1;
	for(; o<=row; o++){
			var n = parseInt(o-1);

			var append = ' <hr style="margin-top:50px">';
			append += ' <div id="stripe_'+o+'" class="row" style="margin-top:15px">';
			append += '<div class="col-md-3"></div>';
			append += '<div class="col-md-4" id="div_stripe_'+o+'"> ';
			append += '<table id="table_'+o+'" class="table table-condensed table-bordered"> <tbody></tbody> </table> ';
			append += '</div> <div class="col-md-2"> <h5> Step '+o+':  </h5> </div> <div class="col-md-3"></div> ';
			$('#stripe_'+n).after(append);

			var table = $('#table_'+o);
			// $("#table_"+o+" tr").remove();	

			for(var y = 0; y < row; y++){
			    var tr = $('<tr style="width:20px">');
				for(var x=0; x<col; x++){
					if(y==(o-1) &&  x!=(o-1) ){
						mx[y][x] = 0; //make cell zero
					}
					else if(y==(o-1) &&  x==(o-1) ){
						mx[y][x] = 1; //make cell one
					}					
					$('<td>'+mx[y][x]+'</td>').appendTo(tr);
				}
			    
			    tr.appendTo("#table_"+o);
			}

			table.appendTo('#div_stripe_'+o); 
	} // loop end
} // end f.initial


function show_given(){
	var append = ' <hr style="margin-top:50px">';
	append += '<div class="row"> <div class="col-md-3"></div> <div class="col-md-6" style="text-align:center"> <h2 class="text-info"><i class="ion-ios-list-outline"></i> SOLUTION: </h2></div> <div class="col-md-3"></div> </div>';
	append += ' <div id="stripe_0" class="row" style="margin-top:15px"> ';
	append += '<div class="col-md-3"></div>';
	append += '<div class="col-md-4" id="div_stripe_0"> ';
	append += '<table id="table_0" class="table table-condensed table-bordered"> <tbody></tbody> </table> ';
	append += '</div> <div class="col-md-2"> <h5> Given Matrix </h5> </div> <div class="col-md-3"></div> ';
	$('#main').after(append);

	var table = $('#table_0');
	$("#table_0 tr").remove();	
	for(var y = 0; y < row; y++)
	{
	    var tr = $('<tr style="width:20px">');
				for(var x=0; x<col; x++){
					$('<td>'+mx[y][x]+'</td>').appendTo(tr);
				}
	    
	    tr.appendTo("#table_0");
	}

	table.appendTo('#div_stripe_0'); //Add your resulting table to the DOM, I'm using the body tag for example	

	$('#div_stripe_0').css('display','block');
      $('html, body').animate({
          scrollTop: $("#table_grid").offset().top
      }, 1000);   	
  $('#div_grid').css('display','none');	
} // end f.show_given

function stripe(mx,row,col,x,y){
	// alert("row= "+row,' col='+col+' x= '+x+' y='+y);
} // end stripe()



/*
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

function create_lead(row,col,id_table,leadingcol){
	var lead = $('#'+id_table+ row + leadingcol).text();
	for (var iterate  = 0; iterate < col; iterate++){
		var cellVal = $('#'+id_table+ row + iterate).text();
		var data = math.multiply( math.fraction(cellVal),math.fraction(math.inv(lead))) ;
	/*		if(isWhole(data)==true)
				$('#'+id_table+row+iterate).text( data );  //RECIPROCAL
			else
				//alert(clean(data));
				//$('#'+id_table+row+iterate).text( clean(data)  );  //RECIPROCAL
			
	}

}
*/
function isWhole(num){
	if(num%1==0)
		return true;
	else
		return false;
}

function isNegative(num){
	if(num<0)
		return true;
	else
		return false;
}

function isNegativeFraction(num){
	if(num.slice(0,1)=='-')
		return true;
	else
		return false;
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


function clean(num){
	var rgx = /[()]/g;
	var x = num.replace(rgx, ''); // remove
	return x;
}

/*______________________________________________*/

Number.prototype.fraction=fraction;
function fraction(decimal){
	if(!decimal){
		decimal=this;
	}
	whole = String(decimal).split('.')[0];
	decimal = parseFloat("."+String(decimal).split('.')[1]);
	num = "1";
	for(z=0; z<String(decimal).length-2; z++){
		num += "0";
	}
	decimal = decimal*num;
	num = parseInt(num);
	for(z=2; z<decimal+1; z++){
		if(decimal%z==0 && num%z==0){
			decimal = decimal/z;
			num = num/z;
			z=2;
		}
	}
	return ((whole==0)?"" : whole+" ")+decimal+"/"+num;
}
