<?php 
//* Student Area */
/* Doubleakins*/
/* 08063777394*/
/* 19062014*/
/* redirected to when student logs in */

$page_title = "View Lessons";
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
  									<li class="active">Lessons</li>
  									<li class="active">View Lessons</li>
  								</ul>


  								<h3 class="page-header animated bounceInRight show-info" ><i class="fa fa-spin fa-spinner"></i> Lessons <i class="fa fa-search-plus animated bounceInDown show-info"></i> </h3>

  								<blockquote class="page-information hidden">
  									<p>
  										<b>View Lessons Page</b> View Lessons Page.
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
               View Lessons
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
										$success_msg = 'Lessons removed successfully';
									}
						
								if (isset($_GET['error'])) 
									{
										$err_msg = 'Ooops: The Lessons was not removed';
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
				$q1 = "SELECT lesson.lesson_id, lesson.lesson, topic.topic, subject.subject, organisation.organisation, language.language 
				FROM `lesson` 
				JOIN  `topic` ON topic.topic_id = lesson.topic_id
				JOIN  `subject` ON subject.subject_id = topic.subject_id
				JOIN  `organisation` ON organisation.organisation_id = subject.organisation_id
				JOIN  `language` ON organisation.language_id = language.language_id
				ORDER BY  `lesson`.`lesson_id` ASC";
				$r1 = @mysqli_query ($conn, $q1);
         ?>
                  
         <table  class="table table-bordered table-hover table-striped display" id="example" >
           <thead>
            <tr>
             <th>Lesson</th>
             <th>Topic</th>
             <th>Subject</th>
             <th>Organisation</th>
             <th>Language</th>
             <th>Operations</th>
             <th>Edit</th>
             <th>Delete</th>
           </tr>
         </thead>
         <tbody>
         	
         	<?php // iterate the table rows <tr>
				while ($row1 = mysqli_fetch_array($r1, MYSQLI_ASSOC)) {
				$id = $row1['lesson_id']; 
			?>
          <tr class="odd gradeX">
           <td><?php echo ucwords($row1['lesson']); ?></td>
           <td><?php echo ucwords($row1['topic']); ?></td>
           <td><?php echo ucwords($row1['subject']); ?></td>
           <td><?php echo $row1['organisation']; ?></td>
            <td><?php echo $row1['language']; ?></td>
            
            <td>
            	<div class="btn-group">
								<button type="button" class="btn btn-warning btn-animate-demo">Operations</button>
								<button type="button" class="btn btn-warning dropdown-toggle btn-animate-demo" data-toggle="dropdown">
									<span class="caret"></span>
									<span class="sr-only">Toggle Dropdown</span>
								</button>
								<ul class="dropdown-menu" role="menu">
									<li><a href="add_to_dvd.php?id=<?php echo urlencode($row1['lesson_id']); ?>">Add lesson to DVD</a></li>
									<li><a href="lesson_note.php?id=<?php echo urlencode($row1['lesson_id']); ?>">Add Lesson Note</a></li>
									<li class="divider"></li>
								</ul>
							</div>
			</td>
            
			
			<td class="center"> <a href="<?php echo $path; ?>edit_lesson.php?id=<?php echo urlencode($row1['lesson_id']); ?>"
								class="btn btn-info btn-animate-demo" title="Edit"><i class="fa fa-pencil-square-o"></i> Edit </a>
			</td>
			
            <td class="center">	<a href="<?php echo $path; ?>lessondelete.php?id=<?php echo urlencode($row1['lesson_id']); ?>" 
								onclick="return confirm('Are you sure you want to delete this lesson ?')" 
								class="btn btn-danger btn-animate-demo" title="Delete"><i class="fa fa-times"></i> Delete </a>
			</td>
          </tr>
          
          <?php } // end of while loop ?>
          
           </tbody>
           <tfoot>
            <tr>
             <th>Lesson</th>
             <th>Topic</th>
             <th>Subject</th>
             <th>Organisation</th>
             <th>Language</th>
             <th>Operations</th>
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

