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
$fn = $ln = $mb = $em = FALSE;

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

// Check for an email address:
if (preg_match ('/^[\w.-]+@[\w.-]+\.[AZa-z]{2,6}$/', $trimmed['email'])) {
$em = mysqli_real_escape_string ($conn, $trimmed['email']);
} else {
						$error[] = 'Please enter a valid email address!';
}

//check for a mobile no
if ( (isset($_POST['mobile'])) && (is_numeric($_POST['mobile'])) ) {
$mb = mysqli_real_escape_string ($conn, $trimmed['mobile']);
} else {
			$error[] = 'Please enter a valid mobile number.';
	}


if ($fn && $ln && $mb && $em) { // If everything's OK...
	


		// Update usetr info in the database:
		$q = "UPDATE student_register SET first_name = '$fn', last_name = '$ln', email = '$em', phone = '$mb'
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
			$errorss[] = 'Please enter your address!';
}

//check for a city
if ($_POST['city']) {
$ct = mysqli_real_escape_string ($conn, $trimmed['city']);
} else {
					$errorss[] = 'Please enter a city!';
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

} // End of the if biodata conditional

	
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
					
					
                  <div class="col-md-3 user-details well text-center col-sm-12" > 	 <!-- start seide bar profile-->	
                    <img src="images/profiles/<?php if(isset($row['image'])) { echo $row['image']; } else { echo 'default.png'; } ?>" class="main-avatar" />
                    <div class="user-main-info">
                      <h2 class="text-primary user-name"><?php echo $row['first_name']. '  ' . $row['last_name']; ?></h2>
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
                    <li class="dropdown">
                      <a href="#" id="myTabDrop1" class="dropdown-toggle" data-toggle="dropdown">More <b class="caret"></b></a>
                      <ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop1">
                        <li><a href="#dropdown3" tabindex="-1" data-toggle="tab">More here</a></li>
                        <li><a href="#dropdown4" tabindex="-1" data-toggle="tab">And Here too</a></li>
                      </ul>
                    </li>
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
</div> <!-- /categories -->
                    </div>
                    
                    
                    <div class="tab-pane fade" id="edit">
         <table  class="table table-bordered table-hover table-striped display">
         	<form method="post" action="profile.php">
                      	<tr><th colspan="2"> BIODATA </th></tr>
                      	
                      	<tr><td> First Name</td>
                      		<td>
								<div class="form-group">
									<div class="col-lg-10 col-md-9">
										<input type="text" class="form-control" name="firstname"
										value = "<?php if(isset($row['first_name'])) { echo $row['first_name']; }?>">
									</div>
								</div>
							</td>
                      	</tr>
                      	
                      	<tr><td> Last Name</td>
                      		<td>
								<div class="form-group">
									<div class="col-lg-10 col-md-9">
										<input type="text" class="form-control" name="lastname" 
										value = "<?php if(isset($row['last_name'])) { echo $row['last_name']; }?>">
									</div>
								</div>
							</td>
                      	</tr>
                      	
                      	<tr><td> Email </td>
                      		<td>
								<div class="form-group">
									<div class="col-lg-10 col-md-9">
										<input type="text" class="form-control" name="email"
										value = "<?php if(isset($row['email'])) { echo $row['email']; }?>">
									</div>
								</div>
							</td>
                      	</tr>
                      	
                      	<tr><td> Mobile Number </td>
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
										<input type="submit" value="Update" class="btn bg-success-dark text-white pull-right" />
									</div>
								</div>
							</td>
                      	</tr>
                      	</form>
                      	
                      	</table>
                      	
                      	         <table  class="table table-bordered table-hover table-striped display">
                      <form method="post" action="profile.php">
						<tr><th colspan="2"> OTHERS </th></tr>
                      	<tr><td width="280"> Address</td>
                      		<td>
								<div class="form-group">
									<div class="col-lg-10 col-md-9">
										<input type="text" class="form-control" name="address" 
										value = "<?php if(isset($row['address'])) { echo $row['address']; }?>">
									</div>
								</div>
							</td>
                      	</tr>
                      	
                      	<tr><td> City </td>
                      		<td>
								<div class="form-group">
									<div class="col-lg-10 col-md-9">
										<input type="text" class="form-control" name="city"
										value = "<?php if(isset($row['city'])) { echo $row['city']; }?>">
									</div>
								</div>
							</td>
                      	</tr>
                      	
                      	<tr><td> Bio </td>
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
										<input type="submit" value="Update" class="btn bg-success-dark text-white pull-right" />
									</div>
								</div>
							</td>
                      	</tr>
                      	</form>
                      	</table>
                      	
                      	<table  class="table table-bordered table-hover table-striped display">
                      	<form method="post" action="profile.php" enctype="multipart/form-data">

						<tr><th colspan="2"> PROFILE PICTURE </th></tr>
                      	<tr>
                      		<td colspan="2">
								<img src="images/profiles/<?php if(isset($row['image'])) { echo $row['image']; } else { echo 'default.png'; } ?>" width="60"/>
							</td>
                      	</tr>
                      	
                      	<tr>
                      		<td width="280"> Select Picture</td>
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
										<input type="submit" value="Update" class="btn bg-success-dark text-white pull-right" />
									</div>
								</div>
							</td>
                      	</tr>
                      	
                      	</table>
                    </div>
                    
                    
                    <div class="tab-pane fade" id="dropdown3">
                      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                      	Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                      	when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
                      	It has survived not only five centuries, but also the leap into electronic typesetting, 
                      	remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing 
                      	Lorem Ipsum passages, and more recently with desktop publishing software 
                      	like Aldus PageMaker including versions of Lorem Ipsum..</p>
                    </div>
                    <div class="tab-pane fade" id="dropdown4">
                      <p>Trust fund seitan letterpress, 
                      	keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester 
                      	freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin. 
                      	Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby sweater. 
                      	Lomo wolf viral, mustache readymade thundercats keffiyeh craft beer marfa ethical. Wolf salvia freegan,
                      	 sartorial keffiyeh echo park vegan.</p>
                    </div>
                  </div>
                </div>
                
                </div>  	<!-- end all profile-->

<?php include('partials/footer.php'); ?>

