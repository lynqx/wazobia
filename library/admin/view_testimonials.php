<?php 
//* Student Area */
/* Doubleakins*/
/* 08063777394*/
/* 19062014*/
/* redirected to when student logs in */

$page_title = "View Testimonials";
$path = "";
$inc_path = $path."partials/";
include($inc_path . 'header.php'); 

if (isset($_SESSION['work_id']) && $_SESSION['roles'] != 'administrator') {
	redirect_to('error.php');
}

?> 

  						<!-- /header -->
  						<div class="row">
  							<div class="col-mod-12">

  								<ul class="breadcrumb">
  									<li><a href="index.php">Admin</a></li>
  									<li class="active">View Testimonials</li>
  								</ul>


  								<h3 class="page-header animated bounceInRight show-info" ><i class="fa fa-spin fa-spinner"></i> View Testimonials <i class="fa fa-search-plus animated bounceInDown show-info"></i> </h3>

  								<blockquote class="page-information hidden">
  									<p>
  										<b>View Testimonials Page</b> View Testimonials Page.
  									</p>
  								</blockquote>

  							</div>
  						</div>

  						<!-- View Organisationzs -->
  						 <!-- Most visited and Traffic sources Graph -->
          <div class="row">
           <div class="col-md-12">
            <div class="panel">
             <div class="panel-heading text-primary">
              <h3 class="panel-title bounceInRight">
               <i class="fa fa-search-plus bounceInRight"></i>
               View Testimonials
               <span class="pull-right">
                
              <a href="#" class="panel-minimize"><i class="fa fa-chevron-up"></i></a>
            </span>
          </h3>
        </div>
        <div class="panel-body">
        	
        	<?php 
        	
        	// block to output success message	
								if (isset($_GET['success'])) 
									{
										$success_msg = 'Testimonials removed successfully';
									}
						
								if (isset($_GET['error'])) 
									{
										$err_msg = 'Ooops: The Testimonials was not removed';
									}
									
									if (isset($_GET['upsuccess'])) 
									{
										$success_msg = 'Action performed successfully';
									}
						
								if (isset($_GET['uperror'])) 
									{
										$err_msg = 'Ooops: Action could not be performed due to system error';
									}
									
									
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

         <?php // code to select the organisations for view
         // Make the query to view table details:
				$q1 = "SELECT *	FROM `testimonials`
				ORDER BY  `testimonials`.`id` DESC";
				$r1 = @mysqli_query ($conn, $q1);
         ?>
                  
         <table  class="table table-bordered table-hover table-striped display" id="example" >
           <thead>
            <tr>
             <th>Full Name</th>
             <th>Location</th>
             <th>Testimonials</th>
             <th>Status</th>
             <th>Posted Date</th>
             <th>View</th>
             <th>Delete</th>
           </tr>
         </thead>
         <tbody>
         	
         	<?php // iterate the table rows <tr>
				while ($row1 = mysqli_fetch_array($r1, MYSQLI_ASSOC)) {
			?>
          <tr class="odd gradeX">
           <td><?php echo ucwords($row1['fullname']); ?></td>
           <td><?php echo $row1['location']; ?></td>
           <td width="450">
           	<?php
		echo $message= $row1['content']; 
			 ?>
		 </td>
            <td><?php if($row1['status'] == 1) echo 'Active'; else echo'Blocked'; ?></td>
            <td><?php echo $row1['date']; ?></td>
 			
			<td class="center"> 
				
				<a href="<?php echo $path; ?>update_testimonials.php?id=<?php echo urlencode($row1['id']); ?>"
								class="btn btn-<?php if ($row1['status'] == 1) echo "danger"; else echo "info";?> btn-animate-demo" title="View"><i class="fa fa-<?php if ($row1['status'] == 1) echo "times-circle-o"; else echo "check";?>"></i> <?php if ($row1['status'] == 1) { echo "Block"; } else { echo "Approve"; }?></a>
			</td>
			
            <td class="center">	<a href="<?php echo $path; ?>testimonials_delete.php?id=<?php echo urlencode($row1['id']); ?>" 
								onclick="return confirm('Are you sure you want to delete this testimonials ?')" 
								class="btn btn-danger btn-animate-demo" title="Delete"><i class="fa fa-times"></i> Delete </a>
			</td>
          </tr>
          
          <?php } // end of while loop ?>
          
           </tbody>
           <tfoot>
            <tr>
             <th>Full Name</th>
             <th>Location</th>
             <th>Testimonials</th>
             <th>Status</th>
             <th>Posted Date</th>
             <th>View</th>
             <th>Delete</th>
           </tr>	
         </tfoot>
       </table>
     </div> <!-- /panel body -->
   </div>
 </div> <!-- /col-md-12 -->
</div><!-- /.View Organisationzs-->

<?php include('partials/footer.php'); ?>

