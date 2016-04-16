var searchInput = document.getElementById("srch-term").innerHTML;
console.log(searchInput);
var search = $("#srch-term").val();


$(document).ready(function(){
	$("#srch-term").on('input', function(){
		$.ajax({
			method: "POST",
			datatype : "json",
			url: 'liveSearch.php?srch-term=' + this.search,
			data: { terms: $("#srch-term").val() },
			success : function(results){
				console.log(results);
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