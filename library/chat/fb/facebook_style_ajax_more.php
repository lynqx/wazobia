<?php
include('database_connection.php');


if(isset($_POST['lastmsg']) &&is_numeric($_POST['lastmsg']))
{
$lastmsg=$_POST['lastmsg'];
$query="select * from chat where chat_id>'$lastmsg' order by chat_id asc limit 9";
$result = mysqli_query($dbc,$query);


while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
{ 
$msg_id=$row['chat_id'];
$message=$row['message'];
?>

<li> <?php echo $message; ?> </li>
<?php
}


?>
<?php
	
if( mysqli_num_rows($result)==9){
   ?>
<div class="facebook_style" id="facebook_style"> <a id="<?php echo $message; ?>" href="#" class="load_more" >Show Older Posts <img src="arrow1.png" /></a> </div>
<?php
 }else {
    
    echo '  <div  id="facebook_style">
  <a  id="end" href="#" class="load_more" >No More Posts</a>
  </div>';
    
 }
}
?>
