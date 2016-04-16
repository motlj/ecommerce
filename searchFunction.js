$(document).ready(function(){
	$("#srch-term").on('input', function(){			
		$('#searchResults').html("");
		var searchTerm = $("#srch-term").val();
		console.log(searchTerm);
		if (searchTerm != null && searchTerm != "") {
			console.log(searchTerm);
			return $.ajax({
				type: "POST",
				datatype : "json",
				url: "liveSearch.php",
				data: { terms: searchTerm },
				success : function(results){
					//console.log(results);
					var items = $.parseJSON(results);
					console.log(items);
					//if () {
						$.each(items, function(key, value){
							$('#searchResults').append('<div class="col-xs-12 col-md-12 col-lg-12"><h1>' + value.product_name + '</h1><p>' + value['description'] + '</p><h3>' + value.price + '</h3><form method="GET" action="productDetails.php"><input type="hidden" name="id" value="' + value['id'] + '"><input type="submit" value="More Details"></form><hr></div>');
						});						
					//} else {
						//$('#searchResults').append('<div class="col-xs-12 //col-md-12 col-lg-12"><p>Your search did not return //any results. Please try again.</p></div>');
					//}
				}
			});
		}
	});
});