<?php 
//* Student Area */
/* Doubleakins*/
/* 08063777394*/
/* 26062014*/
/* redirected to when student logs in */

$page_title = "Add Lesson Note";
$path = "";
$inc_path = $path."partials/";
include($inc_path . 'header.php'); 

if (isset($_SESSION['work_id']) && $_SESSION['roles'] != 'administrator') {
	redirect_to('error.php');
}

// Check for a valid Organisation ID, through GET or POST:
			if ( isset($_GET['id']) && is_numeric($_GET['id']))
			{ 
				$lesson_id = $_GET['id'];
			} else {
				redirect_to('view_lessons.php');
			}

?> 

			<!-- /header -->
  						<div class="row">
  							<div class="col-mod-12">

  								<ul class="breadcrumb">
  									<li><a href="index.php">Home</a></li>
  									<li class="active">Lessons</li>
  									<li class="active">Add Lesson Note</li>
  								</ul>

							<?php
							$q9 = "SELECT lesson FROM lesson WHERE lesson_id ='$lesson_id'";
							$r9 = mysqli_query($conn, $q9);
							$row9 = mysqli_fetch_array($r9, MYSQLI_ASSOC);
							$filename = $row9['lesson'];
							?>

  								<h3 class="page-header animated bounceInRight show-info" ><i class="fa fa-spin fa-spinner"></i><?php echo $filename; ?> <i class="fa fa-edit animated bounceInDown show-info"></i> </h3>

  								<blockquote class="page-information hidden">
  									<p>
  										<b>Add Lesson Note Page</b> To add the lesson note to the lesson
  									</p>
  								</blockquote>

  							</div>
  						</div>
  						
	<?php # Script 10.3 - upload_lesson_note.php

// Check if the form has been submitted:
if (isset($_POST['submitted'])) {

// Check for an uploaded file:
		
	if (isset($_FILES['upload'])) {
	
define('UPLOAD_DIR', '../docs/');
// Validate the type. Should be PDF.
$allowed = array ('application/pdf');
if (in_array($_FILES['upload']['type'], $allowed)) {
// Move the file over.
$file = strtolower(str_replace(' ', '_', $filename)).'.pdf';
if (move_uploaded_file ($_FILES['upload']['tmp_name'], UPLOAD_DIR.$file)) {
// Post details to db.


$file = strtolower(str_replace(' ', '_', $filename)).'.pdf';


if ($file && $lesson_id) { // If everything's OK...

$q = "SELECT * FROM lesson_note WHERE lesson_id = '$lesson_id'";
$r = mysqli_query($conn, $q) ;
if (mysqli_num_rows($r) > 0) {
	$row = mysqli_fetch_array($r, MYSQLI_ASSOC);
	$oldfile = $row['file_name'];
	if ($oldfile != $file) {

	$q2 = "UPDATE lesson_note SET file_name = '$file' WHERE lesson_id = '$lesson_id'";
	
} else {
	$q = "";
}

} else {
// Add the user to the database:
	$q2 = "INSERT INTO lesson_note (lesson_id, file_name) VALUES ('$lesson_id', '$file')";
}

if (!empty($q2)) {
$r2 = mysqli_query ($conn, $q2) or trigger_error(mysqli_error($conn));
if (mysqli_affected_rows($conn) == 1)
{ // If it ran OK.

		$success_msg =  'Thank You! The journal has been uploaded successfully!';

} else { // Invalid type.
	$err_msg = 'The Journal Information could not be stored due to some database error.';

}
} else {
			$success_msg =  'Thank You! The journal has been uploaded successfully!';
	
}
}
}

} else {
	
		$err_msg = 'Please select the correct format. Only PDF files are allowed';
	
}
 // End of isset($_FILES['upload']) IF.

// Check for an error:

if ($_FILES['upload']['error'] > 0) {
	echo '<div class="alert alert-warning alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<p><h4><i class="fa fa-asterisk"></i> Error!</h4>'; 
echo '<p class="error">The file could not be uploaded because: <strong>';
// Print a message based upon the error.
switch ($_FILES['upload']['error']) {
case 1:
 print 'The file exceeds the upload_max_filesize setting in php.ini.';
break;
case 2:
print 'The file exceeds the MAX_FILE_SIZE setting in the HTML form.';
break;
case 3:
print 'The file was only partially uploaded.';
break;
case 4:
print 'No file was uploaded.';
 break;
case 6:
print 'No temporary folder was available.';
break;
case 7:
print 'Unable to write to the disk.';
break;
case 8:
print 'File upload stopped.';
break;
default:
print 'A system error occurred.';
break;
} // End of switch.

 print '</strong></p>';
echo '</p></div>';


} // End of error IF.

// Delete the file if it still exists:
if (file_exists ($_FILES['upload']['tmp_name']) && is_file($_FILES['upload']['tmp_name']) ) {
unlink 
($_FILES['upload']['tmp_name']);


 // Finish the page:
}
}// End of the submitted conditional.
}

?>
	
  					

			
  					<!-- Add Lessons -->
  						<div class="row">
  							<div class="col-md-12">
  								<div class="panel panel-cascade">
  									<div class="panel-heading">
  										<h3 class="panel-title text-primary">
  											Add Lesson Note
  											
  										</h3>
  									</div>
  									<div class="panel-body panel-border">
  										
  										<?php 
        	
        	// block to output success message	
								
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

  										<div class="list-group demo-list-group">
				          				
				          			<form class="form-horizontal cascade-forms" method="post" action="lesson_note.php?id=<?php echo $lesson_id; ?>"
				          				enctype="multipart/form-data" onsubmit = "document.getElementById('uploadButton').disabled=true; document.getElementById('uploadButton').value='Uploading...';">
				          			
				          					<input type="hidden" name="MAX_FILE_SIZE" value="52428800000">

											<div class="form-group">
												<label for="lesson" class="col-lg-2 col-md-3 control-label">Lesson Note <small>(PDF only) </small></label>
												<div class="col-lg-10 col-md-9">
												<input type="file" class="form-control" name="upload">
												</div>
											</div>
											
											
											<div class="form-actions">
											<input type="hidden" name="submitted" value="TRUE" />
											<input type="submit" value="Upload Lesson Note" class="btn bg-primary text-white btn-lg" id="uploadButton">
											</div>
									</form>
					
									</div> <!-- /panel body -->	
									</div>
							  
  								</div>	
  							</div>


  					</div> <!-- /.Add Lessons -->
      

<?php include('partials/footer.php'); ?>
