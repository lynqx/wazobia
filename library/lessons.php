<?php 
/*-------------------------// coded by: Tope Omomo (08134053081) /----------------------------------*/
/*-------------------------//		topeomomo@gmail.com			 //---------------------------------*/

if(!empty($_GET['lesson']))
{
	$page_title = "Lessons-".$_GET['lesson'];
	$pagehd = $_GET['lesson'];
	$lesson_id = $_GET['id'];
}
else
{
	$page_title = "Lessons";
	$pagehd = "Lessons";
	$lesson_id = "";
}


$path = "";
$inc_path = $path."partials/";
include($inc_path . 'header.php');

//verify lesson_id and get info
if(!empty($lesson_id))
{
	//confirm validity of lesson_id
	$dur = getColumnValue($conn, 'duration', 'lesson', 'lesson_id', $lesson_id);
	
	if(empty($dur))
	{
		//if invalid lesson_id, redirect
		header('location: classroom.php');
		exit();
	}
	$doc_folder = "docs";
	
	$lesson_html = getColumnValue($conn, 'file_name_html', 'lesson_note', 'lesson_id', $lesson_id);
	$lesson_pdf = getColumnValue($conn, 'file_name', 'lesson_note', 'lesson_id', $lesson_id);
	$lesson_title = ucwords(getColumnValue($conn, 'lesson', 'lesson', 'lesson_id', $lesson_id));

	$html_file = $doc_folder."/".$lesson_html;
	$pdf_file = $doc_folder."/".$lesson_pdf;
	$test_link = "test.php?lesson=$lesson_title&id=$lesson_id";
	$pdf_link = "$doc_folder/$lesson_pdf";


}
else
{
	//if empty lesson_id, redirect to classroom
	header('location: classroom.php');
	exit();
}
?>

<style>
	<!--
	.mylinks1
	{
		font-size: small;
		text-align: right;
		padding-right: 10px;
	}

	//-->
</style>


  						<!-- /header -->
  						<div class="row">
  							<div class="col-mod-12">

  								<ul class="breadcrumb">
  									<li><a href="index.php">Classroom</a></li>
  									<li class="active"><a href="lessons.php">Lessons</a></li>
  								</ul>


  								<h3 class="page-header">Lesson Note   <i class="fa fa-info-circle animated bounceInDown show-info"></i> </h3>

  								<blockquote class="page-information hidden">
  									<p>
  										<b>Lesson Note</b> Here you can read your lesson online, download pdf version and click on links to perform online exercises.
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
  											<?php echo ucwords($lesson_title); ?>
  										</h3>
  									</div>
  									<div class="panel-body panel-border">
										<div class="mylinks1">
											<a target="_blank" href="<?php echo $pdf_link; ?>" class="btn btn-success btn-animate-demo">Download PDF Version</a> &nbsp; 
											<a href="<?php echo $test_link; ?>" class="btn btn-info btn-animate-demo">Take Test</a>
										</div>
											<!-- CONTENT GOES IN HERE -->
											<?php include($html_file); ?>
										
										<div class="mylinks1">
											<a target="_blank" href="<?php echo $pdf_link; ?>" class="btn btn-success btn-animate-demo">Download PDF Version</a> &nbsp; 
											<a href="<?php echo $test_link; ?>" class="btn btn-info btn-animate-demo">Take Test</a>
										</div>
  									</div> <!-- /panel body -->	
  								</div>	
  							</div>
  						</div>


<?php include('partials/footer.php'); ?>

