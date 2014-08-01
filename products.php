<?php
$page = 'product';
$page_title = 'Buy our Products';
include ('includes/header.php'); 
 ?>
     <div class="header-discription">
      <div class="container ">    
        <h2>Products</h2>
        <p>Get a comprehensive view of all our products and DVDs available for sale</p>
      </div>
    </div>

    <!--*******************content*********-->
    <div class="content">
      <div class="container">
        <div class="row">
  
          <div class="col-md-12  content-discription">
            <?php
				include('all_products.php');
			?>
            
          </div>
        </div> 
      </div>
    </div>
    <!-- ********************content************** -->
   
   


<?php
include ('includes/footer.php'); 
 ?>