$(document).ready(function(){
   $("#settings").on("click", function(){
      if ($("#login-form").is(':visible')){$("#login-form").slideUp();}
      if ($('#logged-form').is(':visible')){$("#logged-form").slideUp();}
      $("#options").slideToggle();
   });
   
   $("#register-button").on("click", function(){
   var userid = sessionStorage['userid'];
	if (typeof userid !== 'undefined'){
		if ($('#options').is(':visible')){$("#options").slideUp();}
		if ($('#logged-form').is(':visible')){$("#logged-form").slideUp();}
		$("#login-form").slideToggle();
		$("#loginform").hide();
		$("#registerform").hide();
		$("#logoutform").show();
	}else{
      if ($('#options').is(':visible')){$("#options").slideUp();}
      if ($('#logged-form').is(':visible')){$("#logged-form").slideUp();}
      $("#login-form").slideToggle();
	  $("#logoutform").hide();
   }});
   
   $("#logged-button").on("click", function(){
      if ($('#options').is(':visible')){$("#options").slideUp();}
      if ($("#login-form").is(':visible')){$("#login-form").slideUp();}
      $("#logged-form").slideToggle();
   });
   $(".up").on("click", function(){
	    var varID = $(this).attr('id');
		var userid = sessionStorage['userid'];
		if (typeof userid == "undefined"){alert ("You need to login to vote.");} else {
		   $.post( "vote.php", { type: "up", vote: varID, user: userid})
			   .done(function( data ) {
			   alert(data);
		   });
		}

   });
   $(".down").on("click", function(){
		var userid = sessionStorage['userid'];
	    var varID = $(this).attr('id');
      if (typeof userid == "undefined"){alert ("You need to login to vote.");} else {
		   $.post( "vote.php", { type: "down", vote: varID, user: userid})
			   .done(function( data ) {
			   alert(data);
		   });
      }
   });
   
});
