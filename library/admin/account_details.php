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

// End of the main Submit conditional.

} elseif (isset($_POST['updated'])) { // Handle the form.

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

$q9 = "UPDATE bank_details SET bank_name_id='$bankname', account_name='$actname', account_no='$actno'
		WHERE work_id = $lecturer";
$r9 = mysqli_query ($conn, $q9) or trigger_error("Query: $q9\n<br />MySQL Error: " . mysqli_error($conn));

if (mysqli_affected_rows($conn) == 1)
{ // If it ran OK then add other details to biodata table.

	//Set display property and confirmation message of the message container to 'block'
					$success_display = 'block';
					$success_msg = '<h4 style="color: #008080"> SUCCESS! Account Information updated successfully.</h4>';
					
					} else { // db error.
						$err_msg = 'Account Information could not be updated due to a system error. We apologize for any inconvenience</p>';
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
  									<li><a href="index.php">Dashboard</a></li>
  									<li class="active"><a href="#">Add Account Details</a></li>
  								</ul>


  								<h3 class="page-header animated bounceInRight show-info" ><i class="fa fa-spin fa-spinner"></i> Add Account Details <i class="fa fa-plus-square animated bounceInDown show-info"></i> </h3>

  								<blockquote class="page-information hidden">
  									<p>
  										<b>Add Account Details Page</b> Page to add Account Details.
  									</p>
  								</blockquote>

  							</div>
  						</div>
                
         <div class="row" id="view">
           <div class="col-md-12">
            <div class="panel">
             <div class="panel-heading">
  										<h3 class="panel-title text-primary">
  											View Account Details
  										</h3>
  									</div>
        <div class="panel-body">
        	
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

         <?php // code to select the organisations for view
         // Make the query to view table details:
				$q1 = "SELECT *  FROM `bank_details`
						JOIN bank_name ON bank_name.bank_name_id = bank_details.bank_name_id 
						WHERE work_id = $lecturer";
				$r1 = @mysqli_query ($conn, $q1);
				$row1 = mysqli_fetch_array($r1, MYSQLI_ASSOC);
         ?>
                  
          <table class="table users-table table-condensed table-hover" >
            <tr><th>Bank Name</th><td> <?php echo $row1['bank_name']; ?></td></tr>
             <tr><th>Account Name</th> <td> <?php echo $row1['account_name']; ?></td></tr>
             <tr><th>Account Number</td> <td> <?php echo $row1['account_no']; ?></td></tr>
       </table>
       <a href="#" id="show2" class="btn btn-lg btn-info"> Edit Account Details </a>
     </div> <!-- /panel body -->
   </div>
 </div> <!-- /col-md-12 -->
</div><!-- /.View Organisationzs-->



  						<!-- Demo Panel -->
  						<div class="row" id="edit">
  							<div class="col-md-12">
  								<div class="panel panel-cascade">
  									<div class="panel-heading">
  										<h3 class="panel-title text-primary">
  											Edit Account Details
  										</h3>
  									</div>
  									<div class="panel-body panel-border">
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
														<option value="<?php echo $row['bank_name_id']; ?>"
															<?php if (isset($row1['bank_name_id']) && $row1['bank_name_id'] == $row['bank_name_id']) echo "selected" ?>>
															 <?php echo $row['bank_name']; ?> </option>
														<?php } //end select subject while ?>
											 		</select>
											 		</div>
													
								<div class="form-group">
												<label for="account name" class="col-lg-2 col-md-3 control-label">Account Name</label>
												<div class="col-lg-4 col-md-3">
													<input type="text" class="form-control" name="actname"
													value="<?php if (isset($row1['account_name'])) { echo $row1['account_name'];} ?>" >
												</div>
								</div>
								
								<div class="form-group">
												<label for="account number" class="col-lg-2 col-md-3 control-label">Account Number</label>
												<div class="col-lg-4 col-md-3">
													<input type="number" class="form-control" id="pulser" name="actno"
													value="<?php if (isset($row1['account_no'])) { echo $row1['account_no'];} ?>" >
												</div>
								</div>
											
											<div class="form-actions">
												<?php if (isset($row1['bank_details_id'])) { ?>
											<input type="hidden" name="updated" value="TRUE" />
											<input type="submit" value="Update" class="btn bg-primary text-white btn-lg">
       										<a href="#" id="show1" class="btn btn-lg btn-info"> View Account Details </a>
       										<?php } else { ?>
       											
       										<input type="hidden" name="submitted" value="TRUE" />
											<input type="submit" value="Submit" class="btn bg-primary text-white btn-lg">
       										<a href="#" id="show1" class="btn btn-lg btn-info"> View Account Details </a>
											<?php } ?>
											</div>
						</form>
									</div>

  									</div> <!-- /panel body -->	
  								</div>	
  							</div>


<?php include('partials/footer.php'); ?>



<script src="jquery-1.8.0.min.js"></script>

			<script>
			$.noConflict();
		 $(document).ready(function () {
			 //by default this initialises when the pagee is fully loaded
               // 	alert('am ready');
                	$('#edit').hide();
                });
                
		 $(document).on('click','#show2',function(){
			 //this performs the hide and show and you can add transitions using either slide,blind,fast,slow and many more
			 $('#edit').show("slide");
			 $('#view').hide("fast");
		 });
		 
		 $(document).on('click','#show1',function(){
			 $('#view').show("blind");
        	$('#edit').hide("slide");
		 });
		 
         </script>
