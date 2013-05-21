	$(document).ready(function(){
						$(".menu li a:first").addClass("active");
						$(".menu li a").click(function() {
							$(".menu li a.active").removeClass("active");
							$(this).addClass("active");		
						   var elementClicked = $(this).attr("href");
						   var destination = $(elementClicked).offset().top;
						   $("html:not(:animated),body:not(:animated)").animate({ scrollTop: destination-160}, 700 );
						   return false;	   
						});
