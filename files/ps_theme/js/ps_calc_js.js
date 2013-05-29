$(document).ready(function(){

var total_inc = $('#total_increment').val();

for (var i = 0; i <= total_inc; i++) {


		// get value for night , holiday , ot
		var night_checkbox = $("input[name='night_checkbox-"+i+"']"),
	    night_textbox = $("input[name='night_textbox-"+i+"']");

	     // condition > click for night , holiday , ot
		night_checkbox.click(function() {
		    night_textbox.attr("disabled", !night_checkbox.is(":checked")).val('0');
		});

			// condition for night , holiday , ot
		if ( $(night_checkbox).is(':checked') !=true ){
			$(night_textbox).val('0');
			$(night_textbox).attr("disabled", true);
		}
	
};	

		

}); //end document