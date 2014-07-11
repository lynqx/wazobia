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


    <div class="container">
    	      <div class="box">
    	      	
    	      	

    	 <?php 
 
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
             <th width="500">Topic</th>
             <th>Posts</th>
             <th>Last Post</th>
             <th>Date Created</th>
           </tr>
         </thead>
         <tbody>
         	
         	<?php // iterate the table rows <tr>
				while ($row1 = mysqli_fetch_array($r1, MYSQLI_ASSOC)) {
					$id = $row1['topic_id'];
			?>
          <tr class="odd gradeX">
           <td><h4><a href="forum.php?id=<?php echo $id; ?>"><?php echo ucwords($row1['topic']); ?></a></h4>
           </td>
           <td>
           	<?php
           	$q2 = "SELECT posts.post_id 
				FROM `posts`
				JOIN topic ON topic.topic_id = posts.topic_id
				WHERE posts.topic_id = '$id'";				
				
				$r2 = @mysqli_query ($conn, $q2) or trigger_error(mysqli_error($conn));
				echo $numofposts = mysqli_num_rows($r2);
           	?>
           	</td>
           	
           <td>
           	<?php
           	$q4 = "SELECT posts.post_id, posts.title FROM `posts`
				JOIN topic ON topic.topic_id = posts.topic_id
				WHERE posts.topic_id = '$id'
				ORDER BY posts.post_id DESC LIMIT 1";				
				
				$r4 = @mysqli_query ($conn, $q4) or trigger_error(mysqli_error($conn));
				$row4 = mysqli_fetch_array($r4, MYSQLI_ASSOC);
				echo $row4['title'];
           	?>
           	</td>
           
            <td><?php echo $row1['date']; ?></td>
          </tr>
          
          <?php } // end of while loop ?>
          
           </tbody>
           <tfoot>
            <tr class="bottom">
             <th width="500">Topic</th>
             <th>Posts</th>
             <th>Last Post</th>
             <th>Date Created</th>
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
