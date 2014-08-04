<?php
$page = 'contact';
$page_title = 'Contact Us';
include ('includes/header.php'); 
 ?>
 
 <?php // code to add or edit a new organisation 
if (isset($_POST['submitted'])) { // Handle the form.

// Trim all the incoming data:
$trimmed = array_map('trim', $_POST);

// Assume invalid values:
$name = $email = $type = $message = FALSE;

$errors = array();


// Check for the name:
if (isset($_POST['name']) && ($_POST['name'] != "")){
$name= mysqli_real_escape_string ($conn, $trimmed['name']);
} else {
$errors[] = 'The name field is compulsory!';
}

// Check for the email:
if (isset($_POST['email']) && ($_POST['email'] != "")){
$email= mysqli_real_escape_string ($conn, $trimmed['email']);
} else {
$errors[] = 'The email field is compulsory!';
}

// Check for the contact type:
if (isset($_POST['type']) && ($_POST['type'] != "")){
$type= mysqli_real_escape_string ($conn, $trimmed['type']);
} else {
$errors[] = 'Please select the type!';
}

// Check for the real message:
if (isset($_POST['message']) && ($_POST['message'] != "")){
$message= mysqli_real_escape_string ($conn, $trimmed['message']);
} else {
$errors[] = 'Please enter the message!';
}


if ($name && $email && $type && $message) { // If everything's OK...
$datetime=strtotime(date("Y-m-d H:i:s")); // create date and time

// post into dB

$q = "INSERT INTO `contact` (name, email, type, message, date) VALUES ('$name', '$email', '$type', '$message', '$datetime')";
$r = mysqli_query ($conn, $q);

if (mysqli_affected_rows($conn) == 1)
{ // If it ran OK then add other details to biodata table.

// send the enquiry as mail to admin email
$body = "A user of wazobia has contacted us\r\n Please find the information below\r\n";
$body .= "Name : " .$name . "\r\n";
$body .= "Email : " .$email . "\r\n";
$body .= "Type : " .$type . "\r\n";
$body .= "Message : " .$message . "\r\n";

$to = "aakinjiola@gmail.com";

$header = 'From: Wazobia Academy<admin@Wazobia-academy.com>'."\r\n";
$header .= 'To: ' . $to ."\r\n";
$header .= 'Reply-to: admin@Wazobia-academy.com'."\r\n";
$header .= 'MIME-Version: 1.0' . "\r\n";
$header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

 mail($to, 'Contact Us on Wazobia', $body, $header);




	//Set display property and confirmation message of the message container to 'block'
					$success_display = 'block';
					$success_msg = '<h6 style="color: #008080"> SUCCESS! Your message has been posted successfully. 
										A support staff will contact you within the next 24 hours</h6>';
					
					} else { // db error.
						$err_msg = 'You message could be saved due to a system error. We apologize for any inconvenience</p>';
					}

								} else { // If one of the data tests failed.
								$datatest = 'Please re-enter the details appropriately and try again.</p>';
								}

} // End of the main Submit conditional.

?>


       <div class="page-title">
      <div class="container">
        <h2>Contact Us</h2>
        
      </div>
    </div>

  <div class="map">
    <div class="container">
<!--      <iframe style="width:100%;border:none;" height="350" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=New+York,+NY,+United+States&amp;aq=0&amp;oq=new+yo&amp;sll=38.671014,-99.426083&amp;sspn=0.007363,0.016512&amp;t=m&amp;ie=UTF8&amp;hq=&amp;hnear=New+York&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe> -->
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15825.63507367138!2d3.9158040000000094!3d7.419931849999985!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zN8KwMjUnMTEuOCJOIDPCsDU0JzU2LjkiRQ!5e0!3m2!1sen!2sng!4v1407154830327" width="100%" height="350" frameborder="0" style="border:0"></iframe>    </div>
  </div>

  <div class="container contact">
    <div class="row">
      <div class="col-md-6">
																	
        <form action="contact.php" class="contact-form" method="post">
        <h4>Keep in touch <small style="color:#FF0000; font-size: 11px">(All fields are compulsory)</small></h4>
            
              		<div class="col-md-8">
        <?php 
        	
        	
									// block to output success message	
											   	if(!empty($success_msg)) {
												echo '<div class="alert alert-info alert-dismissable">
           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
														<p><h5><i class="fa fa-heart"></i> Successful!</h5>' . $success_msg . '</p></div>';
													}
												?>
												
												<?php // block to output success message	
											   	if(!empty($err_msg)) {
												echo '<div class="alert alert-danger alert-dismissable">
          										 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
														<p><h5><i class="fa fa-asterisk"></i> Error!</h5>' . $err_msg . '</p></div>';
													}
												
												
								
									
									
									// This page prints any errors associated with logging in
									// and it creates the entire login page, including the form.
									
									// Include the header:
									
									// Print any error messages, if they exist:
									if (!empty($errors)) {
										echo ' <div class="alert alert-block alert-danger fade in">
										<a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
									<h4><i class="fa fa-times"></i> Error!</h4>
									<p>The following error(s) occurred:<br />';
									foreach ($errors as $msg) {
									echo " - $msg<br />\n";
									}
									echo '</p>
									<p>Please re-enter your details and try again</p>
									</div>';
									}
												?>
												</div>
												<div style="clear:both"> </div>
												
          <div class="row">
          <div class="col-md-4">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name">
          </div>
          <div class="col-md-4">
            <label for="name">Email</label>
            <input type="text" class="form-control" name="email">
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-8">
            <label for="name">Type</label>
				<select data-placeholder="Choose an enquiry type..." class="chosen-select" style="width:358px; padding: 5px;" tabindex="2" name="type" >
            	<option value=""></option>
            	<option value="general enquiry">General Enquiry</option>
            	<option value="comments and suggestions">Comments and Suggestions</option>
            	<option value="support">Technical Support</option>
            </select>
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-8">
             <label for="name">Your Message</label>
            <textarea name="message" id="" cols="30" rows="5" class="form-control"></textarea>
          </div>
        </div>
		<input type="hidden" name="submitted" value="TRUE" />
        <input type="submit" value="Submit" class="btn btn-default">
        </form>
      </div>
      <div class="col-md-6">
        <h4>How to reach us</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias, consectetur, architecto, velit, assumenda facilis tempora enim praesentium autem animi deserunt aliquid maiores expedita quisquam blanditiis harum quaerat sunt possimus tempore.</p>
        <address>
            <p><abbr title="Email"><i class="fa fa-envelope"></i> </abbr> support@yourdomain.com</p>
            <p><abbr title="Address"><i class="fa fa-home"> </i> </abbr> My address at My city</p>
             <p><abbr title="Address"><i class="fa fa-map-marker"> </i> </abbr> Rajahmundry, AP 533103</p>
          </address>
      </div>
    </div>
    </div>
  
<?php
include ('includes/footer.php'); 
 ?>
