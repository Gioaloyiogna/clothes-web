//showing and hiding the sign up and sign in forms

$(document).ready(function(){
    $("#create-account").click(function(){
      $("#sign-in").slideUp("slow",function(){
        $("#sign-up").slideDown("slow");


      });

    });
    $("#log-in").click(function(){
      $("#sign-up").slideUp("slow",function(){
        $("#sign-in").slideDown("slow");


      });

    });

});

//loader
$(window).on('load',function () {
	$(".loader").fadeOut(1000);
	$(".main").fadeIn(1000);
})
