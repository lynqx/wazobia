<?php 
//* Add Subjects */
/* Doubleakins*/
/* 08063777394*/
/* 26062014*/
/* redirected to when student logs in */

$page_title = "Generate DVD Codes";
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
$dvd = $noofcode = FALSE;

$errors = array();

// Check for the organisation:
if (isset($_POST['dvd']) && ($_POST['dvd'] != "")){
$dvd= mysqli_real_escape_string ($conn, $trimmed['dvd']);
} else {
$errors[] = 'Please select the DVD title!</p>';
}

// Check for the subject:
if (isset($_POST['noofcode']) && ($_POST['noofcode'] != "")){
$noofcode= mysqli_real_escape_string ($conn, $trimmed['noofcode']);
} else {
$errors[] = 'Please enter the amount of code to be generated!</p>';
}

if ($dvd && $noofcode) { // If everything's OK...

for ($i=1; $i<=$noofcode; $i++) {
// Add the codes to the database in a loop:
$ran = uniqid();
$rand = date('Y').$ran;
$q = "INSERT INTO `dvd_code` (dvd_id, dvd_available, dvd_code) VALUES ('$dvd', 1, '$rand')";
$r = mysqli_query ($conn, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($conn));

				}
				
	// If it ran OK then add other details to biodata table.

	//Set display property and confirmation message of the message container to 'block'
					$success_display = 'block';
					$success_msg = '<h4 style="color: #008080"> SUCCESS! DVD codes generated and saved successfully.</h4>';
					
					} else { // db error.
						$err_msg = 'Something went wrong. We apologize for any inconvenience</p>';
					}

} // End of the main Submit conditional.

?>



  						<!-- /header -->
  						<div class="row">
  							<div class="col-mod-12">

  								<ul class="breadcrumb">
  									<li><a href="index.php">Admin</a></li>
  									<li class="active">DVD</li>
  									<li class="active"><a href="generate.php">Generate DVD Codes</a></li>
  								</ul>


  								<h3 class="page-header animated bounceInRight show-info" ><i class="fa fa-spin fa-spinner"></i> Generate DVD Codes <i class="fa fa-plus-square animated bounceInDown show-info"></i> </h3>

  								<blockquote class="page-information hidden">
  									<p>
  										<b>Generate DVD Codes Page</b> Page to Generate DVD Codes into each organisation.
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
  											Generate DVD Codes
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
        	
        							// block to output success message	
								
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
									<form class="form-horizontal cascade-forms" method="post" action="generate.php">

  										<div class="form-group">
										<label for="selectlanguage" class="col-lg-2 col-md-3 control-label"> DVD Title</label>
									<?php // code to select language
				         								// Make the query to view table details:
														$q = "SELECT * FROM dvd";
														$r = @mysqli_query ($conn, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($conn));;
										   	        ?>
													<select data-placeholder="Choose a DVD..." class="chosen-select" style="width:350px;" tabindex="2" name="dvd">
														<option value=""></option>
													<?php // iterate the table rows <tr>
													while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
													?>
														<option value="<?php echo $row['dvd_id']; ?>"> <?php echo $row['dvd_title']; ?> </option>
														<?php } //end select subject while ?>
											 		</select>
											 		</div>
											 		
									<div class="form-group" id="targetDiv">
									</div>
																		
								<div class="form-group">
												<label for="organisation" class="col-lg-2 col-md-3 control-label">Number of Codes to Generate</label>
												<div class="col-lg-4 col-md-3">
													<input type="number" class="form-control" id="pulser" name="noofcode" >
												</div>
								</div>
											
											<div class="form-actions">
											<input type="hidden" name="submitted" value="TRUE" />
											<input type="submit" value="Submit" class="btn bg-primary text-white btn-lg">
											
											</div>
						</form>
									</div>

  									</div> <!-- /panel body -->	
  								</div>	
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

function getData(divID, lang)
{
	
	var url = "ajax/select_organisation.php?lang="+lang;
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
