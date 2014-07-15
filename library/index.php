<?php
ob_start();
session_start();
?>

<?php # Script 16.5 - index.php
// This is the main page for the site.
// Set the page title and include the HTML header:


include('functions/functions.php'); 

 $page_title = 'Student Login || Wazobia';
// you need to login again if you enter this page
if (isset($_SESSION['student_id'])) {
// Redirect:
	redirect_to("student_area.php");
}

 ?>

<?php # Script 11.3 - login.php

// This page processes the login form submission.
// Upon successful login, the user is redirected.
// Two included files are necessary.
// Send NOTHING to the Web browser prior to the setcookie() lines!

// Check if the form has been submitted:
if (isset($_POST['submitted'])) {


// For processing the login:
require_once ('partials/login_functions.inc.php');

// Need the database connection:
require_once ('../init_connect.php');

// Check the login:
list ($check, $data) = check_login($conn, $_POST['email'], $_POST['pass']);
if ($check) { // OK!


// Set the session data:.
session_start();
$_SESSION['student_id'] = $data ['student_id'];
$_SESSION['firstname'] = $data ['first_name'];
$_SESSION['lastname'] = $data ['last_name'];
$_SESSION['email'] = $data ['email'];
$_SESSION['phone'] = $data ['phone'];
$_SESSION['image'] = $data ['image'];

// Set the cookies:
setcookie ('user_id', $data['user_id'], time()+86400, '/', '', 0, 0);
setcookie ('firstname', $data['first_name'], time()+86400, '/', '', 0, 0);
setcookie ('lastname', $data['last_name'], time()+86400, '/', '', 0, 0);

if (isset ($_SESSION['student_id'])){
	 
	 $student = $_SESSION['student_id'];
	 $datetime = strtotime(date("Y-m-d H:i:s"));
// update the last login time	
$q4 = "UPDATE student_register SET last_login='$datetime' WHERE student_id='$student' LIMIT 1";
$r4 = mysqli_query ($conn, $q4) or trigger_error("Query: $q4\n<br />MySQL Error: " . mysqli_error($dbc));
	
$_SESSION['start'] = time();

// Store the HTTP_USER_AGENT:
$_SESSION['agent'] = md5($_SERVER ['HTTP_USER_AGENT']);


	$url = absolute_url ('student_area.php');	//else go to student_area page
	header("Location: $url");
	exit();
	
} 

} else { // Unsuccessful!

// Assign $data to $errors for error reporting
// in the login_page.inc.php file.
$errors = $data;

 }


} // End of the main submit conditional.


