
<?php
$path = "";
include('partials/header.php'); 

//redirect to index.php if no session
if(!isset($_SESSION['student_id']))
header('location: index.php');

	//---//post dvd code
	if(!empty($_POST['add_dvd_code_btn']))
	{
		$dvd_code = $_POST['dvd_code'];
		
		$dvd_code = mysqli_real_escape_string($conn,$dvd_code);
		
		//authenticate dvd_code and register against user
			//is code available?
			$dvd_avail = getColumnValue($conn, 'dvd_available', 'dvd_code', 'dvd_code', $dvd_code);
			if($dvd_avail=="")
			$code_err = "Invalid Code!";
			elseif($dvd_avail=='0')
			$code_err = "SORRY! Dvd code already used";
			else
			{
				//register dvd against user
				$dvd_code_id = getColumnValue($conn, 'dvd_code_id', 'dvd_code', 'dvd_code', $dvd_code);
				$time_use = date('Y-m-d h:s:i a');
				$student_id = $_SESSION['student_id'];
				
				$insert = "INSERT INTO dvd_code_user (dvd_code_id, time_use, student_id) VALUES ('$dvd_code_id', '$time_use', '$student_id')";
				mysqli_query($conn, $insert) or die(mysqli_error($conn)."Sorry! Cannot complete operation: DVD CODE USR");
				
				//update dvd code table
				$update = "UPDATE dvd_code SET dvd_available='0' WHERE dvd_code='$dvd_code'";
				mysqli_query($conn, $update) or die(mysqli_error($conn)."Sorry! Cannot complete operation: DVD AVAIL");
				
				
			if(!mysqli_error($conn))
				{
					$success_msg = "Dvd Code Added Successfully!";
				?>
					<meta http-equiv="refresh" content="10" >
				<?php
				}
				
			}	
	}
	
	
?>


            <div class="row">
               <div class="col-mod-12">

                  <ul class="breadcrumb">
                   <li><a href="index.php">Dashboard</a></li>
                   <li><a href="#">Library</a></li>
                   <li class="active">Add DVD code</li>
                 </ul>

                 <h3 class="page-header"><i class="fa fa-warning"></i> Add DVD Code <i class="fa fa-info-circle animated bounceInDown show-info"></i> </h3>
					
					        <div class="panel-body">

					<?php
					
					if(!empty($success_msg)) {
												echo '<div class="alert alert-info alert-dismissable">
           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
														<p><h4><i class="fa fa-heart"></i> Successful!</h4>' . $success_msg . '</p></div>';
											 }
					
						if(!empty($code_err))
						echo '<div class="alert alert-danger alert-dismissable">
          					 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							 <p><h4><i class="fa fa-asterisk"></i> Error!</h4>' .$code_err. '</div>';
					?>

				</div>
			</div>
			</div>


        

<!-- Form elements -->
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-cascade">
			<div class="panel-heading">
				<h3 class="panel-title">
					Enter Your Dvd Code
					<span class="pull-right">
						<!-- <a  href="#" class="panel-minimize"><i class="fa fa-chevron-up"></i></a> -->
						<!--  <a  href="#"  class="panel-close"><i class="fa fa-times"></i></a> -->
					</span>
				</h3>
			</div>
			<div class="panel-body">

						<form class="form-horizontal cascade-forms" method="POST" action="" novalidate="novalidate">
							<div class="form-group">
								<label class="col-lg-2 col-md-3 control-label">DVD Code</label>
								<div class="col-lg-10 col-md-9">
									<input type="text" class="form-control form-cascade-control input-small" name="dvd_code" id="dvd_code" required >
								</div>
							</div>
							
							<div class="form-actions">
								<input type="submit" name="add_dvd_code_btn" value="Validate" class="btn bg-primary text-white btn-lg" >
							</div>
						</form>
					</div>
				</div>

			</div>
		</div>



<?php
include('partials/footer.php');
?>