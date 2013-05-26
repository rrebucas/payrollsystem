		function move_upper_left()
	{
	floatingArray[0].targetTop=10;
	floatingArray[0].targetBottom=undefined;
	floatingArray[0].targetLeft=10;
	floatingArray[0].targetRight=undefined;
	floatingArray[0].centerX=undefined;
	floatingArray[0].centerY=undefined;
	}
		function move_lower_right()
	{
	floatingArray[0].targetTop=undefined;
	floatingArray[0].targetBottom=10;
	floatingArray[0].targetLeft=undefined;
	floatingArray[0].targetRight=10;
	floatingArray[0].centerX=undefined;
	floatingArray[0].centerY=undefined;
	}
	
	
//-----------------------------------------------------------
var acx_fsmi_tracking_cookie_name="_acx_fsmi_until";
var acx_fsmi_page_count_cookie_name="_acx_fsmi_page_count";
var acx_fsmi_tracking_cookie_val=acx_fsmi_get_cookie(acx_fsmi_tracking_cookie_name);
var acx_fsmi_page_count_cookie_val=acx_fsmi_get_cookie(acx_fsmi_page_count_cookie_name);
var animate_or_not="no";
var acx_fsmi_today = new Date();
if(acx_fsmi_page_count_cookie_val==null)
acx_fsmi_page_count_cookie_val = 0;
else
acx_fsmi_page_count_cookie_val = (acx_fsmi_page_count_cookie_val % 1 ) +1;
expires_date = new Date( acx_fsmi_today.getTime() + (24 * 60 * 60 * 1000) );
document.cookie = acx_fsmi_page_count_cookie_name + "=" + acx_fsmi_page_count_cookie_val + ";expires=" + expires_date.toGMTString() + ";path=/";


function acx_fsmi_get_cookie( name )
{
var start = document.cookie.indexOf( name + "=" );
//alert(document.cookie);
var len = start + name.length + 1;
if ( ( !start ) && ( name != document.cookie.substring( 0, name.length ) ) )
{
return null;
}
if ( start == -1 ) return null;
var end = document.cookie.indexOf( ";", len );
if ( end == -1 ) end = document.cookie.length;
return unescape( document.cookie.substring( len, end ) );
}


function fsmi_float()
{
if("page_count_only" == "delay_only" && "page_count_only" != "both")
{
if(acx_fsmi_tracking_cookie_val!=1)
{
animate_or_not="yes";
expires_date = new Date(acx_fsmi_today.getTime() + (60 * 1000));
document.cookie = acx_fsmi_tracking_cookie_name + "=1;expires=" + expires_date.toGMTString() + ";path=/";
} else
{
animate_or_not="no";
}
}
else if("page_count_only" == "page_count_only" && "page_count_only" != "both")
{
if(acx_fsmi_page_count_cookie_val==0 || acx_fsmi_page_count_cookie_val == 1)
{
animate_or_not="yes";
} else
{
animate_or_not="no";
}
} else if("page_count_only" == "both")
{
if(acx_fsmi_tracking_cookie_val!=1 || acx_fsmi_page_count_cookie_val==0 || acx_fsmi_page_count_cookie_val == 1)
{
animate_or_not="yes";
expires_date = new Date(acx_fsmi_today.getTime() + (60 * 1000));
document.cookie = acx_fsmi_tracking_cookie_name + "=1;expires=" + expires_date.toGMTString() + ";path=/";
} else
{
animate_or_not="no";
}
}
}
fsmi_float();
//-----------------------------------------------------------	
if(animate_or_not=="yes")
	{		
		floatingMenu.add('divBottomRight',  
			{
								 targetTop: 0, 
				 targetLeft: 0,
				
			});
	} else
	{		
		floatingMenu.add('divBottomRight',  
			{
								 targetBottom: 0, 
				 targetRight: 0,
							});
	}
if(animate_or_not=="yes")
{			
	jQuery(window).load(function(){
		 setTimeout("move_lower_right()",150);
		});
}