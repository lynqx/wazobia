<?php 
//* Student Area */
/* Doubleakins*/
/* 08063777394*/
/* 19062014*/
/* redirected to when student logs in */

$page_title = "Chat Room";
$path = "";
$inc_path = $path."partials/";
include($inc_path . 'header.php'); ?> 

  						<!-- /header -->
  						<div class="row">
  							<div class="col-mod-12">

  								<ul class="breadcrumb">
  									<li><a href="index.php">Library</a></li>
  									<li class="active"><a href="language.php">Chat Room</a></li>
  								</ul>


  								<h3 class="page-header"> Chat Room <i class="fa fa-info-circle animated bounceInDown show-info"></i> </h3>

  								<blockquote class="page-information hidden">
  									<p>
  										<b>Chat Room</b> Chat Room.
  									</p>
  								</blockquote>

  							</div>
  						</div>

  					<!-- Demo Panel -->
  						<div class="row chat-box">
  							<div class="col-md-2">
  								<div class="panel panel-cascade contacts-box">
  									<div class="panel-heading">
  										<h5 class="panel-title "> <i class="fa fa-user"></i> Rooms</h5>
  									</div>
  									<div class="panel-body nopadding">
  										<div class="list-group contact">
  											<?php
  											$q = "SELECT * FROM subject";
											$r = mysqli_query($conn, $q);
											while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
												?>
											<a href="javascript:void()" class="list-group-item" onclick="window.open('chat/index.php?id=<?php echo $row['subject_id']; ?>','_blank','width=600, height=500, top=0, left=0, fullscreen=0, location=0, menubar=0, resizable=1, scrollbars=1, status=0, titlebar=1, toolbar=0');">
  												<img src="images/profiles/one.png" class="chat-user-avatar" alt="">
  												<?php echo $row['subject']; ?>
  												<i class="fa fa-circle"></i>
  											</a>
											<?php	
											}
											?>
  										</div>
  									</div>
  								</div>

  							</div>
  							<div class="col-md-10">
  								<div class="panel panel-cascade recipient-box">
  									<div class="panel-heading">
  										<h3 class="panel-title ">
  											<span class="recipient">
  												<img src="images/profile50x50.png" class="chat-user-avatar" alt="">
  												Vijay kum ar
  												<i class="fa fa-circle"></i>
  											</span>
  											<div class="btn-group pull-right">
  												<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
  													Options <span class="caret"></span>
  												</button>
  												<ul class="dropdown-menu options" role="menu">
  													<li><a href="#">Send Private Message</a></li>
  													<li><a href="#">Send Message</a></li>
  													<li><a href="#">Add to Group</a></li>
  													<li class="divider"></li>
  													<li><a href="#">Block this User</a></li>
  												</ul>
  											</div>
  										</h3>
  									</div>

  									<div class="panel-body nopadding">
  										<div class="list-group conversation">
  											<a class="list-group-item">
  												<img src="images/profile50x50.png" class="chat-user-avatar" alt="">
  												<span class="username" >Vijay kumar <span class="time">06:58</span> </span>
  												<p>Lorem Ipsum is a dummy text to represetn any webcontent which wants to unrelated to the user or reader but can be understood that it is unrelated data</p>

  											</a>
  											<a class="list-group-item">
  												<img src="images/profile50x50.png" class="chat-user-avatar" alt="">
  												<span class="username" >Vijay kumar <span class="time">06:58</span> </span>
  												<p>Lorem Ipsum is a dummy text to represetn any webcontent which wants to unrelated to the user or reader but can be understood that it is unrelated data</p>
  											</a>
  										</div>
  										<div class="input-group">
  											<input type="text" class="form-control write-message" id="write-message" placeholder="Type something here and hit enter" >
  											<span class="input-group-btn">
  												<button class="btn text-white bg-primary" type="button" id="send-message">Send</button>
  											</span>

  										</div><!-- /input-group -->

  									</div>
  								</div>
  							</div>
  						</div>



<?php include('partials/footer.php'); ?>

