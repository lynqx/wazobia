<?php 
//* Student Area */
/* Doubleakins*/
/* 08063777394*/
/* 19062014*/
/* redirected to when student logs in */

$page_title = "Profile";
$path = "";
$inc_path = $path."partials/";
include($inc_path . 'header.php');
 ?> 

  						<!-- /header -->
  						<div class="row">
  							<div class="col-mod-12">
  								<ul class="breadcrumb">
  									<li><a href="index.php">Library</a></li>
  									<li class="active"><a href="profile.php">Profile</a></li>
  								</ul>
					<?php
					if(isset($_GET['id']) && is_numeric($_GET['id'])) {
						$user = $_GET['id'];
					} else {
					$user = $_SESSION['student_id'];
					}
					?>
					
<?php // to update your records
					
// Check if the biodata form has been submitted:
if (isset($_POST['biodata'])) {

$error = array(); // Initialize error array.

// Trim all the incoming data:
$trimmed = array_map('trim', $_POST);

// Assume invalid values:
$fn = $ln = $mb = FALSE;

// Check for a first name:
if (preg_match ('/^[A-Z \'.-]{2,20}$/i', $trimmed['firstname'])) {
$fn = mysqli_real_escape_string ($conn, $trimmed['firstname']);
} else {
	$error[] = 'Please enter a first name!';

}

// Check for a last name:
if (preg_match ('/^[A-Z \'.-]{2,40}$/i', $trimmed['lastname'])) {
$ln = mysqli_real_escape_string ($conn, $trimmed['lastname']);
} else {
		$error[] = 'Please enter a last name!';
}


//check for a mobile no
if ( (isset($_POST['mobile'])) && (is_numeric($_POST['mobile'])) ) {
$mb = mysqli_real_escape_string ($conn, $trimmed['mobile']);
} else {
			$error[] = 'Please enter a valid mobile number.';
	}


if ($fn && $ln && $mb) { // If everything's OK...
	
		// Update usetr info in the database:
		$q = "UPDATE student_register SET first_name = '$fn', last_name = '$ln', phone = '$mb'
				WHERE student_id = '$user'
				LIMIT 1";
		if ($r = mysqli_query ($conn, $q) or trigger_error(mysqli_error($conn))) {


 					// Finish the page:
					 //Set display property and confirmation message of the message container to 'block'
					$success_display = 'block';
					$success_msg = '<h4 style="color: #008080"> SUCCESS! Your info has been updated successfully.</h4>';
		} else {
			$err_msg = '<p>We are sorry for any inconvienience.</p>';
			
		}	
				} else { // If one of the data tests failed.
								$err = '<p>Please re-enter the details appropriately and try again.</p>';
				}

} // End of the if biodata conditional

// Check if the address form has been submitted:
if (isset($_POST['updateaddress'])) {

$error = array(); // Initialize error array.

// Trim all the incoming data:
$trimmed = array_map('trim', $_POST);

// Assume invalid values:
$ad = $ct = $bio = FALSE;

// Check for an address:
if ($_POST['address']) {
$ad = mysqli_real_escape_string ($conn, $trimmed['address']);
} else {
			$error[] = 'Please enter your address!';
}

//check for a city
if ($_POST['city']) {
$ct = mysqli_real_escape_string ($conn, $trimmed['city']);
} else {
					$error[] = 'Please enter a city!';
}

//post bio
if ($_POST['bio']) {
$bio = mysqli_real_escape_string ($conn, $trimmed['bio']);
}

if ($ad && $ct && $bio) { // If everything's OK...
	


		// Update usetr info in the database:
		$q = "UPDATE student_register SET address = '$ad', city = '$ct', bio = '$bio'
				WHERE student_id = '$user'
				LIMIT 1";
		if ($r = mysqli_query ($conn, $q) or trigger_error(mysqli_error($conn))) {


 					// Finish the page:
					 //Set display property and confirmation message of the message container to 'block'
					$success_display = 'block';
					$success_msg = '<h4 style="color: #008080"> SUCCESS! Your info has been updated successfully.</h4>';
		} else {
			$err_msg = '<p>We are sorry for any inconvienience.</p>';
			
		}	
				} else { // If one of the data tests failed.
								$err = '<p>Please re-enter the details appropriately and try again.</p>';
				}

} // End of the if address conditional

	
	// Check if the social media form has been submitted:
