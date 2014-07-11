<?php
/*-------------------------// coded by: Tope Omomo (08134053081) /----------------------------------*/
/*-------------------------//		topeomomo@gmail.com			 //---------------------------------*/

/* pay_instructors_commision.php */


	$page_title = "View Instructors Payment";
	$path = "";
	$inc_path = $path."partials/";
	include($inc_path . 'header.php'); 

	if (!isset($_SESSION['work_id']) || $_SESSION['roles'] != 'lecturer') {
		redirect_to('error.php');
	}

	
?>


            <div class="row">
               <div class="col-mod-12">

                  <ul class="breadcrumb">
                   <li><a href="index.php">Dashboard</a></li>
                   <li><a href="#">View Payment</a></li>
                   
                 </ul>
                 
                 <div class="form-group hiddn-minibar pull-right">
                   <!-- SEARCHBOX -->
                 </div>
                 <h3 class="page-header"><i class="fa fa-warning"></i> Commission Payment <i class="fa fa-info-circle animated bounceInDown show-info"></i> </h3>

				</div>
			</div>


        

<!-- Form elements -->
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-cascade">
			<div class="panel-heading">
				<h3 class="panel-title">
					Paid monthly commissions
					<span class="pull-right">
						<!-- <a  href="#" class="panel-minimize"><i class="fa fa-chevron-up"></i></a> -->
						<!--  <a  href="#"  class="panel-close"><i class="fa fa-times"></i></a> -->
					</span>
				</h3>
			</div>
			<div class="panel-body ">
							<?php
								//fetch payments made for work_id from db
							$work_id = $_SESSION['work_id'];
							$payplan = getColumnValue($conn, 'instructor_payplan', 'instructors', 'work_id', $work_id);
							
							if($payplan==2)
							{
								echo "<span style=\"color: red; \">Sorry! But Your Are On 'PAYOFF' Payplan.</span>";
							}
							else
							{
							?>
         				<table class="table table-bordered table-hover table-striped display" id="example" >
							<thead>
								<tr>
									<th>Month-Year</th>
									<th>Amount</th>
									<th>Pay Date/Time</th>
								</tr>
							</thead>
							<tbody>
								<?php
								
							
								$sel1 = "SELECT month, year, payment_amount, payment_time, instructor_payment_id 
										FROM instructor_payment WHERE work_id='$work_id' 
										ORDER BY instructor_payment_id DESC";
										
								$rslt1 = mysqli_query($conn, $sel1) or die('Data Error1');
								while($row1 = mysqli_fetch_row($rslt1))
								{
									$month = $row1[0];
									$year = $row1[1];
									$payment_amount = $row1[2];
									$payment_time = $row1[3];
									
									echo "
										<tr>
											<td>$month-$year</td><td>$payment_amount</td><td>$payment_time</td>
										</tr>";
								}
								mysqli_free_result($rslt1);	
								
								?>
							</tbody>
							<tfoot>
								<tr>
									<th>Month-Year</th><th>Amount</th><th>Pay Date/Time</th>
								</tr>
							</tfoot>
						</table>
							<?php
							}
						
							?>						
			</div>
		</div>
	</div>
</div>



<?php
include('partials/footer.php');
?>