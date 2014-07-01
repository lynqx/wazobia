<?php 
//* Add Account Details */
/* Doubleakins*/
/* 08063777394*/
/* 01072014*/
/* redirected to when student logs in */

$page_title = "Add Account Details";
$path = "";
$inc_path = $path."partials/";
include($inc_path . 'header.php');

if (isset($_SESSION['work_id']) && $_SESSION['roles'] != 'lecturer') {
	redirect_to('error.php');
}

$lecturer = $_SESSION['work_id'];
 ?> 
 <?php // code to add or edit a new organisation 
if (isset($_POST['submitted'])) { // Handle the form.

// Trim all the incoming data:
$trimmed = array_map('trim', $_POST);

// Assume invalid values:
$bankname = $actname = $actno = FALSE;

$errors = array();

// Check for the bank name:
if (isset($_POST['bankname']) && ($_POST['bankname'] != "")){
$bankname= mysqli_real_escape_string ($conn, $trimmed['bankname']);
} else {
$errors[] = 'Please select the Bank Name!</p>';
}

// Check for the account name:
if (isset($_POST['actname']) && ($_POST['actname'] != "")){
$actname= mysqli_real_escape_string ($conn, $trimmed['actname']);
} else {
$errors[] = 'Please enter the Account Name!</p>';
}


// Check for the account number:
if (isset($_POST['actno']) && ($_POST['actno'] != "")){
$actno= mysqli_real_escape_string ($conn, $trimmed['actno']);
} else {
$errors[] = 'Please enter the Account Number!</p>';
}

if ($bankname && $actname && $actno) { // If everything's OK...


// Add the subject to the database:

$q = "INSERT INTO `bank_details` (work_id, bank_name_id, account_name, account_no, date) VALUES ('$lecturer', '$bankname', '$actname', '$actno',  NOW())";
$r = mysqli_query ($conn, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($conn));

if (mysqli_affected_rows($conn) == 1)
{ // If it ran OK then add other details to biodata table.

	//Set display property and confirmation message of the message container to 'block'
					$success_display = 'block';
					$success_msg = '<h4 style="color: #008080"> SUCCESS! Account Information saved successfully.</h4>';
					
					} else { // db error.
						$err_msg = 'Account Information could not be saved due to a system error. We apologize for any inconvenience</p>';
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
  									<li class="active">Account</li>
  									<li class="active"><a href="language.php">Add Account Details</a></li>
  								</ul>


  								<h3 class="page-header animated bounceInRight show-info" ><i class="fa fa-spin fa-spinner"></i> Add Account Details <i class="fa fa-plus-square animated bounceInDown show-info"></i> </h3>

  								<blockquote class="page-information hidden">
  									<p>
  										<b>Add Account Details Page</b> Page to add Account Details.
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
  											Add Account Details
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
									<form class="form-horizontal cascade-forms" method="post" action="account_details.php">

  										<div class="form-group">
										<label for="selectlanguage" class="col-lg-2 col-md-3 control-label"> Bank Name </label>
									<?php // code to select language
				         								// Make the query to view table details:
														$q = "SELECT * FROM bank_name";
														$r = @mysqli_query ($conn, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($conn));;
										   	        ?>
													<select data-placeholder="Choose a bank name..." class="chosen-select" style="width:350px;" tabindex="2" name="bankname" >
														<option value=""></option>
													<?php // iterate the table rows <tr>
													while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
													?>
														<option value="<?php echo $row['bank_name_id']; ?>"> <?php echo $row['bank_name']; ?> </option>
														<?php } //end select subject while ?>
											 		</select>
											 		</div>
													
								<div class="form-group">
												<label for="account name" class="col-lg-2 col-md-3 control-label">Account Name</label>
												<div class="col-lg-4 col-md-3">
													<input type="text" class="form-control" name="actname" >
												</div>
								</div>
								
								<div class="form-group">
												<label for="account number" class="col-lg-2 col-md-3 control-label">Account Number</label>
												<div class="col-lg-4 col-md-3">
													<input type="number" class="form-control" id="pulser" name="actno" >
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
