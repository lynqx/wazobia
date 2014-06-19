<?php include('partials/header.php'); ?>


            <div class="row">
               <div class="col-mod-12">

                  <ul class="breadcrumb">
                   <li><a href="index.php">Dashboard</a></li>
                   <li><a href="#">Library</a></li>
                   <li class="active">Lesson Notes</li>
                 </ul>
                 
                 <div class="form-group hiddn-minibar pull-right">
                   <!-- SEARCHBOX -->
                 </div>
                 <h3 class="page-header"><i class="fa fa-warning"></i> Access Lesson Notes<i class="fa fa-info-circle animated bounceInDown show-info"></i> </h3>

				</div>
			</div>


        

<!-- Form elements -->
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-cascade">
			<div class="panel-heading">
				<h3 class="panel-title">
					Enter Your Dvd Code
					<span class="pull-right">
						<!-- <a  href="#" class="panel-minimize"><i class="fa fa-chevron-up"></i></a> -->
						<!--  <a  href="#"  class="panel-close"><i class="fa fa-times"></i></a> -->
					</span>
				</h3>
			</div>
			<div class="panel-body ">
				<div class="ro">
					<div class="col-mol-md-offset-2">
						<form class="form-horizontal cascade-forms" method="GET" action="" name="signup_form" id="signup_form" novalidate="novalidate">
							<div class="form-group">
								<label class="col-lg-2 col-md-3 control-label">DVD Code</label>
								<div class="col-lg-10 col-md-9">
									<input type="text" class="form-control form-cascade-control input-small" name="dvd_code" id="dvd_code" required >
								</div>
							</div>
							
							<div class="form-actions">
								<input type="submit" name="add_dvd_code_btn" value="Validate" class="btn bg-primary text-white btn-lg" >
							</div>
						</form>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>


<?php
include('partials/footer.php');
?>