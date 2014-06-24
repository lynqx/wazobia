<?php

?>
<!-- .left-sidebar -->
            <div class="left-sidebar">
              <div class="sidebar-holder">
                <ul class="nav  nav-list">

                  <!-- sidebar to mini Sidebar toggle -->
                  <li class="nav-toggle">
                    <button class="btn  btn-nav-toggle text-primary"><i class="fa fa-angle-double-left toggle-left"></i> </button>
                  </li>

                    <?php //buildMenu($menuList); ?>
                    <li class="submenu"><a class="dropdown" href="" data-original-title="Dashboard"> <i class="fa fa-user"></i><span class="hidden-minibar"> Dashboard <span class="badge bg-success2 pull-right">5</span></span></a></li>
                    <li class="submenu"><a class="dropdown" href="" data-original-title="Heart"> <i class="fa fa-heart"></i><span class="hidden-minibar"> Heart <span class="badge bg-success2 pull-right">5</span></span></a></li>
                    <li class="submenu"><a class="dropdown" href="" data-original-title="Settings"> <i class="fa fa-cog"></i><span class="hidden-minibar"> Settings <span class="badge bg-success2 pull-right">5</span></span></a></li>

                    <li class="submenu"><a class="dropdown" href="#" data-original-title="Details"> <i class="fa fa-wrench"></i><span class="hidden-minibar"> Details <span class="badge bg-success2 pull-right">5</span></span></a>
                    	<ul>
                 	<li class="submenu"><a class="dropdown" href="" data-original-title=""> <i class="fa fa-cog"></i><span class="hidden-minibar"> Settings <span class="badge bg-success2 pull-right">5</span></span></a></li>
                    <li class="submenu"><a class="dropdown" href="" data-original-title=""> <i class="fa fa-cog"></i><span class="hidden-minibar"> Settings <span class="badge bg-success2 pull-right">5</span></span></a></li>
				</ul>
                    <li class="submenu"><a class="dropdown" href="#" data-original-title="Details"> <i class="fa fa-wrench"></i><span class="hidden-minibar"> Subjects <span class="badge bg-success2 pull-right">5</span></span></a>
                    	<ul>
						<?php //include('find_subjects.php'); ?>

                    	</ul>
                    </li>
					<?php include('find_subjects.php'); ?>
                </ul>
              </div>
            </div> <!-- /.left-sidebar -->