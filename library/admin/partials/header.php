<?php 
ob_start();
session_start();
include('../init_connect.php'); 
include('functions/functions.php');
include('functions/fns.php'); 

	/* redirect when student not log in */
	if (!isset($_SESSION['work_id']))
	{
		// Redirect:
		redirect_to("index.php");
	}
	else
	{
		$admin = $_SESSION['work_id'];
	}
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>	
  	<?php							
// Check for a $page_title value:
if (!isset($page_title)) {
 $page_title = 'Wazobia Academy';
}
if(isset($_SESSION['firstname'])) {
	$student = $_SESSION['firstname'] . "  " . $_SESSION['lastname'];
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
          	<img src="../../images/logo.png" alt="logo" width="241" height="65" />
          	</span></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav user-menu navbar-right " id="user-menu">

            <li><a href="#" class="user dropdown-toggle" data-toggle="dropdown"><span class="username">
            	<img src="images/profiles/<?php echo $_SESSION['image']; ?>" class="user-avatar" alt="<?php echo $_SESSION['firstname'] . "  " . $_SESSION['lastname'] ; ?>">
            	 <?php echo $_SESSION['firstname'] . '  ' . $_SESSION['lastname'] ; ?>  </span></a>
              <ul class="dropdown-menu">
                <li><a href="#"><i class="fa fa-user"></i> My Profile</a></li>
                <li><a href="#"><i class="fa fa-envelope"></i> Inbox</a></li>
                <li><a href="password.php"><i class="fa fa-edit"></i> Change Password</a></li>
                <li><a href="#"><i class="fa fa-cogs"></i> Settings</a></li>
                <li class="divider"></li>
                <?php 
                if(isset($_SESSION['work_id'])) {
                echo '<li><a href="logout.php" class="text-danger"><i class="fa fa-lock"></i> Logout</a></li>';
				}
				?>
              </ul>
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
                <li><a href="#" class="settings"><i class="fa fa-cogs settings-toggle"></i><span class="badge bg-info">20</span></a></li>
              </ul>
            </div><!-- /.navbar-collapse -->
          </nav> <!-- /.navbar -->

          <!-- .box-holder -->
          <div class="box-holder">

            <!-- .left-sidebar -->
            <div class="left-sidebar">
              <div class="sidebar-holder">
                <ul class="nav  nav-list">

                  <!-- sidebar to mini Sidebar toggle -->
                  <li class="nav-toggle">
                    <button class="btn  btn-nav-toggle text-primary"><i class="fa fa-angle-double-left toggle-left"></i> </button>
                  </li>

                    <?php //buildMenu($menuList); ?>
                    
                    <?php 
                    if (isset($_SESSION['work_id']) && $_SESSION['roles'] == 'admin') { // admin access panel
                    ?>
                    <li class="submenu"><a class="dropdown" href="admin_area.php" data-original-title="Dashboard"> <i class="fa fa-dashboard"></i><span class="hidden-minibar"> Dashboard </span></a></li>
                    <li class="submenu"><a class="dropdown" href="organisation.php" data-original-title="Add Organisation"> <i class="fa fa-briefcase"></i><span class="hidden-minibar"> Organization </span></a></li>
                    <li class="submenu"><a class="dropdown" href="#" data-original-title="Subject"> <i class="fa fa-folder-open"></i><span class="hidden-minibar"> Subjects <span class="badge bg-success2 pull-right">2</span></span></a>
                    	<ul>
                   		<li class="submenu"><a class="dropdown" href="add_subjects.php" data-original-title="Add Subjects"> <i class="fa fa-plus-square"></i><span class="hidden-minibar"> Add Subjects </span></a></li>
                   		<li class="submenu"><a class="dropdown" href="view_subjects.php" data-original-title="View Subjects"> <i class="fa fa-search"></i><span class="hidden-minibar"> View Subjects </span></a></li>
                    	</ul>
                    	
                    </li>
                    <li class="submenu"><a class="dropdown" href="#" data-original-title="Topics"> <i class="fa fa-book"></i><span class="hidden-minibar"> Topics <span class="badge bg-success2 pull-right">2</span></span></a>
                    	<ul>
                   		<li class="submenu"><a class="dropdown" href="add_topic.php" data-original-title="Add Topics"> <i class="fa fa-plus"></i><span class="hidden-minibar"> Add Topics </span></a></li>
                   		<li class="submenu"><a class="dropdown" href="view_topics.php" data-original-title="View Topics"> <i class="fa fa-search-plus"></i><span class="hidden-minibar"> View Topics </span></a></li>
                    	</ul>
                    </li>
                    
                    <li class="submenu"><a class="dropdown" href="#" data-original-title="Lessons"> <i class="fa fa-edit"></i><span class="hidden-minibar"> Lessons <span class="badge bg-success2 pull-right">1</span></span></a>
                    	<ul>
                   		<li class="submenu"><a class="dropdown" href="view_lessons.php" data-original-title="View Lessons"> <i class="fa fa-search-plus"></i><span class="hidden-minibar"> View Lessons </span></a></li>
                    	</ul>
                    </li>
                    
                    <li class="submenu"><a class="dropdown" href="#" data-original-title="Lessons"> <i class="fa fa-dot-circle-o"></i><span class="hidden-minibar"> DVD <span class="badge bg-success2 pull-right">1</span></span></a>
                    	<ul>
                   		<li class="submenu"><a class="dropdown" href="add_dvd.php" data-original-title="Add DVD"> <i class="fa fa-plus"></i><span class="hidden-minibar"> Add DVD </span></a></li>
                   		<li class="submenu"><a class="dropdown" href="view_dvd.php" data-original-title="View DVD"> <i class="fa fa-plus"></i><span class="hidden-minibar"> View DVD </span></a></li>
                   		<li class="submenu"><a class="dropdown" href="add_dvd_pack.php" data-original-title="Add DVD Pack"> <i class="fa fa-plus"></i><span class="hidden-minibar"> Add DVD Pack</span></a></li>
                   		<li class="submenu"><a class="dropdown" href="view_dvd_pack.php" data-original-title="View DVD Pack"> <i class="fa fa-plus"></i><span class="hidden-minibar"> View DVD Pack </span></a></li>
                    	</ul>
                    </li>
                    <?php 
                    } elseif (isset($_SESSION['work_id']) && $_SESSION['roles'] == 'lecturer') { // lecturer sidebar panel acces
                    ?>
                    <li class="submenu"><a class="dropdown" href="lecturer_area.php" data-original-title="Dashboard"> <i class="fa fa-dashboard"></i><span class="hidden-minibar"> Dashboard </span></a></li>
                    <li class="submenu"><a class="dropdown" href="organisation.php" data-original-title="Add Organisation"> <i class="fa fa-briefcase"></i><span class="hidden-minibar"> View Payments </span></a></li>
                    <li class="submenu"><a class="dropdown" href="account_details.php" data-original-title="Account Details"> <i class="fa fa-folder-open"></i><span class="hidden-minibar"> Account Details </span></a>
                    	
					<?php	
                    }
                    ?>
                    
					<li class="submenu"><a class="dropdown" href="pay_instructors.php">Pay Instructors</a></li>
                </ul>
              </div>
            </div> <!-- /.left-sidebar -->
			

            <!-- .content -->
            <div class="content">

