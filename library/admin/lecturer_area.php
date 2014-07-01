<?php 
/* Lecturer Area */
/* Doubleakins*/
/* 08063777394*/
/* 30062014*/
/* redirected to when student logs in */

 

$page_title = "Lecturer Dashboard";
$path = "";
$inc_path = $path."partials/";
include($inc_path . 'header.php'); 
if (!isset($_SESSION['work_id']))
{
	 redirect_to('index.php');
 }

if (isset($_SESSION['work_id']) && $_SESSION['roles'] != 'lecturer') {
	redirect_to('error.php');
}

?> 

  						<!-- /header -->
  						<div class="row">
  							<div class="col-mod-12">

  								<ul class="breadcrumb">
  									<li><a href="index.php">Home</a></li>
  									<li class="active"><a href="lecturer_area.php">Dashboard</a></li>
  								</ul>


  								<h3 class="page-header animated bounceInRight show-info"> Lecturer Dashboard <i class="fa fa-dashboard animated bounceInDown show-info"></i> </h3>

  								<blockquote class="page-information hidden">
  									<p>
  										<b>Dashboard Page</b> Overview of all important recent activities.
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
					Lecturers Profile
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
									$lecturer = $_SESSION['work_id'];
									$q1 = "SELECT lesson.lesson_id, subject.subject_id, subject.subject FROM lesson
											JOIN subject on subject.subject_id = lesson.subject_id
											WHERE lesson.work_id = '$lecturer'
											ORDER BY lesson.lesson_id ASC";
									$r1 = mysqli_query ($conn, $q1);
									echo $numofSubjects = mysqli_num_rows($r1);
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
									$q2 = "SELECT DISTINCT lesson.topic_id FROM lesson
											WHERE lesson.work_id = '$lecturer'";
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
									<span class="pull-right"><?php
									$q3 = "SELECT * FROM lesson
											WHERE work_id = '$lecturer'";
									$r3 = mysqli_query ($conn, $q3);
									echo $numofLessons = mysqli_num_rows($r3);
									?></span></h4>
							</div>
						</div>
					</div>
				</div>

			</div> <!-- /panel body -->	
		</div>
	</div>
</div>


<div class="row">
  							<div class="col-md-10">
  								<div class="panel panel-cascade">
  									<div class="panel-heading">
  										<h3 class="panel-title">
  											<i class="fa fa-user"></i>
  											Latest Lessons Taken
  											<span class="pull-right">
  												<a  href="#" class="panel-minimize"><i class="fa fa-chevron-up"></i></a>
  											</span>
  										</h3>
  									</div>
  									<div class="panel-body nopadding">
  										<?php 
  										$q4 = "SELECT * FROM lesson
  												JOIN topic ON topic.topic_id = lesson.topic_id
  												JOIN subject ON subject.subject_id = lesson.subject_id
  												JOIN organisation ON organisation.organisation_id = lesson.organisation_id
  												WHERE lesson.work_id = '$lecturer'
  												ORDER BY lesson.lesson_id DESC LIMIT 10";
										$r4 = mysqli_query($conn, $q4);
  										?>
  										<table class="table">
  											<thead>
  												<tr>
  													<th><i class="fa fa-caret-right"></i> Lesson</th>
  													<th><i class="fa fa-caret-right"></i> Topic</th>
  													<th><i class="fa fa-caret-right"></i> Subject</th>
  													<th><i class="fa fa-caret-right"></i> Organisation</th>
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
  												<td><?php echo $row4['organisation']; ?> </td>
  												<td><label class="label label-success"><?php echo $row4['duration']; ?> </label></td>
  											</tr>
  											<?php } ?>
  										</table>
  										

  									</div>
  								</div>
  							</div>	
  							
  						</div>
  						
  						<div class="row">
  							<div class="col-md-6">
  								<div class="panel text-primary panel-cascade">
  									<div class="panel-heading">
  										<h3 class="panel-title">
  											<i class="fa fa-bar-chart-o"></i>
  											Analytics
  											<span class="pull-right text-success">
  												<i class="fa fa-arrow-up"></i>
  												68%
  											</span>
  										</h3>
  									</div>
  									<div class="panel-body nopadding">
  										<div id="visitors"></div>			
  										<div class="row visitors-list-summary text-center">
  											<div class="col-md-4 col-sm-4 col-xs-4 visitor-item ">
  												<i class="fa fa-bullhorn fa-3x pull-left"></i>
  												Total Visits <br />
  												<label class="label label-success">76,598</label>
  											</div>
  											<div class="col-md-4 col-sm-4 col-xs-4 visitor-item">
  												<i class="fa fa-eye fa-3x pull-left"></i>
  												Number of Lessons Viewed <br />
  												<label class="label label-info">8,575</label>
  											</div>
  											<div class="col-md-4 col-sm-4 col-xs-4 visitor-item">
  												<i class="fa fa-comments fa-3x pull-left"></i>
  												Total Forum Comments <br />
  												<label class="label label-warning">72,658</label>
  											</div>
  										</div>
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

