<?php 

//* Student Area */
/* Doubleakins*/
/* 08063777394*/
/* 19062014*/
/* redirected to when student logs in */

if ( isset($_GET['forum']))
			{ 
				$forumname = $_GET['forum'];
			} else {
				$forumname="";
			}
			
$page_title = $forumname;
$path = "../library/";
include('partials/header.php'); 
include('functions/functions.php'); 

if(!empty($_GET['subj']))
	$subj = $_GET['subj'];
	else
	$subj = "";
	
	if(!empty($_GET['subject']))
	$subject = $_GET['subject'];
	else
	$subject = "";
	
	if(!empty($_GET['forum']))
	$forum = substr($_GET['forum'],0,25);
	else
	$forum = "";
?> 
	<style>
		<!--
		.folded
		{
			display: none;
		
		}
		
		//-->
	</style>


    <div class="container">
    	      <div class="box">
	<div class="btn btn-lg">

    	 <?php 
    	 
    	 //breadcrumb
			echo $bread = "<a href=\"../\">Home</a> &raquo; <a href=\"index.php\">Forum</a> &raquo; <a href=\"topics.php?subj=$subj\">$subject</a> &raquo; $forum";
    	  echo '</div>';
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
$answer = FALSE;


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


// Check for the answer:
if (isset($_POST['answer']) && ($_POST['answer'] != ""))
{
	$answer= mysqli_real_escape_string ($conn, $trimmed['answer']);
	if(substr_count($answer, 'href=')>0)
	{
		header('location: index.php?err=links_found');
		exit();
	}
	
}
else
{
	$errors[] = 'The answer field cannot be empty!</p>';
}


if ($answer) { // If everything's OK...

		if (isset($_SESSION['email'])) {
		$author = $_SESSION['email'];
		
		} elseif (isset($_SESSION['work_email'])) {
			$author = $_SESSION['work_email'];
			
		}
		
$datetime=strtotime(date("Y-m-d H:i:s")); // create date and time

$q3 = "INSERT INTO `answers` (post_id, author, answer, date) VALUES ('$id', '$author', '$answer', '$datetime')";
$r3 = mysqli_query ($conn, $q3);

if (mysqli_affected_rows($conn) == 1)
{ // If it ran OK then add other details to biodata table.

	//Set display property and confirmation message of the message container to 'block'
					$success_display = 'block';
					$success_msg = '<h4 style="color: #008080"> SUCCESS! Your answer has been successfully posted.</h4>';
					
					} else { // db error.
						$err_msg = 'answer could not be posted due to a system error. We apologize for any inconvenience</p>';
					}


								} else { // If one of the data tests failed.
								$datatest = 'Please re-enter the details appropriately and try again.</p>';
								}

} // end capcha if

}// End of the main Submit conditional.

?>



