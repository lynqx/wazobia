<?php
	$student_id = $_SESSION['student_id'];
		
		$select = "SELECT subject.subject, subject.subject_id 
				FROM dvd_code_user 
				JOIN dvd_code 
				ON dvd_code_user.dvd_code_id=dvd_code.dvd_code_id 
				JOIN subject_code 
				ON dvd_code.subject_code_id=subject_code.subject_code_id 
				JOIN subject 
				ON subject_code.subject_id=subject.subject_id 
				WHERE student_id='$student_id'";
		
		
		$rslt = mysqli_query($conn, $select) or die(mysqli_error($conn));
		$rowno = mysqli_num_rows($rslt);
		if($rowno>0)
		{
			while($row = mysqli_fetch_row($rslt))
			{
				$sbjt = $row[0];
				$sbjtid = $row[1];
		
				echo 
				"<li class=\"submenu\"><a class=\"dropdown\" href=\"\" data-original-title=\"\"> <i class=\"fa fa-cog\"></i><span class=\"hidden-minibar\"> ".ucwords($sbjt)."<span class=\"badge bg-success2 pull-right\">1</span></span></a></li>";
			}
		}
	
	