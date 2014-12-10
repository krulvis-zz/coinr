$(document).ready(function(){
   $("#settings").on("click", function(){
      if ($("#login-form").is(':visible')){$("#login-form").slideUp();}
      if ($('#logged-form').is(':visible')){$("#logged-form").slideUp();}
      $("#options").slideToggle();
   });
   
   $("#register-button").on("click", function(){
      if ($('#options').is(':visible')){$("#options").slideUp();}
      if ($('#logged-form').is(':visible')){$("#logged-form").slideUp();}
      $("#login-form").slideToggle();
   });
   
   $("#logged-button").on("click", function(){
      if ($('#options').is(':visible')){$("#options").slideUp();}
      if ($("#login-form").is(':visible')){$("#login-form").slideUp();}
      $("#logged-form").slideToggle();
   });
   $(".up").on("click", function(){
	    var varID = $(this).attr('id');
		$.post( "vote.php", { type: "up", vote: varID })
			.done(function( data ) {
			alert( "Up voted: " + data );
		});

   });
   $(".down").on("click", function(){
	    var varID = $(this).attr('id');
		var id = <? $_SESSION['Account']->id ?>;
		$.post( "vote.php", { type: "down", vote: varID, userID : id})
			.done(function( data ) {
			alert( "down voted: " + data );
		});

   });
   
});
