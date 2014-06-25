<?php 
//* Student Area */
/* Doubleakins*/
/* 08063777394*/
/* 19062014*/
/* redirected to when student logs in */

$page_title = "Add Organisation";
$path = "";
$inc_path = $path."partials/";
include($inc_path . 'header.php'); ?> 


<?php // if its an edit function
		// Check for a valid Category ID, through GET or POST:
			if ( isset($_GET['id']) && is_numeric($_GET['id']))
			{ 
				$update_id = $_GET['id'];
			
		
				$q3 = "SELECT * FROM organisation
						WHERE organisation_id = '$update_id'
						LIMIT 1";
				$r3 = mysqli_query($conn, $q3);
				$row3 = mysqli_fetch_array($r3, MYSQLI_ASSOC);
			}
		?>
		
		
<?php // code to add or edit a new organisation 
if (isset($_POST['submitted'])) { // Handle the form.

// Trim all the incoming data:
$trimmed = array_map('trim', $_POST);

// Assume invalid values:
$language = $organisation = FALSE;

$errors = array();

// Check for a category:
if ((isset($_POST['language'])) && ($_POST['language'] != "")) {
$language = mysqli_real_escape_string ($conn, $trimmed['language']);
} else {
$errors[] = 'Please select a language!</p>';
}


// Check for the details:
if (isset($_POST['organisation']) && ($_POST['organisation'] != "")){
$organisation= mysqli_real_escape_string ($conn, $trimmed['organisation']);
} else {
$errors[] = 'Please enter the organisation name!</p>';
}


if ($language && $organisation) { // If everything's OK...


// Add the user to the database:
if (isset($update_id)) {
	$q = "UPDATE organisation SET language_id = '$language', organisation='$organisation' 
			WHERE organisation_id='$update_id'
			LIMIT 1";
} else {
	
$q = "INSERT INTO  `organisation` (language_id, organisation, date) VALUES ('$language', '$organisation', NOW())";
	
}
$r = mysqli_query ($conn, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($conn));

if (mysqli_affected_rows($conn) == 1)
{ // If it ran OK then add other details to biodata table.

	//Set display property and confirmation message of the message container to 'block'
					$success_display = 'block';
					$success_msg = '<h4 style="color: #008080"> SUCCESS! Organisation saved successfully.</h4>';
					
					} else { // db error.
						$err_msg = 'Organisation could not be saved due to a system error. We apologize for any inconvenience</p>';
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
  									<li><a href="index.php">Home</a></li>
  									<li class="active"><a href="language.php">Organization</a></li>
  								</ul>


  								<h3 class="page-header animated bounceInRight show-info" ><i class="fa fa-spin fa-spinner"></i> Organization <i class="fa fa-group animated bounceInDown show-info"></i> </h3>

  								<blockquote class="page-information hidden">
  									<p>
  										<b>Add Organization Page</b> To add a new organization.
  									</p>
  								</blockquote>

  							</div>
  						</div>

  						<!-- View Organisationzs -->
  						 <!-- Most visited and Traffic sources Graph -->
          <div class="row">
           <div class="col-md-12">
            <div class="panel">
             <div class="panel-heading text-primary">
              <h3 class="panel-title bounceInRight">
               <i class="fa fa-search-plus bounceInRight"></i>
               View Organizations
               <span class="pull-right">
                
              <a href="#" class="panel-minimize"><i class="fa fa-chevron-up"></i></a>
            </span>
          </h3>
        </div>
        <div class="panel-body">
        	
        	<?php 
        	
        	// block to output success message	
								if (isset($_GET['success'])) 
									{
										$success_msg = 'Organisation removed successfully';
									}
						
								if (isset($_GET['error'])) 
									{
										$err_msg = 'Ooops: The Organisation was not removed';
									}
									
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
				$q1 = "SELECT organisation.organisation_id, language.language, organisation.organisation FROM `organisation` 
				JOIN  `language` ON organisation.language_id = language.language_id
				ORDER BY  `organisation`.`language_id` ASC";
				$r1 = @mysqli_query ($conn, $q1);
         ?>
                  
         <table  class="table table-bordered table-hover table-striped display" id="example" >
           <thead>
            <tr>
             <th>Organisation</th>
             <th>Language</th>
             <th>Edit</th>
             <th>Delete</th>
           </tr>
         </thead>
         <tbody>
         	
         	<?php // iterate the table rows <tr>
				while ($row1 = mysqli_fetch_array($r1, MYSQLI_ASSOC)) {
				$id = $row1['organisation_id']; 
			?>
          <tr class="odd gradeX">
           <td><?php echo $row1['organisation']; ?></td>
            <td><?php echo $row1['language']; ?></td>
            <td class="center"> <a href="<?php echo $path; ?>organisation.php?id=<?php echo urlencode($row1['organisation_id']); ?>"
								class="btn btn-info btn-animate-demo" title="Edit"><i class="fa fa-pencil-square-o"></i> Edit </a>
			</td>
            <td class="center">	<a href="<?php echo $path; ?>orgdelete.php?id=<?php echo urlencode($row1['organisation_id']); ?>" 
								onclick="return confirm('Are you sure you want to delete this organisation ?')" 
								class="btn btn-danger btn-animate-demo" title="Delete"><i class="fa fa-times"></i> Delete </a>
			</td>
          </tr>
          
          <?php } // end of while loop ?>
          
           </tbody>
           <tfoot>
            <tr>
             <th>Organisation</th>
             <th>Language</th>
             <th>Edit</th>
             <th>Delete</th>
           </tr>	
         </tfoot>
       </table>
     </div> <!-- /panel body -->
   </div>
 </div> <!-- /col-md-12 -->
</div><!-- /.View Organisationzs-->
  					
  					
  					<!-- Add Organisations -->
  						<div class="row">
  							<div class="col-md-12">
  								<div class="panel panel-cascade">
  									<div class="panel-heading">
  										<h3 class="panel-title text-primary">
  											Add New Organization
  											
  										</h3>
  									</div>
  									<div class="panel-body panel-border">
  										<div class="list-group demo-list-group">
				          				
				          				<?php
				          				if(isset($update_id)) {
								        echo '<form class="form-horizontal cascade-forms" method="post" action="organisation.php?id=' .$update_id . '">';
				          				} else { 
								        echo '<form class="form-horizontal cascade-forms" method="post" action="organisation.php">';
										}
										?>
										
										<div class="form-group">
															<label for="selectlanguage" class="col-lg-2 col-md-3 control-label"> Language </label>
				
													
													<?php // code to select language
				         								// Make the query to view table details:
														$q2 = "SELECT * FROM language";
														$r2 = @mysqli_query ($conn, $q2);
										   	        ?>
													<select data-placeholder="Choose a Language..." class="chosen-select" style="width:350px;" tabindex="2" name="language">
														<option value=""></option>
													<?php // iterate the table rows <tr>
													while ($row2 = mysqli_fetch_array($r2, MYSQLI_ASSOC)) {
													?>
														<option value="<?php echo $row2['language_id']; ?>"
															<?php if (isset($row3['language_id']) && ($row3['language_id'] == $row2['language_id'])) { echo "selected"; } ?> ><?php echo $row2['language']; ?></option>
														<?php } //end select language while ?>
											 		</select>
												</div>

											
											<div class="form-group">
												<label for="organisation" class="col-lg-2 col-md-3 control-label">Organisation</label>
												<div class="col-lg-10 col-md-9">
													<input type="text" class="form-control form-cascade-control" id="pulser" 
													value = "<?php if(isset($row3['organisation'])) { echo $row3['organisation']; }?>"placeholder="Enter Organisation name" name="organisation" >
												</div>
											</div>
											<div class="form-actions">
								<input type="hidden" name="submitted" value="TRUE" />
											<?php
											if(isset($update_id)) {
											echo '<input type="submit" value="Update" class="btn bg-primary text-white btn-lg">';
												} else {
											echo '<input type="submit" value="Submit" class="btn bg-primary text-white btn-lg">';
											}
							?>
							</div>
						</form>
					
									</div> <!-- /panel body -->	
									</div>
							  
  								</div>	
  							</div>


  					</div> <!-- /.Add Organisations -->
      

<?php include('partials/footer.php'); ?>
