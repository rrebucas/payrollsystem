		$(document).ready(function(){

						$("ul li a:first").addClass("active");
						$("ul li a").click(function() {
							$("ul li a.active").removeClass("active");
							$(this).addClass("active");		
						   var elementClicked = $(this).attr("href");
						   var destination = $(elementClicked).offset().top;
						   $("html:not(:animated),body:not(:animated)").animate({ scrollTop: destination-160}, 700 );
						   return false;	   
						});
});