if (isset($_POST['updatesocial'])) {

$error = array(); // Initialize error array.

// Trim all the incoming data:
$trimmed = array_map('trim', $_POST);

// Assume invalid values:
$tw = $ln = FALSE;

// Check for an address:
$tw = mysqli_real_escape_string ($conn, $trimmed['twitter']);

//check for a city
$ln = mysqli_real_escape_string ($conn, $trimmed['linkedin']);


		// Update usetr info in the database:
		$q = "UPDATE student_register SET twitter = '$tw', linkedin = '$ln'
				WHERE student_id = '$user'
				LIMIT 1";
		if ($r = mysqli_query ($conn, $q) or trigger_error(mysqli_error($conn))) {


 					// Finish the page:
					 //Set display property and confirmation message of the message container to 'block'
					$success_display = 'block';
					$success_msg = '<h4 style="color: #008080"> SUCCESS! Your social media information has been updated successfully.</h4>';
		} else {
			$err_msg = '<p>Your information could not be updated. We are sorry for any inconvienience.</p>';
			
		}	

} // End of the if address conditional


	// Check if the upload form has been submitted:
if (isset($_POST['updprofile'])) {

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
	
	//check for previous passport and delete
			$q9 = "SELECT image FROM student_register WHERE student_id = '$user'";
			$r9 = mysqli_query($conn, $q9);
			$row9 = mysqli_fetch_array($r9, MYSQLI_ASSOC);
			$oldfile = $row9['image'];
			if (isset($oldfile)) {
				if (file_exists ('images/profiles/' . $oldfile) && is_file('images/profiles/' . $oldfile) ) {
				unlink ('images/profiles/' . $oldfile );
				}
			}
			
// include universal image resizing function
include_once("partials/img_lib.php");
$target_file = "temp/$file";
$resized_file = "images/profiles/$file";
$wmax = 300;
$hmax = 200;
ak_img_resize($target_file, $resized_file, $wmax, $hmax, $fileExt);

// Post details to db.
//require_once ('mysqli_connect.php');

// Trim all the incoming data:
$trimmed = array_map('trim', $_POST);

$errors = array(); // Initialize error array.

if ($file) { // If everything's OK...


$q = "UPDATE student_register SET image='$file' WHERE student_id = '$user' LIMIT 1";
$r = mysqli_query ($conn, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($conn));
if (mysqli_affected_rows($conn) == 1) 
{ // If it ran OK.

		$success_msg =  'Thank You! Your passport has been uploaded successfully!';

}
} else {
	
	$err_msg = 'Your passport could not be uploaded due to some errors.';


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
echo '</p></div>';
 print '</strong></p>';

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
				
				
				
// Check if the change password form has been submitted:
if (isset($_POST['updatepwd'])) {

$error = array(); // Initialize error array.

// Trim all the incoming data:
$trimmed = array_map('trim', $_POST);

// Assume invalid values:
$p = FALSE;

 // Check for a password and match against the confirmed password:
if (preg_match ('/^\w{4,20}$/', $trimmed['pass1']) ) {
if ($trimmed['pass1'] == $trimmed['pass2']) {
$p = mysqli_real_escape_string ($conn, $trimmed['pass1']);
} else {
							$error[] = 'Your password did not match the confirmed password!';
	}
} else {
								$error[] = 'Please enter a valid password!';
	}



if ($p) { // If everything's OK...
	


		// Update usetr info in the database:
		$qp = "UPDATE student_register SET password = SHA1('$p')
				WHERE student_id = '$user'
				LIMIT 1";
		if ($rp = mysqli_query ($conn, $qp) or trigger_error(mysqli_error($conn))) {


 					// Finish the page:
					 //Set display property and confirmation message of the message container to 'block'
					$success_display = 'block';
					$success_msg = '<h4 style="color: #008080"> SUCCESS! Your password has been updated successfully.</h4>';
		} else {
			$err_msg = '<p>Your password could not be changed at the moment. We are sorry for any inconvienience.</p>';
			
		}	
				} else { // If one of the data tests failed.
								$err = '<p>Please re-enter the details appropriately and try again.</p>';
				}

} // End of the if password conditional

					?>
					
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
									if (!empty($error)) {
										echo ' <div class="alert alert-block alert-danger fade in">
										<a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
									<h4><i class="fa fa-times"></i> Error!</h4>
									<p>The following error(s) occurred:<br />';
									foreach ($error as $msg) {
									echo " - $msg<br />\n";
									}
									echo '</p>
									<p>Please re-enter your details and try again</p>
									</div>';
									}
												?>
												
					<?php
					$q = "SELECT *, UNIX_TIMESTAMP() - last_login AS TimeSpent FROM student_register WHERE student_id = '$user'";
					$r = mysqli_query($conn, $q) or trigger_error(mysqli_error($conn));
					$row = mysqli_fetch_array($r, MYSQLI_ASSOC);
					?>
  								<h3 class="page-header"> User Profile - <?php echo $row['first_name']. '  ' . $row['last_name']; ?> <i class="fa fa-user animated bounceInDown show-info"></i> </h3>

  								<blockquote class="page-information hidden">
  									<p>
  										<b>User Profile Page</b> is the User Profile Page.
  									</p>
  								</blockquote>

  							</div>
  						</div>

  		<div class="row profile">    						<!-- start all profile-->
  			<?php if((isset($_GET['id']) && $_GET['id'] == $_SESSION['student_id'] ) || !isset($_GET{'id'})) {?>
  				
                  <div class="col-md-3 user-details well text-center col-sm-12" > 	 <!-- start seide bar profile-->	
                    <img src="images/profiles/<?php if(isset($row['image'])) { echo $row['image']; } else { echo 'default.png'; } ?>" class="main-avatar" />
                    <div class="user-main-info">
                      <h2 class="text-primary user-name"><?php echo $row['first_name']. '  ' . $row['last_name']; ?></h2>
                      <h4 class="text-info user-designation"> <i class="fa fa-envelope-o"></i> <?php echo $row['email']; ?></h4>
                      <h4 class="text-info user-designation"> <i class="fa fa-twitter"></i> <?php echo $row['twitter']; ?></h4>
                      <h5 class="text-info user-designation"><?php echo $row['interest']; ?></h5>
                    </div>
                    <div class="about">
                      <p><strong>About: </strong> <?php echo $row['bio']; ?> </p>
                    </div>
                    <ul class="list-group details-list">
                     <li class="list-group-item">
                      <span class="badge bg-info">
                      	<?php
                    $q4 = "SELECT DISTINCT subject.subject_id, subject.subject FROM subject
                    		JOIN lesson ON lesson.subject_id = subject.subject_id
                    		JOIN dvd_lessons ON dvd_lessons.lesson_id = lesson.lesson_id
                    		JOIN dvd_code ON dvd_code.dvd_id = dvd_lessons.dvd_id
                    		JOIN dvd_code_user ON dvd_code_user.dvd_code_id = dvd_code.dvd_code_id
                    		WHERE dvd_code_user.student_id = '$user'";
					$r4 = mysqli_query($conn, $q4) or trigger_error(mysqli_error($conn));
                    echo $noofsubject = mysqli_num_rows($r4);
					
                    ?>
                      	</span>
                      	<b> Subjects Registered </b> <hr>
                      	<?php echo '<ul>';
					while ($row4 = mysqli_fetch_array($r4, MYSQLI_ASSOC)) {
						echo '<li>' . $row4['subject'] . '</li>';
					}
					echo '</ul>';
					?>
                     
                    </li>
                    <li class="list-group-item">
                      <span class="badge bg-pink">
                    <?php
                    $q = "SELECT dvd_code_user_id FROM dvd_code_user WHERE student_id = '$user'";
					$r = mysqli_query($conn, $q) or trigger_error(mysqli_error($conn));
                    echo $number = mysqli_num_rows($r);
                    ?>
                      	</span>
                      <b>DVD in Archive</b>
                    </li>
                    <li class="list-group-item">
                      <span class="badge bg-warning">
                      	<?php
                      	$sn = array();
                      	$q2 = "SELECT dvd_id FROM dvd_code
                      			JOIN dvd_code_user ON dvd_code_user.dvd_code_id = dvd_code.dvd_code_id
                      			WHERE dvd_code_user.student_id = '$user'";
								
						$r2 = mysqli_query($conn, $q2) or trigger_error(mysqli_error($conn));
						while ($row2 = mysqli_fetch_array($r2, MYSQLI_ASSOC)) {
							$condition = $row2['dvd_id'];
							
							//second loop
								$q3 = "SELECT lesson_id FROM dvd_lessons WHERE dvd_id = '$condition'";
								if ($r3 = mysqli_query($conn, $q3) or trigger_error(mysqli_error($conn))) {
								$count = mysqli_num_rows($r3);
									array_push($sn, $count);
								}
			
						}
						echo array_sum($sn);
                      	?>
                      	</span>
                      <b>Lessons Watched</b>
                    </li>
                  </ul>
                </div>  	<!-- end sidebar profile-->
                
                <div class="col-md-9 profile-tabs">

                  <ul id="myTab" class="nav nav-tabs">
                    <li class="active"><a href="#view" data-toggle="tab">View Profile</a></li>
                    <?php if((isset($_GET['id']) && $_GET['id'] == $_SESSION['student_id'] ) || !isset($_GET{'id'})) {?>
                    <li><a href="#edit" data-toggle="tab">Edit Profile</a></li>
                    <?php } ?>
                  </ul>

                  <div id="myTabContent" class="tab-content">

                    <div class="tab-pane fade  in active" id="view">
 <div class="panel">
 <div class="panel-heading">
  <span class="panel-title">BIODATA</span>
</div>
<div class="panel-body">
  <ul class="list-group">
   <li class="list-group-item">
    <span class="badge bg-info">First Name</span>
    <i class="fa fa-male"></i> <?php echo $row['first_name'];?>
  </li>
  <li class="list-group-item">
    <span class="badge bg-info">Last Name</span>
    <i class="fa fa-group"></i> <?php echo $row['last_name']; ?>
  </li>
  <li class="list-group-item">
    <span class="badge bg-info"> Email </span>
    <i class="fa fa-envelope"></i> <?php echo $row['email']; ?>
  </li>
  <li class="list-group-item">
    <span class="badge bg-info"> Mobile Number</span>
    <i class="fa fa-phone"></i> <?php echo $row['phone']; ?>
  </li>
  <li class="list-group-item">
    <span class="badge bg-info">Interest</span>
    <i class="fa fa-filter"></i> <?php echo $row['interest']; ?>
  </li>
</ul>
</div>
</div>



<div class="panel">
 <div class="panel-heading">
  <span class="panel-title">OTHERS</span>
</div>
<div class="panel-body">
  <ul class="list-group">
   <li class="list-group-item">
    <span class="badge bg-info">Address</span>
    <i class="fa fa-road"></i> <?php echo $row['address'];?>
  </li>
  <li class="list-group-item">
    <span class="badge bg-info">City</span>
    <i class="fa fa-map-marker"></i> <?php echo $row['city']; ?>
  </li>
  
</ul>
</div>
</div> <!-- /categories -->

<div class="panel">
 <div class="panel-heading">
  <span class="panel-title">SOCIAL MEDIA</span>
</div>
<div class="panel-body">
  <ul class="list-group">
   <li class="list-group-item">
    <span class="badge bg-info">Twitter</span>
    <i class="fa fa-twitter"></i> <?php echo $row['twitter'];?>
  </li>
  <li class="list-group-item">
    <span class="badge bg-info">LinkedIn</span>
    <i class="fa fa-linkedin"></i> <?php echo $row['linkedin']; ?>
  </li>
</ul>
</div>
</div>

<div class="panel">
 <div class="panel-heading">
  <span class="panel-title">LOGIN DETAILS</span>
</div>
<div class="panel-body">
  <ul class="list-group">
  	<li class="list-group-item">
    <span class="badge bg-info"> Last Login </span>
    <i class="fa fa-key"></i>
	
	<?php
	$days = floor($row['TimeSpent'] / (60 * 60 * 24));
			$remainder = $row['TimeSpent'] % (60 * 60 * 24);
			$hours = floor($remainder / (60 * 60));
			$remainder = $remainder % (60 * 60);
			$minutes = floor($remainder / 60);
			$seconds = $remainder % 60;
			if($days > 29)
			echo date('F d Y', $row['last_login']);
			elseif($days > 0)
			echo $days . ' days ago';
			elseif($days == 0 && $hours == 0 && $minutes == 0)
			echo "few seconds ago";		
			elseif($days == 0 && $hours == 0)
			echo $minutes.' minutes' . " " . $seconds.' seconds ago';
			elseif($days == 0 && $hours == 1)
			echo $hours.' hour' . " " . $minutes.' minutes' . " " . $seconds.' seconds ago';
			elseif($days == 0)
			echo $hours.' hours' . " " . $minutes.' minutes' . " " . $seconds.' seconds ago';
			?>
			
  </li>
</ul>
</div>
</div>

                    </div>
                    
                    
                    <div class="tab-pane fade" id="edit">
         <table  class="table table-bordered table-hover table-striped display">
         	<form method="post" action="profile.php" onsubmit = "document.getElementById('bioButton').disabled=true; 
                      	document.getElementById('bioButton').value='Please wait...';" >
                      	
                      	<tr><th colspan="2"> BIODATA </th></tr>
                      	
                      	<tr><td> <i class="fa fa-male"></i> Name</td>
                      		<td>
								<div class="form-group">
									<div class="col-lg-10 col-md-9">
										<input type="text" class="form-control" name="firstname"
										value = "<?php if(isset($row['first_name'])) { echo $row['first_name']; }?>">
									</div>
								</div>
							</td>
                      	</tr>
                      	
                      	<tr><td> <i class="fa fa-group"></i> Last Name</td>
                      		<td>
								<div class="form-group">
									<div class="col-lg-10 col-md-9">
										<input type="text" class="form-control" name="lastname" 
										value = "<?php if(isset($row['last_name'])) { echo $row['last_name']; }?>">
									</div>
								</div>
							</td>
                      	</tr>
                      	
                      	<tr><td> <i class="fa fa-mobile"></i> Mobile Number </td>
                      		<td>
								<div class="form-group">
									<div class="col-lg-10 col-md-9">
										<input type="text" class="form-control" name="mobile"
										value = "<?php if(isset($row['phone'])) { echo $row['phone']; }?>">
									</div>
								</div>
							</td>
                      	</tr>
                      	
                       	<tr>
                      		<td colspan="2">
								<div class="form-actions">
									<div class="col-lg-10 col-md-9">
										<input type="hidden" name="biodata" value="TRUE" />
										<input type="submit" value="Update" class="btn bg-success-dark text-white pull-right" id="bioButton" />
									</div>
								</div>
							</td>
                      	</tr>
                      	</form>
                      	
                      	</table>
                      	
                      	         <table  class="table table-bordered table-hover table-striped display">
                      <form method="post" action="profile.php" onsubmit = "document.getElementById('addButton').disabled=true; 
                      	document.getElementById('addButton').value='Please wait...';">
						<tr><th colspan="2"> OTHERS </th></tr>
                      	<tr><td width="280"> <i class="fa fa-road"></i> Address</td>
                      		<td>
								<div class="form-group">
									<div class="col-lg-10 col-md-9">
										<input type="text" class="form-control" name="address" 
										value = "<?php if(isset($row['address'])) { echo $row['address']; }?>">
									</div>
								</div>
							</td>
                      	</tr>
                      	
                      	<tr><td> <i class="fa fa-map-marker"></i> City </td>
                      		<td>
								<div class="form-group">
									<div class="col-lg-10 col-md-9">
										<input type="text" class="form-control" name="city"
										value = "<?php if(isset($row['city'])) { echo $row['city']; }?>">
									</div>
								</div>
							</td>
                      	</tr>
                      	
                      	<tr><td> <i class="fa fa-dashboard"></i> Bio </td>
                      		<td>
								<div class="form-group">
									<div class="col-lg-10 col-md-9">
										<textarea cols="50" rows="5" class="form-control" name="bio"><?php if(isset($row['bio'])) { echo $row['bio']; }?></textarea>
									</div>
								</div>
							</td>
                      	</tr>
                      	
                      	<tr>
                      		<td colspan="2">
								<div class="form-actions">
									<div class="col-lg-10 col-md-9">
										<input type="hidden" name="updateaddress" value="TRUE" />
										<input type="submit" value="Update" class="btn bg-success-dark text-white pull-right" id="addButton" />
									</div>
								</div>
							</td>
                      	</tr>
                      	</form>
                      	</table>
                      	
                      	
                      	<table  class="table table-bordered table-hover table-striped display">
                      <form method="post" action="profile.php" onsubmit = "document.getElementById('socButton').disabled=true; 
                      	document.getElementById('socButton').value='Please wait...';">
						<tr><th colspan="2"> SOCIAL MEDIA </th></tr>
						
                      	<tr><td width="280"> <i class="fa fa-twitter"></i> Tweeter</td>
                      		<td>
								<div class="form-group">
									<div class="col-lg-10 col-md-9">
										<input type="text" class="form-control" name="twitter" 
										value = "<?php if(isset($row['twitter'])) { echo $row['twitter']; }?>">
									</div>
								</div>
							</td>
                      	</tr>
                      	
                      	<tr><td> <i class="fa fa-linkedin"></i> LinkedIn </td>
                      		<td>
								<div class="form-group">
									<div class="col-lg-10 col-md-9">
										<input type="text" class="form-control" name="linkedin"
										value = "<?php if(isset($row['linkedin'])) { echo $row['linkedin']; }?>">
									</div>
								</div>
							</td>
                      	</tr>
                                       	
                      	<tr>
                      		<td colspan="2">
								<div class="form-actions">
									<div class="col-lg-10 col-md-9">
										<input type="hidden" name="updatesocial" value="TRUE" />
										<input type="submit" value="Update" class="btn bg-success-dark text-white pull-right" id="socButton" />
									</div>
								</div>
							</td>
                      	</tr>
                      	</form>
                      	</table>
                      	
                      	
                      	
                      	<table  class="table table-bordered table-hover table-striped display">
                      	<form method="post" action="profile.php" enctype="multipart/form-data"
                      	onsubmit = "document.getElementById('uploadButton').disabled=true; 
                      	document.getElementById('uploadButton').value='Please wait...';">
                      	
						<input type="hidden" name="MAX_FILE_SIZE" value="524288">

						<tr><th colspan="2"> PROFILE PICTURE <small style="color:#FF3030"> (Please upload a JPG or PNG format) </small> </th></tr>
                      	<tr>
                      		<td colspan="2">
								<img src="images/profiles/<?php if(isset($row['image'])) { echo $row['image']; } else { echo 'default.png'; } ?>" width="60"/>
							</td>
                      	</tr>
                      	
                      	<tr>
                      		<td width="280"> <i class="fa fa-picture-o"></i> Select Picture</td>
                      		<td>
								<div class="form-group">
									<div class="col-lg-10 col-md-9">
										<input type="file" class="form-control" name="upload">
									</div>
								</div>
							</td>
                      	</tr>
                      	
                      	<tr>
                      		<td colspan="2">
								<div class="form-actions">
									<div class="col-lg-10 col-md-9">
										<input type="hidden" name="updprofile" value="TRUE" />
										<input type="submit" value="Update" class="btn bg-success-dark text-white pull-right" id="uploadButton" />
									</div>
								</div>
							</td>
                      	</tr>
                      	</form>
                      	</table>
                      	
                      	<table  class="table table-bordered table-hover table-striped display">
                      <form method="post" action="profile.php" onsubmit = "document.getElementById('pwdButton').disabled=true; 
                      	document.getElementById('pwdButton').value='Please wait...';">
                      	
						<tr><th colspan="2"> CHANGE PASSWORD </th></tr>
                      	<tr><td width="280"> <i class="fa fa-lock"></i> Password</td>
                      		<td>
								<div class="form-group">
									<div class="col-lg-10 col-md-9">
										<input type="password" class="form-control" name="pass1" />
									</div>
								</div>
							</td>
                      	</tr>
                      	
                      	<tr><td> <i class="fa fa-key"></i> Confirm Password </td>
                      		<td>
								<div class="form-group">
									<div class="col-lg-10 col-md-9">
										<input type="password" class="form-control" name="pass2" />
									</div>
								</div>
							</td>
                      	</tr>
                                         	
                      	<tr>
                      		<td colspan="2">
								<div class="form-actions">
									<div class="col-lg-10 col-md-9">
										<input type="hidden" name="updatepwd" value="TRUE" />
										<input type="submit" value="Update" class="btn bg-success-dark text-white pull-right" id="pwdButton" />
									</div>
								</div>
							</td>
                      	</tr>
                      	</form>
                      	</table>
                      	
                    </div>
                    
                  </div>
                </div>
                
                <?php } else { ?>
                	
                	<div class="col-md-12 user-details well text-center col-sm-12" > 	 <!-- start seide bar profile-->	
                    <img src="images/profiles/<?php if(isset($row['image'])) { echo $row['image']; } else { echo 'default.png'; } ?>" class="main-avatar" />
                    <div class="user-main-info">
                      <h2 class="text-primary user-name"><?php echo $row['first_name']. '  ' . $row['last_name']; ?></h2>
                      <h4 class="text-info user-designation"> <i class="fa fa-envelope-o"></i> <?php echo $row['email']; ?></h4>
                      <h4 class="text-info user-designation"> <i class="fa fa-twitter"></i> <?php echo $row['twitter']; ?></h4>
                      <h5 class="text-info user-designation"><?php echo $row['interest']; ?></h5>
                    </div>
                    <div class="about">
                      <p><strong>About: </strong> <?php echo $row['bio']; ?> </p>
                    </div>
                    <ul class="list-group details-list">
                     <li class="list-group-item">
                      <span class="badge bg-info">
                      	<?php
                    $q4 = "SELECT DISTINCT subject.subject_id, subject.subject FROM subject
                    		JOIN lesson ON lesson.subject_id = subject.subject_id
                    		JOIN dvd_lessons ON dvd_lessons.lesson_id = lesson.lesson_id
                    		JOIN dvd_code ON dvd_code.dvd_id = dvd_lessons.dvd_id
                    		JOIN dvd_code_user ON dvd_code_user.dvd_code_id = dvd_code.dvd_code_id
                    		WHERE dvd_code_user.student_id = '$user'";
					$r4 = mysqli_query($conn, $q4) or trigger_error(mysqli_error($conn));
                    echo $noofsubject = mysqli_num_rows($r4);
					
                    ?>
                      	</span>
                      	<b> Subjects Registered </b> <hr>
                      	<?php echo '<ul>';
					while ($row4 = mysqli_fetch_array($r4, MYSQLI_ASSOC)) {
						echo '<li>' . $row4['subject'] . '</li>';
					}
					echo '</ul>';
					?>
                     
                    </li>
                    <li class="list-group-item">
                      <span class="badge bg-pink">
                    <?php
                    $q = "SELECT dvd_code_user_id FROM dvd_code_user WHERE student_id = '$user'";
					$r = mysqli_query($conn, $q) or trigger_error(mysqli_error($conn));
                    echo $number = mysqli_num_rows($r);
                    ?>
                      	</span>
                      <b>DVD in Archive</b>
                    </li>
                    <li class="list-group-item">
                      <span class="badge bg-warning">
                      	<?php
                      	$sn = array();
                      	$q2 = "SELECT dvd_id FROM dvd_code
                      			JOIN dvd_code_user ON dvd_code_user.dvd_code_id = dvd_code.dvd_code_id
                      			WHERE dvd_code_user.student_id = '$user'";
								
						$r2 = mysqli_query($conn, $q2) or trigger_error(mysqli_error($conn));
						while ($row2 = mysqli_fetch_array($r2, MYSQLI_ASSOC)) {
							$condition = $row2['dvd_id'];
							
							//second loop
								$q3 = "SELECT lesson_id FROM dvd_lessons WHERE dvd_id = '$condition'";
								if ($r3 = mysqli_query($conn, $q3) or trigger_error(mysqli_error($conn))) {
								$count = mysqli_num_rows($r3);
									array_push($sn, $count);
								}
			
						}
						echo array_sum($sn);
                      	?>
                      	</span>
                      <b>Lessons Watched</b>
                    </li>
                  </ul>
                </div>  	<!-- end sidebar profile-->
                	<?php } ?>
                
                </div>  	<!-- end all profile-->

<?php include('partials/footer.php'); ?>

