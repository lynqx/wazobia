<?php 

//* Student Area */
/* Doubleakins*/
/* 08063777394*/
/* 19062014*/
/* redirected to when student logs in */

$page_title = "Topics";
$path = "../library/";
include('partials/header.php'); 
include('functions/functions.php'); 

?> 
	<style>
		<!--
		.folded
		{
			display: none;
		
		}
		
		//-->
	</style>


    <div class="container">
    	      <div class="box">
    	      	

    	 <?php 
 
 //breadcrum
 include ('breadcrumb.php');
		// Check for a valid Organisation ID, through GET or POST:
			if ( isset($_GET['subj']) && is_numeric($_GET['subj']))
			{ 
				$subj = $_GET['subj'];
			} else {
				redirect_to('index.php');
			}

         // Make the query to view table details:
				$q1 = "SELECT topic.topic_id, topic.topic, topic.date
				FROM `topic`
				WHERE topic.subject_id = '$subj'
				ORDER BY  `topic`.topic_id DESC";
				$r1 = @mysqli_query ($conn, $q1) or trigger_error(mysqli_error($conn));
         ?>
                  
         <table  class="table table-bordered table-hover table-striped display" id="example" >
           <thead>
            <tr class="top">
             <th width="550">Topic</th>
             <th width="140">Questions</th>
             <th width="210">Last Question</th>
             <th></th>
           </tr>
         </thead>
         </table>
		<?php // iterate the table rows <tr>
		$cnt = 0;	
		while ($row1 = mysqli_fetch_array($r1, MYSQLI_ASSOC)) 
		{
			$id = $row1['topic_id'];
			$cnt++;
		
		?>         	
			<div class="topicdiv"> <!-- parent div -->
				<table  class="table table-bordered table-hover table-striped display" id="example" >
					<tr>
						<td width="550"><h4><a href="javascript:void()" onclick="hideShow('folded', 'fold<?php echo $cnt; ?>');"><?php echo ucwords($row1['topic']); ?></a></h4></td>
						<td width="140">
						<?php
							$q2 = "SELECT posts.post_id 
								FROM `posts`
								JOIN topic ON topic.topic_id = posts.topic_id
								WHERE posts.topic_id = '$id'";				
				
							$r2 = @mysqli_query ($conn, $q2) or trigger_error(mysqli_error($conn));
							echo $numofposts = mysqli_num_rows($r2);
						?>
						</td>
           	
						<td width="210">
						<?php
							$q4 = "SELECT posts.post_id, posts.title, posts.author FROM `posts`
								JOIN topic ON topic.topic_id = posts.topic_id
								WHERE posts.topic_id = '$id'
								ORDER BY posts.post_id DESC LIMIT 1";				
				
							$r4 = @mysqli_query ($conn, $q4) or trigger_error(mysqli_error($conn));
							$row4 = mysqli_fetch_array($r4, MYSQLI_ASSOC);
							if (!empty($row4['title'])) {
								$email = $row4['author'];
								$un = explode('@', $email);
								$uname = $un[0];
							echo '<h4>' . $row4['title'] . '</h4><small> Posted by: ' . ucwords($uname) . '</small>' ;
							} else {
								echo '<h4 style="color:#f00; font-weight:bold"> No questions under this topic </h4>';
							}
						?>
						</td>
           
						<td><a href="question.php?id=<?php echo $id; ?>&topic=<?php echo $row1['topic']; ?>" class="btn btn-success btn-sm"> New Question </a></td>
					</tr>
				</table>
            		
            	<?php
					$q2 = "SELECT *, UNIX_TIMESTAMP() - posts.posted_date AS TimeSpent
						FROM `posts`
						JOIN topic ON topic.topic_id = posts.topic_id 
						WHERE posts.topic_id = '$id'
						ORDER BY  `posts`.post_id DESC";
						$r2 = @mysqli_query ($conn, $q2) or trigger_error(mysqli_error($conn));
            
				?>
			
				<div class="folded" id="fold<?php echo $cnt; ?>"> <!-- start child div -->
					<table class="table table-hover table-bordered">
						<?php // iterate the table rows <tr>
							while ($row2 = mysqli_fetch_array($r2, MYSQLI_ASSOC)) 
							{
								$post_id = $row2['post_id'];
								$title = $row2['title'];
						?>
						<tr>
							<td width="150">
								<h4><a href="forum.php?id=<?php echo $post_id; ?>&forum=<?php echo $title; ?>"><b> <?php echo $row2['title']; ?> </b></a></h4>
								<h5 class="author"><span>Posted by : </span><?php 
								$email = $row2['author'];
								$un = explode('@', $email);
								$uname = $un[0];
								echo ucwords($uname); ?> </h5>
								
								<span class="datee">
									<?php
	$days = floor($row2['TimeSpent'] / (60 * 60 * 24));
			$remainder = $row2['TimeSpent'] % (60 * 60 * 24);
			$hours = floor($remainder / (60 * 60));
			$remainder = $remainder % (60 * 60);
			$minutes = floor($remainder / 60);
			$seconds = $remainder % 60;
	if($days > 0)
			echo date('F d Y', $row2['posted_date']);
			elseif($days == 0 && $hours == 0 && $minutes == 0)
			echo "few seconds ago";		
			elseif($days == 0 && $hours == 0)
			echo $minutes.' minutes' . " " . $seconds.' seconds ago';
			elseif($days == 0)
			echo $hours.' hours' . " " . $minutes.' minutes' . " " . $seconds.' seconds ago';
			echo '</font><br />';
			?>
								</span>
								
							</td>
							<td width="400"> <?php 
								$discus = $row2['question']; 
								echo $discuss = substr($discus, 0, 150) ?> 
								<h5><a href="forum.php?id=<?php echo $post_id; ?>" class="btn btn-danger btn-sm"> Read More </a></h5>
							</td>
						</tr>
						
						<?php
							}
						?>
					</table>
				</div> <!-- end child div -->
		
			</div> <!-- end parent div -->

        <?php
		} // end of first while loop 
		?>
          
       </div>
       
      <div class="box">
        <div class="product-one">
        <div class="row product-row">
          <div class="col-md-5 product-display">
            <img src="images/iwatch.png" alt="">
          </div>
          <div class="col-md-7 product-description">
            <h3>
              Headline Goes Here
            </h3>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam, harum neque aperiam optio fugiat vitae nihil unde animi quae hic. Ut, molestias provident quaerat rem cum atque a aliquam vitae.
            </p>
            <ul>
              <li>Feature</li>
              <li>Feature</li>
            </ul>
          </div>
        </div>
        </div>
      </div><!--end of box-->

    </div><!--end of container-->
  
<?php include('partials/footer.php'); ?>

<script>
		<!--
		function hideShow(x, y)
		{
			
			var a = document.getElementsByClassName(x);
			var b = document.getElementById(y);
			
			//alert(a.length);
			
			//close all divs
			for(var i = 0; i<a.length; i++)
			{
				if(a[i]!=b)
				a[i].style.display='none';
			}
			
			
			//open this div
			if(b.style.display=='block')
			b.style.display='none'
			else
			b.style.display='block'
		}
	
		//-->
	</script>
