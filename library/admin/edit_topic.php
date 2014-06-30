<?php 
//* Student Area */
/* Doubleakins*/
/* 08063777394*/
/* 26062014*/
/* redirected to when student logs in */

$page_title = "Edit Topic";
$path = "";
$inc_path = $path."partials/";
include($inc_path . 'header.php'); 

if (isset($_SESSION['work_id']) && $_SESSION['roles'] != 'admin') {
	redirect_to('error.php');
}

?> 

	<?php 
		// Check for a valid Organisation ID, through GET or POST:
			if ( isset($_GET['id']) && is_numeric($_GET['id']))
			{ 
				$edit_id = $_GET['id'];
			} else {
				redirect_to('view_topics.php');
			}
?>
	
<?php // code to add or edit a new organisation 
if (isset($_POST['submitted'])) { // Handle the form.

// Trim all the incoming data:
$trimmed = array_map('trim', $_POST);

// Assume invalid values:
$subject = $topic = FALSE;

$errors = array();

$subject= mysqli_real_escape_string ($conn, $trimmed['subject']);

// Check for the subject:
if (isset($_POST['topic']) && ($_POST['topic'] != "")){
$topic= mysqli_real_escape_string ($conn, $trimmed['topic']);
} else {
$errors[] = 'Please enter the topic!</p>';
}


if ($subject && $topic) { // If everything's OK...


// Add the subject to the database:

$q = "UPDATE topic SET subject_id = '$subject', topic='$topic' 
			WHERE topic_id='$edit_id'
			LIMIT 1";$r = mysqli_query ($conn, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($conn));

if (mysqli_affected_rows($conn) == 1)
{ // If it ran OK then add other details to biodata table.

	//Set display property and confirmation message of the message container to 'block'
					$success_display = 'block';
					$success_msg = '<h4 style="color: #008080"> SUCCESS! Topic saved successfully.</h4>';
					
					} else { // db error.
						$err_msg = 'Topic could not be saved due to a system error. We apologize for any inconvenience</p>';
					}

								} else { // If one of the data tests failed.
								$datatest = 'Please re-enter the details appropriately and try again.</p>';
					}

} // End of the main Submit conditional.

?>

				<?php // select the edit values
		
				$q3 = "SELECT topic.topic, topic.topic_id, subject.subject, subject.subject_id, organisation.organisation, organisation.organisation_id, language.language FROM topic
						JOIN subject ON subject.subject_id = topic.subject_id
						JOIN organisation ON organisation.organisation_id = subject.organisation_id
						JOIN language ON language.language_id = organisation.language_id
						WHERE topic_id = '$edit_id'
						LIMIT 1";
				$r3 = mysqli_query($conn, $q3) or trigger_error(mysqli_error($conn));
				$row3 = mysqli_fetch_array($r3, MYSQLI_ASSOC);
				
				?>
  						<!-- /header -->
  						<div class="row">
  							<div class="col-mod-12">

  								<ul class="breadcrumb">
  									<li><a href="index.php">Home</a></li>
  									<li class="active"><a href="language.php"> Edit Topic</a></li>
  								</ul>


  								<h3 class="page-header animated bounceInRight show-info" ><i class="fa fa-spin fa-spinner"></i> Edit Topic <i class="fa fa-edit animated bounceInDown show-info"></i> </h3>

  								<blockquote class="page-information hidden">
  									<p>
  										<b>Edit Topic Page</b> To edit a topic.
  									</p>
  								</blockquote>

  							</div>
  						</div>

  						<!-- View Organisationzs -->
  						 <!-- Most visited and Traffic sources Graph -->
			
  					<!-- Add Organisations -->
  						<div class="row">
  							<div class="col-md-12">
  								<div class="panel panel-cascade">
  									<div class="panel-heading">
  										<h3 class="panel-title text-primary">
  											Edit Topic
  											
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

  										<div class="list-group demo-list-group">
				          				
				          			<form class="form-horizontal cascade-forms" method="post" action="edit_topic.php?id=<?php echo $edit_id; ?>">
				          			
											<div class="form-group">
												<label for="language" class="col-lg-2 col-md-3 control-label">Language</label>
												<div class="col-lg-10 col-md-9">
													<input type="text" class="form-control form-cascade-control"
													value = "<?php if(isset($row3['language'])) { echo $row3['language']; }?>" readonly >
												</div>
											</div>
											
											
											<div class="form-group">
												<label for="organisation" class="col-lg-2 col-md-3 control-label">Organisation</label>
												<div class="col-lg-10 col-md-9">
													<input type="text" class="form-control form-cascade-control"
													value = "<?php if(isset($row3['organisation'])) { echo $row3['organisation']; }?>" readonly >
												</div>
											</div>
											
											<div class="form-group">
												<label for="subject" class="col-lg-2 col-md-3 control-label">Subject</label>
												<div class="col-lg-10 col-md-9">
													<input type="hidden" value="<?php if(isset($row3['subject_id'])) { echo $row3['subject_id']; }?>" name="subject">
													<input type="text" class="form-control form-cascade-control"
													value = "<?php if(isset($row3['subject'])) { echo $row3['subject']; }?>" readonly >
												</div>
											</div>
											
											<div class="form-group">
												<label for="topic" class="col-lg-2 col-md-3 control-label">Topic</label>
												<div class="col-lg-10 col-md-9">
													<input type="text" class="form-control form-cascade-control" id="pulser" name="topic" id="pulser"
													value = "<?php if(isset($row3['topic'])) { echo $row3['topic']; }?>" >
												</div>
											</div>
											
											
											<div class="form-actions">
											<input type="hidden" name="submitted" value="TRUE" />
											<?php
											if(isset($edit_id)) {
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
