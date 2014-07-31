 		<?php

			if (isset($_GET['subj'])) {
				$subj_id = $_GET['subj'];
			}
			?>
			
					<?php // code to select language
						    // Make the query to view table details:
						    include_once('../../init_connect.php');
							$q2 = "SELECT * FROM dvd
							WHERE subject_id = '$subj_id'
							ORDER BY dvd_id DESC
							LIMIT 1";
							$r2 = @mysqli_query ($conn, $q2) or trigger_error("Query: $q2\n<br />MySQL Error: " . mysqli_error($conn));;
							
							
							$row2 = mysqli_fetch_array($r2, MYSQLI_ASSOC);
							if (!empty($row2['dvd_title'])) {
							$dvd_title = $row2['dvd_title'];
							$dvd_title = substr($dvd_title, 3, 2);
							
							$section2 = $dvd_title + 1;
							if ($section2 <= 9) { $section2 = '0' . $section2;
							}
							} else {
								$section2 = '0' . 1;
							}
							?>
							
								
					<?php
					$q3 = "SELECT subject.subject_codes, organisation.organisation_id, language.language FROM subject
							JOIN  organisation ON organisation.organisation_id = subject.organisation_id
							JOIN language ON language.language_id = organisation.language_id
							WHERE subject_id = '$subj_id'
							LIMIT 1";
							$r3 = @mysqli_query ($conn, $q3) or trigger_error("Query: $q2\n<br />MySQL Error: " . mysqli_error($conn));;
							if (mysqli_num_rows($r3) > 0) {
									
							$row3 = mysqli_fetch_array($r3, MYSQLI_ASSOC);
							
							if (isset($row3['subject_codes'])) { $subject_codes = $row3['subject_codes']; } else { $subject_codes = ""; }
							
							if (!empty($row3['language'])) { $lang = $row3['language']; } else { $lang = ""; }
							$lang = strtoupper(substr($lang, 0, 2));
							
							$org = $row3['organisation_id'];
							if ($org <= 9) { $org = '0' . $org;
							}
							echo '<div class="well well-lg">
							<h4 class="col">New Code Generated : &nbsp; <span class="btn btn-lg btn-danger"> ' . $subject_codes . $section2 . $org . $lang . '</span></h4>
							</div>';
						}
							
					?>
														<div class="form-group">

							<input type="hidden" name="section1" class="form-control" value="<?php echo $subject_codes; ?>">
							
							<input type="hidden" name="section2" class="form-control" value="<?php echo $section2; ?>">
							
							<input type="hidden" name="section3" class="form-control" value="<?php echo $org ?>">
							
							<input type="hidden" name="section4" class="form-control" value="<?php echo $lang ?>">
				
</div>
									<div class="form-group">
									<label for="selectlanguage" class="col-lg-2 col-md-3 control-label"> DVD Pack </label>

									<?php // code to select language
				         								// Make the query to view table details:
														$q = "SELECT * FROM dvd_subject_pack";
														$r = @mysqli_query ($conn, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($conn));;
										   	        ?>
													<select data-placeholder="Choose a subject..." class="form-control" style="width:350px;" tabindex="2" name="dvdpack">
														<option value=""></option>
													<?php // iterate the table rows <tr>
													while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
													?>
														<option value="<?php echo $row['dvd_pack_id']; ?>"> <?php echo $row['subject_pack_name']; ?> </option>
														<?php } //end select subject while ?>
											 		</select>
			</div>
