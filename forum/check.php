<?php

//print_r ($_POST);
//echo '<br>';
$total = 5;
for ($i=1; $i<$total; $i++) {
	if (!empty($_POST['perm'.$i])) {
		
	echo $_POST['perm'.$i] . '<br>';
	
}

}
?>

<form method="post" action="">
	
<input type="checkbox" name="perm1" value="Green"> 1st permission <br>
<input type="checkbox" name="perm2" value="Yellow"> 2nd permission <br>
<input type="checkbox" name="perm3" value="Blue"> 3rd permission <br>
<input type="checkbox" name="perm4" value="red"> 4th permission <br>

<input type="submit" value="ADD PERMISSION">

</form>