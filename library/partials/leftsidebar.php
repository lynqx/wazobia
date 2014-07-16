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

                    <li class="submenu"><a class="dropdown" href="student_area.php" data-original-title="Dashboard"> <i class="fa fa-dashboard"></i><span class="hidden-minibar"> Dashboard <span class="badge bg-success2 pull-right">5</span></span></a></li>
                    <li class="submenu"><a class="dropdown" href="add_dvd_code.php" data-original-title="Add DVD Code"> <i class="fa fa-user"></i><span class="hidden-minibar"> Add New DVD Key <span class="badge bg-success2 pull-right">5</span></span></a></li>
                    <li class="submenu"><a class="dropdown" href="#" data-original-title="Subject"> <i class="fa fa-cog"></i><span class="hidden-minibar"> Subjects <span class="badge bg-success2 pull-right">5</span></span></a>
							<ul>
								<?php include('find_subjects.php'); ?>
		                    </ul>
                    </li>
                    <li class="submenu"><a class="dropdown" href="../forum" data-original-title="Forum"> <i class="fa fa-cog"></i><span class="hidden-minibar"> Forum </span></a>
                </ul>
              </div>
            </div> <!-- /.left-sidebar -->