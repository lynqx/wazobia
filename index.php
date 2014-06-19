<?php
$page = 'index';
include ('includes/header.php'); 
 ?>
 
 
    <!-- carousel -->
    <div id="carousel-example-generic" class="carousel slider" data-ride="carousel">

      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
      </ol>

      <!-- Slider Content (Wrapper for slides )-->
      <div class="container">
        <div class="carousel-inner">
          <div class="item active">
            <div class="row">
              <div class="col-md-6 slider-caption animated ">
                <h1 class="animated flash text-info">Proudly Nigeria</h1>
                <p class="animated fadeIn">Wazobia Academy is built with all the tribes in Nigeria in mind. 
                	Education is a right for all not minding tribal or cultural differences</p>
                <a href="/library/index.php" class=" btn btn-info animated fadeInUpBig ">Access Classroom</a>
                
              </div>
              <div class="col-md-6">
                <img src="images/slider/wazobia 1.png" width="100%" class="animated fadeInRightBig" alt="...">
              </div>
              
            </div>
          </div>

          <div class="item ">
            <div class="row">
              <div class="col-md-6 slider-caption animated ">
                <h1 class="animated flash">Education, The best legacy</h1>
                <p class="animated fadeIn">Accessible to all and sundry</p>
                <a href="library/index.php" class=" btn btn-info animated fadeInUpBig ">Access Library</a>
                
              </div>
              <div class="col-md-6">
                <img src="images/slider/wazobia 2.png" class="animated fadeInRightBig" alt="...">
              </div>
              
            </div>
          </div>
          
          <div class="item ">
            <div class="row">
              <div class="col-md-6 slider-caption animated ">
                <h1 class="animated flash">Think... Learn... Grow...</h1>
                <p class="animated fadeIn">Accessible to all and sundry</p>
                <a href="<?php echo $baseurl; ?>library/index.php#register" class=" btn btn-info animated fadeInUpBig ">Register For Free</a>
                
              </div>
              <div class="col-md-6">
                <img src="images/slider/wazobia 3.png" class="animated fadeInRightBig" alt="...">
              </div>
              
            </div>
          </div>
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
              <h5>Clean User Interface</h5>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate, quisquam, quae dicta fuga iste sed eaque consectetur vitae .</p>
            </div>
          </div>
          <div class="col-md-4 feature">
            <div class="feature-icon"><i class="fa fa-desktop"></i></div>
            <div class="feature-description">
              <h5>Responsive</h5>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui, veritatis tempora sint reiciendis alias quia consectetur! !</p>
            </div>
          </div>
          <div class="col-md-4 feature">
            <div class="feature-icon"><i class="fa fa-edit"></i></div>
            <div class="feature-description">
              <h5>Customise Easily</h5>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui, veritatis tempora sint reiciendis alias quia consectetur! !</p>
            </div>
          </div>
        </div>
      </div>  
    </div>
    <div class="background-inverse">
      
    <div class="container choose-us">
      <div class="row">
        <div class="col-md-6"><img src="images/responsive.png" width="100%" alt=""> </div>
        <div class="col-md-6">
          <h3>Why Choose Cascade?</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde, repudiandae, provident, ab, modi velit quisquam voluptas perferendis corporis aliquid sed a vel numquam expedita aspernatur suscipit consequuntur deleniti autem vitae?</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam, tenetur, eveniet ut temporibus quam nobis perspiciatis expedita repudiandae dicta animi corrupti minus itaque quod eum obcaecati nihil numquam reiciendis libero.</p>
          <ul class="list-inline check-list">
            <li class="col-md-4">Responsive <i class="fa fa-check"></i></li>
            <li class="col-md-4">Bootstrap 3.0 <i class="fa fa-check"></i></li>
            <li class="col-md-4">Less Css  <i class="fa fa-check"></i></li>
            <li class="col-md-4">PHP Version <i class="fa fa-check"></i></li>
            <li class="col-md-4">Easy Menu builder <i class="fa fa-check"></i></li>
            <li class="col-md-4">Pixel Perfect <i class="fa fa-check"></i></li>
            <li class="col-md-4">Unlimited colors <i class="fa fa-check"></i></li>
            <li class="col-md-4">Fully Documented <i class="fa fa-check"></i></li>
            <li class="col-md-4">Font Awesome <i class="fa fa-check"></i></li>
          </ul>
        </div>
      </div>
    </div>
    </div>
    
    <div class="services">
      <div class="container">
        <div class="row">
          <div class="col-md-4 service-item">
            <div class="service-icon"><i class="fa fa-user"></i></div>
            <div class="service-description">
              <h5>Clean User Interface</h5>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate, quisquam, quae dicta fuga iste sed eaque consectetur vitae .</p>
            </div>
          </div>
          <div class="col-md-4 service-item">
            <div class="service-icon"><i class="fa fa-mobile"></i></div>
            <div class="service-description">
              <h5>Responsive</h5>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui, veritatis tempora sint reiciendis alias quia consectetur! !</p>
            </div>
          </div>
          <div class="col-md-4 service-item">
            <div class="service-icon"><i class="fa fa-edit"></i></div>
            <div class="service-description">
              <h5>Customise Easily</h5>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui, veritatis tempora sint reiciendis alias quia consectetur! !</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 service-item">
            <div class="service-icon"><i class="fa fa-user"></i></div>
            <div class="service-description">
              <h5>Clean User Interface</h5>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate, quisquam, quae dicta fuga iste sed eaque consectetur vitae .</p>
            </div>
          </div>
          <div class="col-md-4 service-item">
            <div class="service-icon"><i class="fa fa-mobile"></i></div>
            <div class="service-description">
              <h5>Responsive</h5>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui, veritatis tempora sint reiciendis alias quia consectetur! !</p>
            </div>
          </div>
          <div class="col-md-4 service-item">
            <div class="service-icon"><i class="fa fa-edit"></i></div>
            <div class="service-description">
              <h5>Customise Easily</h5>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui, veritatis tempora sint reiciendis alias quia consectetur! !</p>
            </div>
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
    

<?php
include ('includes/footer.php'); 
 ?>
