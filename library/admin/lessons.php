<?php 
//* Student Area */
/* Doubleakins*/
/* 08063777394*/
/* 26062014*/
/* redirected to when student logs in */

$page_title = "Add Lessons";
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
$language = $organisation = $subject = $topic = $lecturer = $duration = $lesson = FALSE;

$errors = array();

$language= mysqli_real_escape_string ($conn, $trimmed['language']);

$organisation= mysqli_real_escape_string ($conn, $trimmed['organisation']);

$subject= mysqli_real_escape_string ($conn, $trimmed['subject']);

$topic= mysqli_real_escape_string ($conn, $trimmed['topic']);

// Check for the lecturer:
if (isset($_POST['lecturer']) && ($_POST['lecturer'] != "")){
$lecturer= mysqli_real_escape_string ($conn, $trimmed['lecturer']);
} else {
$errors[] = 'Please select the lecturer!</p>';
}


// Check for the lecturer:
if (isset($_POST['duration']) && ($_POST['duration'] != "")){
$duration= mysqli_real_escape_string ($conn, $trimmed['duration']);
} else {
$errors[] = 'Please enter the duration!</p>';
}


// Check for the lesson:
if (isset($_POST['lesson']) && ($_POST['lesson'] != "")){
$lesson= mysqli_real_escape_string ($conn, $trimmed['lesson']);
} else {
$errors[] = 'Please enter the lesson!</p>';
}


if ($language && $organisation && $subject && $topic && $lecturer && $duration && $lesson) { // If everything's OK...


// Add the lesson to the database:

	$q = "INSERT INTO `lesson` (language_id, organisation_id, subject_id, topic_id, work_id, duration, lesson, date) 
		VALUES ('$language', '$organisation', '$subject', '$topic', '$lecturer', '$duration',  '$lesson', NOW())";
	$r = mysqli_query ($conn, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($conn));

if (mysqli_affected_rows($conn) == 1)
{ // If it ran OK then add other details to biodata table.

	//Set display property and confirmation message of the message container to 'block'
					$success_display = 'block';
					$success_msg = '<h4 style="color: #008080"> SUCCESS! Lesson saved successfully.</h4>';
					
					} else { // db error.
						$err_msg = 'Lesson could not be saved due to a system error. We apologize for any inconvenience</p>';
					}

								} else { // If one of the data tests failed.
								$datatest = 'Please re-enter the details appropriately and try again.</p>';
								}

} // End of the main Submit conditional.

?>

<?php 
		// Check for a valid Organisation ID, through GET or POST:
			if ( isset($_GET['id']) && is_numeric($_GET['id']))
			{ 
				$topic_id = $_GET['id'];
			
		
				$q3 = " SELECT topic.topic_id, topic.topic, subject.subject_id, subject.subject, organisation.organisation, organisation.organisation_id, language.language, language.language_id FROM topic
						JOIN subject ON subject.subject_id = topic.subject_id
						JOIN organisation ON organisation.organisation_id = subject.organisation_id
						JOIN language ON language.language_id = organisation.language_id
						WHERE topic_id = '$topic_id'
						LIMIT 1";
				$r3 = mysqli_query($conn, $q3);
				$row3 = mysqli_fetch_array($r3, MYSQLI_ASSOC);
			}
