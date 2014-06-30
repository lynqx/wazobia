
   <link href="http://localhost/wazobia/library/admin/css/style.css" rel="stylesheet" type="text/css"> 



    		<?php

			if (isset($_GET['org'])) {
				$org_id = $_GET['org'];
			}
			?>
			
					<?php // code to select language
						    // Make the query to view table details:
						    include_once('../../init_connect.php');
							$q2 = "SELECT * FROM subject
							WHERE organisation_id = '$org_id'";
							$r2 = @mysqli_query ($conn, $q2) or trigger_error("Query: $q2\n<br />MySQL Error: " . mysqli_error($conn));;
							if (mysqli_num_rows($r2) > 0) {
					?>
								
							
							<div class="form-group">
							<label for="selectsubject" class="col-lg-2 col-md-3 control-label"> Subject </label>
							<select data-placeholder="Choose an Organisation..." class="form-control" 
							style="width:350px;" tabindex="2" name="subject" onchange="showtopic();">
							
							<option value="">  </option>
							
							<?php 
							
							// iterate the table rows <tr>
								while ($row2 = mysqli_fetch_array($r2, MYSQLI_ASSOC)) {
							?>
							<option value="<?php echo $row2['subject_id']; ?>"> <?php echo $row2['subject']; ?> </option>
							<?php } //end select subject while
							?>
						</select>
						<?php
						} else {
								echo '<div class="col-md-9">
								<div class="alert alert-danger alert-dismissable">
								<p>No subjects found for this organisation category</p>
								</div>
								</div>';
							} 
						?>
					</div>
					
					

					
				
				

<!-- Load JS here for Faster site load =============================-->
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://localhost/wazobia/library/admin/js/jquery-ui-1.10.3.custom.min.js"></script>
<script src="http://localhost/wazobia/library/admin/js/jquery.dataTables.min.js"></script>
<script src="http://localhost/wazobia/library/admin/js/jquery.pulsate.min.js"></script>
<script src="http://localhost/wazobia/library/admin/js/forms-custom.js"></script>
<script src="http://localhost/wazobia/library/admin/js/chosen.jquery.js"></script>

