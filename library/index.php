<?php include('partials/header.php'); ?>  
  						<!-- /header -->
  						<div class="row">
  							<div class="col-mod-12">

  								<ul class="breadcrumb">
  									<li><a href="index.php">Library</a></li>
  									<li class="active"><a href="language.php">Language</a></li>
  								</ul>

  								<div class="form-group hiddn-minibar pull-right">
  									<input type="text" class="form-control form-cascade-control nav-input-search" size="20" placeholder="Search through library" />

  									<span class="input-icon fui-search"></span>
  								</div>

  								<h3 class="page-header"> Select Your Language <i class="fa fa-info-circle animated bounceInDown show-info"></i> </h3>

  								<blockquote class="page-information hidden">
  									<p>
  										<b>Language Page</b> is the basic page where you can select your language.
  									</p>
  								</blockquote>

  							</div>
  						</div>

  						<!-- Demo Panel -->
  						<div class="row">
  							<div class="col-md-12">
  								<div class="panel panel-cascade">
  									<div class="panel-heading">
  										<h3 class="panel-title text-primary">
  											Welcome! Please select your preferred language
  											
  										</h3>
  									</div>
  									<div class="panel-body panel-border">
  										<div class="list-group demo-list-group">
				          					<?php
							            	$q = "SELECT language.lang_id, language.language
												FROM  `language` 
												JOIN  `lesson` ON language.lang_id = lesson.lang_id
												ORDER BY language.lang_id";
												$r = @mysqli_query ($conn, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($conn));
												while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
														?>

														<a class="list-group-item " href="language/?lang=<?php echo $row['lang_id']; ?>"><?php echo ucwords($row['language']); ?></a>
															   			<?php
																			}
																		?>
							              

									</div> <!-- /panel body -->	
									</div>
							  
  								</div>	
  							</div>
  						</div>

  					</div> <!-- /.content -->


<?php include('partials/footer.php'); ?>

