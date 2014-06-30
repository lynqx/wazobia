<?php
	$student_id = $_SESSION['student_id'];
		
		$select = "SELECT subject.subject, subject.subject_id 
				FROM dvd_code_user 
				JOIN dvd_code 
				ON dvd_code_user.dvd_code_id=dvd_code.dvd_code_id 
				JOIN dvd 
				ON dvd_code.dvd_id=dvd.dvd_id 
				JOIN subject 
				ON dvd.subject_id=subject.subject_id 
				WHERE student_id='$student_id'";
		
		
		$rslt = mysqli_query($conn, $select) or die(mysqli_error($conn));
		$rowno = mysqli_num_rows($rslt);
		if($rowno>0)
		{
			while($row = mysqli_fetch_row($rslt))
			{
				$sbjt = ucwords($row[0]);
				$sbjtid = $row[1];

				echo '<li class= "submenu"><a class="dropdown" href="classroom.php?subj='. $sbjtid . '&subject='.$sbjt.'" data-original-title="' .$sbjt. '" title="' .$sbjt. '"> <i class="fa fa-cog"></i><span class="hidden-minibar"> ' .$sbjt. '<span class="badge bg-success2 pull-right">1</span></span></a></li>';
			}
		}
	
	