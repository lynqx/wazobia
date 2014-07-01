<?php

include_once('../../init_connect.php');

if($_POST)
{
$q=$_POST['search'];
$sql = "select dvd_id, dvd_title from dvd where dvd_title like '%$q%' order by dvd_id LIMIT 5";
$sql_res = mysqli_query($conn, $sql) or trigger_error(mysqli_error($conn));
while($row=mysqli_fetch_array($sql_res, MYSQLI_ASSOC))
{
$dvd_id=$row['dvd_id'];
$dvd_title=$row['dvd_title'];
$b_dvd='<strong>'.$q.'</strong>';
$final_dvd = str_ireplace($q, $b_dvd, $dvd_title);
?>
<div class="show" align="left">
<span class="name" style="display:none"><?php echo $dvd_title; ?></span>
<span class="nameid" style="display:none"><?php echo $dvd_id; ?>
	
</span>&nbsp;<br/><?php echo $final_dvd; ?><br/><hr>

</div>
<?php
}
}
?>