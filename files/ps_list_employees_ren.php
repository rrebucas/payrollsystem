<?php

require_once ('ps_connect_db.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<link href="ps_includes/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"/>
<link rel="stylesheet" type="text/css" href="ps_theme/css/list.css"/>
<script src="ps_includes/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<header>
	<h1>List of Employees</h1>
</header>
<div id="content-list-employee">
	<div id="search">
		<form action="#" method="post">
			<p>
				Enter <strong>Employee's Name</strong><em>(i.e. Abc,def)</em>
			</p>
			<input class="search-here" type="text" value="" name="search_key" size="45"/>
			<input class="btn" type="submit" value="search"  name="submit"/>
		</form>
	</div>
	<?php
			if (isset($_POST['submit'])) {

			$search_key = trim($_POST['search_key']);
			
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

			if ($num_employee_list == 0){
				?>
				<tr>
					<td colspan="3" style=" text-align: center; "> <strong class="text-error">0</strong> Result for Employees List</td>

				</tr>

				<?php
			}// end if
			else {

				if ($search_key = null || $search_key == '') {
					while($row_employee_list = mysqli_fetch_array($result_employee_list))
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

					$search_key = trim($_POST['search_key']);

					$result_employee_list_key = mysqli_query($con,"SELECT * FROM seg_employee_list WHERE name LIKE '$search_key%' ");

					$num_employee_list_key=mysqli_num_rows($result_employee_list_key);
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
		} // end if
	?>
	<!-- <div class="pagination pagination-small pagination-centered">
		<ul>
			<li class="disabled"><a href="#">Prev</a></li>
			<li class="active"><a href="#">1</a></li>
			<li><a href="#">2</a></li>
			<li><a href="#">3</a></li>
			<li><a href="#">4</a></li>
			<li><a href="#">5</a></li>
			<li><a href="#">Next</a></li>
		</ul>
	</div> -->
	<br>
	<br>
</div>
	<div class="clear"></div>
	<!--Page Generated-->
	<?php $start_time = microtime(true); 
		$time_gen = number_format(microtime(true) - $start_time, 9);
	?>
<pre class="prettyprint" id="page=generated" style="width: 90%; ">
	 This page was generated in <span class="atv"><?php echo"$time_gen"; ?>
	</span> seconds.
</pre>
</body>
</html>
<?php
mysqli_close($con);
?>