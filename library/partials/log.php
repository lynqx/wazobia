<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Student Login || Wazobia</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Loading Bootstrap -->
  <link href="css/bootstrap.css" rel="stylesheet">

  <!-- Loading Stylesheets -->    
  <link href="css/style.css" rel="stylesheet">
  <link href="css/login.css" rel="stylesheet">
  
  <!-- Loading Custom Stylesheets -->    
  <link href="css/custom.css" rel="stylesheet">

  <link rel="shortcut icon" href="images/favicon.ico">

  <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
      <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <![endif]-->
    </head>
    <body >
      <div class="list-group side-menu ">
        <a class="list-group-item" href="#login">Login</a>
        <a class="list-group-item" href="#register">Register</a>
        <a class="list-group-item" href="#forgot-password">Forgot Password?</a>
      </div>

   <section id="login">
    <div class="row animated fadeILeftBig">
     <div class="login-holder col-md-6 col-md-offset-3">
       <h2 class="page-header text-center text-primary"> Login </h2>
       
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
									
									// Display the form:
									
									?>
       <form role="form" action="index.php" method="post">
        <div class="form-group">
          <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email">
        </div>
        <div class="form-group">
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="pass">
        </div>
        <div class="form-footer">   
        
        <input type="hidden" name="submitted" value="TRUE" />
          <button type="submit" class="btn btn-success pull-right btn-submit">Login</button>
        </div>

      </form>
    </div>
  </div>
</section>
<section id="register">
  <div class="row animated fadeILeftBig">
   <div class="login-holder col-md-6 col-md-offset-3">
     <h2 class="page-header text-center text-primary"> Register </h2>
     <form role="form" action="index.php" method="post">
      <div class="form-group">
        <input type="email" class="form-control" id="" placeholder="Full Name" name="email">
      </div>
      <div class="form-group">
        <input type="password" class="form-control" id="" placeholder="Enter password" name="pass">
      </div>
      <div class="form-group">
        <input type="text" class="form-control" id="" placeholder="First Name" name="firstname">
      </div>
      <div class="form-group">
        <input type="text" class="form-control" id="" placeholder="Last Name" name="lastname">
      </div>
       <div class="form-group">
        <input type="tel" class="form-control" id="" placeholder="Mobile Number" name="phone">
      </div>
      
      <div class="form-group">
        <input type="text" class="form-control" id="" placeholder="Address" name="address">
      </div>
      
      <div class="form-group">
        <input type="text" class="form-control" id="" placeholder="City" name="city">
      </div>
      
      <div class="form-group">
        <input type="text" class="form-control" id="" placeholder="City" name="city">
      </div>
      
      <div class="form-group">
        <input type="text" class="form-control" id="" placeholder="City" name="city">
      </div>
      
      <div class="form-footer">
        <label>
          <input type="checkbox" class="hidden" id="input-checkbox" value="0" >  <i class="fa fa-check-square-o input-checkbox fa-square-o"></i> I agree to the Terms &amp; Conditions
        </label>
                <input type="hidden" name="registered" value="TRUE" />

        <button type="submit" class="btn btn-success pull-right btn-submit">Register</button>
      </div>
    </form>
  </div>
</div>
</section>
<section id="forgot-password">
  <div class="row animated fadeILeftBig">
   <div class="login-holder col-md-6 col-md-offset-3">
     <h2 class="page-header text-center text-primary"> Forgot Password </h2>
     <form role="form" action="index.php" method="post">
      <div class="form-group">
        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Username / Email">
      </div>
      <div class="form-footer">
        
        <button type="submit" class="btn btn-success pull-right btn-submit">Send Instructions</button>
      </div>
    </form>
  </div>
</div>
</section>


<!-- Load JS here for Faster site load =============================-->
<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/jquery-ui-1.10.3.custom.min.js"></script>
<script src="js/jquery.ui.touch-punch.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-select.js"></script>
<script src="js/bootstrap-switch.js"></script>
<script src="js/jquery.tagsinput.js"></script>
<script src="js/jquery.placeholder.js"></script>
<script src="js/bootstrap-typeahead.js"></script>
<script src="js/application.js"></script>
<script src="js/moment.min.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/jquery.sortable.js"></script>
<script type="text/javascript" src="js/jquery.gritter.js"></script>
<script src="js/jquery.nicescroll.min.js"></script>
<script src="js/skylo.js"></script>
<script src="js/prettify.min.js"></script>
<script src="js/jquery.noty.js"></script>
<script src="js/scroll.js"></script>
<script src="js/jquery.panelSnap.js"></script>
<script src="js/login.js"></script>


</body>
</html>