<?php 

  include ('../functions/functions.php');
if (isset($_SESSION['work_id']) && $_SESSION['roles'] != 'administrator') {
	redirect_to('error.php');
}

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

// select status first to know what to do
$q = "SELECT status FROM testimonials WHERE id = $id LIMIT 1";
$r = mysqli_query($conn, $q);
$row = mysqli_fetch_array($r, MYSQLI_ASSOC);
echo $status = $row['status'];

if($status == 1) { $stat = 0; } else {$stat = 1; }

// Make the query:
$q = "UPDATE testimonials SET status = '$stat' WHERE id=$id LIMIT 1";
$r = @mysqli_query ($conn, $q);

// If it ran OK.
if (mysqli_affected_rows($conn) == 1) {
	
	// Do redirection.
	redirect_to("view_testimonials.php?upsuccess=yes");

	

} else { // If the query did not run OK.

// Do redirection.
	redirect_to("view_testimonials.php?uperror=yes");
	//echo 'Not';
}

?>

<?php mysqli_close($conn);?>