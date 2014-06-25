<div class="footer">
  							© <?php echo date('Y'); ?> <a href="http://joitsolutions.com">Joit Solutions</a>
  						</div>

  					</div> <!-- /.content -->

  					<!-- .right-sidebar -->
  					 
  					 <?php include('partials/rightsidebar.php'); ?>

  					<!-- /.right-sidebar -->


</div> <!-- /.box-holder -->
</div><!-- /.site-holder -->



<!-- Load JS here for Faster site load =============================-->
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="<?php echo $path; ?>js/jquery-ui-1.10.3.custom.min.js"></script>
<script src="<?php echo $path; ?>js/less-1.5.0.min.js"></script>
<script src="<?php echo $path; ?>js/jquery.ui.touch-punch.min.js"></script>
<script src="<?php echo $path; ?>js/bootstrap.min.js"></script>
<script src="<?php echo $path; ?>js/bootstrap-select.js"></script>
<script src="<?php echo $path; ?>js/bootstrap-switch.js"></script>
<script src="<?php echo $path; ?>js/jquery.tagsinput.js"></script>
<script src="<?php echo $path; ?>js/jquery.placeholder.js"></script>
<script src="<?php echo $path; ?>js/bootstrap-typeahead.js"></script>
<script src="<?php echo $path; ?>js/application.js"></script>
<script src="<?php echo $path; ?>js/moment.min.js"></script>
<script src="<?php echo $path; ?>js/jquery.dataTables.min.js"></script>
<script src="<?php echo $path; ?>js/jquery.sortable.js"></script>
<script type="text/javascript" src="<?php echo $path; ?>js/jquery.gritter.js"></script>
<script src="<?php echo $path; ?>js/jquery.nicescroll.min.js"></script>
<script src="<?php echo $path; ?>js/prettify.min.js"></script>
<script src="<?php echo $path; ?>js/jquery.noty.js"></script>
<script src="<?php echo $path; ?>js/bic_calendar.js"></script>
<script src="<?php echo $path; ?>js/jquery.accordion.js"></script>
<script src="<?php echo $path; ?>js/skylo.js"></script>

<script src="<?php echo $path; ?>js/theme-options.js"></script>


<script src="<?php echo $path; ?>js/bootstrap-progressbar.js"></script>
<script src="<?php echo $path; ?>js/bootstrap-progressbar-custom.js"></script>
<script src="<?php echo $path; ?>js/bootstrap-colorpicker.min.js"></script>
<script src="<?php echo $path; ?>js/bootstrap-colorpicker-custom.js"></script>



<script src="<?php echo $path; ?>js/raphael-min.js"></script>
<script src="<?php echo $path; ?>js/morris-0.4.3.min.js"></script>
<script src="<?php echo $path; ?>js/morris-custom.js"></script>

<script src="<?php echo $path; ?>js/charts/jquery.sparkline.min.js"></script>	

<!-- NVD3 graphs  =============================-->
<script src="<?php echo $path; ?>js/nvd3/lib/d3.v3.js"></script>
<script src="<?php echo $path; ?>js/nvd3/nv.d3.js"></script>
<script src="<?php echo $path; ?>js/nvd3/src/models/legend.js"></script>
<script src="<?php echo $path; ?>js/nvd3/src/models/pie.js"></script>
<script src="<?php echo $path; ?>js/nvd3/src/models/pieChart.js"></script>
<script src="<?php echo $path; ?>js/nvd3/src/utils.js"></script>
<script src="<?php echo $path; ?>js/nvd3/sample.nvd3.js"></script>

<script src="<?php echo $path; ?>js/bootstrap-tour.js"></script>

  <script src="js/bootstrap-datatables.js"></script>
<script src="js/dataTables-custom.js"></script>

<!-- Core Jquery File  =============================-->
<script src="<?php echo $path; ?>js/core.js"></script>
<!-- <script src="<?php echo $path; ?>js/dashboard-custom.js"></script> -->


<?php
			// close database connection if open 
			if (isset($conn)) {
				 mysqli_close($conn);
			}
			
			?>
			

</body>
</html>