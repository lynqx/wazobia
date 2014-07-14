<?php 

//* Student Area */
/* Doubleakins*/
/* 08063777394*/
/* 19062014*/
/* redirected to when student logs in */

$page_title = "Wazobia Forum";
$path = "../library/";
include('partials/header.php'); 

?> 


    <div class="container">
    	      <div class="box">

    	 <?php // code to select the organisations for view
         // Make the query to view table details:
				$q1 = "SELECT subject.subject_id, subject.subject, subject.avatar, subject.description, subject.date
				FROM `subject`
				ORDER BY  `subject`.`subject_id` DESC";
				$r1 = @mysqli_query ($conn, $q1) or trigger_error(mysqli_error($conn));
		
		//breadcrum
		ECHO $bread = "<p><a href=\"../\">Home</a> &raquo; Forum</p>";
		
		
         ?>
                  
         <table  class="table table-bordered table-hover table-striped display" id="example" >
           <thead>
            <tr class="top">
             <th colspan="2">Forums</th>
             <th>Topics</th>
             <th>Questions</th>
             <th width="200">Last Question</th>
           </tr>
         </thead>
         <tbody>
         	
         	<?php // iterate the table rows <tr>
				while ($row1 = mysqli_fetch_array($r1, MYSQLI_ASSOC)) {
					$id = $row1['subject_id'];
			?>
          <tr class="odd gradeX">
           <td align="center" width="80px"><img src="images/<?php echo $row1['avatar']; ?>" align="left" alt="Forum" width="70" class="imgclass" /></td>
           <td width="700"><h3><a href="topics.php?subj=<?php echo $id; ?>" title="<?php echo ucwords($row1['subject']); ?>" ><?php echo ucwords($row1['subject']); ?></a></h3>
           	<span class="subjdesc"><?php echo ucwords($row1['description']); ?></span>
           </td>
           <td>
           	<?php
           	$q2 = "SELECT topic.topic_id 
				FROM `topic`
				JOIN subject ON subject.subject_id = topic.subject_id
				WHERE topic.subject_id = '$id'";				
				
				$r2 = @mysqli_query ($conn, $q2) or trigger_error(mysqli_error($conn));
				echo $numoftopics = mysqli_num_rows($r2);
           	?>
           	</td>
           	
           <td>
           	<?php
           	$q3 = "SELECT posts.post_id	FROM `posts`
				JOIN topic ON topic.topic_id = posts.topic_id
				JOIN subject ON subject.subject_id = topic.subject_id
				WHERE topic.subject_id = '$id'";				
				
				$r3 = @mysqli_query ($conn, $q3) or trigger_error(mysqli_error($conn));
				echo $numofposts = mysqli_num_rows($r3);
           	?></td>
           <td>
			<?php
           	$q4 = "SELECT posts.post_id, posts.title, posts.author, UNIX_TIMESTAMP() - posts.posted_date AS TimeSpent, posts.posted_date FROM `posts`
				JOIN topic ON topic.topic_id = posts.topic_id
				JOIN subject ON subject.subject_id = topic.subject_id
				WHERE topic.subject_id = '$id'
				ORDER BY posts.post_id DESC LIMIT 1";				
				
				$r4 = @mysqli_query ($conn, $q4) or trigger_error(mysqli_error($conn));
				$row4 = mysqli_fetch_array($r4, MYSQLI_ASSOC);
				if (!empty($row4['title'])) {
								$email = $row4['author'];
								$un = explode('@', $email);
								$uname = $un[0];
							echo '<h4>' . $row4['title'] . '</h4><h5> Posted by: ' . ucwords($uname) . '</h5>' ;
							echo '<span class="datee">';
									
	$days = floor($row4['TimeSpent'] / (60 * 60 * 24));
			$remainder = $row4['TimeSpent'] % (60 * 60 * 24);
			$hours = floor($remainder / (60 * 60));
			$remainder = $remainder % (60 * 60);
			$minutes = floor($remainder / 60);
			$seconds = $remainder % 60;
	if($days > 0)
			echo date('F d Y', $row4['posted_date']);
			elseif($days == 0 && $hours == 0 && $minutes == 0)
			echo "few seconds ago";		
			elseif($days == 0 && $hours == 0)
			echo $minutes.' minutes' . " " . $seconds.' seconds ago';
			elseif($days == 0)
			echo $hours.' hours' . " " . $minutes.' minutes' . " " . $seconds.' seconds ago';
			echo '</font><br /></span>';
								
							}
           	?>
           	</td>
          </tr>
          
          <?php } // end of while loop ?>
          
           </tbody>
           <tfoot>
            <tr class="bottom">
             <th colspan="2">Forums</th>
             <th>Topics</th>
             <th>Posts</th>
             <th>Last Post</th>
           </tr>	
         </tfoot>
       </table>
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
