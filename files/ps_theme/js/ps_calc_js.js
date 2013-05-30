$(document).ready(function(){

$('.nightvalue').prop("disabled", true);
$('.holidayvalue').prop("disabled", true);
$('.otvalue').prop("disabled", true);

      $( ".tip-title" ).tooltip({
      position: {
        my: "center bottom-20",
        at: "center top",
        using: function( position, feedback ) {
          $( this ).css( position );
          $( "<div>" )
            .addClass( "arrow" )
            .addClass( feedback.vertical )
            .addClass( feedback.horizontal )
            .appendTo( this );
        }
      }
    });

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
	
$('input.val-warning').change(function(){

  var get_val_warning = $(this).closest(this).val();
  if (get_val_warning == 0 ) {
      $(this).removeClass('val-warning');
  }else{
      $(this).addClass('val-warning');

  }

});

$('.remove-btn').click(function(){
	//$(this).closest('tr').remove();
  //alert('hi');
  //$('#dialog-confirm-remove').dialog('open');
   var check_class = $(this).closest('tr').find('input.val-warning').hasClass('val-warning') ;
   if (check_class == 0) {
      $(this).closest('tr').remove();
   }else{
      alert("Remove input value or Set input value to 0");
      $(this).closest('tr').find('input.val-warning').trigger('focus');
   }

   
   

});


    $( "#dialog-confirm-remove" ).dialog({
      autoOpen: false,
      resizable: false,
      height:180,
      modal: true,
      buttons: {
        "Ok": function() {
          $( this ).dialog( "close" );
          $('.remove-btn').remove();

        },
        Cancel: function() {
          $( this ).dialog( "close" );
        }
      }
    });

}); //end document