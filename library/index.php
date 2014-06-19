<?php # Script 16.5 - index.php
// This is the main page for the site.
// Set the page title and include the HTML header:

session_start();
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

//if ($_SESSION['user_level'] == 1) {
// Redirect:
$url = absolute_url ('student_area.php');
header("Location: $url");
exit();

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

