<?php 
ob_start();
session_start();
?>

<?php
include('../init_connect.php'); 
include('functions/functions.php');
include('functions/fns.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>	
  	<?php	
  	$user = $_SESSION['student_id'];
	
	$q = "SELECT * FROM student_register WHERE student_id = '$user'";
	$r = mysqli_query($conn, $q);
	$row = mysqli_fetch_array($r, MYSQLI_ASSOC);
							
// Check for a $page_title value:
if (!isset($page_title)) {
 $page_title = 'Wazobia Academy';
}
if(isset($_SESSION['firstname'])) {
	$student = $row['first_name'] . "  " . $row['last_name'];
} else {
	$student = "";
}
	 echo $page_title . " | | " . $student;

	 ?>

</title>
<link rel="shortcut icon" href="../images/favicon.ico"  />

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Loading Bootstrap -->
  <link href="<?php echo $path; ?>css/bootstrap.css" rel="stylesheet">

  <!-- Loading Stylesheets -->    
  <link href="<?php echo $path; ?>css/font-awesome.css" rel="stylesheet">
   <link href="<?php echo $path; ?>css/style.css" rel="stylesheet" type="text/css"> 
   
   <?php 
     $pieces = explode('/',$_SERVER['REQUEST_URI']);  
  $page=end($pieces); 
if(strpos($page,"extended-modals") !== false ) { ?>
   <link href="<?php echo $path; ?>css/bootstrap-modal-bs3fix.css" rel="stylesheet" type="text/css"> 
   <?php } ?>

  <link href="<?php echo $path; ?>less/style.less" rel="stylesheet"  title="lessCss" id="lessCss">
  
  <!-- Loading Custom Stylesheets -->    
  <link href="<?php echo $path; ?>css/custom.css" rel="stylesheet">

  <link rel="shortcut icon" href="<?php echo $path; ?>images/favicon.ico">

  <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
      <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <![endif]-->
    </head>
    <body>
    <div class="site-holder">
      <!-- this is a dummy text -->
      <!-- .navbar -->
      <nav class="navbar" role="navigation">

        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <a class="navbar-brand" href="#"><i class="fa fa-list btn-nav-toggle-responsive text-white"></i> 
          	<span class="logo">
          	<img src="../images/logo.png" alt="logo" width="241" height="65" />
          	</span></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav user-menu navbar-right " id="user-menu">

            <li><a href="#" class="user dropdown-toggle" data-toggle="dropdown"><span class="username">
            	
            	<img src="images/profiles/<?php if(isset($row['image'])) { echo $row['image']; } else { echo 'default.png'; } ?>" class="user-avatar" 
            	alt="<?php echo $row['first_name'] . "  " . $row['last_name']; ?>">
            	
            	<?php echo $row['first_name'] . "  " . $row['last_name']; ?>  </span></a>
              <ul class="dropdown-menu">
                <li><a href="profile.php"><i class="fa fa-user"></i> My Profile</a></li>
                <li><a href="#"><i class="fa fa-envelope"></i> Inbox</a></li>
                <li><a href="password.php"><i class="fa fa-edit"></i> Change Password</a></li>
                <li class="divider"></li>
                <?php 
                if(isset($_SESSION['student_id'])) {
                echo '<li><a href="logout.php" class="text-danger"><i class="fa fa-lock"></i> Logout</a></li>';
				}
				?>
              </ul>
              </li>
              <li><a href="#" class="settings dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i><span class="badge bg-pink">4</span></a>
                <ul class="dropdown-menu inbox">
                  <li>
                    <a href="inbox.php">     
                      <img src="images/profiles/three.png" alt="" class="avatar">
                      <div class="message">
                        <span class="username">John Deo</span> 
                        <span class="mini-details">(6) <i class="fa fa-paper-clip"></i></span>
                        <span class="time pull-right"> <i class="fa fa-clock-o"></i> 06:58 PM</span>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's ... </p>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="inbox.php">     
                      <img src="images/profiles/four.png" alt="" class="avatar">
                      <div class="message">
                        <span class="username">Jane Deo</span> 
                        <span class="mini-details">(6) <i class="fa fa-paper-clip"></i></span>
                        <span class="time pull-right"> <i class="fa fa-clock-o"></i> 06:58 PM</span>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's ... </p>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="inbox.php">     
                      <img src="images/profiles/five.png" alt="" class="avatar">
                      <div class="message">
                        <span class="username">Mr Deo</span> 
                        <span class="mini-details">(6) <i class="fa fa-paper-clip"></i></span>
                        <span class="time pull-right"> <i class="fa fa-clock-o"></i> 06:58 PM</span>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's ... </p>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="inbox.php">     
                      <img src="images/profiles/six.png" alt="" class="avatar">
                      <div class="message">
                        <span class="username">Miss Deo</span> 
                        <span class="mini-details">(6) <i class="fa fa-paper-clip"></i></span>
                        <span class="time pull-right"> <i class="fa fa-clock-o"></i> 06:58 PM</span>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's ... </p>
                      </div>
                    </a>
                  </li>
                  <li><a href="inbox.php" class="btn bg-primary">View All</a></li>
                </ul>
                <li><a href="#"  class="settings dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell animated shake"></i><span class="badge bg-success">10</span></a>
                  <ul class="dropdown-menu notifications">
                    <li>
                      <a href="#">
                        <i class="fa fa-user noty-icon bg-primary"></i> 
                        <span class="description">10 Users are registered</span>
                        <span class="time"> <i class="fa fa-clock-o"></i> 06:58 PM</span>
                      </a>
                    </li>
                    <li>
                      <a href="#" class="text-danger">
                        <i class="fa fa-inbox noty-icon bg-pink"></i> 
                        <span class="description">Your disk space has been exceeeded</span>
                        <span class="time"> <i class="fa fa-clock-o"></i> 06:58 PM</span>
                      </a>
                    </li>
                    <li>
                      <a href="#" class="text-info">
                        <i class="fa fa-comment noty-icon bg-purple"></i> 
                        <span class="description">58 new comments</span>
                        <span class="time"> <i class="fa fa-clock-o"></i> 06:58 PM</span>
                      </a>
                    </li>
                    <li>
                      <a href="#" class="text-warning">
                        <i class="fa fa-user noty-icon bg-warning"></i> 
                        <span class="description">User deleted</span>
                        <span class="time"> <i class="fa fa-clock-o"></i> 06:58 PM</span>
                      </a>
                    </li>
                    <li>
                      <a href="#" class="text-success">
                        <i class="fa fa-bookmark-o noty-icon bg-seagreen"></i> 
                        <span class="description">You have a new badge</span>
                        <span class="time"> <i class="fa fa-clock-o"></i> 06:58 PM</span>
                      </a>
                    </li>
                    <li>
                      <a href="#" class="text-info">
                        <i class="fa fa-envelope noty-icon bg-info"></i> 
                        <span class="description">24 Unread mails</span>
                        <span class="time"> <i class="fa fa-clock-o"></i> 06:58 PM</span>
                      </a>
                    </li>
                    <li>
                      <a href="#" class="text-success">
                        <i class="fa fa-link noty-icon bg-purple"></i> 
                        <span class="description">Urls forwarding activated</span>
                        <span class="time"> <i class="fa fa-clock-o"></i> 06:58 PM</span>
                      </a>
                    </li>
                    <li>
                      <a href="#" class="text-warning">
                        <i class="fa fa-clock-o noty-icon bg-yellow"></i> 
                        <span class="description">Action</span>
                        <span class="time"> <i class="fa fa-clock-o"></i> 06:58 PM</span>
                      </a>
                    </li>
                    <li>
                      <a href="#" class="text-danger">
                        <i class="fa fa-exclamation noty-icon bg-danger"></i> 
                        <span class="description">3 domains expired</span>
                        <span class="time"> <i class="fa fa-clock-o"></i> 06:58 PM</span>
                      </a>
                    </li>
                    <li>
                      <a href="#" class="text-success">
                        <i class="fa fa-clock-o noty-icon bg-success"></i> 
                        <span class="description">Your have $950 as outstanding amount</span>
                        <span class="time"> <i class="fa fa-clock-o"></i> 06:58 PM</span>
                      </a>
                    </li>

                    <li><a href="#" class="btn bg-primary">View All</a></li>
                  </ul>
                </li>
                <li><a href="#" class="settings"><i class="fa fa-question-circle settings-toggle"></i><span class="badge bg-info">20</span></a></li>
              </ul>
            </div><!-- /.navbar-collapse -->
          </nav> <!-- /.navbar -->

          <!-- .box-holder -->
          <div class="box-holder">
		  
            <?php
				include('leftsidebar.php');
			?>
			
            <!-- .content -->
            <div class="content">

