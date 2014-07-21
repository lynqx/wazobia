<?php 
//* Student Area */
/* Doubleakins*/
/* 08063777394*/
/* 19062014*/
/* redirected to when student logs in */

$page_title = "View Students";
$path = "";
$inc_path = $path."partials/";
include($inc_path . 'header.php'); 


if (isset($_SESSION['work_id']) && $_SESSION['roles'] != 'administrator') {
	redirect_to('error.php');
}
?> 

<style>
	<!--
	#fixedmodal
	{
		display: none;
		position: fixed;
		bottom: 0px;
	}
	
	//-->
</style>
  						<!-- /header -->
  						<div class="row">
  							<div class="col-mod-12">

  								<ul class="breadcrumb">
  									<li><a href="index.php">Admin</a></li>
  									<li class="active"><a href="view_students.php.php">View Students</a></li>
  								</ul>


  								<h3 class="page-header"> View Students <i class="fa fa-info-circle animated bounceInDown show-info"></i> </h3>

  								<blockquote class="page-information hidden">
  									<p>
  										<b>View Students Page</b> to view all students that have registered on the portal.
  									</p>
  								</blockquote>

  							</div>
  						</div>

  						<!-- view students Panel -->
  						<div class="row">
  							<div class="col-md-12">
  								<div class="panel panel-cascade">
  									<div class="panel-heading">
  										<h3 class="panel-title">
  											<i class="fa fa-user"></i>
  											All Students
  											<span class="pull-right">
  												<a  href="#" class="panel-minimize"><i class="fa fa-chevron-up"></i></a>
  											</span>
  										</h3>
  									</div>
  									<div class="panel-body">
  										<?php 
  										$q4 = "SELECT * FROM student_register ORDER BY student_id DESC";
										$r4 = mysqli_query($conn, $q4);
  										?>
         					<table class="table table-bordered table-hover table-striped display" id="example" >
  											<thead>
  												<tr>
  													<th><i class="fa fa-caret-right"></i> Students</th>
  													<th><i class="fa fa-caret-right"></i> Email</th>
  													<th><i class="fa fa-caret-right"></i> Date Registered</th>
  												</tr>
  											</thead>
  											<tbody>
  											<?php
  											while ($row4 = mysqli_fetch_array($r4, MYSQLI_ASSOC) ) {
  											?>
  											<tr>
  												<!--<td><a href="student_details.php?id=<?php //echo $row4['student_id']; ?>"><?php //echo $row4['first_name'] . '  ' . $row4['last_name']; ?></a></td>-->
												
												<td><a href="#" onclick="showInfo('fixedmodal', 'modalcontent', '<?php echo $row4['student_id']; ?>')"><?php echo $row4['first_name'] . '  ' . $row4['last_name']; ?></a></td>
												
  												<td><?php echo $row4['email']; ?> </td>
  												<td><label class="label label-success"><?php echo $row4['time_register']; ?> </label></td>
  											</tr>
  											
  											
          
  											<?php } ?>
  										</tbody>
  										
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
  										</table>
  									</div>

  								</div>
  							</div>	
 							
  						</div>
  						
  						
  						<!-- Modal -->
         <!-- <div class="modal fade"  role="dialog" aria-hidden="true"> -->
		<div id="fixedmodal">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="closeModal('fixedmodal')"><i class="fa fa-times"></i> </button>
                  <h4 class="modal-title" id="myModalLabel">Student's Details</h4>
                </div>
                <div class="modal-body">  
                  <!--------------------------------------------------->
				  <div id="modalcontent">
				  
				  </div>
				  <!--------------------------------------------------->
                </div>
                <div class="modal-footer">
                  
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->
  						
  		
<?php include('partials/footer.php'); ?>

<script>

	function showInfo(modal_div, content_div, request_id)
	{
		//display div
		var md = document.getElementById(modal_div);
		md.style.display = 'block';
		
		//verify xmlhttp object
		var xmlhttp;
		if (window.XMLHttpRequest)
		{	// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		}
		else
		{	// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		
		//do xmlhttp request
		xmlhttp.onreadystatechange=function()
		{
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				document.getElementById(content_div).innerHTML=xmlhttp.responseText;
			}
		}
		
		//send request
		xmlhttp.open("GET","ajax/student_details.php?id="+request_id,true);
		xmlhttp.send();
	}
	
	function closeModal(modal_div)
	{
		var md = document.getElementById(modal_div);
		if(md.style.display=='block')
		md.style.display='none';
	}

</script>