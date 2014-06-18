<?php
$page = 'contact';
$page_title = 'Contact Us';
include ('includes/header.php'); 
 ?>

       <div class="page-title">
      <div class="container">
        <h2>Contact Us</h2>
        
      </div>
    </div>

  <div class="map">
    <div class="container">
      <iframe style="width:100%;border:none;" height="350" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=New+York,+NY,+United+States&amp;aq=0&amp;oq=new+yo&amp;sll=38.671014,-99.426083&amp;sspn=0.007363,0.016512&amp;t=m&amp;ie=UTF8&amp;hq=&amp;hnear=New+York&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe>
    </div>
  </div>

  <div class="container contact">
    <div class="row">
      <div class="col-md-6">
        <form action="" class="contact-form">
        <h4>Keep in touch</h4>
          <div class="row">
          <div class="col-md-4">
            <label for="name">Name</label>
            <input type="text" class="form-control">
          </div>
          <div class="col-md-4">
            <label for="name">Email</label>
            <input type="text" class="form-control">
          </div>
        </div>
        <div class="row">
          <div class="col-md-8">
             <label for="name">Your Message</label>
            <textarea name="" id="" cols="30" rows="5" class="form-control"></textarea>
          </div>
        </div>
        <input type="submit" value="Submit" class="btn btn-default">
        </form>
      </div>
      <div class="col-md-6">
        <h4>How to reach us</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias, consectetur, architecto, velit, assumenda facilis tempora enim praesentium autem animi deserunt aliquid maiores expedita quisquam blanditiis harum quaerat sunt possimus tempore.</p>
        <address>
            <p><abbr title="Email"><i class="fa fa-envelope"></i> </abbr> support@yourdomain.com</p>
            <p><abbr title="Address"><i class="fa fa-home"> </i> </abbr> My address at My city</p>
             <p><abbr title="Address"><i class="fa fa-map-marker"> </i> </abbr> Rajahmundry, AP 533103</p>
          </address>
      </div>
    </div>
    </div>
  
<?php
include ('includes/footer.php'); 
 ?>
