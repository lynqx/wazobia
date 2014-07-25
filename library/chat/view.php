<?php
	if (empty($_GET['id']))
	echo "<div style=\"font-size: large; color: #ccc; text-align: center;  \">Chat application not active!</div>";
	else
	{
		//set limit of messages
		$lmt = 1000;
		/*---------------------*/
		
		$images = array();
		$fnames = array();
		$lnames = array();
		$dates = array();
		$mess = array();
		
		include ('../init_connect.php');
		$room = $_GET['id'];
				
		$q2 = "SELECT *, UNIX_TIMESTAMP() - chat.date AS TimeSpent FROM chat 
				JOIN student_register ON student_register.student_id = chat.user_id
				WHERE subject_id = '$room' ORDER BY chat_id DESC LIMIT 0, $lmt";
		$r2 = mysqli_query($conn, $q2) or die('<div style=\"color: red; text-align: center; \">Chat Unavailable at this time. Please try again later.</div>');
		
		$defaultimg = "default.png";
		while ($row2 = mysqli_fetch_array($r2, MYSQLI_ASSOC))
		{
			if(!empty($row2['image']))
			array_push($images, $row2['image']);
			else
			array_push($images, $defaultimg);
			
			array_push($fnames, $row2['first_name']);
			array_push($lnames, $row2['last_name']);
			array_push($dates, $row2['TimeSpent']);
			array_push($mess, $row2['message']);
			
		}
		
?>
		<div class="panel-body nopadding">
  		<div class="list-group conversation">
		
<?php
			$cn=count($dates)-1;
			foreach($dates as $dt)
			{
				echo 
				"<a class=\"list-group-item\">
					<img src=\"../images/profiles/".$images[$cn]."\" class=\"chat-user-avatar\" alt=\"\">
					<span class=\"username\" >".$fnames[$cn]." ".$lnames[$cn]; ?>
				
				<?php
				echo "<span class=\"btn btn-sm pull-right\">";
			$days = floor($dates[$cn] / (60 * 60 * 24));
			$remainder = $dates[$cn] % (60 * 60 * 24);
			$hours = floor($remainder / (60 * 60));
			$remainder = $remainder % (60 * 60);
			$minutes = floor($remainder / 60);
			$seconds = $remainder % 60;
			if($days > 29)
			echo date('F d Y', $row2['date']);
			elseif($days > 0)
			echo $days . ' days ago';
			elseif($days == 0 && $hours == 0 && $minutes == 0)
			echo "few seconds ago";		
			elseif($days == 0 && $hours == 0)
			echo $minutes.' minutes' . " " . $seconds.' seconds ago';
			elseif($days == 0)
			echo $hours.' hours' . " " . $minutes.' minutes' . " " . $seconds.' seconds ago';
			echo '</font><br />';

			
			echo "</span> </span> 
					<p> ".$mess[$cn]." </p>
				</a>";
				
				$cn--;
			}
		
		
	}
?>
	
	</div>
	</div>