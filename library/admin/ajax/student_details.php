
<?php
	include('../init_connect.php');
	
	 
	$student_id = $_GET['id'];
	

?>

<div class="panel-body">
  				<?php // select the edit values
				$q3 = "SELECT student_register.student_id, first_name, last_name, dvd_code_user.dvd_code_id, dvd.dvd_title,
						dvd_code.dvd_code
						FROM student_register
						JOIN dvd_code_user ON dvd_code_user.student_id = student_register.student_id
						JOIN dvd_code ON dvd_code.dvd_code_id = dvd_code_user.dvd_code_id
						JOIN dvd ON dvd.dvd_id = dvd_code.dvd_id
						WHERE student_register.student_id = '$student_id'";
				$r3 = mysqli_query($conn, $q3) or trigger_error(mysqli_error($conn));
				?>
         					<table class="table table-bordered table-hover table-striped display" id="example" >
  											<thead>
  												<tr>
  													<th><i class="fa fa-caret-right"></i> DVD Title</th>
  													<th><i class="fa fa-caret-right"></i> Code Used</th>
  												</tr>
  											</thead>
  											<tbody>
  											<?php
  											while ($row3 = mysqli_fetch_array($r3, MYSQLI_ASSOC) ) {
  											?>
  											<tr>
  												<td><?php echo $row3['dvd_title']; ?> </td>
  												<td><label class="btn btn-danger"><?php echo $row3['dvd_code']; ?> </label></td>
  											</tr>
          
  											<?php } ?>
  										</tbody>
  										
  										</table>
  									</div>
									
<?php
// close database connection if open 
	if (isset($conn))
	{
		mysqli_close($conn);
	}
			
?>