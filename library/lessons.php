<?php 
/* Classroom */
/* Doubleakins*/
/* 08063777394*/
/* 23062014*/

if(!empty($_GET['lesson']))
$page_title = $_GET['lesson']." - Classroom";
else
$page_title = "Classroom";

$path = "";
$inc_path = $path."partials/";
include($inc_path . 'header.php');

	/* redirect when student not log in */
	if (!isset($_SESSION['student_id']))
	{
		// Redirect:
		redirect_to("index.php");
	}
	else
	{
		$student = $_SESSION['student_id'];
	}

	// Check for a valid Category ID, through GET or POST:
	if ( isset($_GET['less']) && is_numeric($_GET['less']))
	{ 
		$less = $_GET['less'];
	}
	elseif (isset($_POST['less']) && is_numeric($_POST['less']))
	{
		$less = $_POST['less'];
	}
	else
	{ // No valid ID, kill the script.
		redirect_to("student_area.php");
	}

	// get subject name
	$q = "SELECT lesson FROM lesson WHERE lesson_id=$less";
	$r = mysqli_query ($conn, $q);
	$row = mysqli_fetch_array ($r, MYSQLI_ASSOC);
	$lesson = $row['lesson'];

?>

  						<!-- /header -->
  						<div class="row">
  							<div class="col-mod-12">

  								<ul class="breadcrumb">
  									<li><a href="index.php">Classroom</a></li>
  									<li class="active"><a href="language.php"><?php echo ucwords($lesson) ?></a></li>
  								</ul>


  								<h3 class="page-header"> <?php echo ucwords($lesson) ?> <i class="fa fa-info-circle animated bounceInDown show-info"></i> </h3>

  								<blockquote class="page-information hidden">
  									<p>
  										<b><?php echo ucwords($lesson) ?></b> classroom page for <?php echo ucwords($lesson) ?>.
  									</p>
  								</blockquote>

  							</div>
  						</div>

  						<!-- Demo Panel -->
  						<div class="row">
  							<div class="col-md-12">
  								<div class="panel panel-cascade">
  									<div class="panel-body panel-border">
  										Select the lessons and the lesson notes and the pdf file and the exercises to do
  									</div> <!-- /panel body -->	
  								</div>	
  							</div>
  						</div>
  						
  						
<?php include('partials/footer.php'); ?>

