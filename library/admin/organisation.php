<?php 
//* Student Area */
/* Doubleakins*/
/* 08063777394*/
/* 19062014*/
/* redirected to when student logs in */

$page_title = "Add Organisation";
$path = "";
$inc_path = $path."partials/";
include($inc_path . 'header.php'); ?> 

  						<!-- /header -->
  						<div class="row">
  							<div class="col-mod-12">

  								<ul class="breadcrumb">
  									<li><a href="index.php">Home</a></li>
  									<li class="active"><a href="language.php">Organization</a></li>
  								</ul>


  								<h3 class="page-header animated bounceInRight show-info"> Organization <i class="fa fa-group animated bounceInDown show-info"></i> </h3>

  								<blockquote class="page-information hidden">
  									<p>
  										<b>Add Organization Page</b> To add a new organization.
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
               View Organizations
               <span class="pull-right">
                
              <a href="#" class="panel-minimize"><i class="fa fa-chevron-up"></i></a>
            </span>
          </h3>
        </div>
        <div class="panel-body">
          <div class="alert alert-info alert-dismissable">
           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
           Working search box, pagination ,ascending and descending buttons
         </div>
         <?php // code to select the organisations for view
         // Make the query to view table details:
				$q1 = "SELECT organisation.organisation_id, language.language, organisation.organisation FROM `organisation` 
				JOIN  `language` ON organisation.language_id = language.language_id
				ORDER BY  `organisation`.`language_id` ASC";
				$r1 = @mysqli_query ($conn, $q1);
         ?>
         
         <table  class="table table-bordered table-hover table-striped display" id="example" >
           <thead>
            <tr>
             <th>Organisation</th>
             <th>Language</th>
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
           <td><?php echo $row1['organisation']; ?></td>
            <td><?php echo $row1['language']; ?></td>
            <td class="center"> Edit</td>
            <td class="center"><span class="badge bg-warning">Delete</span></td>
          </tr>
          
          <?php } // end of while loop ?>
          
           </tbody>
           <tfoot>
            <tr>
             <th>Organisation</th>
             <th>Language</th>
             <th>Edit</th>
             <th>Delete</th>
           </tr>	
         </tfoot>
       </table>
     </div> <!-- /panel body -->
   </div>
 </div> <!-- /col-md-12 -->
</div><!-- /.View Organisationzs-->
  					
  					
  					<!-- Add Organisations -->
  						<div class="row">
  							<div class="col-md-12">
  								<div class="panel panel-cascade">
  									<div class="panel-heading">
  										<h3 class="panel-title text-primary">
  											Add New Organization
  											
  										</h3>
  									</div>
  									<div class="panel-body panel-border">
  										<div class="list-group demo-list-group">
				          					Dashboard entities goes here

									</div> <!-- /panel body -->	
									</div>
							  
  								</div>	
  							</div>


  					</div> <!-- /.Add Organisations -->
  					


<?php include('partials/footer.php'); ?>

