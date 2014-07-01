			<?php

			if (isset($_GET['lang'])) {
				$lang_id = $_GET['lang'];
			}
			?>
			<?php // code to select language
						    // Make the query to view table details:
						    include_once('../../init_connect.php');
							$q2 = "SELECT * FROM organisation
							WHERE language_id = '$lang_id'";
							$r2 = @mysqli_query ($conn, $q2) or trigger_error("Query: $q2\n<br />MySQL Error: " . mysqli_error($conn));;
							if (mysqli_num_rows($r2) > 0) {
								?>

							<div class="form-group">
							<label for="selectlanguage" class="col-lg-2 col-md-3 control-label"> Organisation </label>
							<select data-placeholder="Choose an Organisation..." class="form-control" 
							style="width:350px;" tabindex="2" name="organisation" onchange="showsubj();">
							
							<option value="">  </option>
							
							<?php 
							
							// iterate the table rows <tr>
								while ($row2 = mysqli_fetch_array($r2, MYSQLI_ASSOC)) {
							?>
							<option value="<?php echo $row2['organisation_id']; ?>"> <?php echo $row2['organisation']; ?> </option>
							<?php } //end select subject while
							?>
						</select>
						</div>

						<?php
						} else {
								echo '<div class="col-md-9">
								<div class="alert alert-danger alert-dismissable">
								<p>No Organisation found for this language category</p>
								</div></div>';
							} 
						?>
					