<?php
         // Make the query to view table details:
				$q1 = "SELECT *, UNIX_TIMESTAMP() - posts.posted_date AS TimeSpent FROM `posts`
				WHERE posts.post_id = '$id'
				LIMIT 1";
				$r1 = @mysqli_query ($conn, $q1) or trigger_error(mysqli_error($conn));
				$row1 = mysqli_fetch_array($r1, MYSQLI_ASSOC);
         ?>
                  
        
		
       </div>
       
      <div class="box">
        <div class="product-one">
        <div class="row product-row2">
        	
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
          <div class="product-display2">
            <img src="images/iwatch.png" alt="" align="left" />
          </div>
          <div class="product-description3">
            <h3>
			<?php echo $row1['title']; ?>
			</h3>
            <p class="quest">
			<?php echo $row1['question']; ?>
            </p>
            
            <div class="btn btn-sm btn-default"><h5 class="author2"><span>Posted by : </span><?php 
								$email = $row1['author'];
								$un = explode('@', $email);
								$uname = $un[0];
								echo ucwords($uname); ?> </h5> &nbsp;&nbsp;&nbsp;
								
			<span class="btn btn-sm btn-danger">
									<?php
	$days = floor($row1['TimeSpent'] / (60 * 60 * 24));
			$remainder = $row1['TimeSpent'] % (60 * 60 * 24);
			$hours = floor($remainder / (60 * 60));
			$remainder = $remainder % (60 * 60);
			$minutes = floor($remainder / 60);
			$seconds = $remainder % 60;
	if($days > 0)
			echo date('F d Y', $row1['posted_date']);
			elseif($days == 0 && $hours == 0 && $minutes == 0)
			echo "few seconds ago";		
			elseif($days == 0 && $hours == 0)
			echo $minutes.' minutes' . " " . $seconds.' seconds ago';
			elseif($days == 0)
			echo $hours.' hours' . " " . $minutes.' minutes' . " " . $seconds.' seconds ago';
			echo '</font><br />';
			?>
								</span>
          </div>
        </div>
        </div>
      </div><!--end of box-->
      <?php
      $q3 = "SELECT * FROM `answers`
				WHERE answers.post_id = '$id'";
				$r3 = @mysqli_query ($conn, $q3) or trigger_error(mysqli_error($conn));
				?>
		<div class="row product-row4">
			<?php $numofanswers = mysqli_num_rows($r3); ?>	
			<p class="btn btn-sm btn-success"> <?php echo $numofanswers; ?> Answers </p>
					
					<span class="pull-right">
						<a class="panel-minimize" ><i class="fa fa-chevron-up" id="show1"></i></a>
					</span>
		</div>
      <!--end of boxiterate comments / answers here -->
          <div class="" id="answer">

      <?php
      // Make the query to view table details:
				$q2 = "SELECT *, UNIX_TIMESTAMP() - answers.date AS TimeSpent FROM `answers`
				WHERE answers.post_id = '$id'
				ORDER BY answer_id DESC";
				$r2 = @mysqli_query ($conn, $q2) or trigger_error(mysqli_error($conn));
				while ($row2 = mysqli_fetch_array($r2, MYSQLI_ASSOC)) {
					?>
			<div class="row product-row3">
			<div class="product-display3">
            <img src="images/iwatch.png" alt="" width="50" align="left"/>
            </div>
			<p><?php echo $row2['answer'];?> </p>

          <?php $email = $row2['author'];
				$un = explode('@', $email);
				$uname = $un[0];
				echo '<h5 class="btn btn-sm btn-default"> Posted by: ' . ucwords($uname) . '&nbsp;&nbsp;&nbsp;'; 
				
			echo '<span class="label label-big label-info" style="font-size:12px">';
			$days = floor($row2['TimeSpent'] / (60 * 60 * 24));
			$remainder = $row2['TimeSpent'] % (60 * 60 * 24);
			$hours = floor($remainder / (60 * 60));
			$remainder = $remainder % (60 * 60);
			$minutes = floor($remainder / 60);
			$seconds = $remainder % 60;
	if($days > 0)
			echo date('F d Y', $row2['date']);
			elseif($days == 0 && $hours == 0 && $minutes == 0)
			echo "few seconds ago";		
			elseif($days == 0 && $hours == 0)
			echo $minutes.' minutes' . " " . $seconds.' seconds ago';
			elseif($days == 0)
			echo $hours.' hours' . " " . $minutes.' minutes' . " " . $seconds.' seconds ago';
			echo '</font><br /></span>';
				
				echo '</h5>';
		  ?>
			
			</div>
				
				<?php
				}
				?>
				</div>
				<?php if (isset($_SESSION['student_id']) || isset($_SESSION['work_id'])) {
					
					?>
					<hr>
					<form action="forum.php?id=<?php echo urlencode($id); ?>&forum=<?php echo urlencode($forumname); ?>&subject=<?php echo $subject; ?>" method="post">
			
			<div class="form-group">
					<label for="question" class="col-lg-2 col-md-3 control-label"><h4>Answer</h4></label>
					<textarea class="form-control form-cascade-control" rows="5" name="answer"></textarea>
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
											<input type="submit" value="Answer Question" class="btn bg-primary btn-lg">
											</div>
           </form>
           
           <?php
				} else {
					
					echo 'You need to log in to post an answer to this question';
				}
				?>
    </div><!--end of container-->
  
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
	
	<script src="jquery-1.8.0.min.js"></script>

			<script>
		 $(document).on('click','#show1',function(){
			 //this performs the hide and show and you can add transitions using either slide,blind,fast,slow and many more
			 $('#answer').slideToggle("slow");
			 $('#show1').toggleClass("fa-chevron-down");
		 });

         </script>
