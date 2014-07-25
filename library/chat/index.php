<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Wazobia ChatRoom</title>
  <meta charset="utf-8">
		<link href="../css/bootstrap.css" rel="stylesheet">
		<link href="../css/font-awesome.css" rel="stylesheet">
		<link href="../css/style.css" rel="stylesheet" type="text/css">
  
  <link rel="stylesheet" type="text/css" href="chat.css" >
  <script type="text/javascript" src="chat.js"></script>


  
</head>
	<?php
		include ('../init_connect.php');
		
		if(!empty($_GET['id']))
		$room = $_GET['id'];
		else
		$room="";
	
		$q = "SELECT subject FROM subject WHERE subject_id = '$room'";
		$r = mysqli_query($conn, $q);
		$row = mysqli_fetch_array($r, MYSQLI_ASSOC);
			
	?>

<body onload="loadDoc('targetDiv', 'view.php?id=<?php echo $room; ?>');">

		<div class="row chat-box">
  							<div class="col-md-12">
  								<div class="panel panel-cascade">
  									<div class="panel-heading">
  										<h3 class="panel-title text-primary">
  											Chat Room <i class="fa fa-dot-circle-o"></i> <?php echo $row['subject'];?>
  											
  										</h3>
  									</div>
	<div id="targetDiv">
		
	</div>
	
	<div id="smileys">
		<!-- smileys... -->
	</div>
	
	<div id="res">
	
	</div>
	
	<?php if(!empty($_GET['id'])) { ?>
		<div id="send">
			<?php include('send.php'); ?>
		</div>
	<?php } ?>
	
	<div id="options">
		<!-- options... -->
	</div>
	
	</div>
	</div>
	</div>
	
	<script>
		setInterval(function()
		{
			loadDoc('targetDiv', 'view.php?id=<?php echo $room; ?>');
		}, 1000);
	</script>
</body>
</html>
