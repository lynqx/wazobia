<?php 
/* Admin Area */
/* Doubleakins*/
/* 08063777394*/
/* 01082014 */


$page_title = "View Enquiry List";
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
  									<li class="active">Contact</li>
  									<li class="active">View Enquiries</li>
  								</ul>


  								<h3 class="page-header animated bounceInRight show-info" ><i class="fa fa-spin fa-spinner"></i> View Enquiries <i class="fa fa-search-plus animated bounceInDown show-info"></i> </h3>

  								<blockquote class="page-information hidden">
  									<p>
  										<b>View Enquiries Page</b> View Enquiries Page.
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
               View Enquiries
               <span class="pull-right">
                
              <a href="#" class="panel-minimize"><i class="fa fa-chevron-up"></i></a>
            </span>
          </h3>
        </div>
        <div class="panel-body">
 

         <?php // code to select the organisations for view
         // Make the query to view table details:
				$q1 = "SELECT *, UNIX_TIMESTAMP() - contact.date AS TimeSpent FROM `contact`
						ORDER BY  `contact`.`contact_id` ASC";
				$r1 = @mysqli_query ($conn, $q1);
         ?>
                  
         <table  class="table table-bordered table-hover table-striped display" id="example" >
           <thead>
            <tr>
             <th width="150">Name</th>
             <th>Email</th>
             <th>Type</th>
             <th width="500">Message</th>
              <th>Date</th>
           </tr>
         </thead>
         <tbody>
         	
         	<?php // iterate the table rows <tr>
				while ($row1 = mysqli_fetch_array($r1, MYSQLI_ASSOC)) {
			?>
          <tr class="odd gradeX">
           <td><?php echo ucwords($row1['name']); ?></td>
           <td><?php echo $row1['email']; ?></td>
           <td><?php echo $row1['type']; ?></td>
           <td><?php echo $row1['message']; ?></td>
           
           <td> <?php
           echo '<span class="label label-big label-info" style="font-size:12px">';
			$days = floor($row1['TimeSpent'] / (60 * 60 * 24));
			$remainder = $row1['TimeSpent'] % (60 * 60 * 24);
			$hours = floor($remainder / (60 * 60));
			$remainder = $remainder % (60 * 60);
			$minutes = floor($remainder / 60);
			$seconds = $remainder % 60;
	if($days > 0)
			echo date('F d Y', $row1['date']);
			elseif($days == 0 && $hours == 0 && $minutes == 0)
			echo "few seconds ago";		
			elseif($days == 0 && $hours == 0)
			echo $minutes.' minutes ago';
			elseif($days == 0)
			echo $hours.' hours' . " " . $minutes.' minutes ago';
			echo '</font><br /></span>';
			?>
			</td>
          </tr>
          
          <?php } // end of while loop ?>
          
           </tbody>
           <tfoot>
            <tr>
             <th>Name</th>
             <th>Email</th>
             <th>Type</th>
             <th>Message</th>
             <th>Date</th>
           </tr>	
         </tfoot>
       </table>
     </div> <!-- /panel body -->
   </div>
 </div> <!-- /col-md-12 -->
</div><!-- /.View Organisationzs-->

<?php include('partials/footer.php'); ?>

