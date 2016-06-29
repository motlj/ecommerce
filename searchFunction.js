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
					if (items.length > 0) {
						$.each(items, function(key, value){
							$('#searchResults').append('<div class="row"><div class="col-xs-12 col-sm-8 col-md-8 col-lg-8"><h1>' + value.product_name + '</h1><p>' + value['description'] + '</p><h3>Price: $' + value.price + '</h3></div><div class="col-xs-12 col-sm-4 col-md-4 col-lg-4"><img id="searchImage" src="' + value.image_link + '"></div><form method="GET" action="productDetails.php"><input type="hidden" name="id" value="' + value['id'] + '"><input type="submit" class="btn btn-success form-actions" value="More Details"></form><hr></div>');
						});						
					} else {
						$('#searchResults').append('<div class="col-xs-12 col-md-12 col-lg-12"><p>Your search did not return any results. Please try again.</p></div>');
					}
				}
			});
		}
	});
});