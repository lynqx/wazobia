<style>
	<!--
	body
	{
		background-color: #093;
	}
	
	div
	{
		margin-left: auto;
		margin-right: auto;
		text-align: center;
		font-family: Arial;
		font-size: normal;
		color: #666;
	}
	
	div a
	{
		color: #cf9;
		font-weight: bold;
		text-decoration: none;
		padding: 5px;
		background-color: #030;
		border-radius: 5px;
	}
	
	img
	{
		margin-left: auto;
		margin-right: auto;	
	}
	
	
	//-->
</style>
	<div>
		<img src="../images/logo.png" border="0" align="center" />
	</div>
<?php
//echo md5('123456'); e10adc3949ba59abbe56e057f20f883e
$path="";
include('init_connect.php');


if(!empty($_GET['user']) && !empty($_GET['ucode']))
{
	$err = "";
	$user = $_GET['user'];
	$ucode = $_GET['ucode'];
	
	//compare data
	$sel1 = "SELECT ucode 
		FROM student_register 
		WHERE email='$user'";
	$rslt1 = mysqli_query($conn, $sel1) or die('Operation Failed!');
		
	if(mysqli_num_rows($rslt1)==0)	//no records in database
	{
		$err = "<span style=\"color: red; font-weight: bold;\">No such user registered as <b>$user</b> here!</span>";
		echo $err;
		exit();
	}
	else	//user if found
	{
		//fetch $ucode from  db
		$uc = mysqli_fetch_row($rslt1);
		$ucd = $uc[0];
		
		if($ucd==1)		//user already confirmed
		{
			$msg = "<div><h3 style=\"color: #666; \">Your email $user was already confirmed.</h3><span>You may login below</span><p><a href=\"index.php\">Classroom</a> &nbsp;&nbsp; <a href=\"../forum/\">Forum</a></p></div>";
			echo $msg;
		}
		elseif($ucd != $ucode)	//ucode not authentic
		{
			$err = "<span style=\"color: red; font-weight: bold;\">Sorry! But you supplied an invalid activation code</span>";
			echo $err;
			exit();
		}
		elseif($ucd==$ucode)	//activate user
		{
			$updt = "UPDATE student_register 
				SET ucode='1' 
				WHERE email='$user'";
				
			if(mysqli_query($conn, $updt))
			{
			
			//output success msg
			?>
			<!-- SUCCESS PAGE BEGINS --->
				
				<div id="mainbox">
					<h3 style="color: #6f3; ">Congratulations!</h3>
					<h5 style="color: #663; ">Your email <?phpecho $user; ?> has been confirmed.</h5>
					<span>You may now login below</span>
					<p><a href="index.php">Classroom</a> &nbsp; | &nbsp; <a href="../forum/">Forum</a></p>
				</div>
			
			
			<!-- SUCCESS PAGE ENDS --->
			<?php
			}
		}
		else	//throw 'UNKNOWN ERROR!' 
		{
			$err = "<span style=\"color: red; font-weight: bold;\">UNKNOWN ERROR!</span>";
			echo $err;
			exit();
		}
	}
}
else
header('location: index.php');

?>