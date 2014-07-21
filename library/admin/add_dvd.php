<?php 
//* Add Subjects */
/* Doubleakins*/
/* 08063777394*/
/* 26062014*/
/* redirected to when student logs in */

$page_title = "Add DVD";
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
$subject = $code = $dvdpack = FALSE;

$errors = array();


$section1 = mysqli_real_escape_string ($conn, $trimmed['section1']);
$section2 = mysqli_real_escape_string ($conn, $trimmed['section2']);
$section3 = mysqli_real_escape_string ($conn, $trimmed['section3']);
$section4 = mysqli_real_escape_string ($conn, $trimmed['section4']);

$code = $section1 . $section2 . $section3 . $section4;

// Check for the subject:
if (isset($_POST['subject']) && ($_POST['subject'] != "")){
$subject= mysqli_real_escape_string ($conn, $trimmed['subject']);
} else {
$errors[] = 'Please select the subject!</p>';
}

// Check for the subject:
if (isset($_POST['dvdpack']) && ($_POST['dvdpack'] != "")){
$dvdpack= mysqli_real_escape_string ($conn, $trimmed['dvdpack']);
} else {
$errors[] = 'Please selct the DVD PACK!</p>';
}


if ($subject && $code && $dvdpack) { // If everything's OK...


// Add the subject to the database:

$q = "INSERT INTO `dvd` (dvd_pack_id, subject_id, dvd_title, date) VALUES ('$dvdpack', '$subject', '$code',  NOW())";
$r = mysqli_query ($conn, $q);

if (mysqli_affected_rows($conn) == 1)
{ // If it ran OK then add other details to biodata table.

	//Set display property and confirmation message of the message container to 'block'
					$success_display = 'block';
					$success_msg = '<h4 style="color: #008080"> SUCCESS! DVD added successfully.</h4>';
					
					} else { // db error.
						$err_msg = 'DVD could not be saved due to a system error. We apologize for any inconvenience</p>';
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
  									<li class="active"><a href="language.php">Add DVD</a></li>
  								</ul>


  								<h3 class="page-header animated bounceInRight show-info" ><i class="fa fa-spin fa-spinner"></i> Add DVD <i class="fa fa-plus-square animated bounceInDown show-info"></i> </h3>

  								<blockquote class="page-information hidden">
  									<p>
  										<b>Add DVD Page</b> Page to add DVD into each organisation.
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
  											Add DVD
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
									<form class="form-horizontal cascade-forms" method="post" action="add_dvd.php">

  										<div class="form-group">
										<label for="selectlanguage" class="col-lg-2 col-md-3 control-label"> Subject </label>
									<?php // code to select language
				         								// Make the query to view table details:
														$q = "SELECT * FROM subject";
														$r = @mysqli_query ($conn, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($conn));;
										   	        ?>
													<select data-placeholder="Choose a subject..." class="chosen-select" style="width:350px;" tabindex="2" name="subject"
													onchange="getData('targetDiv', this.value);">
														<option value=""></option>
													<?php // iterate the table rows <tr>
													while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
													?>
														<option value="<?php echo $row['subject_id']; ?>"> <?php echo $row['subject']; ?> </option>
														<?php } //end select subject while ?>
											 		</select>
											
										</div>
											 		
									<div id="targetDiv">
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
