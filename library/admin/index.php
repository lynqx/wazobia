<?php # Script 16.5 - index.php
// This is the main page for the site.
// Set the page title and include the HTML header:

session_start();
include('functions/functions.php'); 

 $page_title = 'Admin Login || Wazobia';
// you need to login again if you enter this page
<<<<<<< HEAD
if (isset($_SESSION['work_id'])) {
// Redirect:
	redirect_to("admin_area.php");
=======
if (isset($_SESSION['work_id']) && $_SESSION['roles'] == 'admin') {
// Redirect:
	redirect_to("admin_area.php");
} elseif (isset($_SESSION['work_id']) && $_SESSION['roles'] == 'lecturer') {
	
	redirect_to("lecturer_area.php");
>>>>>>> f3a71c6ea6a7621666581991510f0ac14c3491c7
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
require_once ('../../init_connect.php');

// Check the login:
list ($check, $data) = check_login($conn, $_POST['email'], $_POST['pass']);
if ($check) { // OK!


// Set the session data:.
session_start();
$_SESSION['work_id'] = $data ['work_id'];
$_SESSION['firstname'] = $data ['work_first_name'];
$_SESSION['lastname'] = $data ['work_last_name'];
$_SESSION['email'] = $data ['work_email'];
$_SESSION['phone'] = $data ['work_phone'];
$_SESSION['image'] = $data ['work_image'];
<<<<<<< HEAD
=======
$_SESSION['roles'] = $data ['roles'];
>>>>>>> f3a71c6ea6a7621666581991510f0ac14c3491c7

// Set the cookies:
setcookie ('work_id', $data['work_id'], time()+86400, '/', '', 0, 0);
setcookie ('firstname', $data['work_first_name'], time()+86400, '/', '', 0, 0);
setcookie ('lastname', $data['work_last_name'], time()+86400, '/', '', 0, 0);

if (isset ($_SESSION['work_id'])){
	 
	 $admin = $_SESSION['work_id'];
	 $datetime = strtotime(date("Y-m-d H:i:s"));
// update the last login time	
$q4 = "UPDATE worker_register SET last_login='$datetime' WHERE work_id='$admin' LIMIT 1";
$r4 = mysqli_query ($conn, $q4) or trigger_error("Query: $q4\n<br />MySQL Error: " . mysqli_error($dbc));
	
$_SESSION['start'] = time();

// Store the HTTP_USER_AGENT:
$_SESSION['agent'] = md5($_SERVER ['HTTP_USER_AGENT']);

<<<<<<< HEAD
//if ($_SESSION['user_level'] == 1) {
=======
if ($_SESSION['roles'] == 'admin') {
>>>>>>> f3a71c6ea6a7621666581991510f0ac14c3491c7
// Redirect:
$url = absolute_url ('admin_area.php');
header("Location: $url");
exit();

<<<<<<< HEAD
=======
} elseif ($_SESSION['roles'] == 'lecturer') {
	// Redirect:
$url = absolute_url ('lecturer_area.php');
header("Location: $url");
exit();
	
}

>>>>>>> f3a71c6ea6a7621666581991510f0ac14c3491c7
} 

} else { // Unsuccessful!

// Assign $data to $errors for error reporting
// in the login_page.inc.php file.
$errors = $data;

 }


} // End of the main submit conditional.



// Create the page:
include ('partials/login_page.inc.php');
?>

