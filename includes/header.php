<!DOCTYPE html>
<html>
<head>
  <title>
		<?php	
		
require_once ('init_connect.php');
							$baseurl = "";
								
// Check for a $page_title value:
 $pagetitle = 'Wazobia Academy';
if (!isset($page_title)) {
 echo $pagetitle;
 
} else {
	echo $page_title .' || ' . $pagetitle;
}

	 ?>
</title>
<link rel="shortcut icon" href="images/favicon.ico"  />

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap -->
  <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
  <link href="css/font-awesome.min.css" rel="stylesheet">

  <link href="css/style.css" rel="stylesheet">


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
      <![endif]-->
    </head>
    <body>
      <nav class="navbar navbar-default" role="navigation">
        <div class="container">
         <!-- Brand and toggle get grouped for better mobile display -->
         <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right navbar-social-links hidden">
            <li><a href="#">
              <span class="fa-stack ">
                <i class="fa fa-circle-o fa-stack-2x"></i>
                <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
              </span>
            </a></li>
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right ">
            <li <?php if ($page == 'index') echo 'class="active"'; ?>><a href="index.php">Home</a></li>
            <li <?php if ($page == 'about') echo 'class="active"'; ?>><a href="about-us.php">About Us</a></li>
            <li><a href="library/index.php">Classroom</a>
            <!-- <ul class="dropdown-menu">

            	<?php
            	$q = "SELECT language.lang_id, language.language
					FROM  `language` 
					JOIN  `lesson` ON language.lang_id = lesson.lang_id";
					$r = @mysqli_query ($conn, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($conn));
					while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
							?>
							<li><a href="library/language/?lang=<?php echo $row['lang_id']; ?>"><?php echo ucwords($row['language']); ?></a></li>
								   			<?php
												}
											?>
                
              </ul>
             -->
             
            </li>
            <li <?php if ($page == 'product') echo 'class="active"'; ?>><a href="product.php">Products<b class="caret"></b></a></li>
            <li <?php if ($page == 'forum') echo 'class="active"'; ?>><a href="forum">Forum<b class="caret"></b></a></li>
                       
            <li <?php if ($page == 'report' || $page == 'comment' || $page == 'faq') echo 'class="active"'; ?>><a href="#">Help</a>
            	<ul class="dropdown-menu">
                <li><a href="help.php">Report A Problem</a></li>
                <li><a href="comment.php">Comments & Suggestion</a></li>
                <li><a href="faq.php">FAQ</a></li>
              </ul>
            </li>
            <li <?php if ($page == 'contact') echo 'class="active"'; ?>><a href="contact.php">Contact Us</a></li>
           
          </ul>
        </div><!-- /.navbar-collapse -->
      </div>
    </nav>
