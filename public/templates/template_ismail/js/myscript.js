$("document").ready(function () {
    $("#button-cart").click(function () {
        $("#sidebar").toggle('slow');
    });
    $('.close').click(function(){
        $('#sidebar').hide('fast');
    });
}); 


