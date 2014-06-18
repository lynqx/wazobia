<?php 
$page_title = 'Wazobia Academy';
include('partials/header.php'); 
?>


  						<div class="row">
  							<div class="col-mod-12">

  								<ul class="breadcrumb">
  									<li><a href="index.php">Dashboard</a></li>
  									<li><a href="template.php">Template</a></li>
  									<li class="active">DashBoard</li>
  								</ul>

  								<div class="form-group hiddn-minibar pull-right">
  									<input type="text" class="form-control form-cascade-control nav-input-search" size="20" placeholder="Search through site" />

  									<span class="input-icon fui-search"></span>
  								</div>

  								<h3 class="page-header"><i class="fa fa fa-dashboard"></i> Dashboard <i class="fa fa-info-circle animated bounceInDown show-info"></i> </h3>

  								<blockquote class="page-information hidden">
  									<p>
  										Dashboard is an "Easy To Read" real-time user interface, showing a graphical presentation of the current status and historical trends of an organization’s key performance indicators to enable instantaneous and informed decisions to be made at a glance.
  									</p>
  								</blockquote>
  							</div>
  						</div>


  						<!-- Info Boxes -->
  						<div class="row">
  							<div class="col-md-4">
  								<div class="info-box  bg-info  text-white">
  									<div class="info-icon bg-info-dark">
  										<i class="fa fa-shopping-cart fa-4x"></i>
  									</div>
  									<div class="info-details">
  										<h4>Sales   <span class="pull-right">233</span></h4>
  										<p>This Week <span class="badge pull-right bg-white text-info"> 48% <i class="fa fa-arrow-down fa-1x"></i> </span> </p>
  									</div>
  								</div>
  							</div>
  							<div class="col-md-4 ">
  								<div class="info-box  bg-success  text-white"  id="initial-tour">
  									<div class="info-icon bg-success-dark">
  										<i class="fa fa-cloud-download fa-4x"></i>
  									</div>
  									<div class="info-details">
  										<h4>Downloads   <span class="pull-right">233</span></h4>
  										<p>This Year <span class="badge pull-right bg-white text-success"> 98% <i class="fa fa-arrow-up fa-1x"></i> </span> </p>
  									</div>
  								</div>
  							</div>
  							<div class="col-md-4">
  								<div class="info-box  bg-warning  text-white">
  									<div class="info-icon bg-warning-dark">
  										<i class="fa fa-comments fa-4x"></i>
  									</div>
  									<div class="info-details">
  										<h4>Comments   <span class="pull-right">2,987</span></h4>
  										<p>This Month <span class="badge pull-right bg-white text-warning"> 78% <i class="fa fa-arrow-up fa-1x"></i> </span> </p>
  									</div>
  								</div>
  							</div>
  						</div>

  						<div class="row hidden">
  							<div class="col-md-4">
  								<div class="info-box  bg-primary  text-white">
  									<div class="info-icon bg-primary-dark">
  										<i class="fa fa-refresh fa-4x"></i>
  									</div>
  									<div class="info-details">
  										<h4>Visits   <span class="pull-right">2,43,333</span></h4>
  										<p>Today <span class="badge pull-right bg-white text-primary"> 48% <i class="fa fa-arrow-down fa-1x"></i> </span> </p>
  									</div>
  								</div>
  							</div>
  							<div class="col-md-4">
  								<div class="info-box  bg-danger  text-white">
  									<div class="info-icon bg-danger-dark">
  										<i class="fa fa-rotate-left fa-4x"></i>
  									</div>
  									<div class="info-details">
  										<h4>Returns   <span class="pull-right">33</span></h4>
  										<p>This Year <span class="badge pull-right bg-white text-danger"> 28% <i class="fa fa-arrow-down fa-1x"></i> </span> </p>
  									</div>
  								</div>
  							</div>
  							<div class="col-md-4">
  								<div class="info-box  bg-info  text-white">
  									<div class="info-icon bg-primary-dark">
  										<i class="fa fa-dollar fa-4x"></i>
  									</div>
  									<div class="info-details">
  										<h4>Profit   <span class="pull-right">$98,233</span></h4>
  										<p>Projected <span class="badge pull-right bg-success text-white"> 48% <i class="fa fa-arrow-up fa-1x"></i> </span> </p>
  									</div>
  								</div>
  							</div>
  						</div>

  						<!-- Charts -->
  						<div class="row">
  							<!-- Discrete Bar Chart -->
  							<div class="col-md-6">
  								<div id="chart1">
  									<svg></svg>
  								</div>
  							</div>

  							<!-- Pie chart -->
  							<div class="col-md-6 holder" id="donuts-holder">
  								<div class="row">
  									<div class="col-md-6">
  										<div id="donut"></div>
  									</div>
  									<div class="col-md-6">
  										<div id="coloredDonut"></div>
  									</div>
  								</div>
  							</div>
  						</div>

  						<!-- Live Graph -->
  						<div class="row">
  							<div class="col-md-12">
  								<div class="panel">
  									<div class="panel-body">
  										<div class="row">
  											<div class="col-md-3">
  												<ul class="list-unstyled info-list">
  													<li>
  														<div class="info-box  bg-warning text-white">
  															<div class="info-icon bg-success-dark">
  																<i class="fa fa-rotate-right fa-spin fa-4x"></i>
  															</div>
  															<div class="info-details">
  																<h4>Active Users   <span class="pull-right" id="reloadStatus">33</span></h4>
  																<p>1500ms<span class="badge pull-right bg-white text-success"> 28% <i class="fa fa-arrow-down fa-1x"></i> </span> </p>
  															</div>
  														</div>
  													</li>
  													<li>
  														<div class="info-box  bg-primary  text-white">
  															<div class="info-icon bg-primary-dark">
  																<i class="fa fa-user fa-4x"></i>
  															</div>
  															<div class="info-details">
  																<h4>Total Users   <span class="pull-right">5033</span></h4>
  																<p>This Year <span class="badge pull-right bg-white text-primary"> 28% <i class="fa fa-arrow-down fa-1x"></i> </span> </p>
  															</div>
  														</div>
  													</li>
  													<li>
  														<div class="info-box  bg-info  text-white">
  															<div class="info-icon bg-primary-dark">
  																<i class="fa fa-dollar fa-4x"></i>
  															</div>
  															<div class="info-details">
  																<h4>Profit   <span class="pull-right">$98,233</span></h4>
  																<p>Projected <span class="badge pull-right bg-primary text-white"> 48% <i class="fa fa-arrow-up fa-1x"></i> </span> </p>
  															</div>
  														</div>
  													</li>
  													<li>
  														<div class="info-box  bg-danger  text-white">
  															<div class="info-icon bg-danger-dark">
  																<i class="fa fa-rotate-left fa-4x"></i>
  															</div>
  															<div class="info-details">
  																<h4>Returns   <span class="pull-right">33</span></h4>
  																<p>This Year <span class="badge pull-right bg-white text-danger"> 28% <i class="fa fa-arrow-down fa-1x"></i> </span> </p>
  															</div>
  														</div>
  													</li>
  												</ul>
  											</div>
  											<div class="col-md-9">
  												<div id="liveGraph"></div>
  											</div>
  										</div>

  									</div>
  								</div>
  							</div>
  						</div><!-- /.Live Graph -->


  						<div class="row">
  							<div class="col-md-6">
  								<div class="panel panel-cascade">
  									<div class="panel-heading">
  										<h3 class="panel-title">
  											<i class="fa fa-user"></i>
  											Users
  											<span class="pull-right">
  												<a  href="#" class="panel-minimize"><i class="fa fa-chevron-up"></i></a>
  												<a  href="#"  class="panel-settings"><i class="fa fa-cog"></i></a>
  												<a  href="#"  class="panel-close"><strong><i class="fa fa-times"></i></strong></a>
  											</span>
  										</h3>
  									</div>
  									<div class="panel-body nopadding">
  										<table class="table">
  											<thead>
  												<tr>
  													<th><i class="fa fa-caret-right"></i> User ID</th>
  													<th><i class="fa fa-caret-right"></i> Email</th>
  													<th><i class="fa fa-caret-right"></i> Status</th>
  												</tr>
  											</thead>
  											<tr>
  												<td>Vijay</td>
  												<td>me@example.com</td>
  												<td><label class="label label-success">Approved</label></td>
  											</tr>
  											<tr>
  												<td>Anusha</td>
  												<td>you@example.com</td>
  												<td><label class="label label-info">Pending</label></td>
  											</tr>
  											<tr>
  												<td>John Deo</td>
  												<td>John@example.com</td>
  												<td><label class="label label-warning">Suspended</label></td>
  											</tr>
  											<tr>
  												<td>Jane Deo</td>
  												<td>Jane@example.com</td>
  												<td><label class="label label-danger">Rejected</label></td>
  											</tr>
  											<tr>
  												<td>Jone Deo</td>
  												<td>Jone@example.com</td>
  												<td><label class="label label-danger">Deleted</label></td>
  											</tr>
  											<tr>
  												<td>Jane Deo</td>
  												<td>Jane@example.com</td>
  												<td><label class="label label-danger">Rejected</label></td>
  											</tr>
  											<tr>
  												<td>Jane Deo</td>
  												<td>Jane@example.com</td>
  												<td><label class="label label-danger">Rejected</label></td>
  											</tr>
  											<tr>
  												<td>Jane Deo</td>
  												<td>Jane@example.com</td>
  												<td><label class="label label-danger">Rejected</label></td>
  											</tr>
  										</table>
  										<div class="row visitors-list-summary text-center">
  											<div class="col-md-3 col-sm-3 col-xs-3 visitor-item ">
  												<h4>  Total Users </h4>
  												<label class="label label-big label-info"> <i class="fa fa-user text-white"></i> 2,38,575</label>
  											</div>
  											<div class="col-md-3 col-sm-3 col-xs-3 visitor-item ">
  												<h4>  This Month </h4>
  												<label class="label label-big label-success"> <i class="fa fa-calendar text-white"></i> 5,435</label>
  											</div>
  											<div class="col-md-3 col-sm-3 col-xs-3 visitor-item ">
  												<h4>  Pending </h4>
  												<label class="label label-big label-warning"> <i class="fa fa-bullhorn text-white"></i> 854</label>
  											</div>
  											<div class="col-md-3 col-sm-3 col-xs-3 visitor-item ">
  												<h4>  Deleted </h4>
  												<label class="label label-big label-danger"> <i class="fa fa-trash-o text-white"></i> 89</label>
  											</div>
  										</div>

  									</div>
  								</div>
  							</div>		
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
  												Unique Users <br />
  												<label class="label label-success">8,575</label>
  											</div>
  											<div class="col-md-4 col-sm-4 col-xs-4 visitor-item">
  												<i class="fa fa-eye fa-3x pull-left"></i>
  												Page Views <br />
  												<label class="label label-info">76,67,598</label>
  											</div>
  											<div class="col-md-4 col-sm-4 col-xs-4 visitor-item">
  												<i class="fa fa-comments fa-3x pull-left"></i>
  												Comments <br />
  												<label class="label label-warning">658</label>
  											</div>
  										</div>
  									</div>
  								</div>
  							</div>
  						</div>


  						<div class="row">
  							<div class="col-md-3">
  								<div class="panel ">
  									<div class="panel-heading bg-primary text-white">
  										<h3 class="panel-title">
  											<i class="fa fa-check-square-o"></i>
  											Todo List
  											<span class="pull-right ">
  												<a  href="#" class="panel-minimize text-white"><i class="fa fa-chevron-up"></i></a>
  												<a  href="#"  class="panel-close text-white"><strong><i class="fa fa-times"></i></strong></a>
  											</span>
  										</h3>
  									</div>
  									<div class="panel-body nopadding">
  										<ul class="list-group list-todo">
  											<li class="list-group-item finished">
  												<i class="fa fa-check-square-o finish  "></i>
  												<span>Cras justo odio Cras justo</span>
  												<label class="label label-success pull-right">Finished</label>
  											</li>
  											<li class="list-group-item">
  												<i class="fa fa-check-square-o finish fa-square-o "></i>
  												<span>Cras justo odio Cras justo</span>
  												<label class="label label-success pull-right">Today</label>
  											</li>
  											<li class="list-group-item">
  												<i class="fa fa-check-square-o finish fa-square-o "></i>
  												<span>Cras justo odio Cras justo</span>
  												<label class="label label-danger pull-right">Now</label>
  											</li>
  											<li class="list-group-item">
  												<i class="fa fa-check-square-o finish fa-square-o "></i>
  												<span>Cras justo odio Cras justo</span>
  												<label class="label label-info pull-right">2 days later</label>
  											</li>
  											<li class="list-group-item">
  												<i class="fa fa-check-square-o finish fa-square-o "></i>
  												<span>Cras justo odio Cras justo</span>
  												<label class="label label-warning pull-right">06:58 AM</label>
  											</li>
  											<li class="list-group-item">
  												<i class="fa fa-check-square-o finish fa-square-o "></i>
  												<span>Cras justo odio Cras justo</span>
  												<label class="label label-primary pull-right">Current</label>
  											</li>
  											<li class="list-group-item">
  												<i class="fa fa-check-square-o finish fa-square-o "></i>
  												<span>Cras justo odio Cras justo</span>
  												<label class="label bg-primary pull-right">Postponed</label>
  											</li>
  										</ul>
  									</div>
  								</div>
  							</div>
  							<div class="col-md-3">
  								<div class="panel panel-info">
  									<div class="panel-heading">
  										<h3 class="panel-title">
  											<i class="fa fa-bar-chart-o"></i>
  											Statistics
  											<span class="pull-right">
  												<a  href="#" class="panel-minimize"><i class="fa fa-chevron-up"></i></a>
  												<a  href="#"  class="panel-close"><strong><i class="fa fa-times"></i></strong></a>
  											</span>
  										</h3>
  									</div>
  									<div class="panel-body nopadding">
  										<div class="list-group list-statistics">
  											<a href="#" class="list-group-item">
  												Cras justo odio 
  												<span class="pull-right  mini-graph success"></span>
  											</a>
  											<a href="#" class="list-group-item">
  												Dapibus ac facilisis in
  												<span class=" pull-right   mini-graph info"></span>
  											</a>
  											<a href="#" class="list-group-item">
  												Morbi leo risus
  												<span class=" pull-right   mini-graph danger"></span>
  											</a>
  											<a href="#" class="list-group-item">
  												Porta ac consectetur ac
  												<span class=" pull-right   mini-graph pie"></span>
  											</a>
  											<a href="#" class="list-group-item">
  												Vestibulum at eros
  												<span class="badge bg-danger">20%</span>
  											</a>
  											<a href="#" class="list-group-item">
  												Vestibulum at eros
  												<span class="badge bg-success">90%</span>
  											</a>
  										</div>


  									</div>
  								</div>	
  							</div>
  							<div class="col-md-6">
  								<div class="panel text-primary panel-cascade">
  									<div class="panel-heading">
  										<h3 class="panel-title">
  											<i class="fa fa-clock-o"></i>
  											Recent
  											<ul id="myTab" class="nav nav-tabs pull-right">
  												<li class=""><a href="#home" data-toggle="tab">Users</a></li>
  												<li><a href="#profile" data-toggle="tab">Projects</a></li>
  												<li class="dropdown">
  													<a href="#" id="myTabDrop1" class="dropdown-toggle" data-toggle="dropdown">Comments <b class="caret"></b></a>
  													<ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop1">
  														<li><a href="#dropdown1" tabindex="-1" data-toggle="tab">Approved</a></li>
  														<li><a href="#dropdown2" tabindex="-1" data-toggle="tab">Pending</a></li>
  													</ul>
  												</li>
  											</ul>
  										</h3>
  									</div>
  									<div class="panel-body nopadding">
  										<div id="myTabContent" class="tab-content">
  											<div class="tab-pane fade " id="home">
  												<ul class="list-inline list-users">
  													<li><img src="images/profiles/fifteen.png" class="avatar" alt="" /> <h4>Vijay Kumar</h4> 
  														<div class="btn-group user-options">
  															<button type="button" class="btn btn-default dropdown-toggle text-success" data-toggle="dropdown">
  																Approved <i class="fa fa-chevron-circle-down"></i>
  															</button>
  															<ul class="dropdown-menu" role="menu">
  																<li><a href="#">Action</a></li>
  																<li><a href="#">Approve</a></li>
  																<li><a href="#">Reject</a></li>
  																<li><a href="#">Send Email</a></li>
  																<li class="divider"></li>
  																<li class="bg-danger"><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
  															</ul>
  														</div>
  													</li>
  													<li><img src="images/profiles/sixteen.png" class="avatar" alt="" /> <h4>Vijay Kumar</h4> 
  														<div class="btn-group user-options">
  															<button type="button" class="btn btn-default dropdown-toggle text-warning" data-toggle="dropdown">
  																Pending <i class="fa fa-chevron-circle-down"></i>
  															</button>
  															<ul class="dropdown-menu" role="menu">
  																<li><a href="#">Action</a></li>
  																<li><a href="#">Approve</a></li>
  																<li><a href="#">Reject</a></li>
  																<li><a href="#">Send Email</a></li>
  																<li class="divider"></li>
  																<li class="bg-danger"><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
  															</ul>
  														</div>
  													</li>
  													<li><img src="images/profiles/seventeen.png" class="avatar" alt="" /> <h4>Vijay Kumar</h4> 
  														<div class="btn-group user-options">
  															<button type="button" class="btn btn-default dropdown-toggle text-danger" data-toggle="dropdown">
  																Deleted <i class="fa fa-chevron-circle-down"></i>
  															</button>
  															<ul class="dropdown-menu" role="menu">
  																<li><a href="#">Action</a></li>
  																<li><a href="#">Approve</a></li>
  																<li><a href="#">Reject</a></li>
  																<li><a href="#">Send Email</a></li>
  																<li class="divider"></li>
  																<li class="bg-danger"><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
  															</ul>
  														</div>
  													</li>
  													<li><img src="images/profiles/eighteen.png" class="avatar" alt="" /> <h4>Vijay Kumar</h4> 
  														<div class="btn-group user-options">
  															<button type="button" class="btn btn-default dropdown-toggle text-warning" data-toggle="dropdown">
  																Pending <i class="fa fa-chevron-circle-down"></i>
  															</button>
  															<ul class="dropdown-menu" role="menu">
  																<li><a href="#">Action</a></li>
  																<li><a href="#">Approve</a></li>
  																<li><a href="#">Reject</a></li>
  																<li><a href="#">Send Email</a></li>
  																<li class="divider"></li>
  																<li class="bg-danger"><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
  															</ul>
  														</div>
  													</li>
  													<li><img src="images/profiles/nineteen.png" class="avatar" alt="" /> <h4>Vijay Kumar</h4> 
  														<div class="btn-group user-options">
  															<button type="button" class="btn btn-default dropdown-toggle text-success" data-toggle="dropdown">
  																Approved <i class="fa fa-chevron-circle-down"></i>
  															</button>
  															<ul class="dropdown-menu" role="menu">
  																<li><a href="#">Action</a></li>
  																<li><a href="#">Approve</a></li>
  																<li><a href="#">Reject</a></li>
  																<li><a href="#">Send Email</a></li>
  																<li class="divider"></li>
  																<li class="bg-danger"><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
  															</ul>
  														</div>
  													</li>
  													<li><img src="images/profiles/twenty.png" class="avatar" alt="" /> <h4>Vijay Kumar</h4> 
  														<div class="btn-group user-options">
  															<button type="button" class="btn btn-default dropdown-toggle " data-toggle="dropdown">
  																Action <i class="fa fa-chevron-circle-down"></i>
  															</button>
  															<ul class="dropdown-menu" role="menu">
  																<li><a href="#">Action</a></li>
  																<li><a href="#">Approve</a></li>
  																<li><a href="#">Reject</a></li>
  																<li><a href="#">Send Email</a></li>
  																<li class="divider"></li>
  																<li class="bg-danger"><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
  															</ul>
  														</div>
  													</li>
  													<li><img src="images/profiles/twentyOne.png" class="avatar" alt="" /> <h4>Vijay Kumar</h4> 
  														<div class="btn-group user-options">
  															<button type="button" class="btn btn-default dropdown-toggle text-danger" data-toggle="dropdown">
  																Rejected <i class="fa fa-chevron-circle-down"></i>
  															</button>
  															<ul class="dropdown-menu" role="menu">
  																<li><a href="#">Action</a></li>
  																<li><a href="#">Approve</a></li>
  																<li><a href="#">Reject</a></li>
  																<li><a href="#">Send Email</a></li>
  																<li class="divider"></li>
  																<li class="bg-danger"><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
  															</ul>
  														</div>
  													</li>
  													<li><img src="images/profiles/twentyTwo.png" class="avatar" alt="" /> <h4>Vijay Kumar</h4> 
  														<div class="btn-group user-options">
  															<button type="button" class="btn btn-default dropdown-toggle " data-toggle="dropdown">
  																Action <i class="fa fa-chevron-circle-down"></i>
  															</button>
  															<ul class="dropdown-menu" role="menu">
  																<li><a href="#">Action</a></li>
  																<li><a href="#">Approve</a></li>
  																<li><a href="#">Reject</a></li>
  																<li><a href="#">Send Email</a></li>
  																<li class="divider"></li>
  																<li class="bg-danger"><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
  															</ul>
  														</div>
  													</li>
  													<li><img src="images/profiles/twentyThree.png" class="avatar" alt="" /> <h4>Vijay Kumar</h4> 
  														<div class="btn-group user-options">
  															<button type="button" class="btn btn-default dropdown-toggle text-info" data-toggle="dropdown">
  																Email Sent <i class="fa fa-chevron-circle-down"></i>
  															</button>
  															<ul class="dropdown-menu" role="menu">
  																<li><a href="#">Action</a></li>
  																<li><a href="#">Approve</a></li>
  																<li><a href="#">Reject</a></li>
  																<li><a href="#">Send Email</a></li>
  																<li class="divider"></li>
  																<li class="bg-danger"><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
  															</ul>
  														</div>
  													</li>

  												</ul>
  											</div>
  											<div class="tab-pane fade active in" id="profile">
  												<div class="list-group list-projects">
  													<a href="#" class="list-group-item">
  														<img  src="images/profiles/twentyFour.png" class="project-img pull-left" alt="" />
  														Cras justo odio 
  														<span class="badge bg-success">80%</span>
  														<div class="progress progress-mini">
  															<div class="progress-bar progress-bar-success " role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 80%;">
  																<span class="sr-only">80% Complete</span>
  															</div>
  														</div>
  													</a>
  													<a href="#" class="list-group-item">
  														<img  src="images/profiles/one.png" class="project-img pull-left" alt="" />
  														Dapibus ac facilisis in
  														<span class="badge bg-primary">60%</span>
  														<div class="progress progress-mini">
  															<div class="progress-bar progress-bar-primary " role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
  																<span class="sr-only">60% Complete</span>
  															</div>
  														</div>

  													</a>
  													<a href="#" class="list-group-item">
  														<img  src="images/profiles/two.png" class="project-img pull-left" alt="" />
  														Morbi leo risus
  														<span class="badge bg-info">50%</span>
  														<div class="progress progress-mini">
  															<div class="progress-bar progress-bar-info " role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">
  																<span class="sr-only">50% Complete</span>
  															</div>
  														</div>

  													</a>
  													<a href="#" class="list-group-item">
  														<img  src="images/profiles/three.png" class="project-img pull-left" alt="" />
  														Porta ac consectetur ac
  														<span class="badge bg-warning">30%</span>
  														<div class="progress progress-mini">
  															<div class="progress-bar progress-bar-warning " role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
  																<span class="sr-only">30% Complete</span>
  															</div>
  														</div>

  													</a>
  													<a href="#" class="list-group-item">
  														<img  src="images/profiles/four.png" class="project-img pull-left" alt="" />
  														Vestibulum at eros
  														<span class="badge bg-danger">20%</span>
  														<div class="progress progress-mini">
  															<div class="progress-bar progress-bar-danger " role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 20%;">
  																<span class="sr-only">20% Complete</span>
  															</div>
  														</div>

  													</a>
  												</div>
  											</div>
  											<div class="tab-pane fade " id="dropdown1">
  												<div class="list-group list-comments">
  													<a href="#" class="list-group-item">
  														<img  src="images/profiles/five.png" class="comment-img pull-left" alt="" />
  														<h4 class="list-group-item-heading">John Deo <span class="label label-success pull-right">Approved</span></h4>
  														<p class="list-group-item-text"> E topic chala bagundhi, nenu andharini chudamani chepthunnanu</p>
  													</a>
  													<a href="#" class="list-group-item">
  														<img  src="images/profiles/six.png" class="comment-img pull-left" alt="" />
  														<h4 class="list-group-item-heading">John Deo <span class="label label-success pull-right">Approved</span></h4>
  														<p class="list-group-item-text"> E topic chala bagundhi, nenu andharini chudamani chepthunnanu</p>
  													</a>
  													<a href="#" class="list-group-item">
  														<img  src="images/profiles/seven.png" class="comment-img pull-left" alt="" />
  														<h4 class="list-group-item-heading">John Deo <span class="label label-success pull-right">Approved</span></h4>
  														<p class="list-group-item-text"> E topic chala bagundhi, nenu andharini chudamani chepthunnanu</p>
  													</a>
  													<a href="#" class="list-group-item">
  														<img  src="images/profiles/eight.png" class="comment-img pull-left" alt="" />
  														<h4 class="list-group-item-heading">John Deo <span class="label label-success pull-right">Approved</span></h4>
  														<p class="list-group-item-text"> E topic chala bagundhi, nenu andharini chudamani chepthunnanu</p>
  													</a>
  													<a href="#" class="list-group-item">
  														<img  src="images/profiles/nine.png" class="comment-img pull-left" alt="" />
  														<h4 class="list-group-item-heading">John Deo <span class="label label-success pull-right">Approved</span></h4>
  														<p class="list-group-item-text"> E topic chala bagundhi, nenu andharini chudamani chepthunnanu</p>
  													</a>
  												</div>
  											</div>
  											<div class="tab-pane fade" id="dropdown2">
  												<div class="list-group list-comments">
  													<a href="#" class="list-group-item">
  														<img  src="images/profiles/ten.png" class="comment-img pull-left" alt="" />
  														<h4 class="list-group-item-heading">John Deo <span class="label label-warning pull-right">Pending</span></h4>
  														<p class="list-group-item-text"> E topic chala bagundhi, nenu andharini chudamani chepthunnanu</p>
  													</a>
  													<a href="#" class="list-group-item">
  														<img  src="images/profiles/eleven.png" class="comment-img pull-left" alt="" />
  														<h4 class="list-group-item-heading">John Deo <span class="label label-warning pull-right">Pending</span></h4>
  														<p class="list-group-item-text"> E topic chala bagundhi, nenu andharini chudamani chepthunnanu</p>
  													</a>
  													<a href="#" class="list-group-item">
  														<img  src="images/profiles/twelve.png" class="comment-img pull-left" alt="" />
  														<h4 class="list-group-item-heading">John Deo <span class="label label-warning pull-right">Pending</span></h4>
  														<p class="list-group-item-text"> E topic chala bagundhi, nenu andharini chudamani chepthunnanu</p>
  													</a>
  													<a href="#" class="list-group-item">
  														<img  src="images/profiles/thirteen.png" class="comment-img pull-left" alt="" />
  														<h4 class="list-group-item-heading">John Deo <span class="label label-warning pull-right">Pending</span></h4>
  														<p class="list-group-item-text"> E topic chala bagundhi, nenu andharini chudamani chepthunnanu</p>
  													</a>
  													<a href="#" class="list-group-item">
  														<img  src="images/profiles/fourteen.png" class="comment-img pull-left" alt="" />
  														<h4 class="list-group-item-heading">John Deo <span class="label label-warning pull-right">Pending</span></h4>
  														<p class="list-group-item-text"> E topic chala bagundhi, nenu andharini chudamani chepthunnanu</p>
  													</a>
  												</div>
  											</div>
  										</div>
  									</div>
  								</div>

  							</div>
  						</div>

  	

<?php include('partials/footer.php'); ?>
