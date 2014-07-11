<?php
 include_once('class.breadcrumb.inc.php');
 $breadcrumb = new breadcrumb;
 
	$breadcrumb->homepage='home'; // sets the home directory name
	$breadcrumb->dirformat='ucwords'; // Show the directory in this style
	$breadcrumb->symbol=' &raquo; '; // set the separator between directories 
	$breadcrumb->showfile=FALSE; // shows the file name in the path
	$breadcrumb->changeFileName=array('/index.php'=>'index',
										'/topics.php'=>'topics');
	$breadcrumb->cssClass='crumb'; // css class to use
	$breadcrumb->hideFileExt=TRUE; // hide file extensions
 
 echo "<p>".$breadcrumb->show_breadcrumb()."</p>";
 
 /*
 $breadcrumb->homepage='homepage'; // sets the home directory name
 $breadcrumb->dirformat='ucwords'; // Show the directory in this style
 $breadcrumb->symbol=' > '; // set the separator between directories 
 $breadcrumb->showfile=TRUE; // shows the file name in the path
 $breadcrumb->special='elmer'; // special directory formatting
 $breadcrumb->changeName=array('dirname1'=>'Directory Name 1',
                               'dirname2'=>'Directory Name 2',
                               'dirname3'=>'Directory Name 3',
                               'dirname4'=>'Directory Name 4');
 $breadcrumb->changeFileName=array($_SERVER['PHP_SELF']=>'Example Page',
                                   '/index.htm'=>'Contact Us');
 $breadcrumb->fileExists=array('index.htm','index.php','default.htm');
 $breadcrumb->cssClass='crumb'; // css class to use
 $breadcrumb->target='_top'; // frame target
 $breadcrumb->linkFile=TRUE; // Link the file to itself
 $breadcrumb->_toSpace=TRUE; // converts underscores to spaces
 
 */
?>