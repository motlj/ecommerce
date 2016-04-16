$("#srch-term").keyup(function(){
    if($(this).val()) {
        $("#hidden").hide();
    } else {
        $("#hidden").show();
    }   
});