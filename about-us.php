<?php
$page = 'about';
$page_title = 'About Us';
include ('includes/header.php'); 
 ?>
     <div class="header-discription">
      <div class="container ">    
        <h2>About us</h2>
        <p>What you need to know about us and our team</p>
      </div>
    </div>

    <!--*******************content*********-->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-md-5">
            <div class="box">
              <img src="images/client.jpg">
            </div>
          </div>
          <div class="col-md-7  content-discription">
            <h3>Who we are</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae, provident, nam, et, consectetur molestiae aspernatur ratione placeat dignissimos odio cum non eveniet adipisci voluptas doloribus fugiat maiores odit sint repellat. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate, nisi, quaerat, quo excepturi accusantium sint modi nesciunt dicta distinctio quibusdam eum expedita similique est ullam accusamus quae non placeat dolores. </p> 
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, molestiae, rerum, provident dolorum placeat minus molestias illo odit expedita iure corporis consequuntur repudiandae blanditiis reprehenderit vitae cum repellendus saepe non?</p>
          </div>
        </div> 
      </div>
    </div>
    <!-- ********************content************** -->
    

    
    <div class="statistics background-inverse">
    <div class="header-discription">
      <div class="container ">    
        <h2>Our Skills</h2>
        <p>We are skilled and with a team of lots of years experience</p>
      </div>
    </div>

     
    </div>


    <div class="team">
      <div class="container">
        <div class="heading">
          <h3>Meet Our Team</h3>
          <p>A quick talk with our designers and developers, feel free to follow them on socials</p>
        </div>
        <div class="row">
        	<?php
        	$q = "SELECT * FROM worker_register
        			JOIN worker_roles ON worker_roles.work_id = worker_register.work_id
        			WHERE worker_roles.role_id = 3
        			ORDER BY RAND()
        			LIMIT 4";
			$r = mysqli_query($conn, $q);
			while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
        	?>
          <div class="col-md-3">
            <div class="team-member">
              <img src="library/admin/images/profiles/<?php if(!empty($row['work_image'])) { echo $row['work_image']; } else echo "default.png"; ?>" alt="">  
              <h3 style="color:#0F4F0F"><?php echo $row['work_first_name'] . " ". $row['work_last_name']; ?></h3>
              <?php echo $row['work_email']; ?>
              <ul class="list-inline">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="https://twitter.com/<?php echo $row['work_twitter']; ?>" target="_BLANK"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
              </ul>
            </div>
          </div>
          <?php } ?>
     
        </div>
      </div>
      </div>
   


<?php
include ('includes/footer.php'); 
 ?>