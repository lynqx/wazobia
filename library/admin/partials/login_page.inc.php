
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Login | Wazobia Academy</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Loading Bootstrap -->
  <link href="css2/bootstrap.css" rel="stylesheet">

  <!-- Loading Stylesheets -->    
  <link href="css2/bootstrap.css" rel="stylesheet">
  <link href="css2/font-awesome.css" rel="stylesheet">
  <link href="css2/login.css" rel="stylesheet">
  
  <!-- ANIMATE -->
	<link rel="stylesheet" type="text/css" href="css/animatecss/animate.min.css" />
</head>
<body >
	      <div class="row">
	      	        <div class="col-md-8 col-md-offset-2 col-xs-10 col-xs-offset-1">

												<?php // block to output success message	
											   	if(!empty($success_msg)) {
												echo '<div class="alert alert-block alert-success fade in">
														<a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
														<p><h4><i class="fa fa-heart"></i> Successful!</h4>' . $success_msg . '</p></div>';
													}
												?>
												
												<?php // block to output success message	
											   	if(!empty($err_msg)) {
												echo '<div class="alert alert-block alert-danger fade in">
														<a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
														<p><h4><i class="fa fa-asterisk"></i> Error!</h4>' . $err_msg . '</p></div>';
													}
												?>
												
									<?php
									// This page prints any errors associated with logging in
									// and it creates the entire login page, including the form.
									
									// Include the header:
									
									// Print any error messages, if they exist:
									if (!empty($errors)) {
										echo ' <div class="alert alert-block alert-success fade in">
										<a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
									<h4><i class="fa fa-times"></i> Error!</h4>
									<p>The following error(s) occurred:<br />';
									foreach ($errors as $msg) {
									echo " - $msg<br />\n";
									}
									echo '</p>
									<p>Please try again.</p></div>';
									}
									
									// Print any error messages, if they exist:
									if (!empty($errorss)) {
										echo ' <div class="alert alert-block alert-success fade in">
										<a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
									<h4><i class="fa fa-times"></i> Error! Registeration Failed</h4>
									<p>The following error(s) occurred:<br />';
									foreach ($errorss as $msgs) {
									echo " - $msgs<br />\n";
									}
									echo '</p>
									<p>Please try again.</p></div>';
									}
									
									
									// Print any error messages, if they exist:
									if (!empty($errorsss)) {
										echo ' <div class="alert alert-block alert-success fade in">
										<a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
									<h4><i class="fa fa-times"></i> Error! Password Reset</h4>
									<p>The following error(s) occurred:<br />';
									foreach ($errorsss as $msgss) {
									echo " - $msgss<br />\n";
									}
									echo '</p>
									<p>Please try again.</p></div>';
									}
									
									
									// Display the form:
									
									?>
									
									</div>
									</div>
  <div class="login-box visible" id="login">
  	<img src="../../images/logo.png" alt="wazobia-academy" width="250" height="68" />
    <h1>Welcome to Wazobia </h1>
    <hr>
    <h5>ADMIN LOGIN</h5>
    								
    <div class="input-box">
      <div class="row">
      	
      								


        <div class="col-md-8 col-md-offset-2 col-xs-10 col-xs-offset-1">
          <form role="form" action="index.php" method="post">
            <div class="input-group form-group">
              <span class="input-group-addon"><i class='fa fa-envelope'></i></span>
              <input type="Email" class="form-control" placeholder="Email" name="email">
            </div>
            <div class="input-group form-group">
              <span class="input-group-addon"><i class='fa fa-key'></i></span>
              <input type="Password" class="form-control" placeholder="Password" name="pass">
            </div>
            <div class="form-group">
              
              <input type="hidden" name="submitted" value="TRUE" />
              <button type="submit" class="btn  btn-block  btn-submit pull-right">Login</button>
              
            
			
            </div>
          </form>
        </div>
        <!-- col -->
      </div>
      <!-- row -->
    </div>
    <!-- input-box -->
  </div>
  
  
  
</body>
</html>
	<script src="jquery-2.0.3.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

<script type="text/javascript">
		function swapScreen(id) {
			jQuery('.visible').removeClass('visible animated fadeInUp');
			jQuery('#'+id).addClass('visible animated fadeInUp');
		}
	</script>