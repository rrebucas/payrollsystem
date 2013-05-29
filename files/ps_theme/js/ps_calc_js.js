$(document).ready(function(){

$('.nightvalue').prop("disabled", true);
$('.holidayvalue').prop("disabled", true);
$('.otvalue').prop("disabled", true);

//night ?
$("input.night").change(function() {
  if ($(this).is(":checked")) {
  	 //alert('if');
  	  $(this).closest('tr').find('.nightvalue').prop("disabled", false).trigger('focus');
  }
  else{
	  //alert('else');
	  $(this).closest('tr').find('.nightvalue').prop("disabled", true ).val('');
  }
});

// holiday ?
$("input.holiday").change(function() {
  if ($(this).is(":checked")) {
  	 //alert('if');
  	  $(this).closest('tr').find('.holidayvalue').prop("disabled", false).trigger('focus');
  }
  else{
	  //alert('else');
	  $(this).closest('tr').find('.holidayvalue').prop("disabled", true ).val('');
  }
});
// ot ?

$("input.ot").change(function() {
  if ($(this).is(":checked")) {
  	 //alert('if');
  	  $(this).closest('tr').find('.otvalue').prop("disabled", false).trigger('focus');
  }
  else{
	  //alert('else');
	  $(this).closest('tr').find('.otvalue').prop("disabled", true ).val('');
  }
});
	
$('.remove-btn').click(function(){
	$(this).closest('tr').remove();
});



}); //end document