<?php 

<<<<<<< HEAD
  include ('../partials/functions.php');

=======
  include ('../functions/functions.php');
if (isset($_SESSION['work_id']) && $_SESSION['roles'] != 'admin') {
	redirect_to('error.php');
}
>>>>>>> f3a71c6ea6a7621666581991510f0ac14c3491c7

// Check for a valid image ID, through GET or POST:
 if ( (isset($_GET['id'])) && (is_numeric ($_GET['id'])) ) { // From view_users.php
$id = $_GET['id'];
} elseif ( (isset($_POST['id'])) && (is_numeric($_POST['id'])) ) { // Form submission.
$id = $_POST['id'];
} else { // No valid ID, kill the script.
echo '<p class="error">This page has been accessed in error.</p>';
exit();
}

require_once ('../../init_connect.php');

// Make the query:

$q = "DELETE FROM organisation WHERE organisation_id=$id LIMIT 1";
$r = @mysqli_query ($conn, $q);

// If it ran OK.
if (mysqli_affected_rows($conn) == 1) {
	
	// Do redirection.
<<<<<<< HEAD
$redirect = 'organisation.php';
header("Location: {$redirect}?success=yes");
	
=======
redirect_to("organisation.php?success=yes");
>>>>>>> f3a71c6ea6a7621666581991510f0ac14c3491c7
	

} else { // If the query did not run OK.

// Do redirection.
	redirect_to("organisation.php?error=yes");
	//echo 'Not';
}

?>

<<<<<<< HEAD
<?php mysqli_close($dbc);?>
=======
<?php mysqli_close($conn);?>
>>>>>>> f3a71c6ea6a7621666581991510f0ac14c3491c7
