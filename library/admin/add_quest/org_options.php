
<?php
	//include('../init_connect.php');
	
	$sel1 = "SELECT organisation, organisation_id 
			FROM organisation 
			ORDER BY organisation DESC";
	$rslt1 = mysqli_query($conn, $sel1) or die('Sorry! But I cannot fetch organisations at this time.');
	
	if(mysqli_num_rows($rslt1)==0)
	echo "<option value=\"NO ORGANISATIONS FOUND\">";
	else
	{
		while($rows1 = mysqli_fetch_row($rslt1))
		{
			echo "<option value=\"$rows1[0] \">\n";
		}
		mysqli_free_result($rslt1);
	}
?>
