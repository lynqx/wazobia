<?php 
//* Student Area */
/* Doubleakins*/
/* 08063777394*/
/* 19062014*/
/* redirected to when student logs in */

$page_title = "Change Password";
$path = "";
$inc_path = $path."partials/";
include($inc_path . 'header.php'); ?> 

<?php

// where to redirect if rejected
$redirect = 'index.php';
// if session variable not set, redirect to login page
if (!isset($_SESSION['student_id'])) {
header("Location: $redirect");
exit;
}
?>

<?php
// Check if the form has been submitted:
$student = $_SESSION['student_id'];
if (isset($_POST['submitted'])) {

require_once ('../init_connect.php');
// Connect to the db.

$errors = array(); // Initialize an error array.

// Check for a new password and match
// against the confirmed password:
if (!empty($_POST['password1'])) {
if ($_POST['password1'] != $_POST['password2']) {
$errors[] = '<p class="error"> - Your new password did not match the confirm password.</p>';
} else {
$np = mysqli_real_escape_string($conn, trim($_POST['password1']));
}
} else {
$errors[] = '<p class="error"> - You forgot to enter your new password.</p>';
}

if (empty($errors)) { // If everything's OK.

// Make the UPDATE query:
 	$q = "UPDATE student_register SET password=SHA1('$np') WHERE student_id=$student";
	$r = @mysqli_query($conn, $q);

if (mysqli_affected_rows($conn) == 1) { // If it ran OK.
// Print a message.// Finish the page:
					 //Set display property and confirmation message of the message container to 'block'
					$success_display = 'block';
					$success_msg = '<h4 style="color: #008080"> SUCCESS! Your password has been changed successfully.</h4>';
					
					} else { // The email address is not available.
							$err_msg = 'Your password could not be reset for technical reasons. We apologize for any inconviniences</p>';
					}
} else {
	
	$err_ms = 'Please re-enter your details properly';
}

} // end of main submit iff
?>

  						<!-- /header -->
  						<div class="row">
  							<div class="col-mod-12">

  								<ul class="breadcrumb">
  									<li><a href="index.php">Classroom</a></li>
  									<li class="active"><a href="student_area.php">Change Password</a></li>
  								</ul>


  								<h3 class="page-header animated bounceInUp show-info"> Change Password <i class="fa fa-lock animated bounceInRight show-info"></i> </h3>

  								<blockquote class="page-information hidden">
  									<p>
  										<b>Password Page</b> Change your classroom access password here.
  									</p>
  								</blockquote>

  							</div>
  						</div>

  						<!-- Demo Panel -->
  						<div class="row">
  							<div class="col-md-12">
  								
  								<?php // block to output success message	
											   	if(!empty($success_msg)) {
												echo '<div class="alert alert-block alert-success fade in">
														<a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
														<p><h4><i class="fa fa-heart"></i> Successful!</h4>' . $success_msg . '</p></div>';
													}
												?>
												
												<?php // block to output success message	
											   	if(!empty($err_msg)) {
												echo '<div class="alert alert-block alert-danger fade in">
														<a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
														<p><h4><i class="fa fa-asterisk"></i> Error!</h4>' . $err_msg . '</p></div>';
													}
												?>
  								
  								<?php
									// This page prints any errors associated with logging in
									// and it creates the entire login page, including the form.
									
									// Include the header:
									
									// Print any error messages, if they exist:
									if (!empty($errors)) {
										echo ' <div class="alert alert-block alert-danger fade in">
										<a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
									<h4><i class="fa fa-times"></i> Error!</h4>
									<p>The following error(s) occurred:<br />';
									foreach ($errors as $msg) {
									echo " $msg<br />\n";
									}
									echo '</p>
									<p>Please try again.</p></div>';
									}
									
									?>
  								<div class="panel panel-cascade">
  									<div class="panel-heading">
  										<h3 class="panel-title text-primary">
  											Change Password Form
  										</h3>
  									</div>
  									<div class="panel-body panel-border">
					<form class="form-horizontal" role="form" action="password.php" method="post">
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">New Password</label>
							<div class="col-sm-10">
								<input type="password" class="form-control form-cascade-control" id="inputEmail3" placeholder="Password" name="password1">
							</div>
						</div>
						<div class="form-group">
							<label for="inputPassword3" class="col-sm-2 control-label">Confirm Password</label>
							<div class="col-sm-10">
								<input type="password" class="form-control form-cascade-control" id="inputPassword3" placeholder="Confirm Password" name="password2">
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								              <input type="hidden" name="submitted" value="TRUE" />
								<button type="submit" class="btn btn-default btn-success animated slideInDown show-info">Change Password</button>
							</div>
						</div>
					</form>					
					</div>
				</div>
			</div>
			
			
  								</div>	
  							</div>
  						</div>


<?php include('partials/footer.php'); ?>

