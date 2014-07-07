<?php 
/*-------------------------// coded by: Tope Omomo (08134053081) /----------------------------------*/
/*-------------------------//		topeomomo@gmail.com			 //---------------------------------*/


//---------------------- SETTINGS ------------------------------//

$max_qno = 8;				//maximum no of questions
$option_no = 5;				//no of options for answers (NOTE: MAXIMUM=5)

//--------------------------------------------------------------//

//print_r($_GET);

//check lesson variables and include header
if(!empty($_GET['lesson']))
$page_title = "Test-".$_GET['lesson'];
else
$page_title = "Lessons";

$path = "";
$inc_path = $path."partials/";
include($inc_path . 'header.php');
$this_page = $_SERVER['PHP_SELF'];

if(empty($_GET['id']))
{
	header('location: student_area.php');
	exit();
}
else
{
	$lesson_id = $_GET['id'];
	$std = $_SESSION['student_id'];
	
	//get lesson name
	$lesson = getColumnValue($conn, 'lesson', 'lesson', 'lesson_id', $lesson_id);
	
	//get current question no
	if(!empty($_GET['qno']))
	$qno = $_GET['qno'];
	else
	$qno = 1;
	
	//check if finished
	if(!empty($_GET['finished']))
	$finished = $_GET['finished'];
	else
	$finished = 0;
	
}



//check for retake
if(isset($_GET['retake']) && $_GET['retake']==1)
{
	//destroy all question and answer sessions
	for($k=1; $k<=$max_qno; $k++)
	{
		unset($_SESSION['std_ans_'.$k.'_'.$std.'_'.$lesson_id]);
	}
}



//create question ids and answers ids in session
if(!empty($_GET['t_start']) && $_GET['t_start']=='YES' && empty($_SESSION['ques_1_'.$std.'_'.$lesson_id]) && empty($_SESSION['ans_1_'.$std.'_'.$lesson_id]))
{
	//$lesson_id = $_GET['id'];
	
	
	//select '$max_qno' of id corresponding to lesson_id
	$quest_ids = array();
	
	$sel = "SELECT exercise_question_id FROM exercise_question WHERE lesson_id='$lesson_id'";
	$rslt = mysqli_query($conn, $sel) or die('Cannot fetch questions');
	$rowno = mysqli_num_rows($rslt);
	
	if($rowno==0)
	die('NO RECORDS FOUND!');
	
	while($row = mysqli_fetch_row($rslt))
	{
		array_push($quest_ids, $row[0]);
	}
	
	mysqli_free_result($rslt);
	
	//shuffle array
	shuffle($quest_ids);
	shuffle($quest_ids);
	
	//pick only '$max_qno' no of entries and store in session in format: $_SESSION['ques_1_**'.'_'.$lesson_id], where ** = student_id
	for($nq=0; $nq<$max_qno; $nq++)
	{
		$nn = $nq+1;
		//store question_id
		$_SESSION['ques_'.$nn.'_'.$std.'_'.$lesson_id] = $quest_ids[$nq];
		
		//store answer_id
		$rslt = mysqli_query($conn, "SELECT exercise_answers_id FROM exercise_question WHERE exercise_question_id='$quest_ids[$nq]' AND lesson_id='$lesson_id'") or die('Cannot fetch questions ');
		if(mysqli_num_rows($rslt)==0)
		die('Question-Answer Discrepancy Detected');
		
		$rw = mysqli_fetch_row($rslt);
		$_SESSION['ans_'.$nn.'_'.$std.'_'.$lesson_id] = $rw[0];
		
	}
	mysqli_free_result($rslt);
	
	//print_r($_SESSION);			//comment out if you want to see '_SESSION' array
}

//if at least question and answer no 1 is valid
if(!empty($_SESSION['ques_1_'.$std.'_'.$lesson_id]) && !empty($_SESSION['ans_1_'.$std.'_'.$lesson_id]))
{
	//analyze previous answer
	$last_qno = $qno-1;	
	
	if(!empty($_GET['std_ans']))
	$_SESSION['std_ans_'.$last_qno.'_'.$std.'_'.$lesson_id] = $_GET['std_ans'];
	
	
	
	
	//obtain exhibit url and question
	if($qno <= $max_qno)
	{
		$questid = $_SESSION["ques_".$qno."_".$std.'_'.$lesson_id];
		$sel = "SELECT exhibit_ref, question FROM exercise_question WHERE lesson_id='$lesson_id' AND exercise_question_id='$questid'";
		$rslt = mysqli_query($conn, $sel) or die('Cannot fetch questions');
		
		if(mysqli_num_rows($rslt)==0)
		die('Question-Answer Discrepancy Detected');
		
		$rw = mysqli_fetch_row($rslt);
		
		if(!empty($rw[0]))
		$exh_url = "exhibit/".$rw[0];
		else
		$exh_url = "";				//<<exh_url
		
		$qst = $rw[1];				//<<question
		
		mysqli_free_result($rslt);
	}
	
	//display current question and options
	
	
}

