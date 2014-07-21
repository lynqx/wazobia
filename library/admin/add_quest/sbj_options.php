							<?php
								include('../init_connect.php');
								
								if(!empty($_GET['org']))
								{
									$org = trim($_GET['org']);
									$sell = trim($_GET['sell']);
									
									$sel2 = "SELECT subject 
										FROM subject 
										JOIN organisation 
										ON subject.organisation_id=organisation.organisation_id
										WHERE organisation.organisation='$org' 
										ORDER BY subject DESC";
									$rslt2 = mysqli_query($conn, $sel2) or die('Sorry! But I cannot fetch subjects at this time.');
									
									if(mysqli_num_rows($rslt2)==0)
									echo "<option value=\"\">NO SUBJECTS FOUND</option>";
									else
									{
										while($rows2 = mysqli_fetch_row($rslt2))
										{
											if($sell == $rows2[0])
											echo "<option selected value=\"$rows2[0] \">".ucwords($rows2[0])."</option>\n";
											else
											echo "<option value=\"$rows2[0] \">".ucwords($rows2[0])."</option>\n";
										}
										mysqli_free_result($rslt2);
									}
								}
								
								
							?>