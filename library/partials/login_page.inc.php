
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
  	<img src="../images/logo.png" alt="wazobia-academy" width="250" height="68" />
    <h1>Welcome to Wazobia </h1>
    <hr>
    <h5>LOGIN</h5>
    								
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
              
            <div class="login-helpers">
			<a href="#" onclick="swapScreen('forgot');return false;">Forgot Password?</a> || <a href="#" onclick="swapScreen('register');return false;">New User?</a> <br>
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
          <form  role="form" action="index.php" method="post">
           
            <div class="input-group form-group">
              <span class="input-group-addon"><i class='fa fa-envelope'></i></span>
              <input type="text" class="form-control" placeholder="E-mail" name="email">
            </div>
            

          
            <div class="form-group">
              <input type="hidden" name="forgotten" value="TRUE" />
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
    </div>

			<!-- FORGOT PASSWORD -->
  <!-- lock-box -->
  
  
  
  			<!-- REGISTER NEW USER -->

   <div class="reg-box" id="register">
   <img src="../images/logo.png" alt="wazobia-academy" width="250" height="68" />

    <h1>Welcome To Wazobia </h1>
    <hr>
  
<h5>REGISTER</h5>
    <div class="reg-submit-box">
      <div class="row">
      	
      								<?php
									// This page prints any errors associated with logging in
									// and it creates the entire login page, including the form.
									
									// Include the header:
									
									
									// Display the form:
									
									?>
									
									
        <div class="col-md-8 col-md-offset-2 col-xs-10 col-xs-offset-1">
          <form  role="form"  action="index.php" method="post">
            <div class="input-group form-group">
              <span class="input-group-addon"><i class='fa fa-user'></i></span>
              <input type="text" class="form-control" placeholder="Firstname" name="firstname">
            </div>
            
            <div class="input-group form-group">
              <span class="input-group-addon"><i class='fa fa-user'></i></span>
              <input type="text" class="form-control" placeholder="Lastname" name="lastname">
            </div>
            
            <div class="input-group form-group">
              <span class="input-group-addon"><i class='fa fa-phone'></i></span>
              <input type="tel" class="form-control" placeholder="Phone" name="mobile">
            </div>
            
            <div class="input-group form-group">
              <span class="input-group-addon"><i class='fa fa-home'></i></span>
              <input type="text" class="form-control" placeholder="Address" name="address"> 
            </div>
            
            <div class="input-group form-group">
              <span class="input-group-addon"><i class='fa fa-globe'></i></span>
              <input type="text" class="form-control" placeholder="City" name="city">
            </div>
            
            <div class="input-group form-group">
              <span class="input-group-addon"><i class='fa fa-envelope'></i></span>
              <input type="text" class="form-control" placeholder="E-mail" name="email">
            </div>
            
            <div class="input-group form-group">
              <span class="input-group-addon"><i class='fa fa-lock'></i></span>
              <input type="password" class="form-control" placeholder="Password" name="password1">
            </div>
            
            <div class="input-group form-group">
              <span class="input-group-addon"><i class='fa fa-lock'></i></span>
              <input type="password" class="form-control" placeholder="Confirm Password" name="password2">
            </div>
            
            

                    <!-- Button trigger modal -->
          
            <h6><input type="checkbox"><a href="#" data-toggle="modal" data-target="#myModal">I agree to terms &amp; Services</a></h6>

   
            <div class="form-group">
              <input type="hidden" name="registered" value="TRUE" />
              <button type="submit" class="btn  btn-block  btn-submit pull-right">Register</button>
            </div>
            
            <div class="login-helpers">
			<a href="#" onclick="swapScreen('login');return false;">Back to Login</a> <br>
			</div><br />
            
          </form>
        </div>
        <!-- col -->
      </div>
      <!-- mail-box -->

    </div>
    <!-- reg-box -->

  </div>
  
  			<!-- END REGISTER NEW USER -->
  			
			<!-- Modal -->
          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i> </button>
                  <h4 class="modal-title" id="myModalLabel">Terms & Conditions</h4>
                </div>
                <div class="modal-body">  
                  <ul>
                  <h4>Welcome to Wazobia!</h4>
                    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero, laborum, iusto, facilis, consequatur quis culpa consequuntur animi excepturi vitae eaque molestiae amet ad. Debitis, saepe eveniet earum qui recusandae explicabo!</li>
                    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur, expedita magnam laboriosam recusandae ut eaque doloribus. Ex, aut, in, illo, quia tempore repudiandae dignissimos nostrum non consequatur nesciunt tenetur corporis.</li>
                    <h4>Modifying and Terminating our Services</h4>
                    
                      <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, deleniti, temporibus, voluptas commodi sint accusantium soluta eaque possimus amet eius culpa dolore accusamus omnis rerum esse tenetur ea ex cupiditate.</li>
                      <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate, neque, quaerat, exercitationem voluptatum illo sunt voluptatem inventore tempore nemo molestias est at temporibus repellendus incidunt pariatur voluptates nesciunt illum vel!</li>              
                  </ul>
                </div>
                <div class="modal-footer">
                  
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->
  
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