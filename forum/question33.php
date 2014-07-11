<?php 
		// Check for a valid Organisation ID, through GET or POST:

if ( isset($_GET['topic']))
			{ 
				$topicname = $_GET['topic'];
			} else {
				$topicname = "";
			}
//* Student Area */
/* Doubleakins*/
/* 08063777394*/
/* 19062014*/
/* redirected to when student logs in */

$page_title = "Ask A Question || " . $topicname;
$path = "../library/";
include('partials/header.php'); 
include('functions/functions.php'); 

?> 

<?php
if (isset($_SESSION['student_id']) || isset($_SESSION['student_id'])) {
	
	// you are logged in so continue to post question

?>

    <div class="container">
    	      <div class="box">

    	 <?php 
 
		// Check for a valid Organisation ID, through GET or POST:
			if ( isset($_GET['id']) && is_numeric($_GET['id']))
			{ 
				$id = $_GET['id'];
			} else {
				redirect_to('index.php');
			}

         ?>
         
         <?php // code to add or edit a new organisation 
if (isset($_POST['submitted'])) { // Handle the form.

// Trim all the incoming data:
$trimmed = array_map('trim', $_POST);

// Assume invalid values:
$title = $question = FALSE;


//Checking if the captch entered is correct  
        if(empty($_SESSION['6_letters_code'] ) ||
	  strcasecmp($_SESSION['6_letters_code'], $_POST['6_letters_code']) != 0)
	{
	//Note: the captcha code is compared case insensitively.
	//if you want case sensitive match, update the check above to
	// strcmp()
            echo "<script>alert('Spam Check Failed');</script>"; 
			 
	} else {  //Place your code for processing the form here  
	
$errors = array();


// Check for the subject:
if (isset($_POST['title']) && ($_POST['title'] != "")){
$title= mysqli_real_escape_string ($conn, $trimmed['title']);
} else {
$errors[] = 'Please enter a Title!</p>';
}

// Check for the subject:
if (isset($_POST['question']) && ($_POST['question'] != "")){
$question= mysqli_real_escape_string ($conn, $trimmed['question']);
} else {
$errors[] = 'The question field cannot be empty!</p>';
}


if ($title && $question) { // If everything's OK...

		if (isset($_SESSION['email'])) {
		$author = $_SESSION['email'];
		
		} elseif (isset($_SESSION['work_email'])) {
			$author = $_SESSION['work_email'];
			
		}
		
$datetime=strtotime(date("Y-m-d H:i:s")); // create date and time

$q3 = "INSERT INTO `posts` (topic_id, author, title, question, posted_date) VALUES ('$id', '$author', '$title', '$question', '$datetime')";
$r3 = mysqli_query ($conn, $q3);

if (mysqli_affected_rows($conn) == 1)
{ // If it ran OK then add other details to biodata table.

	//Set display property and confirmation message of the message container to 'block'
					$success_display = 'block';
					$success_msg = '<h4 style="color: #008080"> SUCCESS! Your question has been successfully posted.</h4>';
					
					} else { // db error.
						$err_msg = 'Question could not be asked due to a system error. We apologize for any inconvenience</p>';
					}


								} else { // If one of the data tests failed.
								$datatest = 'Please re-enter the details appropriately and try again.</p>';
								}

} // end capcha if

}// End of the main Submit conditional.

?>


       
      <div class="box">
        <div class="product-one">
        <div class="row product-row">
        	
        	<?php 
        	
        	
									// block to output success message	
											   	if(!empty($success_msg)) {
												echo '<div class="alert alert-info alert-dismissable">
           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
														<p><h4><i class="fa fa-heart"></i> Successful!</h4>' . $success_msg . '</p></div>';
													}
												?>
												
												<?php // block to output success message	
											   	if(!empty($err_msg)) {
												echo '<div class="alert alert-danger alert-dismissable">
          										 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
														<p><h4><i class="fa fa-asterisk"></i> Error!</h4>' . $err_msg . '</p></div>';
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
												
												
          <div class="col-md-7 product-description">
            <h3>
             <?php 
     			 $q3 = "SELECT * FROM `topic`
				WHERE topic.topic_id = '$id'";
				$r3 = @mysqli_query ($conn, $q3) or trigger_error(mysqli_error($conn));
				$row3 = mysqli_fetch_array($r3, MYSQLI_ASSOC);
				
             echo $topicname = $row3['topic']; ?>
            </h3>
            <small> Ask a question on <?php echo $topicname; ?> and instructors and other students will help put you through on the solution</small>
            <hr>
           <form action="question.php?id=<?php echo urlencode($id); ?>&topic=<?php echo urlencode($topicname); ?>" method="post">
           
           <div class="form-group">
					<input type="text" name="title" class="form-control form-cascade-control"  placeholder="Title" />
			</div>
			
			<div class="form-group">
					<label for="question" class="col-lg-2 col-md-3 control-label"><h4>Question</h4></label>
					<textarea class="form-control form-cascade-control" rows="5" name="question"></textarea>
			</div>
			
			<table>
			<tr>  
              <td align="center" colspan="2"><img src="waz_capcha.php?rand=<?php echo rand(); ?>" id='captchaimg' ></td>
              </tr>
              <tr>
               <td align="center" colspan="2" style="padding:5px 5px 0 0"><label style="padding:0 0 0 40px" for='message'>Enter the code here :</label>
               <input id="6_letters_code" name="6_letters_code" type="text"></td>
               <tr>
                <tr><td colspan="2" align="center"><small>Can't read the image? refresh <a href='javascript: refreshCaptcha();'>here</a></small></td></tr>
				</table>			
           									<div class="form-actions">
											<input type="hidden" name="submitted" value="TRUE" />
											<input type="submit" value="Ask a Question" class="btn bg-primary btn-lg">
											</div>
           </form>
          </div>
        </div>
        </div>
      </div><!--end of box-->

    <?php } else { ?>
    	         <div class="box">
        <div class="product-one">
        <div class="row product-row2">

			<div class="col-md-5 product-display">
            <img src="images/iwatch.png" alt="">
          	</div>
          
                    <div class="col-md-7 product-description">

        <h3>You do not have permissions to post a question.</h3> <hr>
		<h4>Please <a href="../library/index.php">login</a> or <a href="../library/index.php">register</a> to post a question!</h4>
		</div>
		</div>
		</div>
		</div>
		    </div><!--end of container-->

		
		
    <?php }  ?>
    
<?php include('partials/footer.php'); ?>


 <script language='JavaScript' type='text/javascript'>
function refreshCaptcha()
{
	var img = document.images['captchaimg'];
	img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
}
</script>

<script>
		<!--
		function hideShow(x, y)
		{
			
			var a = document.getElementsByClassName(x);
			var b = document.getElementById(y);
			
			//alert(a.length);
			
			//close all divs
			for(var i = 0; i<a.length; i++)
			{
				if(a[i]!=b)
				a[i].style.display='none';
			}
			
			
			//open this div
			if(b.style.display=='block')
			b.style.display='none'
			else
			b.style.display='block'
		}
	
		//-->
	</script>
