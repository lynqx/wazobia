<style>
	<!--
		.item_name
		{
			background-color: #f0fff0;
			border: 1px solid #c0eec0;
			padding: 3px;
			margin: 3px;
			border-radius: 5px;
			margin: 3px;
		}
		
		
		.item_price
		{
			//background-color: #f0f0f0;
			color: #b4d54d;
			padding: 1px;
			border-radius: 5px;
		}
		
		.item_info
		{
			border: 1px solid #c0eec0;
			color: #010;
			font-family: courier;
			margin-top: 6px;
			padding: 3px;
			background-color: #fff;
		}
	
	//-->
</style>

<?php
	/*---- created by: Tope Omomo (08134053081) ----*/
	
	//this page
	$thispage = $_SERVER['PHP_SELF'];
	
	//functions -----------------------------------------------------------//
	function getColumnValue(
						$conn, 
						$search_column, 
						$table, 
						$condition_column, 
						$condition_value
						)
	{
		$select = "SELECT $search_column FROM $table WHERE $condition_column='$condition_value'";
		if($result = mysqli_query($conn, $select))
		{
			$row = mysqli_fetch_row($result);
			$val = $row[0];
		}
		
		mysqli_free_result($result);
		
		return($val);
	}
	
	
	//*****
	
	
	function getColumnJoinValue(
							$conn, 
							$search_column, 
							$table1, 
							$table2, 
							$join_column, 
							$condition_column, 
							$condition_value
							)
	{
		
		$select = "SELECT 
				$search_column 
				FROM $table1 
				JOIN $table2
				ON $table1.$join_column=$table2.$join_column
				WHERE $condition_column='$condition_value'";
		
		$result = mysqli_query($conn, $select) or die(mysqli_error($conn).'Cannot fetch data!');
		
		$row = mysqli_fetch_row($result);
		
		mysqli_free_result($result);
		
		return($row[0]);
	}
	
	//--------------------------------------------------------------------//
	
	
	
	//process form parameters
	if(!empty($_GET['pack']))
	$pack = $_GET['pack'];
	else
	$pack = '';
	
	
	if(!empty($_GET['disc']))
	$disc = $_GET['disc'];
	else
	$disc = '';
	
	
	if(!empty($_GET['lesson']))
	$lesson = $_GET['lesson'];
	else
	$lesson = '';
	
	//display all packs
	if($pack=='')	//?pack=&...
	{
		//display all packs (as links)
		$s1 = "SELECT * FROM `dvd_subject_pack`";
		$r1 = mysqli_query($conn, $s1) or die("<span style=\"color: red;\">Error! Cannot read pack info at this time. Please try again.</span>");
		if(mysqli_num_rows($r1)==0)
		echo "<b style=\"color: red; \">Zero Packs Available here!</b>";
		else
		{
			while($rows = mysqli_fetch_assoc($r1))
			{
				$packtitle = ucwords($rows['subject_pack_name']);
				$packinfo = ucfirst($rows['dvd_pack_info']);
				$packprice = $rows['dvd_pack_price'];
				$packid = $rows['dvd_pack_id'];
				
				echo 
				"
				<div class=\"item_name\" >
					<a href=\"$thispage?pack=$packid\"> $packtitle </a> <span class=\"item_price\">&#8358; $packprice</span>
					
					<div class=\"item_info\">
						$packinfo
					</div>
				</div>
				
				";
			}
		}
	}
	else			
	{
		if($disc=='')	//?pack=*&disc=&...
		{
			//display all discs (as links)
			$s1 = "SELECT `dvd`.`dvd_id`, `dvd`.`dvd_title`, `dvd`.`dvd_info`, `dvd_amount_set`.`actual_amount` 
				FROM `dvd` 
				JOIN `dvd_amount_set` 
				ON `dvd`.`dvd_id`=`dvd_amount_set`.`dvd_id`
				WHERE `dvd`.`dvd_pack_id`='$pack'";
				
			$r1 = mysqli_query($conn, $s1) or die("<span style=\"color: red;\">Error! Cannot read disc info at this time. Please try again.</span>");
			if(mysqli_num_rows($r1)==0)
			echo "<b style=\"color: red; \">Zero Discs Available here!</b>";
			else
			{
				while($rows = mysqli_fetch_assoc($r1))
				{
					$dvdid = $rows['dvd_id'];
					$dvdtitle = $rows['dvd_title'];
					$dvdinfo = $rows['dvd_info'];
					$dvdprice = $rows['actual_amount'];
					
					echo 
						"
						<div class=\"item_name\">
							<a href=\"$thispage?pack=$pack&disc=$dvdid\"> $dvdtitle </a> <span class=\"item_price\">&#8358;$dvdprice</span>
							
							<div class=\"item_info\">
								$dvdinfo
							</div>
						</div>
						";
				}
			}	
		}
		else
		{
			if($lesson=='')	//?pack=*&disc=*&lesson=&...
			{
				//display all lessons (as links)
				$s1 = "SELECT `lesson`.`lesson`, `lesson`.`lesson_id`, `dvd_lessons`.`dvd_lesson_info` 
					FROM `dvd_lessons` 
					JOIN `lesson` 
					ON `dvd_lessons`.`lesson_id`=`lesson`.`lesson_id` 
					JOIN `dvd` 
					ON `dvd`.`dvd_id`=`dvd_lessons`.`dvd_id`
					WHERE `dvd_lessons`.`dvd_id`='$disc' AND `dvd`.`dvd_pack_id`=$pack";
					
				$r1 = mysqli_query($conn, $s1) or die("<span style=\"color: red;\">Error! Cannot read lesson info at this time. Please try again.</span>");
				if(mysqli_num_rows($r1)==0)
				echo "<b style=\"color: red; \">Zero Lessons Available here!</b>";
				else
				{
					while($rows = mysqli_fetch_assoc($r1))
					{
						$lessonid = $rows['lesson_id'];
						$lessontitle = $rows['lesson'];
						$lessoninfo = $rows['dvd_lesson_info'];
						
						//obtain dvd price
						$packprice = getColumnValue($conn, 'dvd_pack_price', 'dvd_subject_pack', 'dvd_pack_id', $pack);
						$discprice = getColumnValue($conn, 'actual_amount', 'dvd_amount_set', 'dvd_id', $disc);
						
							
						echo 
							"
							<div class=\"item_name\">
								<a href=\"$thispage?pack=$pack&disc=$disc&lesson=$lessonid\"> $lessontitle </a> DISC: <span class=\"item_price\">&#8358;$discprice</span> || PACK: <span class=\"item_price\">&#8358;$packprice</span>
								
								<div class=\"item_info\">
									$lessoninfo
								</div>
							</div>
							";
					}
				}
			}
			else			//?pack=*&disc=*&lesson=&lesson=*
			{
				//display all lessons (NO LINKS)
				$s1 = "SELECT `lesson`.`lesson`, `dvd_lessons`.`dvd_lesson_info` 
					FROM `dvd_lessons` 
					JOIN `lesson` 
					ON `dvd_lessons`.`lesson_id`=`lesson`.`lesson_id` 
					JOIN `dvd` 
					ON `dvd`.`dvd_id`=`dvd_lessons`.`dvd_id`
					WHERE `dvd_lessons`.`dvd_id`='$disc' AND `dvd`.`dvd_pack_id`=$pack AND `lesson`.`lesson_id`=$lesson";
					
				$r1 = mysqli_query($conn, $s1) or die("<span style=\"color: red;\">Error! Cannot read lesson info at this time. Please try again.</span>");
				if(mysqli_num_rows($r1)==0)
				echo "<b style=\"color: red; \">Zero Lessons Available here!</b>";
				else
				{
					while($rows = mysqli_fetch_assoc($r1))
					{
						$lessontitle = $rows['lesson'];
						$lessoninfo = $rows['dvd_lesson_info'];
						
						//obtain dvd price
						$packprice = getColumnValue($conn, 'dvd_pack_price', 'dvd_subject_pack', 'dvd_pack_id', $pack);
						$discprice = getColumnValue($conn, 'actual_amount', 'dvd_amount_set', 'dvd_id', $disc);
						
							
						echo 
							"
							<div class=\"item_name\">
								<a href=\"javascript:void()\"> $lessontitle </a> DISC: <span class=\"item_price\">&#8358;$discprice</span> || PACK: <span class=\"item_price\">&#8358;$packprice</span>
								
								<div class=\"item_info\">
									$lessoninfo
								</div>
							</div>
							";
					}
				}
				
			}
		}
	}
	
?>

