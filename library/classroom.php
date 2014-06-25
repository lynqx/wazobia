<?php 
/* Classroom */
/* Doubleakins*/
/* 08063777394*/
/* 23062014*/

if(!empty($_GET['subject']))
$page_title = $_GET['subject'] . " - Classroom";
else
$page_title = "Classroom";

$path = "";
$inc_path = $path."partials/";
include($inc_path . 'header.php');

	/* redirect when student not log in */
	if (!isset($_SESSION['student_id']))
	{
		// Redirect:
		redirect_to("index.php");
	}
	else
	{
		$student = $_SESSION['student_id'];
	}

	// Check for a valid Category ID, through GET or POST:
	if ( isset($_GET['subj']) && is_numeric($_GET['subj']))
	{ 
		$subj = $_GET['subj'];
	}
	elseif (isset($_POST['subj']) && is_numeric($_POST['subj']))
	{
		$subj = $_POST['subj'];
	}
	else
	{ // No valid ID, kill the script.
		redirect_to("student_area.php");
	}

	// get subject name
	$q = "SELECT subject FROM subject WHERE subject_id=$subj";
	$r = mysqli_query ($conn, $q);
	$row = mysqli_fetch_array ($r, MYSQLI_ASSOC);
	$subject = $row['subject'];

?>

  						<!-- /header -->
  						<div class="row">
  							<div class="col-mod-12">

  								<ul class="breadcrumb">
  									<li><a href="index.php">Classroom</a></li>
  									<li class="active"><a href="language.php"><?php echo ucwords($subject) ?></a></li>
  								</ul>


  								<h3 class="page-header"> <?php echo ucwords($subject) ?> <i class="fa fa-info-circle animated bounceInDown show-info"></i> </h3>

  								<blockquote class="page-information hidden">
  									<p>
  										<b><?php echo ucwords($subject) ?></b> classroom page for <?php echo ucwords($subject) ?>.
  									</p>
  								</blockquote>

  							</div>
  						</div>

  						<!-- Demo Panel -->
<!-- Accordians -->
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-cascade">
			<div class="panel-heading">
				<h3 class="panel-title text-primary">
					My Topics
					
				</h3>
			</div>
						<div class="panel-body">
						<div class="panel-group" id="accordion">
						<div class="panel panel-default">
  										
  										
  										<!-- topic and lesson starts here -->	
  		<?php
  										/*-------------LOOP STARTS-------------------*/
		 // get dvd code id
		$q2 = "SELECT dvd_code_id FROM dvd_code_user WHERE student_id=$student";
		$r2 = mysqli_query ($conn, $q2) or trigger_error("Query: $q2\n<br />MySQL Error: " . mysqli_error($conn));
		
		//echo '<ul>';
		while ($row2 = mysqli_fetch_array ($r2, MYSQLI_ASSOC))
		{
			
			
			$dvdcode_id = $row2['dvd_code_id'];
			//echo '<li>' . $dvdcode_id . ' - ';
						
			// select subject_code_id
			$q3 = "SELECT subject_code_id FROM dvd_code WHERE dvd_code_id=$dvdcode_id";
			$r3 = mysqli_query ($conn, $q3) or trigger_error("Query: $q3\n<br />MySQL Error: " . mysqli_error($conn));
			
			//echo '<ul>';
			while ($row3 = mysqli_fetch_array ($r3, MYSQLI_ASSOC))
			{
				$subjcode_id = $row3['subject_code_id'];
				// select lesson_id
				$q4 = "SELECT lesson_id FROM dvd_lessons WHERE subject_code_id=$subjcode_id";
				$r4 = mysqli_query ($conn, $q4) or trigger_error("Query: $q4\n<br />MySQL Error: " . mysqli_error($conn));
				
				//echo '<ul>';
				while ($row4 = mysqli_fetch_array ($r4, MYSQLI_ASSOC))
				{
					$lesson_id = $row4['lesson_id'];
					
					
						// select topic
						$q5 = "SELECT lesson.topic_id, topic.topic FROM lesson
						JOIN topic on lesson.topic_id=topic.topic_id
						WHERE lesson.lesson_id=$lesson_id AND lesson.subject_id='$subj'";
						$r5 = mysqli_query ($conn, $q5) or trigger_error("Query: $q5\n<br />MySQL Error: " . mysqli_error($conn));
					
						//echo '<ul>'; show topic here
						?>
						
						
					<?php
					
						while ($row5 = mysqli_fetch_array ($r5, MYSQLI_ASSOC))
						{
							$topic_id = $row5['topic_id'];
							// show topic here as a top level link
								echo '<div class="panel-heading">
								<h4 class="panel-title">';
								echo '<a data-toggle="collapse" data-parent="#accordion" href="#collapse' . $topic_id . '">';
									echo $topic = $row5['topic'];
								echo '</a>';
								echo '</h4></div>';
						
						
													
								// select lesson
								$q6 = "SELECT lesson_id, lesson FROM lesson WHERE topic_id='$topic_id'";
								$r6 = mysqli_query ($conn, $q6) or trigger_error("Query: $q6\n<br />MySQL Error: " . mysqli_error($conn));
							
							?>
								<div id="collapse<?php echo $topic_id; ?>" class="panel-collapse collapse">
							
								
								<?php
								
								while ($row6 = mysqli_fetch_array ($r6, MYSQLI_ASSOC))
								{
									$lesson = $row6['lesson'];
									$lesson_id = $row6['lesson_id'];
						
									//get file name
									$q7 = "SELECT file_name FROM lesson_note WHERE lesson_id='$lesson_id'";
									$r7 = mysqli_query ($conn, $q7) or trigger_error("Query: $q7\n<br />MySQL Error: " . mysqli_error($conn));
									$row7 = mysqli_fetch_array($r7, MYSQLI_ASSOC);
									$filename = $row7['file_name'];
											
											echo '<div class="panel-body">';
											echo '<a href="lessons.php?id=' . $lesson_id . '&lesson=' . $lesson . '">' . $lesson . '</a>';
											echo '</div>';
								}
				echo '</div>';
				}	
			
			}
			
		}

}
		
 
?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
  										
  										<!-- topic and lesson stops here -->	
  										
  									<!-- /panel body -->	
  							
  				


<?php include('partials/footer.php'); ?>

