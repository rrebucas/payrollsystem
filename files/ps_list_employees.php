<?php

require_once ('ps_connect_db.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<link href="ps_includes/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"/>
<link rel="stylesheet" type="text/css" href="ps_theme/css/list.css"/>
<link rel="stylesheet" type="text/css" href="ps_theme/css/floating_img.css"/>
</head>
<body>
<header>
	<div id="list-wrapper">
		<h1>List of <span>Employees</span></h1>
		<div id="top-btn">
			
	
					<a id="refresh-btn" data-toggle="tooltip" data-placement="bottom" class="tip-title" title="Refresh">Refresh</a>
					<a id="close-btn" href="calendar.php" data-toggle="tooltip" data-placement="bottom" class="tip-title" title="Close">Close</a>

		</div>
	</div>
</header>
<div id="content-list-employee">
	<div id="search">
		<form action="<?=$_SERVER['PHP_SELF']?>" method="GET">
			<p>
				Enter <strong>Employee's Name</strong><em>(i.e. Renante, Aljohn, Jegger, Rudy)</em>
			</p>
			<input class="search-here" type="text" value="" name="search_key" size="45"/>
			<input class="btn" type="submit" value="search"  name="submit"/>
		</form>
	</div>
	<?php
			if ( (isset($_GET['submit'])) or !empty($_GET['searchpage']) ){

				if(!empty($_GET['search_key'])) {
					$search_key = trim($_GET['search_key']);

				}else{

					$search_key='';
				}

			
			
	?>
	<table border="1" width="550" class="table-striped">
	<thead>
	<tr>
		<th>
			ID No.
		</th>
		<th>
			Employee's Name
		</th>
		<th>
			Action
		</th>
	</tr>
	</thead>
	<tbody>
		<?php
			$result_employee_list = mysqli_query($con,"SELECT * FROM seg_employee_list");

			$num_employee_list=mysqli_num_rows($result_employee_list);

			//count all rows
			$countall_employee_list = "SELECT COUNT(*) FROM seg_employee_list WHERE name LIKE '$search_key%' ";
			$queryall_employee_list = mysqli_query($con, $countall_employee_list);
			$fetchall_employee_list = mysqli_fetch_row($queryall_employee_list);
			$searchall_employee_list = $fetchall_employee_list[0];
			// number of rows to show per page
			$rowsperpage_search = 2;
			$totalpages_search = ceil($searchall_employee_list / $rowsperpage_search);
			if (isset($_GET['searchpage']) && is_numeric($_GET['searchpage'])) {
			   $currentpage_search = (int) $_GET['searchpage'];
			} else {
			   $currentpage_search = 1;
			}
			if ($currentpage_search > $totalpages_search) {
			   $currentpage_search = $totalpages_search;
			} 
			if ($currentpage_search < 1) {
			   $currentpage_search = 1;
			} 
			$offset_search = ($currentpage_search - 1) * $rowsperpage_search;

			$limit_employee_list = mysqli_query($con, "SELECT  * FROM seg_employee_list WHERE name LIKE '%$search_key%' LIMIT $offset_search, $rowsperpage_search" );

			$numrows_employee_list = mysqli_num_rows($limit_employee_list);

			if ($num_employee_list == 0){
				?>
				<tr>
					<td colspan="3" style=" text-align: center; "> <strong class="text-error">0</strong> Result for Employees List</td>

				</tr>

				<?php
			}// end if
			else {

				if ($search_key = null || $search_key == '') {

					while($row_employee_list = mysqli_fetch_array($limit_employee_list))
			  			{
							?>
							<tr>
								<td>
									<?php echo $row_employee_list['id']; ?>
								</td>
								<td>
									<?php echo $row_employee_list['name']; ?>
								</td>
								<td>
									<center><a href="ps_employee_listview.php?employee_id=<?php echo $row_employee_list['id'] ; ?>" class="btn btn-info btn-mini">view</a></center>
								</td>
							</tr>
							<?php
					} // end while employee list
				} //end if
				else{

					$search_key = trim($_GET['search_key']);

					$result_employee_list_key = mysqli_query($con,"SELECT * FROM seg_employee_list WHERE name LIKE '$search_key%' LIMIT $offset_search, $rowsperpage_search" );


					$num_employee_list_key =mysqli_num_rows($result_employee_list_key);

					if ($num_employee_list_key == 0) {
						?>
						<tr>
							<td colspan="3" style=" text-align: center; "> <strong class="text-error">0</strong> Result for <em>'<?php echo "$search_key"; ?>'</em></td>

						</tr>

						<?php
					}
					else {

						
						
						while($row_employee_list_key = mysqli_fetch_array($result_employee_list_key))
				  			{
								?>
								<tr>
									<td>
										<?php echo $row_employee_list_key['id']; ?>
									</td>
									<td>
										<?php echo $row_employee_list_key['name']; ?>
									</td>
									<td>
										<center><a href="ps_employee_listview.php?employee_id=<?php echo $row_employee_list_key['id'] ; ?>" class="btn btn-info btn-mini">view</a></center>
									</td>
								</tr>
								<?php
						} // end while employee list

					}//end else

				} //end else


				} // end else
			?>
	</tbody>
	</table>
	<?php

	if ( ($numrows_employee_list == 0) ){
		# code...
	} else {
?>
<div class="pagination pagination-small pagination-centered">
<ul>
<?php
	// range of num links to show
	$range_search = 5;

	// if not on page 1, don't show back links
	if ($currentpage_search > 1) {
	   // show << link to go back to page 1
	   // get previous page num
	   $prevpage_search = $currentpage_search - 1;
	   // show < link to go back to 1 page
	   $search_key = trim($_GET['search_key']);
	   echo " <li><a href='{$_SERVER['PHP_SELF']}?search_key=$search_key&searchpage=$prevpage_search' class='link' title='Go to the previous page'>&laquo;</a></li> ";
	} // end if 

	// loop to show links to range of pages around current page
	for ($x_search = ($currentpage_search - $range_search); $x_search < (($currentpage_search + $range_search) + 1); $x_search++) {
	   // if it's a valid page number...
	   if (($x_search > 0) && ($x_search <= $totalpages_search)) {
	      // if we're on current page...
	      if ($x_search == $currentpage_search) {
	         // 'highlight' it but don't make a link
	         echo " <li class='active'><a><span class='active'>$x_search</span></a></li> ";
	      // if not current page...
	      } else {
	         // make it a link
	      	$search_key = trim($_GET['search_key']);
	         echo " <li><a href='{$_SERVER['PHP_SELF']}?search_key=$search_key&searchpage=$x_search' class='number'>$x_search</a></li> ";
	      } // end else
	   } // end if 
	} // end for

// if not on last page, show forward and last page links        
if ($currentpage_search != $totalpages_search) {
   // get next page
   $nextpage_search = $currentpage_search + 1;
    // echo forward link for next page 
   echo " <li><span><a href='{$_SERVER['PHP_SELF']}?search_key=$search_key&searchpage=$nextpage_search' class='link' title='Go to the next page'>&raquo;</a></span></li> ";
   // echo forward link for lastpage

} // end if
/****** end build pagination links ******/





			} // end else pagination
		} // end main if
		
?>
	<!--
		<ul>
			<li class="disabled"><a href="#">Prev</a></li>
			<li class="active"><a href="#">1</a></li>
			<li><a href="#">2</a></li>
			<li><a href="#">3</a></li>
			<li><a href="#">4</a></li>
			<li><a href="#">5</a></li>
			<li><a href="#">Next</a></li>-->
		</ul>
	</div> <!-- end pagination-->

	<br>
	<br>
</div>
	<div class="clear"></div>
	<div id="divBottomRight">
	<a><img src="ps_theme/images/seglogo.png" alt="" title="Segworks Technologies Corporation"/></a>
</div>

	<!--Page Generated-->
	<?php $start_time = microtime(true); 
		$time_gen = number_format(microtime(true) - $start_time, 9);
	?>
<pre class="prettyprint" id="page=generated" style="width: 90%; margin-left:30px;">
	 This page was generated in <span class="atv"><?php echo"$time_gen"; ?>
	</span> seconds.
</pre>

<script type="text/javascript" src="ps_theme/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="ps_theme/js/floating_image.js"></script>
<script type="text/javascript" src="ps_theme/js/float_image.js"></script>

<script src="ps_includes/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript">
   jQuery( ".tip-title" ).tooltip({
	      show: {
	        effect: "slideDown",
	        delay: 250
	      }
	    });
	   jQuery('#refresh-btn').click(function(){
	   		location.reload();
	    });
	   jQuery('#close-btn').click(function(){
	   		window.close();
	    });

</script>
</body>
</html>
<?php
mysqli_close($con);
?>