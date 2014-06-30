<?php 
//* Student Area */
/* Doubleakins*/
/* 08063777394*/
/* 19062014*/
/* redirected to when student logs in */

$page_title = "View Subjects";
$path = "";
$inc_path = $path."partials/";
include($inc_path . 'header.php'); ?> 

  						<!-- /header -->
  						<div class="row">
  							<div class="col-mod-12">

  								<ul class="breadcrumb">
  									<li><a href="index.php">Admin</a></li>
  									<li class="active">Subjects</li>
  									<li class="active">View Subjects</li>
  								</ul>


  								<h3 class="page-header animated bounceInRight show-info" ><i class="fa fa-spin fa-spinner"></i> Subjects <i class="fa fa-search-plus animated bounceInDown show-info"></i> </h3>

  								<blockquote class="page-information hidden">
  									<p>
  										<b>View Subjects  Page</b> View Subjects Page.
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
               View Subjects
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
										$success_msg = 'Subjects removed successfully';
									}
						
								if (isset($_GET['error'])) 
									{
										$err_msg = 'Ooops: The Subjects was not removed';
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
				$q1 = "SELECT subject.subject_id, subject.subject_codes, subject.subject, subject.organisation_id, language.language, organisation.organisation 
				FROM `subject` 
				JOIN  `organisation` ON organisation.organisation_id = subject.organisation_id
				JOIN  `language` ON organisation.language_id = language.language_id
				ORDER BY  `subject`.`subject_id` ASC";
				$r1 = @mysqli_query ($conn, $q1);
         ?>
                  
         <table  class="table table-bordered table-hover table-striped display" id="example" >
           <thead>
            <tr>
             <th>Subject</th>
             <th>Subject Code</th>
             <th>Organisation</th>
             <th>Language</th>
             <th>Add Topics</th>
             <th>Edit</th>
             <th>Delete</th>
           </tr>
         </thead>
         <tbody>
         	
         	<?php // iterate the table rows <tr>
				while ($row1 = mysqli_fetch_array($r1, MYSQLI_ASSOC)) {
				$id = $row1['organisation_id']; 
			?>
          <tr class="odd gradeX">
           <td><?php echo ucwords($row1['subject']); ?></td>
           <td><?php echo $row1['subject_codes']; ?></td>
           <td><?php echo $row1['organisation']; ?></td>
            <td><?php echo $row1['language']; ?></td>
            
            <td class="center"> <a href="<?php echo $path; ?>topics.php?subj=<?php echo urlencode($row1['subject_id']); ?>"
								class="btn btn-info btn-animate-demo" title="Add Topics"><i class="fa fa-plus-square-o"></i> Add Topics </a>
			</td>
			
			<td class="center"> <a href="<?php echo $path; ?>edit_subjects.php?id=<?php echo urlencode($row1['subject_id']); ?>"
								class="btn btn-info btn-animate-demo" title="Edit"><i class="fa fa-pencil-square-o"></i> Edit </a>
			</td>
			
            <td class="center">	<a href="<?php echo $path; ?>subjdelete.php?id=<?php echo urlencode($row1['subject_id']); ?>" 
								onclick="return confirm('Are you sure you want to delete this subject ?')" 
								class="btn btn-danger btn-animate-demo" title="Delete"><i class="fa fa-times"></i> Delete </a>
			</td>
          </tr>
          
          <?php } // end of while loop ?>
          
           </tbody>
           <tfoot>
            <tr>
             <th>Subject</th>
             <th>Subject Code</th>
             <th>Organisation</th>
             <th>Language</th>
             <th>Add Topics</th>
             <th>Edit</th>
             <th>Delete</th>
           </tr>	
         </tfoot>
       </table>
     </div> <!-- /panel body -->
   </div>
 </div> <!-- /col-md-12 -->
</div><!-- /.View Organisationzs-->

<?php include('partials/footer.php'); ?>

