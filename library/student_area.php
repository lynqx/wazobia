<?php 
//* Student Area */
/* Doubleakins*/
/* 08063777394*/
/* 19062014*/
/* redirected to when student logs in */

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
		$student_id = $_SESSION['student_id'];
	}
	
?> 

  						<!-- /header -->
  						<!-- /header -->
  						<div class="row">
  							<div class="col-mod-12">

  								<ul class="breadcrumb">
  									<li><a href="index.php">Home</a></li>
  									<li class="active"><a href="lecturer_area.php">Classroom</a></li>
  								</ul>


  								<h3 class="page-header animated bounceInRight show-info"> Student Dashboard <i class="fa fa-dashboard animated bounceInDown show-info"></i> </h3>

  								<blockquote class="page-information hidden">
  									<p>
  										<b>Student Dashboard Page</b> Overview of all important recent activities.
  									</p>
  								</blockquote>

  							</div>
  						</div>

  						<!-- Demo Panel -->
  						<div class="row">
  							<div class="col-md-12">
  								<div class="panel panel-cascade">
  									<div class="panel-heading">
  										<h3 class="panel-title text-primary">
  											Welcome to Wazobia Academy
  											
  										</h3>
  									</div>
  									<div class="panel-body panel-border">
  										<div class="list-group demo-list-group">
<!-- Animated Info Boxes -->
<div class="row">
	<div class="col-md-12">
		<div class="panel text-primary">
			<div class="panel-heading">
				<h3 class="panel-title text-primary">
					Student's Dashboard
					<span class="pull-right">
						<a href="#" class="panel-minimize"><i class="fa fa-chevron-up"></i></a>
					</span>
				</h3>
			</div>
			<div class="panel-body panel-border">
				<!-- Info Boxes -->
				<div class="row ">
					<div class="col-md-4">
						<div class="info-box  bg-primary  text-white">
							<div class="info-icon bg-primary-dark">
								<i class="fa fa-folder-open fa-spin fa-2x"></i>
							</div>
							<div class="info-details">
								<h4>My Subjects : 
								<span class="pull-right">
									<?php
                    $q4 = "SELECT DISTINCT subject.subject, subject.subject_id 
				FROM dvd_code_user 
				JOIN dvd_code 
				ON dvd_code_user.dvd_code_id=dvd_code.dvd_code_id 
				JOIN dvd 
				ON dvd_code.dvd_id=dvd.dvd_id 
				JOIN subject 
				ON dvd.subject_id=subject.subject_id 
				WHERE student_id='$student_id'";
					$r4 = mysqli_query($conn, $q4) or trigger_error(mysqli_error($conn));
                    echo $noofsubject = mysqli_num_rows($r4);
					
                    ?>
								</span></h4>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="info-box  bg-danger  text-white">
							<div class="info-icon bg-danger-dark">
								<i class="fa fa-book fa-spin fa-2x"></i>
							</div>
							<div class="info-details">
								<h4>My Topics :  
									<span class="pull-right"><?php
									$q2 = "SELECT DISTINCT topic.topic_id, topic.topic FROM topic
									JOIN dvd ON dvd.subject_id = topic.subject_id
									JOIN dvd_code ON dvd_code.dvd_id = dvd.dvd_id
									JOIN dvd_code_user ON dvd_code_user.dvd_code_id = dvd_code.dvd_code_id
									WHERE dvd_code_user.student_id = '$student_id'";
									$r2 = mysqli_query ($conn, $q2);
									echo $numofTopics = mysqli_num_rows($r2);
									?></span></h4>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="info-box  bg-info  text-white">
							<div class="info-icon bg-primary-dark">
								<i class="fa fa-edit fa-spin fa-2x"></i>
							</div>
							<div class="info-details">
								<h4>My Lessons :  
									<span class="pull-right">
								<?php
									$q3 = "SELECT DISTINCT lesson.lesson_id, lesson.lesson FROM lesson
									JOIN dvd_lessons ON dvd_lessons.lesson_id = lesson.lesson_id
									JOIN dvd ON dvd.dvd_id = dvd_lessons.dvd_id
									JOIN dvd_code ON dvd_code.dvd_id = dvd.dvd_id
									JOIN dvd_code_user ON dvd_code_user.dvd_code_id = dvd_code.dvd_code_id
									WHERE dvd_code_user.student_id = '$student_id'";
									$r3 = mysqli_query ($conn, $q3);
									echo $numofLessons = mysqli_num_rows($r3);
								?>
									</span></h4>
							</div>
						</div>
					</div>
				</div>

			</div> <!-- /panel body -->	
		</div>
	</div>
</div>


<div class="row">
  							<div class="col-md-12">
  								<div class="panel panel-cascade">
  									<div class="panel-heading">
  										<h3 class="panel-title">
  											<i class="fa fa-user"></i>
  											Latest Lessons Watched
  											<span class="pull-right">
  												<a  href="#" class="panel-minimize"><i class="fa fa-chevron-up"></i></a>
  											</span>
  										</h3>
  									</div>
  									<div class="panel-body nopadding">
  										<?php 
  										$q4 = "SELECT DISTINCT lesson.lesson_id, lesson.lesson, topic.topic, subject.subject, lesson.duration FROM lesson
									JOIN topic ON topic.topic_id = lesson.topic_id
									JOIN subject ON subject.subject_id = lesson.subject_id
									JOIN dvd_lessons ON dvd_lessons.lesson_id = lesson.lesson_id
									JOIN dvd ON dvd.dvd_id = dvd_lessons.dvd_id
									JOIN dvd_code ON dvd_code.dvd_id = dvd.dvd_id
									JOIN dvd_code_user ON dvd_code_user.dvd_code_id = dvd_code.dvd_code_id
									WHERE dvd_code_user.student_id = '$student_id'
  									ORDER BY lesson.lesson_id DESC LIMIT 10";
										$r4 = mysqli_query($conn, $q4) or trigger_error(mysqli_error($conn));
  										?>
  										<table class="table">
  											<thead>
  												<tr>
  													<th><i class="fa fa-caret-right"></i> Lesson</th>
  													<th><i class="fa fa-caret-right"></i> Topic</th>
  													<th><i class="fa fa-caret-right"></i> Subject</th>
  													<th><i class="fa fa-caret-right"></i> Duration (secs)</th>
  												</tr>
  											</thead>
  											<?php
  											while ($row4 = mysqli_fetch_array($r4, MYSQLI_ASSOC) ) {
  											?>
  											<tr>
  												<td><?php echo $row4['lesson']; ?></td>
  												<td><?php echo $row4['topic']; ?> </td>
  												<td><?php echo $row4['subject']; ?> </td>
  												<td><label class="label label-success"><?php echo $row4['duration']; ?> </label></td>
  											</tr>
  											<?php } ?>
  										</table>
  										

  									</div>
  								</div>
  							</div>	
  							
  						</div>
  						
  					
									</div> <!-- /panel body -->	
									</div>
							  
  								</div>	
  							</div>


  					</div> <!-- /.content -->



<?php include('partials/footer.php'); ?>

