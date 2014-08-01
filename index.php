<?php
$page = 'index';
include ('includes/header.php'); 
 ?>
 
 
    <!-- carousel -->
    <div id="carousel-example-generic" class="carousel slider" data-ride="carousel">

      <!-- Indicators -->
      <ol class="carousel-indicators">
      	<?php
        	$q = "SELECT * FROM product_summary
        			JOIN dvd_subject_pack ON dvd_subject_pack.dvd_pack_id = product_summary.dvd_pack_id";
			$r = mysqli_query($conn, $q);
			$count = mysqli_num_rows($r);
			for($i=1; $i <= $count; $i++) {
		?>
		
        <li data-target="#carousel-example-generic" data-slide-to=" <?php echo $i; ?>" class="<?php if($i == 1) {echo 'active'; } ?>">
        	
        </li>
        <?php } ?>

      </ol>

      <!-- Slider Content (Wrapper for slides )-->
      <div class="container">
        <div class="carousel-inner">
        	
        	<?php
			while ($row = mysqli_fetch_array($r)) {
				$id = $row['summary_id'];
        	?>
        	
          <div class="item <?php if($id == 1) { echo "active"; } ?>">
            <div class="row">
              <div class="col-md-6 slider-caption animated ">
                <h1 class="animated flash text-info"><?php echo $row['subject_pack_name']; ?></h1>
                <p class="animated fadeIn"><?php echo $row['dvd_pack_info']; ?></p>
                <a href="products.php?pack=<?php echo $row['dvd_pack_id']; ?>" class=" btn btn-info animated fadeInUpBig "><?php echo $row['subject_pack_name']; ?></a>
                
              </div>
              <div class="col-md-6">
                <img src="images/slider/<?php echo $row['image']; ?>" width="100%" class="animated fadeInRightBig" alt="...">
              </div>
              
            </div>
          </div>

		<?php } ?>
		

        </div>

        <!-- Slider Content (Wrapper for slides )-->


        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
          <span class="fa fa-arrow-circle-o-left fa-2x"></span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
          <span class="fa fa-arrow-circle-o-right fa-2x"></span>
        </a>
      </div>
    </div>
    
    <div class="features">
      <div class="container">
        <div class="row">
          <div class="col-md-4 feature">
            <div class="feature-icon"><i class="fa fa-user"></i></div>
            <div class="feature-description">
              <h5>Study</h5>
              <p>With materials from us, study well for your exams.</p>
            </div>
          </div>
          <div class="col-md-4 feature">
            <div class="feature-icon"><i class="fa fa-desktop"></i></div>
            <div class="feature-description">
              <h5>Prepare</h5>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui, veritatis tempora sint reiciendis alias quia consectetur! !</p>
            </div>
          </div>
          <div class="col-md-4 feature">
            <div class="feature-icon"><i class="fa fa-edit"></i></div>
            <div class="feature-description">
              <h5>Succeed</h5>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui, veritatis tempora sint reiciendis alias quia consectetur! !</p>
            </div>
          </div>
        </div>
      </div>  
    </div>
    
    <div class="background-inverse">
    <div class="container choose-us">
      <div class="row">
        <div class="col-md-6">
			<video width="100%" controls autoplay>
			  <source src="viddys/aye.mp4" type="video/mp4">
			  <object data="viddys/aye.mp4" width="100%">
			  </object>
			</video>
		</div>
		
        <div class="col-md-6">
          <h3>The Calculus</h3>
          <p>Watch free trailer of <b style="color:#396">THE CALCULUS</b> series</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam, tenetur, eveniet ut temporibus quam nobis perspiciatis expedita repudiandae dicta animi corrupti minus itaque quod eum obcaecati nihil numquam reiciendis libero.</p>
          <ul class="list-inline check-list">
            <li class="col-md-4">Objectives <i class="fa fa-check"></i></li>
            <li class="col-md-4">Objectives <i class="fa fa-check"></i></li>
            <li class="col-md-4">Objectives <i class="fa fa-check"></i></li>
            <li class="col-md-4">PHP Version <i class="fa fa-check"></i></li>
            <li class="col-md-4">Easy Menu builder <i class="fa fa-check"></i></li>
            <li class="col-md-4">Pixel Perfect <i class="fa fa-check"></i></li>
          </ul>
        </div>
      </div>
      
      <hr>
            <div class="row">
        <div class="col-md-6">
			<video width="100%" controls>
			  <source src="viddys/aye.mp4" type="video/mp4">
			  <object data="viddys/aye.mp4" width="100%">
			  </object>
			</video>
		</div>
		
        <div class="col-md-6">
          <h3>Quantum Physics</h3>
          <p>Watch free trailer of <b style="color:#396">experimental definitions of Physics</b> and the ultimate series</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam, tenetur, eveniet ut temporibus quam nobis perspiciatis expedita repudiandae dicta animi corrupti minus itaque quod eum obcaecati nihil numquam reiciendis libero.</p>
          <ul class="list-inline check-list">
            <li class="col-md-4">Objectives <i class="fa fa-check"></i></li>
            <li class="col-md-4">Objectives <i class="fa fa-check"></i></li>
            <li class="col-md-4">Objectives <i class="fa fa-check"></i></li>
            <li class="col-md-4">PHP Version <i class="fa fa-check"></i></li>
            <li class="col-md-4">Easy Menu builder <i class="fa fa-check"></i></li>
            <li class="col-md-4">Pixel Perfect <i class="fa fa-check"></i></li>
          </ul>
        </div>
      </div>
      
      
    </div>
    </div>

    <div class="testimonials">
      <div class="container">
        <h3>Testimonials</h3>
        <div class="qoute">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente, dolorum nam illum cupiditate distinctio facilis blanditiis rerum officiis soluta animi corrupti quibusdam nulla doloribus et laborum minus itaque magnam temporibus.</p>
          <div class="client-details">
            <img src="images/team/one.png" alt="">
            Joel Helin, <span>Product Designer</span>
          </div>
        </div>
      </div>
      </div>
      
      
    <div class="clients">
      <div class="container">
        <ul class="list-inline">
          <li><img src="images/clents/dribbble.png" alt=""></li>
          <li><img src="images/clents/envato.png" alt=""></li>
          <li><img src="images/clents/evernote.png" alt=""></li>
          <li><img src="images/clents/microsoft.png" alt=""></li>
          <li><img src="images/clents/netflix.png" alt=""></li>
        </ul>
      </div>
    </div>
    

<?php
include ('includes/footer.php'); 
 ?>
