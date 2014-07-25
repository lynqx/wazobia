<link rel="stylesheet" type="text/css" href="chat.css" >
<script type="text/javascript" src="chat.js" ></script>

<?php
include('../init_connect.php');

if(!empty($_GET['user']) && !empty($_GET['id']) && !empty($_GET['msg']))
{
	//------------------------//
	//echo $_SESSION['student_id']."<br>";
	//print_r($_POST);
	
	//-----------------------//
	$user_id = $_GET['user'];
	$subject_id = $_GET['id'];
	$message = $_GET['msg'];
	$date=strtotime(date("Y-m-d H:i:s")); // create date and time
	$table = 'chat';
	
	$insert = "INSERT INTO $table (subject_id, user_id, message, date) VALUES ('$subject_id', '$user_id', '$message', '$date')";
	if(!mysqli_query($conn, $insert))
	{
		echo "<div class=\"error\">Sorry! Message not sent at this time. Please try again.</div>";
	}

}
else
{
	echo "<div id=\"error\">Sorry! But you cannot join chat discussion unless you login as a student and are qualified to participate.</div>";
}
?>