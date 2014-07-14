</div><!--end of template-body-->


<div class="footer">
  <div class="box">
    <div class="social">
    <a href="#"><i class="fa fa-facebook-square"></i></a>
    <a href="#"><i class="fa fa-twitter-square"></i></a>
    <a href="#"><i class="fa fa-google-plus-square"></i></a>
    <a href="#"><i class="fa fa-linkedin-square"></i></a>
    </div>
   
    <p> &copy; <?php echo date('Y'); ?> <a href="#">wazobia-academy.com</a> All rights reserved</p>
  </div><!--end of box-->
</div><!--end of footer-->


  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://code.jquery.com/jquery.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>


<?php
			// close database connection if open 
			if (isset($conn)) {
				 mysqli_close($conn);
			}
			
			?>
			

</body>
</html>