<?php


?>


<html>
 <head>
  <title>ATD API Test</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 </head>
 <body onload="loadTbl()">
 <div class="container">
 	<div class="row">
    	<div class="col-sm-12">
    		<h1>Product Search</h1>
    	</div>
    </div>
     <div class="row">
    	<div class="col-sm-12">
    		<div class="input-group mb-3">
			  <div class="input-group-prepend">
			    <button onclick="loadTbl()" class="btn btn-outline-secondary" type="button">Search</button>
			  </div>
			  <input id="title1" type="text" class="form-control" placeholder="Title..." aria-label="" aria-describedby="basic-addon1">
			</div>
    	</div>
    </div>
    <div class="row">
    	<div class="col-sm-12">
	 		<table class="table table-striped">
		  		<thead class="thead-dark">
		    		<tr>
			        	<th scope="col">Image</th>
			        	<th scope="col">Title</th>
			        	<th scope="col">Destination</th>
		             </tr>
		  		</thead>
			    <tbody id="prodTbody">
			    </tbody>
			</table>
		</div>
  	</div>
 </div>
 </body>
 <script
  src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
 <script type="text/javascript">
 	"use strict";
 	const loadTbl = ( search ) => {
 		const title = $('#title1').val();
 		$.ajax({
			type: "POST",
			url: "getProducts.php",
			data: {
				'title': title
			},
			success: function(data){
				let json=JSON.parse(data);
				json = JSON.parse(json);
				console.log( json );
				$('#prodTbody').html('');
				let row = ''
				if( json.data ){
					for( let i = 0; i < json.data.length; i++ ){
						row += '<tr valign="center" id="prodId' + json.data[i].id +'"><td><img alt="No Image" class="img-thumbnail" src="' + json.data[i].img_sml + '" style="width: 85px; height:85px" ></td><td style="vertical-align: middle;">' + json.data[i].title + '</td><td style="vertical-align: middle;">' + json.data[i].dest + '</td></tr>'
						console.log( json.data[i] );
					}
				}
				else {
					row += '<tr><td colspan="3">No Products Found</td></tr>'
				}
				$('#prodTbody').append( row );
			}
		});
 	}

 </script>
</html>