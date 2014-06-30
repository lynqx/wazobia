<?php 
//* Add Subjects */
/* Doubleakins*/
/* 08063777394*/
/* 26062014*/
/* redirected to when student logs in */

$page_title = "Add Lesson to DVD";
$path = "";
$inc_path = $path."partials/";
include($inc_path . 'header.php');

 ?> 
 
 <?php // if its an edit function
		// Check for a valid Category ID, through GET or POST:
			if ( isset($_GET['id']) && is_numeric($_GET['id']))
			{ 
				$add_id = $_GET['id'];
			
				$q = "SELECT lesson_id, lesson FROM lesson
						WHERE lesson_id = '$add_id'
						LIMIT 1";
				$r = mysqli_query($conn, $q);
				$row = mysqli_fetch_array($r, MYSQLI_ASSOC);
			}
		?>
		
		
 <?php // code to add or edit a new organisation 
if (isset($_POST['submitted'])) { // Handle the form.

// Trim all the incoming data:
$trimmed = array_map('trim', $_POST);

// Assume invalid values:
$lesson = $dvd = FALSE;

$errors = array();


// Check for the subject:
if (isset($_POST['lesson']) && ($_POST['lesson'] != "")){
$lesson= mysqli_real_escape_string ($conn, $trimmed['lesson']);
} else {
$errors[] = 'No Lesson was selected!</p>';
}

// Check for the subject:
if (isset($_POST['dvd']) && ($_POST['dvd'] != "")){
$dvd= mysqli_real_escape_string ($conn, $trimmed['dvd']);
} else {
$errors[] = 'Please selct the DVD title!</p>';
}


if ($lesson && $dvd) { // If everything's OK...

$q2 = "SELECT * FROM dvd_lessons WHERE dvd_id = '$dvd' AND lesson_id='$lesson'";
$r2 = mysqli_query ($conn, $q2);
if (mysqli_affected_rows($conn) == 0) { //lesson has not been previously added. Continue with script

// Add the lesson to the DVD

$q3 = "INSERT INTO `dvd_lessons` (dvd_id, lesson_id, date) VALUES ('$dvd', '$lesson',  NOW())";
$r3 = mysqli_query ($conn, $q3);

if (mysqli_affected_rows($conn) == 1)
{ // If it ran OK then add other details to biodata table.

	//Set display property and confirmation message of the message container to 'block'
					$success_display = 'block';
					$success_msg = '<h4 style="color: #008080"> SUCCESS! Lesson added to DVD successfully.</h4>';
					
					} else { // db error.
						$err_msg = 'Lesson could not be added to DVD due to a system error. We apologize for any inconvenience</p>';
					}
					
					} else { // lesson previously added.
						$err_msg = 'This lesson has been previously added to this DVD. Please enter a new lesson</p>';
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
  									<li class="active"><a href="language.php">Add Lesson to DVD</a></li>
  								</ul>


  								<h3 class="page-header animated bounceInRight show-info" ><i class="fa fa-spin fa-spinner"></i> Add Lesson to DVD<i class="fa fa-plus-square animated bounceInDown show-info"></i> </h3>

  								<blockquote class="page-information hidden">
  									<p>
  										<b>Add Lesson to DVD Page</b> Page to add Lesson to each DVD.
  									</p>
  								</blockquote>

  							</div>
  						</div>

  						<!-- Demo Panel -->
  						<div class="row">
  							<div class="col-md-12">
  								<div class="panel panel-cascade">
  									<div class="panel-heading">
  										<h3 class="panel-title text-primary">
  											Add Lesson to DVD
  										</h3>
  									</div>
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
									<form class="form-horizontal cascade-forms" method="post" action="add_to_dvd.php?id=<?php echo $add_id; ?>">

								<div class="form-group">
												<label for="organisation" class="col-lg-2 col-md-3 control-label">Lesson</label>
												<div class="col-lg-10 col-md-9">
												<input type="hidden" name="lesson" value="<?php echo $row['lesson_id']; ?>" />
												<input type="text" class="form-control form-cascade-control" id="pulser"
												value="<?php echo $row['lesson']; ?>" readonly >
												</div>
								</div>
  										<div class="form-group">
										<label for="selectlanguage" class="col-lg-2 col-md-3 control-label"> DVD </label>
									<?php // code to select language
				         								// Make the query to view table details:
														$q4 = "SELECT * FROM dvd";
														$r4 = @mysqli_query ($conn, $q4) or trigger_error("Query: $q4\n<br />MySQL Error: " . mysqli_error($conn));;
										   	        ?>
													<select data-placeholder="Choose a DVD title..." class="chosen-select" style="width:350px;" tabindex="2" name="dvd" >
														<option value=""></option>
													<?php // iterate the table rows <tr>
													while ($row4 = mysqli_fetch_array($r4, MYSQLI_ASSOC)) {
													?>
														<option value="<?php echo $row4['dvd_id']; ?>"> <?php echo $row4['dvd_title']; ?> </option>
														<?php } //end select subject while ?>
											 		</select>
											
										</div>
											 		
									<div id="targetDiv">
									</div>
																													
											<div class="form-actions">
											<input type="hidden" name="submitted" value="TRUE" />
											
											<input type="submit" value="Add Lesson to DVD" class="btn bg-primary text-white btn-lg">
											
											</div>
						</form>
									</div>

  									</div> <!-- /panel body -->	
  								</div>	
  							</div>


<?php include('partials/footer.php'); ?>

