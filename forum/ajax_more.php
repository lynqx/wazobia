<?php
include('partials/init_connect.php'); 


if(isset($_POST['lastmsg']) &&is_numeric($_POST['lastmsg']))
{
$lastmsg=$_POST['lastmsg'];

$query="SELECT *, UNIX_TIMESTAMP() - answers.date AS TimeSpent FROM `answers`
		 WHERE answer_id >'$lastmsg'
		 WHERE answers.post_id = '$id'
		 ORDER BY answer_id ASC limit 9";
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
