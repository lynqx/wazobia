<?php 
//* Add Account Details */
/* Doubleakins*/
/* 08063777394*/
/* 01072014*/
/* redirected to when student logs in */

$page_title = "Add DVD to Inventory";
$path = "";
$inc_path = $path."partials/";
include($inc_path . 'header.php');

if (isset($_SESSION['work_id']) && $_SESSION['roles'] != 'admin') {
	redirect_to('error.php');
}

$lecturer = $_SESSION['work_id'];
 ?> 
 <?php // code to add or edit a new organisation 
if (isset($_POST['submitted'])) { // Handle the form.

// Trim all the incoming data:
$trimmed = array_map('trim', $_POST);

// Assume invalid values:
$dvd = $qty = $transaction = FALSE;

$errors = array();

// Check for the bank name:
if (isset($_POST['dvd']) && ($_POST['dvd'] != "")){
$dvd= mysqli_real_escape_string ($conn, $trimmed['dvd']);
} else {
$errors[] = 'Please select the DVD title!</p>';
}

// Check for the account name:
if (isset($_POST['qty']) && ($_POST['qty'] != "")){
$qty= mysqli_real_escape_string ($conn, $trimmed['qty']);
} else {
$errors[] = 'Please enter the Quantity!</p>';
}

$transaction = 1;

if ($dvd && $qty && $transaction) { // If everything's OK...


// Add the subject to the database:

$q = "INSERT INTO `dvd_transaction` (dvd_id, transaction_type, quantity, time_transact) VALUES ('$dvd', '$transaction', '$qty',  NOW())";
$r = mysqli_query ($conn, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($conn));

if (mysqli_affected_rows($conn) == 1)
{ // If it ran OK then add other details to biodata table.

	//Set display property and confirmation message of the message container to 'block'
					$success_display = 'block';
					$success_msg = '<h4 style="color: #008080"> SUCCESS! Inventory item entered successfully.</h4>';
					
					} else { // db error.
						$err_msg = 'Inventory item could not be saved due to a system error. We apologize for any inconvenience</p>';
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
  									<li class="active"><a href="language.php">Add DVD to Inventory</a></li>
  								</ul>


  								<h3 class="page-header animated bounceInRight show-info" ><i class="fa fa-spin fa-spinner"></i> Add DVD to Inventory <i class="fa fa-plus-square animated bounceInDown show-info"></i> </h3>

  								<blockquote class="page-information hidden">
  									<p>
  										<b>Add DVD to Inventory Page</b> Page to add DVD to Inventory.
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
  											Add DVD to Inventory
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
									<form class="form-horizontal cascade-forms" method="post" action="add_dvd_inventory.php">

  										
													
								<div class="form-group">
												<label for="account name" class="col-lg-2 col-md-3 control-label">DVD</label>
												<div class="col-lg-4 col-md-3">
													<input type="text" class="search form-control" id="searchid" placeholder="Search for DVD" />
													&nbsp; &nbsp; Ex:MAT0102EN, GEO0304EN e.t.c<br /> 
													<input type="hidden" class="search form-control" id="searchhidden" name="dvd" />

													<div id="result"></div>
													</div>
								</div>
								
								<div class="form-group">
												<label for="account number" class="col-lg-2 col-md-3 control-label">Quantity</label>
												<div class="col-lg-4 col-md-3">
													<input type="number" class="form-control" id="pulser" name="qty" >
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

<script type="text/javascript" src="jquery-1.8.0.min.js"></script>
<script type="text/javascript">
$(function(){
$(".search").keyup(function() 
{ 
var searchid = $(this).val();
var dataString = 'search='+ searchid;
if(searchid!='')
{
    $.ajax({
    type: "POST",
    url: "ajax/search.php",
    data: dataString,
    cache: false,
    success: function(html)
    {
    $("#result").html(html).show();
    }
    });
}return false;    
});

jQuery("#result").live("click",function(e){ 
    var $clicked = $(e.target);
    var $name = $clicked.find('.name').html();
    var $nameid = $clicked.find('.nameid').html();
    var decoded = $("<div/>").html($name).text();
    var decodedid = $("<div/>").html($nameid).text();
    $('#searchid').val(decoded);
    $('#searchhidden').val(decodedid);
});
jQuery(document).live("click", function(e) { 
    var $clicked = $(e.target);
    if (! $clicked.hasClass("search")){
    jQuery("#result").fadeOut(); 
    }
});
$('#searchid').click(function(){
    jQuery("#result").fadeIn();
});
});
</script>