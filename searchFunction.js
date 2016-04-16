$(document).ready(function(){
	$("#srch-term").on('input', function(){
		return $.ajax({
			type: "POST",
			datatype : "json",
			url: "liveSearch.php",
			data: { terms: $("#srch-term").val() },
			success : function(results){
				//console.log(results);
				
			$('#searchResults').html("");
				$.each($.parseJSON(results), function(key, value){
					$('#searchResults').append('<div class="col-xs-12 col-md-12 col-lg-12"><h1>' + value.product_name + '</h1><p>' + value['description'] + '</p><h3>' + value.price + '</h3><form method="GET" action="productDetails.php"><input type="hidden" name="id" value="' + value['id'] + '"><input type="submit" value="More Details"></form></div>');
				});

				//return results from json file using php
				//using post send input to search.php
				//search.php will take the input and use pdo to fetchAll
				//convert php array to json
				//set fetchAll to return an array in a json object
				//jquery pagination
			}
		})
	})
})