// Check if the registeration form has been submitted:
if (isset($_POST['registered'])) {
require_once ('../init_connect.php');

$errorss = array(); // Initialize error array.

// Trim all the incoming data:
$trimmed = array_map('trim', $_POST);

// Assume invalid values:
$fn = $ln = $mb = $ad = $ct = $em = $p = FALSE;

// Check for a first name:
if (preg_match ('/^[A-Z \'.-]{2,20}$/i', $trimmed['firstname'])) {
$fn = mysqli_real_escape_string ($conn, $trimmed['firstname']);
} else {
	$errorss[] = 'Please enter a first name!';

}

// Check for a last name:
if (preg_match ('/^[A-Z \'.-]{2,40}$/i', $trimmed['lastname'])) {
$ln = mysqli_real_escape_string ($conn, $trimmed['lastname']);
} else {
		$errorss[] = 'Please enter a last name!';
}

//check for a mobile no
if ( (isset($_POST['mobile'])) && (is_numeric($_POST['mobile'])) ) {
$mb = mysqli_real_escape_string ($conn, $trimmed['mobile']);
} else {
			$errorss[] = 'Please enter a valid mobile number.';
	}

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

// Check for an email address:
if (preg_match ('/^[\w.-]+@[\w.-]+\.[AZa-z]{2,6}$/', $trimmed['email'])) {
$em = mysqli_real_escape_string ($conn, $trimmed['email']);
} else {
						$errorss[] = 'Please enter a valid email address!';
}

 // Check for a password and match against the confirmed password:
if (preg_match ('/^\w{4,20}$/', $trimmed['password1']) ) {
if ($trimmed['password1'] == $trimmed['password2']) {
$p = mysqli_real_escape_string ($conn, $trimmed['password1']);
} else {
							$errorss[] = 'Your password did not match the confirmed password!';
	}
} else {
								$errorss[] = 'Please enter a valid password!';
	}


if ($fn && $ln && $mb && $ad && $ct && $em && $p) { // If everything's OK...
	
	//+--- generate activation code
	$ucode = md5(rand());


// Make sure the email address is available:
$q = "SELECT student_id FROM student_register WHERE email='$em'";
$r = mysqli_query ($conn, $q);

if (mysqli_num_rows($r) == 0) { // Available.

// Add the user to the database:
$q = "INSERT INTO student_register (ucode, email, password, first_name, last_name, phone, address, city, time_register) 
						VALUES ('$ucode', '$em', SHA1('$p'), '$fn', '$ln', '$mb', '$ad', '$ct', NOW())";
$r = mysqli_query ($conn, $q);


// Send the email:
	//+-- compose activation link
	$optin_url = "http://".$_SERVER['HTTP_HOST']."/library/new_user.php?user=".$em."&ucode=".$ucode;
	

$body = "<h4>You have been registered on the Wazobia Portal </h4>";
$body .= "<p>But you must validate your registration by clicking on the following link:<p>";
$body .= $optin_url ;
$body .= "<p><b>NOTE:</b> if the link above is not clickable, please copy and paste into your browser's address bar.</p><br>";
$body .= "<p>Below are your login details </p>";
$body .= "<p>Email - " . $em . "</p>";
$body .= "<p>Password - " . $p . "</p>";
$body .= "<p>Please change your password regularly.</p><br>";
$body .= "<p>Best Regards</p>";

$user_email = $trimmed['email'];

$header = 'From: Wazobia Academy<admin@Wazobia-academy.com>'."\r\n";
$header .= 'To: ' . $user_email ."\r\n";
$header .= 'Reply-to: admin@Wazobia-academy.com'."\r\n";
$header .= 'MIME-Version: 1.0' . "\r\n";
$header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

 mail($user_email, 'Registration on Wazobia', $body, $header);

 					// Finish the page:
					 //Set display property and confirmation message of the message container to 'block'
					$success_display = 'block';
					$success_msg = '<h4 style="color: #008080"> SUCCESS! Your Account has been created successfully.</h4>';
					
					} else { // The email address is not available.
							$err_msg = 'The student has already been registered. Please use a unique email address</p>';
					}

								} else { // If one of the data tests failed.
								$errorss[] = 'Please re-enter the details appropriately and try again.</p>';
								}

} // End of the if submitted conditional.

// Forgot password

if (isset($_POST['forgotten'])) {
require_once ('../init_connect.php');
	
	$errorss = array(); // Initialize error array.
	

// Assume nothing:
$uid = FALSE;

// Validate the email address...
if (!empty($_POST['email'])) {

// Check for the existence of that email address...
$q = 'SELECT student_id FROM student_register WHERE email="'. mysqli_real_escape_string ($conn, $_POST['email']) . '"';
$r = mysqli_query ($conn, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($conn));

if (mysqli_num_rows($r) == 1) { //Email available in db:
//Retrieve the user ID:

list($uid) = mysqli_fetch_array ($r, MYSQLI_NUM);

// Create a new, random password:
$p = substr ( md5(uniqid(rand(), true)), 3, 10);

// Update the database:
$q = "UPDATE student_register SET password=SHA1('$p') WHERE student_id=$uid LIMIT 1";
$r = mysqli_query ($conn, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));

if (mysqli_affected_rows($conn) == 1) {
// If it ran OK.

/*
// Send an email:
 $body = "Your password to log into www.zelsroarkep.com has been temporarily changed to '$p'. Please log in using
this password and this email address. Then you may change your password to something more familiar.";
 $body .= "Please login and change the password immediately as this temporary password expires in two (2) hours.";
 $body .= "Regards from Zels Roarke Productions";
mail ($_POST['email'], 'Your temporary password.', $body, 'From: admin@zelsroarkep.com');

 */

// Print a message and wrap up:
					// Finish the page:
					 //Set display property and confirmation message of the message container to 'block'
					$success_display = 'block';
					$success_msg = '<h4 style="color: #008080"> SUCCESS! Your password has been changed to - ' . $p . '. 
					You will receive the new, temporary password at the email address with which you registered.</h4>';
					
					} else { // The email address is not available.
							$err_msg = 'Your password could not be reset for technical reasons. We apologize for any inconviniences</p>';
					}

} else { // No database match made.
$errorsss[] = 'The submitted email address does not match those on file!</p>';
}

} else { // No email!
$errorsss[] = 'You forgot to enter your email address!</p>';

} // End of empty($_POST['email']) IF.

}


// Create the page:
include ('partials/login_page.inc.php');
?>