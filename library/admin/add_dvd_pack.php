<?php 
//* Add Subjects */
/* Doubleakins*/
/* 08063777394*/
/* 26062014*/
/* redirected to when student logs in */

$page_title = "Add DVD pack name";
$path = "";
$inc_path = $path."partials/";
include($inc_path . 'header.php');

if (isset($_SESSION['work_id']) && $_SESSION['roles'] != 'administrator') {
	redirect_to('error.php');
}
 ?> 

		
 <?php // code to add or edit a new organisation 
if (isset($_POST['submitted'])) { // Handle the form.

// Trim all the incoming data:
$trimmed = array_map('trim', $_POST);

// Assume invalid values:
$dvdpack = $pack_price = $desc = FALSE;

$errors = array();


// Check for the subject:
if (isset($_POST['dvd_pack']) && ($_POST['dvd_pack'] != "")){
$dvdpack= mysqli_real_escape_string ($conn, $trimmed['dvd_pack']);
} else {
$errors[] = 'Please enter the DVD Pack name!</p>';
}


// Check for the subject:
if (isset($_POST['pack_price']) && (is_numeric($_POST['pack_price']))){
$pack_price= mysqli_real_escape_string ($conn, $trimmed['pack_price']);
} else {
$errors[] = 'Please enter the DVD Pack price!</p>';
}


// Check for the subject:
if (isset($_POST['description']) && ($_POST['description'] != "")){
$desc= mysqli_real_escape_string ($conn, $trimmed['description']);
} else {
$errors[] = 'Please enter the DVD description or summary!</p>';
}



if ($dvdpack && $pack_price && $desc) { // If everything's OK...

// Add the DVD pack name

$q = "INSERT INTO `dvd_subject_pack` (subject_pack_name, dvd_pack_price, dvd_pack_info, date) 
		VALUES ('$dvdpack', '$pack_price', '$desc', NOW())";
$r = mysqli_query ($conn, $q);

if (mysqli_affected_rows($conn) == 1)
{ // If it ran OK then add other details to biodata table.

	//Set display property and confirmation message of the message container to 'block'
					$success_display = 'block';
					$success_msg = '<h4 style="color: #008080"> SUCCESS! DVD pack name added successfully.</h4>';
					
					} else { // db error.
						$err_msg = 'DVD pack name could not be added due to a system error. We apologize for any inconvenience</p>';
					}


								} else { // If one of the data tests failed.
								$datatest = 'Please re-enter the details appropriately and try again.</p>';
								}

} // End of the main Submit conditional.

?>

  						<!-- /header -->
  						<div class="row">
  							<div class="col-mod-12">

  								<ul class="breadcrumb">
  									<li><a href="index.php">Admin</a></li>
  									<li class="active">DVD</li>
  									<li class="active"><a href="language.php">Add DVD Pack</a></li>
  								</ul>


  								<h3 class="page-header animated bounceInRight show-info" ><i class="fa fa-spin fa-spinner"></i> Add DVD Pack<i class="fa fa-plus-square animated bounceInDown show-info"></i> </h3>

  								<blockquote class="page-information hidden">
  									<p>
  										<b>Add DVD Pack Page</b> Page to add DVD packs.
  									</p>
  								</blockquote>

  							</div>
  						</div>

  						<!-- Demo Panel -->
  						<div class="row">
  							<div class="col-md-12">
  								<div class="panel panel-cascade">
  								
  									<div class="panel-body panel-border">
  									
  									<?php 
        	
        	
									// block to output success message	
											   	if(!empty($success_msg)) {
												echo '<div class="alert alert-info alert-dismissable">
           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
														<p><h4><i class="fa fa-heart"></i> Successful!</h4>' . $success_msg . '</p></div>';
													}
												?>
												
												<?php // block to output success message	
											   	if(!empty($err_msg)) {
												echo '<div class="alert alert-danger alert-dismissable">
          										 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
														<p><h4><i class="fa fa-asterisk"></i> Error!</h4>' . $err_msg . '</p></div>';
													}
												
												
								
									
									
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
									echo " - $msg<br />\n";
									}
									echo '</p>
									<p>Please re-enter your details and try again</p>
									</div>';
									}
												?>
									<form class="form-horizontal cascade-forms" method="post" action="add_dvd_pack.php">

								<div class="form-group">
												<label for="organisation" class="col-lg-2 col-md-3 control-label">DVD Pack Name</label>
												<div class="col-lg-10 col-md-9">
												<input type="text" class="form-control" name="dvd_pack" >
												</div>
								</div>
								
								<div class="form-group">
												<label for="organisation" class="col-lg-2 col-md-3 control-label">DVD Pack Price</label>
												<div class="col-lg-10 col-md-9">
												<input type="text" class="form-control" name="pack_price" >
												</div>
								</div>
								
								<div class="form-group">
												<label for="organisation" class="col-lg-2 col-md-3 control-label">Description</label>
												<div class="col-lg-10 col-md-9">
												<textarea name="description" cols="108" rows="3"></textarea>
												</div>
								</div>
  									
											 		
									<div id="targetDiv">
									</div>
																													
											<div class="form-actions">
											<input type="hidden" name="submitted" value="TRUE" />
											
											<input type="submit" value="Add DVD Pack" class="btn bg-primary text-white btn-lg">
											
											</div>
						</form>
									</div>

  									</div> <!-- /panel body -->	
  								</div>	
  							</div>


<?php include('partials/footer.php'); ?>

