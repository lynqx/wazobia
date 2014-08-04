<?php
$path = "";
include('partials/header.php'); 
?>

<?php
//redirect to index.php if no session
if(!isset($_SESSION['student_id']))
header('location: index.php');

	//---// the testimonials
if (isset($_POST['submitted'])) { // Handle the form.

// Trim all the incoming data:
$trimmed = array_map('trim', $_POST);

// Assume invalid values:
$fullname = $location = $testimonials = FALSE;

$errors = array();


// Check for the fullname:
if (isset($_POST['fullname']) && ($_POST['fullname'] != "")){
$fullname= mysqli_real_escape_string ($conn, $trimmed['fullname']);
} else {
$errors[] = 'Please enter your full name!</p>';
}

// Check for the user location:
if (isset($_POST['location']) && ($_POST['location'] != "")){
$location= mysqli_real_escape_string ($conn, $trimmed['location']);
} else {
$errors[] = 'Please enter your location!</p>';
}

// Check for the content:
if (isset($_POST['testimonials']) && ($_POST['testimonials'] != "")){
$testimonials= mysqli_real_escape_string ($conn, $trimmed['testimonials']);
} else {
$errors[] = 'Please enter your testimonials!</p>';
}



if ($fullname && $location && $testimonials) { // If everything's OK...

$status = 0; // not published by default
// Add the subject to the database:

$q = "INSERT INTO `testimonials` (fullname, location, content, status, date) VALUES ('$fullname', '$location', '$testimonials', '$status',  NOW())";
$r = mysqli_query ($conn, $q);

if (mysqli_affected_rows($conn) == 1)
{ // If it ran OK then add other details to biodata table.

	//Set display property and confirmation message of the message container to 'block'
					$success_display = 'block';
					$success_msg = '<h4 style="color: #008080"> SUCCESS! Thanks for taking time to give us your feedback.</h4>';
					
					} else { // db error.
						$err_msg = 'Post not be saved due to a system error. We apologize for any inconvenience</p>';
					}

								} else { // If one of the data tests failed.
								$datatest = 'Please re-enter the details appropriately and try again.</p>';
								}

} // End of the main Submit conditional.

?>


            <div class="row">
               <div class="col-mod-12">

                  <ul class="breadcrumb">
                   <li><a href="index.php">Dashboard</a></li>
                   <li><a href="#">Library</a></li>
                   <li class="active">Testimonials</li>
                 </ul>

                 <h3 class="page-header"><i class="fa fa-bullhorn"></i> Tell us how we are doing <i class="fa fa-info-circle animated bounceInDown show-info"></i> </h3>
					
					        <div class="panel-body">

					<?php
					
					if(!empty($success_msg)) {
												echo '<div class="alert alert-info alert-dismissable">
           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
														<p><h4><i class="fa fa-heart"></i> Successful!</h4>' . $success_msg . '</p></div>';
											 }
					
						if(!empty($err_msg))
						echo '<div class="alert alert-danger alert-dismissable">
          					 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							 <p><h4><i class="fa fa-asterisk"></i> Error!</h4>' .$err_msg. '</div>';
							 
							 // Print any error messages, if they exist:
									if (!empty($errors)) {
										echo ' <div class="alert alert-block alert-danger fade in">
										<a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
									<h4><i class="fa fa-times"></i> Error!</h4>
									<p>The following error(s) occurred:<br />';
									foreach ($errors as $msg) {
									echo " - $msg<br />\n";
									}
									echo '</p>
									<p>Please re-enter your details and try again</p>
									</div>';
									}
					?>

				</div>
			</div>
			</div>


        

<!-- Form elements -->
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-cascade">
			<div class="panel-body">

						<form class="form-horizontal cascade-forms" method="POST" action="" novalidate="novalidate">
							<div class="form-group">
								<label class="col-lg-2 col-md-3 control-label">Full Name</label>
								<div class="col-lg-4 col-md-3">
									<input type="text" class="form-control" name="fullname" required >
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-lg-2 col-md-3 control-label">Location</label>
								<div class="col-lg-4 col-md-3">
									<input type="text" class="form-control" name="location" required >
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-lg-2 col-md-3 control-label">Testimonials <br><small style="color: #FF0000"> Maximum of 300 characters </small></label>
								<div class="col-lg-4 col-md-3">
									<textarea name="testimonials" rows="3" cols="40" class="form-control">
										</textarea>
								</div>
							</div>
							
							
							
							<div class="form-actions">
								<input type="hidden" name="submitted" value="TRUE" />
								<input type="submit" name="submit" value="Submit" class="btn bg-primary text-white btn-lg" >
							</div>
						</form>
					</div>
				</div>

			</div>
		</div>



<?php
include('partials/footer.php');
?>