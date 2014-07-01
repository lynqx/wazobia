<?php 
//* Admin Area */
/* Doubleakins*/
/* 08063777394*/
/* 30062014*/
/* redirected to when student logs in */

 

$page_title = "Admin Dashboard";
$path = "";
$inc_path = $path."partials/";
include($inc_path . 'header.php'); 

if (isset($_SESSION['work_id']) && $_SESSION['roles'] != 'admin') {
	redirect_to('error.php');
}

?> 

  						<!-- /header -->
  						<div class="row">
  							<div class="col-mod-12">

  								<ul class="breadcrumb">
  									<li><a href="index.php">Home</a></li>
  									<li class="active"><a href="admin_area.php">Dashboard</a></li>
  								</ul>


  								<h3 class="page-header animated bounceInRight show-info"> Administrator Dashboard <i class="fa fa-dashboard animated bounceInDown show-info"></i> </h3>

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
					General Academy Summary
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
								<h4>Total Subjects :  
								<span class="pull-right">
									<?php
									$q1 = "SELECT * FROM subject";
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
								<h4>Total Topics :  
									<span class="pull-right"><?php
									$q2 = "SELECT * FROM topic";
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
								<h4>Total Lessons :  
									<span class="pull-right"><?php
									$q3 = "SELECT * FROM lesson";
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
  							<div class="col-md-6">
  								<div class="panel panel-cascade">
  									<div class="panel-heading">
  										<h3 class="panel-title">
  											<i class="fa fa-user"></i>
  											Latest 10 Recently Joined Students
  											<span class="pull-right">
  												<a  href="#" class="panel-minimize"><i class="fa fa-chevron-up"></i></a>
  											</span>
  										</h3>
  									</div>
  									<div class="panel-body nopadding">
  										<?php 
  										$q4 = "SELECT * FROM student_register ORDER BY student_id DESC LIMIT 10";
										$r4 = mysqli_query($conn, $q4);
  										?>
  										<table class="table">
  											<thead>
  												<tr>
  													<th><i class="fa fa-caret-right"></i> Students</th>
  													<th><i class="fa fa-caret-right"></i> Email</th>
  													<th><i class="fa fa-caret-right"></i> Date Registered</th>
  												</tr>
  											</thead>
  											<?php
  											while ($row4 = mysqli_fetch_array($r4, MYSQLI_ASSOC) ) {
  											?>
  											<tr>
  												<td><?php echo $row4['first_name'] . '  ' . $row4['last_name']; ?></td>
  												<td><?php echo $row4['email']; ?> </td>
  												<td><label class="label label-success"><?php echo $row4['time_register']; ?> </label></td>
  											</tr>
  											<?php } ?>
  										</table>
  										<div class="row visitors-list-summary text-center">
  											<div class="col-md-4 col-sm-4 col-xs-4 visitor-item ">
  												<h4>  Total Students </h4>
  												<label class="label label-big label-info"> <i class="fa fa-user text-white"></i>
												<?php
												$q5 = "SELECT * FROM student_register";
												$r5 = mysqli_query ($conn, $q5);
												echo $numofStudents = mysqli_num_rows($r5);
												?>
												</label>
  											</div>
  											<div class="col-md-3 col-sm-3 col-xs-3 visitor-item ">
  												<h4>  Pending </h4>
  												<label class="label label-big label-success"> <i class="fa fa-bullhorn text-white"></i> 5</label>
  											</div>
  											<div class="col-md-3 col-sm-3 col-xs-3 visitor-item ">
  												<h4>  Blocked </h4>
  												<label class="label label-big label-warning"> <i class="fa fa-times-circle"></i> 2</label>
  											</div>
  										</div>

  									</div>
  								</div>
  							</div>	
  							
  							
  							<div class="col-md-6">
  								<div class="panel panel-cascade">
  									<div class="panel-heading">
  										<h3 class="panel-title">
  											<i class="fa fa-user"></i>
  											Recently Added Lecturers
  											<span class="pull-right">
  												<a  href="#" class="panel-minimize"><i class="fa fa-chevron-up"></i></a>
  											</span>
  										</h3>
  									</div>
  									<div class="panel-body nopadding">
  										<?php 
  										$q6 = "SELECT * FROM worker_register 
  												JOIN worker_roles ON worker_roles.work_id = worker_register.work_id
  												JOIN roles ON roles.role_id = worker_roles.role_id
  												WHERE roles.role_id = 3
  												LIMIT 10";
										$r6 = mysqli_query ($conn, $q6);  										?>
  										<table class="table">
  											<thead>
  											
  												<tr>
  													<th><i class="fa fa-caret-right"></i> Lecturer</th>
  													<th><i class="fa fa-caret-right"></i> Email</th>
  													<th><i class="fa fa-caret-right"></i> Role</th>
  												</tr>
  											</thead>
  												<?php
  												while ($row6 = mysqli_fetch_array($r6, MYSQLI_ASSOC) ) {
  												?>
  											<tr>
  												<td><?php echo $row6['work_first_name'] . '  ' . $row6['work_last_name']; ?></td>
  												<td><?php echo $row6['work_email']; ?></td>
  												<td><label class="label label-success"><?php echo ucwords($row6['roles']); ?></label></td>
  											</tr>
  											<?php } ?>
  											
  										</table>
  										<div class="row visitors-list-summary text-center">
  											<div class="col-md-4 col-sm-4 col-xs-4 visitor-item ">
  												<h4>  Total Lecturers </h4>
  												<label class="label label-big label-info"> <i class="fa fa-user text-white"></i>
												<?php
												$q7 = "SELECT * FROM worker_register 
  												JOIN worker_roles ON worker_roles.work_id = worker_register.work_id
  												JOIN roles ON roles.role_id = worker_roles.role_id
  												WHERE roles.role_id = 3";
												$r7 = mysqli_query ($conn, $q7);
												echo $numofLecturers = mysqli_num_rows($r7);
												?>
												</label>
  											</div>
  											<div class="col-md-3 col-sm-3 col-xs-3 visitor-item ">
  												<h4>  Total Agents </h4>
  												<label class="label label-big label-success"> <i class="fa fa-calendar text-white"></i> 5,435</label>
  											</div>
  											<div class="col-md-4 col-sm-4 col-xs-4 visitor-item ">
  												<h4>  Pending Agents</h4>
  												<label class="label label-big label-warning"> <i class="fa fa-bullhorn text-white"></i> 854</label>
  											</div>
  											
  										</div>

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

