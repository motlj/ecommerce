var searchInput = document.getElementById("srch-term").innerHTML;
console.log(searchInput);


$(document).ready(function(){
	$("#srch-term").on('input', function(){
		$.AJAX({
			method: "POST",
			datatype : 
			url: 'search.php?term=' + this.val
			data: { terms: $("#srch-term").val() },
			success : function(results){
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