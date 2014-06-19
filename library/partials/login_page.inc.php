
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
  <div class="login-box visible" id="login">
  	<img src="../images/logo.png" alt="wazobia-academy" width="250" height="68" />
    <h1>Welcome to Wazobia </h1>
    <hr>
    <h5>LOGIN</h5>
    								
    <div class="input-box">
      <div class="row">
      	
      	<?php
									// This page prints any errors associated with logging in
									// and it creates the entire login page, including the form.
									
									// Include the header:
									
									// Print any error messages, if they exist:
									if (!empty($errors)) {
										echo ' <div class="alert alert-block alert-success fade in">
									<h4><i class="fa fa-times"></i> Error!</h4>
									<p>The following error(s) occurred:<br />';
									foreach ($errors as $msg) {
									echo " - $msg<br />\n";
									}
									echo '</p>
									<p>Please try again.</p></div>';
									}
									
									// Display the form:
									
									?>


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
              <button type="submit" class="btn  btn-block  btn-submit pull-right">Submit</button>
              
            <div class="login-helpers">
			<a href="#" onclick="swapScreen('forgot');return false;">Forgot Password?</a> <br>
			</div>
			
            </div>
          </form>
        </div>
        <!-- col -->
      </div>
      <!-- row -->
    </div>
    <!-- input-box -->
  </div>
  
  <!-- FORGOT PASSWORD -->
				<div class="pass-box" id="forgot">
					  	<img src="../images/logo.png" alt="wazobia-academy" width="250" height="68" />

    <h1>Welcome To Wazobia</h1>
    <hr>
  
<h5>Recover Password</h5>
    <div class="pass-rec-box">
      <div class="row">
        <div class="col-md-8 col-md-offset-2 col-xs-10 col-xs-offset-1">
          <form  role="form"  action="../index.php">
           
            <div class="input-group form-group">
              <span class="input-group-addon"><i class='fa fa-envelope'></i></span>
              <input type="text" class="form-control" placeholder="E-mail">
            </div>
            

          
            <div class="form-group">
              <button type="submit" class="btn  btn-block  btn-submit pull-right">Recover Password</button>
            </div>
            
            <div class="login-helpers">
			<a href="#" onclick="swapScreen('login');return false;">Back to Login</a> <br>
			</div><br />
          </form>
        </div>
        <!-- col -->
      </div>
      <!-- pass-rec-box -->

    </div>
    <!-- pass-box -->

			<!-- FORGOT PASSWORD -->
  <!-- lock-box -->
</body>
</html>
	<script src="jquery-2.0.3.min.js"></script>

<script type="text/javascript">
		function swapScreen(id) {
			jQuery('.visible').removeClass('visible animated fadeInUp');
			jQuery('#'+id).addClass('visible animated fadeInUp');
		}
	</script>