<?php 
	if(!empty($_GET['add_dvd_code_btn']))
	$dvd_code = $_GET['dvd_code'];
	
	$dvd_code = mysqli_real_escape_string($conn,$dvd_code);
	
	$select = "SELECT subject.subject 
			FROM dvd_code 
			JOIN subject_code 
			ON dvd_code.subject_code_id=subject_code.subject_code_id 
			JOIN subject 
			ON subject_code.subject_code_id=subject.subject_id 
			WHERE dvd_code='$dvd_code'";
	
	
	$rslt = mysqli_query($conn, $select) or die(mysqli_error($conn));
	$row = mysqli_fetch_row($rslt);
	
	$sbjt = $row[0];
	
	echo 
	"<li class=\"submenu\"><a class=\"dropdown\" href=\"\" data-original-title=\"\"> <i class=\"fa fa-cog\"></i><span class=\"hidden-minibar\"> ".ucwords($sbjt) ."<span class=\"badge bg-success2 pull-right\">1</span></span></a></li>";

