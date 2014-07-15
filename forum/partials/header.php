<?php 
ob_start();
session_start();
include('partials/init_connect.php'); 
?>


<!DOCTYPE html>
<html>
<head>
  <title>	
  	<?php							
// Check for a $page_title value:
if (!isset($page_title)) {
 $page_title = 'Forum || Wazobia Academy';
}
if(isset($_SESSION['firstname'])) {
	$student = $_SESSION['firstname'] . "  " . $_SESSION['lastname'];
} else {
	$student = "";
}
	 echo $page_title . " | | " . $student;

	 ?>

</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  
  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/font-awesome.css" rel="stylesheet">
  <link href="css/forum.css" rel="stylesheet">
</head>
<body>

  <!--Header part of the template-->
  <div class="header-part">
    <div class="container">
      <div class="box">
      <div class="logo">
          	<img src="../images/logo.png" alt="logo" width="241" height="65" align="left" />
          	</div>
        <h4 class="message">
         Welcome to Wazobia Academic Forum
        </h4>
        <p>
        This is where you interact with other students and instructors to get your questions answered
        </p>

      </div> <!--end of box-->
    </div><!--end of container-->
  </div> <!--end of header part-->
  
  <div class="template-body">
			<div style="margin:1.8em 9em 3em 0" class="btn btn-lg pull-right">
				<?php
					if(isset($_SESSION['firstname']) && isset($_SESSION['lastname']))
					{
						$memb = "<b>".ucwords($_SESSION['firstname']." ".$_SESSION['lastname'])."</b>";
						$status = "<a href=\"../library/logout.php\">Logout</a>";
						
					}
					else
					{
						$memb = "a <b>Guest</b>";
						$status = "<a href=\"../library/index.php\">Login</a>";
					}
				
				?>
				You are here as <span><?php echo $memb; ?></span> &nbsp; | &nbsp; <?php echo $status; ?>
			</div>
