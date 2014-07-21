								<?php
									include('../init_connect.php');
									
									
									if(!empty($_GET['sbj']))
									{
										$sbj = trim($_GET['sbj']);
										$sell = trim($_GET['sell']);
										
										$sel = "SELECT lesson 
											FROM lesson 
											JOIN subject 
											ON subject.subject_id=lesson.subject_id 
											WHERE subject.subject='$sbj' 
											ORDER BY lesson DESC";
											
										$rslt = mysqli_query($conn, $sel) or die('Sorry! But I cannot fetch lessons at this time.');
										
										if(mysqli_num_rows($rslt)==0)
										echo "<option value=\"\">NO LESSONS FOUND</option>";
										else
										{
											while($rows = mysqli_fetch_row($rslt))
											{
												if($sell == $rows[0])
												echo "<option selected value=\"$rows[0] \">".ucwords($rows[0])."</option>\n";
												else
												echo "<option value=\"$rows[0] \">".ucwords($rows[0])."</option>\n";
											}
										}
									}
								?>