?>
  						<!-- /header -->
  						<div class="row">
  							<div class="col-mod-12">

  								<ul class="breadcrumb">
  									<li><a href="index.php">Home</a></li>
  									<li class="active">Lessons</li>
  									<li class="active">Add Lessons</li>
  								</ul>


  								<h3 class="page-header animated bounceInRight show-info" ><i class="fa fa-spin fa-spinner"></i> Lessons <i class="fa fa-group animated bounceInDown show-info"></i> </h3>

  								<blockquote class="page-information hidden">
  									<p>
  										<b>Add Lessons Page</b> To add a new lessons.
  									</p>
  								</blockquote>

  							</div>
  						</div>

			
  					<!-- Add Lessons -->
  						<div class="row">
  							<div class="col-md-12">
  								<div class="panel panel-cascade">
  									<div class="panel-heading">
  										<h3 class="panel-title text-primary">
  											Add New Lessons
  											
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
				          				
				          			<form class="form-horizontal cascade-forms" method="post" action="lessons.php?id=<?php echo $topic_id; ?>">
				          			
											<div class="form-group">
												<label for="language" class="col-lg-2 col-md-3 control-label">Language</label>
												<div class="col-lg-10 col-md-9">
													<input type="hidden" value="<?php if(isset($row3['language_id'])) { echo $row3['language_id']; }?>" name="language" >
													<input type="text" class="form-control form-cascade-control"
													value = "<?php if(isset($row3['language'])) { echo $row3['language']; }?>" readonly >
												</div>
											</div>
											
											
											<div class="form-group">
												<label for="organisation" class="col-lg-2 col-md-3 control-label">Organisation</label>
												<div class="col-lg-10 col-md-9">
													<input type="hidden" value="<?php if(isset($row3['organisation_id'])) { echo $row3['organisation_id']; }?>" name="organisation" >
													<input type="text" class="form-control form-cascade-control"
													value = "<?php if(isset($row3['organisation'])) { echo $row3['organisation']; }?>" readonly >
												</div>
											</div>
											
											<div class="form-group">
												<label for="subject" class="col-lg-2 col-md-3 control-label">Subject</label>
												<div class="col-lg-10 col-md-9">
													<input type="hidden" value="<?php if(isset($row3['subject_id'])) { echo $row3['subject_id']; }?>" name="subject" >
													<input type="text" class="form-control form-cascade-control"
													value = "<?php if(isset($row3['subject'])) { echo $row3['subject']; }?>" readonly >
												</div>
											</div>
											
											<div class="form-group">
												<label for="topic" class="col-lg-2 col-md-3 control-label">Topic</label>
												<div class="col-lg-10 col-md-9">
													<input type="hidden" value="<?php if(isset($row3['topic_id'])) { echo $row3['topic_id']; }?>" name="topic" >
													<input type="text" class="form-control form-cascade-control"
													value = "<?php if(isset($row3['topic'])) { echo $row3['topic']; }?>" readonly >
												</div>
											</div>
											
											<div class="form-group">
															<label for="selectlanguage" class="col-lg-2 col-md-3 control-label"> Lecturer </label>
				
													
													<select data-placeholder="Choose a Lecturer..." class="chosen-select" style="width:350px;" tabindex="2" name="lecturer">
														<option value=""></option>
														<?php // code to select language
				         								// Make the query to view table details:
														$q2 = "SELECT * FROM worker_register";
														$r2 = @mysqli_query ($conn, $q2);
										   	        ?>
													<?php // iterate the table rows <tr>
													while ($row2 = mysqli_fetch_array($r2, MYSQLI_ASSOC)) {
													?>
														<option value="<?php echo $row2['work_id']; ?>">
														<?php echo $row2['work_first_name'] . '  ' . $row2['work_last_name'] ; ?>
														</option>
														<?php } //end select language while ?>
											 		</select>
												</div>
												
											
											<div class="form-group">
												<label for="lesson" class="col-lg-2 col-md-3 control-label">Duration (in seconds)</label>
												<div class="col-lg-10 col-md-9">
													<input type="number" class="form-control form-cascade-control" name="duration" step="1" >
												</div>
											</div>
											
											
											<div class="form-group">
												<label for="lesson" class="col-lg-2 col-md-3 control-label">Lesson</label>
												<div class="col-lg-10 col-md-9">
													<input type="text" class="form-control form-cascade-control" id="pulser" name="lesson" >
												</div>
											</div>
											
											<div class="form-group">
												<label for="lesson" class="col-lg-2 col-md-3 control-label">Lesson Note <small>(PDF only) </small></label>
												<div class="col-lg-10 col-md-9">
													<input type="file" class="form-control form-cascade-control" id="pulser" name="upload" >
												</div>
											</div>
											
											
											<div class="form-actions">
											<input type="hidden" name="submitted" value="TRUE" />
											<input type="submit" value="Add Lesson" class="btn bg-primary text-white btn-lg">
											</div>
									</form>
					
									</div> <!-- /panel body -->	
									</div>
							  
  								</div>	
  							</div>


  					</div> <!-- /.Add Lessons -->
      

<?php include('partials/footer.php'); ?>