function do_marking($x, $y)
{
	$corr = "&nbsp;<span style=\"color: green;\">&#10004;</span>";
	$wron = "&nbsp;<span style=\"color: red;\">&#10007;</span>";
	
	if($x==$y)
	return $corr;
	else
	return $wron;
}


?>

<style>
	<!--
	#question
	{
		font-size: large;
		text-align: left;
		font-weight: bold;
		letter-spacing: 1px;
		color: #030;
		margin-bottom: 5px;
	}
	
	#quest_no
	{
		font-size: large;
		text-align: left;
		font-weight: bold;
		font-fammily: courier;
		padding: 3px 3px 3px 7px;
		border: 1px solid #ccc;
		border-radius: 18px;
		letter-spacing: 1px;
		background-color: #030;
		color: #0f0;
	}
	
	.tip_block
	{
		border: 1px dashed #ececec;
		padding: 7px;
		margin-bottom: 6px;
		display: none;
	}
	
	.tip_block h5
	{
		font-weight: bold;
	}
	
	.tip_block .tell
	{
		font-style: italic;
		font-size: small;
		color: #666;
	}
	
	.tip_block .lbl
	{
		background-color: #ebd6ff;
		margin: .2em .2em 0 .2em;
		padding: .1em;
		font-variant: small-caps;
	}
	
	.tip_block .ans
	{
		color: #060;
		font-weight: bold;
	}
	
	.tip_block .blk-a
	{
		margin-bottom: .5em;
	}
	
	.tip_block .blk-b
	{
		padding: .2em;
		background-color: #faf5ff;
		border: .1em solid #ebd6ff;
		color: #333;
	}
	
	.qst_title
	{
		font-weight: bold;
		padding: 3px;
		padding-left: 8px;
		background-color: #f4f4f4;
		border-radius: 8px 8px 0 0;
		margin-top: .3em;
	}
	
	.qst_title a:hover
	{
		text-decoration: none;
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


  								<h3 class="page-header">Test   <i class="fa fa-info-circle animated bounceInDown show-info"></i> </h3>

  								<blockquote class="page-information hidden">
  									<p>
  										<b>Test</b> Here you can take online test on <?php echo ucwords($lesson); ?>.
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
  											<?php echo 'Test on '.ucwords($lesson); ?>
  										</h3>
  									</div>
  									<div class="panel-body panel-border">
										<div class="exhibit col-mod-12">
											<?php
												if($finished!=1)
												{
													if(is_image($exh_url))
													{
														echo "<img src=\"$exh_url\" alt=\"\" border=\"0\" style=\"padding: 3px; \">";
														$contt = "image";
													}
													elseif(!empty($exh_url))
													{
														include(exh_url);
														$contt = "document";
													}
													else
													{
														$contt = "";
													}
													
													if(!empty($contt))
													echo
													"<br><div style=\"font-size: small; color: #ff5050; \">Use the $contt above to answer the next question below.</div><br>";
												}
											?>
											
										</div>
										
										<?php if($finished!=1)
										{
										?>
											<div id="quest_no">
												Question <?php echo $qno; ?>
											</div>
											
											<div id="question">
												<?php echo $qst; ?>
											</div>
											
											<div id="answers">
										
											<form action="<?php echo $this_page; ?>" method="GET">
												<?php
													//get answers
													$ans_label = array('A', 'B', 'C', 'D', 'E');
													$ans_sel = "SELECT exercise_answers.answers, exercise_answers.exercise_answers_id FROM question_answer JOIN exercise_answers ON question_answer.exercise_answers_id=exercise_answers.exercise_answers_id WHERE question_answer.exercise_question_id='$questid' LIMIT 0,$option_no";
													$n = 0;
													
													
													$ans_rslt = mysqli_query($conn, $ans_sel) or die(mysqli_error($conn).'Cannot Obtain Answers');
													
													//check if question already answered and disable
													if(!empty($_SESSION['std_ans_'.$qno.'_'.$std.'_'.$lesson_id]))
													$qds = "disabled";
													else
													$qds = "";
														
													while($ansrow = mysqli_fetch_array($ans_rslt, MYSQLI_ASSOC))
													{
														
														if(!empty($qds) && $_SESSION['std_ans_'.$qno.'_'.$std.'_'.$lesson_id]==$ansrow['exercise_answers_id'])
														echo "<br><input type=\"radio\" $qds checked value=\"".$ansrow['exercise_answers_id']."\" name=\"std_ans\"> (".$ans_label[$n].") ".$ansrow['answers']."<br>";
														
														
														echo "<br><input type=\"radio\" $qds value=\"".$ansrow['exercise_answers_id']."\" name=\"std_ans\"> (".$ans_label[$n].") ".$ansrow['answers']."<br>";
														$n++;
													}
													
													mysqli_free_result($ans_rslt);
													
													if(!empty($qds))
													echo "<br><span style=\"color: red;\">You already supplied an answer to this question</span><br>
														<span style=\"color: green; \">If you would like to retake this test please LOGOUT and LOGIN again.</span><br>";
													
												?>
												
												<br>
												<button class="btn btn-success btn-animate-demo" type="submit" >Next &raquo;</button>
												<?php
													if($qno >= $max_qno)
													echo "<input type=\"hidden\" name=\"finished\" value=\"1\" >";
												?>
												<input type="hidden" name="id" value="<?php echo $lesson_id; ?>" >
												<input type="hidden" name="lesson" value="<?php echo $lesson; ?>" >
												<input type="hidden" name="qno" value="<?php echo $qno+1; ?>" >
											
											
											</form>
										<?php 
										}
										else
										{
											ECHO "<h4 style=\"color: #030; \">Result</h4>";
											
											//find percentage of aggregate score
											$sc = 0;
											for($cn = 0; $cn<$max_qno; $cn++)
											{
												$nn = $cn+1;
												if(isset($_SESSION['ans_'.$nn.'_'.$std.'_'.$lesson_id]) && isset($_SESSION['std_ans_'.$nn.'_'.$std.'_'.$lesson_id]) && $_SESSION['ans_'.$nn.'_'.$std.'_'.$lesson_id]==$_SESSION['std_ans_'.$nn.'_'.$std.'_'.$lesson_id])
												$sc++;
											}
											
											$sc_perc = round($sc*100/$max_qno, 2);
											$colr = "#008080";
											$score = "Excellent";
											
											//determine percent color
											switch($sc_perc)
											{
												case $sc_perc<40:
												$colr = "#f00";
												$score = "Poor";
												break;
												
												case $sc_perc>=40 && $sc_perc<50:
												$colr = "#f93";
												$score = "Fair";
												break;
												
												case $sc_perc>=50 && $sc_perc<60:
												$colr = "#66f";
												$score = "Average";
												break;
												
												case $sc_perc>=60 && $sc_perc<70:
												$colr = "#09c";
												$score = "Good";
												break;
												
												case $sc_perc>=70 && $sc_perc<80:
												$colr = "#099";
												$score = "Very Good";
												break;
												
												default:
												$colr = "#008080";
												$score = "Excellent";
											}
											
											
											echo "<div>
													<h4 style=\"font-weight: bold; color: $colr; \">$score</h4>
													<span>You answered <b>$sc</b> out of <b>$max_qno</b> questions corectly!</span>
													<br>
													<span>Your score: <h4 style=\"font-weight: bold; color: $colr\">$sc_perc %</h4></span>
												</div>
												<h4 style=\"color: #c90; \">See Review Below</h4>";
											
											for($cn = 0; $cn<$max_qno; $cn++)
											{
												$nn = $cn+1;
												$qid = $_SESSION['ques_'.$nn.'_'.$std.'_'.$lesson_id];
												$aid = $_SESSION['ans_'.$nn.'_'.$std.'_'.$lesson_id];
												
												$our_ans = $aid;
												if(isset($_SESSION['std_ans_'.$nn.'_'.$std.'_'.$lesson_id]) && $_SESSION['std_ans_'.$nn.'_'.$std.'_'.$lesson_id]!="")
												$your_ans = $_SESSION['std_ans_'.$nn.'_'.$std.'_'.$lesson_id];
												else
												$your_ans = -1;
												
												
												$question = getColumnValue($conn, 'question', 'exercise_question', 'exercise_question_id', $qid);
												
												$answer = getColumnValue($conn, 'answers', 'exercise_answers', 'exercise_answers_id', $aid);
												
												$cor_ans = 
												
												$tip = getColumnValue($conn, 'tip', 'exercise_question', 'exercise_question_id', $qid);
												
												
												echo "<div class=\"qst_title\" title=\"Click to see review for Question $nn\" onclick=\"showHide('d$nn');\"><a href=\"javascript:void()\">Question $nn</a>".do_marking($our_ans, $your_ans)."</div>";
												echo
												"<div class=\"tip_block\" id=\"d$nn\" >
													<h5>$question</h5>
													<div class=\"blk-a\"><span class=\"tell\">Correct Answer:</span><br>&raquo; <span class=\"ans\">$answer</span></div>
													<span class=\"tell lbl\">&nbsp; Hints: &nbsp;</span>
													<div class=\"blk-b\">$tip</div>
												</div>";
											}
											echo
											"<form action=\"$this_page\" method=\"GET\">
												<button type=\"submit\" name=\"retake\" value=\"1\" class=\"btn btn-info btn-animate-demo\">Retake This Test</button>
												<input type=\"hidden\" name=\"t_start\" value=\"YES\">
												<input type=\"hidden\" name=\"lesson\" value=\"$lesson\">
												<input type=\"hidden\" name=\"id\" value=\"$lesson_id\">
												<input type=\"hidden\" name=\"qno\" value=\"1\">
											</form>
											";
										}
										?>
										
										</div>
									</div> <!-- /panel body -->	
  								</div>	
  							</div>
  						</div>


<?php include('partials/footer.php'); ?>
<script>
	function showHide(x)
	{
		var a = document.getElementById(x);
		if(a.style.display=='block')
		a.style.display='none';
		else
		a.style.display='block';
	}
</script>


