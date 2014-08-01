<?php 
//* Add Subjects */
/* Doubleakins*/
/* 08063777394*/
/* 26062014*/
/* redirected to when student logs in */

$page_title = "Update Slider";
$path = "";
$inc_path = $path."partials/";
include($inc_path . 'header.php');

if (isset($_SESSION['work_id']) && $_SESSION['roles'] != 'administrator') {
	redirect_to('error.php');
}
 ?> 
 <?php // code to add or edit a new organisation 
	// Check if the upload form has been submitted:
if (isset($_POST['submitted'])) {

// Check for an uploaded file:
if (isset($_FILES['upload'])) {
define('UPLOAD_DIR', 'temp/');
// Validate the type. Should be JPEG or PNG.
$allowed = array ('image/pjpeg', 'image/JPEG', 'image/jpeg', 'image/JPG', 'image/X-PNG', 'image/PNG', 'image/png', 'image/x-png');
if (in_array($_FILES['upload']['type'], $allowed)) {
// Move the file over.
$datetime=date("YmdHis"); // create date and time
$fl = str_replace(' ', '_', $_FILES['upload']['name']);
$kaboom = explode(".", $fl);
$file = $kaboom[0].$datetime.'.'.$kaboom[1];
$fileExt = $kaboom[1];
if (move_uploaded_file ($_FILES['upload']['tmp_name'], UPLOAD_DIR.$file)); {
	
			
// include universal image resizing function
include_once("partials/img_lib.php");
$target_file = "temp/$file";
$resized_file = "../../images/slider/$file";
$wmax = 582;
$hmax = 450;
ak_img_resize($target_file, $resized_file, $wmax, $hmax, $fileExt);

// Post details to db.
//require_once ('mysqli_connect.php');

// Trim all the incoming data:
$trimmed = array_map('trim', $_POST);

$errors = array(); // Initialize error array.


// Check for the dvd pack name:
if (isset($_POST['dvdpack']) && ($_POST['dvdpack'] != "")){
$dvdpack= mysqli_real_escape_string ($conn, $trimmed['dvdpack']);
} else {
$errors[] = 'Please select the DVD PACK!</p>';
}

if ($file && $dvdpack) { // If everything's OK...

$status = 1;

$q = "SELECT * FROM product_summary WHERE dvd_pack_id = $dvdpack";
$r = mysqli_query($conn, $q);
if (mysqli_affected_rows($conn) > 0) {

$q2 = "UPDATE product_summary SET image='$file' WHERE dvd_pack_id = '$dvdpack' LIMIT 1";
} else {
$q = "INSERT INTO `product_summary` (dvd_pack_id, image, status) VALUES ('$dvdpack', '$file', '$status')";
}

$r2 = mysqli_query ($conn, $q2) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($conn));
if (mysqli_affected_rows($conn) == 1) 
{ // If it ran OK.

		$success_msg =  'Thank You! Your slider picture has been uploaded successfully!';

}
} else {
	
	$err_msg = 'Your slider picture could not be uploaded due to some errors.';


}

}
} else { // Invalid type.
$error[] = 'Please upload a jpeg or png image format.';


}
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
print 'No file was selected.';
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
if (isset($file)) {
if (file_exists ('temp/' . $file) && is_file('temp/' . $file) ) {
unlink ('temp/' . $file );

//unlink ($_FILES['upload']['tmp_name']);

} 

// Finish the page:


}
}// End of the upload conditional.
?>



  						<!-- /header -->
  						<div class="row">
  							<div class="col-mod-12">

  								<ul class="breadcrumb">
  									<li><a href="index.php">Admin</a></li>
  									<li class="active"><a href="slider.php">Update Slider</a></li>
  								</ul>


  								<h3 class="page-header animated bounceInRight show-info" ><i class="fa fa-spin fa-spinner"></i> Update Slider <i class="fa fa-plus-square animated bounceInDown show-info"></i> </h3>

  								<blockquote class="page-information hidden">
  									<p>
  										<b>Update Slider Page</b> Page to Update Slider into each organisation.
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
									<form class="form-horizontal cascade-forms" method="post" action="slider.php" enctype="multipart/form-data">

  										<div class="form-group">
										<label for="selectlanguage" class="col-lg-2 col-md-3 control-label"> DVD Pack </label>

									<?php // code to select language
				         								// Make the query to view table details:
														$q = "SELECT * FROM dvd_subject_pack";
														$r = @mysqli_query ($conn, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($conn));;
										   	        ?>
													<select data-placeholder="Choose a subject..." class="chosen-select" style="width:350px;" tabindex="2" name="dvdpack">
														<option value=""></option>
													<?php // iterate the table rows <tr>
													while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
													?>
														<option value="<?php echo $row['dvd_pack_id']; ?>"> <?php echo $row['subject_pack_name']; ?> </option>
														<?php } //end select subject while ?>
											 		</select>
									</div>
									
											<div class="form-group">
											<div class="col-lg-10 col-md-9">
												<input type="file" class="form-control" name="upload">
											</div>
											</div>

																													
											<div class="form-actions">
											<input type="hidden" name="submitted" value="TRUE" />
											<input type="submit" value="Add" class="btn bg-primary text-white btn-lg">
											
											</div>
						</form>
									</div>

  									</div> <!-- /panel body -->	
  								</div>	
  							</div>


<?php include('partials/footer.php'); ?>

<script language = "javascript">
var XMLHttpRequestObject = false;
if (window.XMLHttpRequest) {
XMLHttpRequestObject = new XMLHttpRequest();
} else if (window.ActiveXObject) {
XMLHttpRequestObject = new ActiveXObject("Microsoft.XMLHTTP");
}

function getData(divID, subj)
{
	
	var url = "ajax/lastcode.php?subj="+subj;
if(XMLHttpRequestObject) {
var obj = document.getElementById(divID);
XMLHttpRequestObject.open("GET", url, true);
XMLHttpRequestObject.onreadystatechange = function()
{
if (XMLHttpRequestObject.readyState == 4 &&
XMLHttpRequestObject.status == 200) {
obj.innerHTML = XMLHttpRequestObject.responseText;
}
}
XMLHttpRequestObject.send(null);
}
}
</script>

<script language = "javascript">

function showsubj() {
	
	var elem = document.getElementById('hidden_subj');
		elem.style.display = "block";
}
</script>
