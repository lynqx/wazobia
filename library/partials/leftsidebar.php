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

                    <li class="submenu"><a class="dropdown" href="student_area.php" data-original-title="Dashboard"> <i class="fa fa-dashboard"></i><span class="hidden-minibar"> Dashboard </span></a></li>
                    <li class="submenu"><a class="dropdown" href="add_dvd_code.php" data-original-title="Add DVD Code"> <i class="fa fa-plus-circle"></i><span class="hidden-minibar"> Add New DVD Key </span></a></li>
                    <li class="submenu"><a class="dropdown" href="#" data-original-title="Subject"> <i class="fa fa-folder-open"></i><span class="hidden-minibar"> Subjects 
                    	<span class="badge bg-success2 pull-right">
                    		<?php
                    		$student_id = $_SESSION['student_id'];
                    		$select = "SELECT DISTINCT subject.subject, subject.subject_id 
				FROM dvd_code_user 
				JOIN dvd_code 
				ON dvd_code_user.dvd_code_id=dvd_code.dvd_code_id 
				JOIN dvd 
				ON dvd_code.dvd_id=dvd.dvd_id 
				JOIN subject 
				ON dvd.subject_id=subject.subject_id 
				WHERE student_id='$student_id'";
		
		
		$rslt = mysqli_query($conn, $select) or die(mysqli_error($conn));
		echo $rowno = mysqli_num_rows($rslt);
		?>
                    	</span></span></a>
							<ul>
								<?php include('find_subjects.php'); ?>
		                    </ul>
                    </li>
                    <li class="submenu"><a class="dropdown" href="../forum" data-original-title="Forum"> <i class="fa fa-reorder"></i><span class="hidden-minibar"> Forum </span></a>
                </ul>
              </div>
            </div> <!-- /.left-sidebar -->