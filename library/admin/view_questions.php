<?php
/*-------------------------// coded by: Tope Omomo (08134053081) /----------------------------------*/
/*-------------------------//		topeomomo@gmail.com			 //---------------------------------*/


$page_title = "View Questions";
$path = "";
$inc_path = $path."partials/";
include($inc_path . 'header.php');
$thispage = $_SERVER['PHP_SELF'];

	if (!isset($_SESSION['work_id']) || $_SESSION['roles'] != 'lecturer') {
		redirect_to('error.php');
	}
	else
	$work_id = $_SESSION['work_id'];

	//process form
	$_POST = array_map('trim', $_POST);
	
	if(!empty($_POST['org']))
	$org = $_POST['org'];
	else
	$org = "";
	
	if(!empty($_POST['sbj']))
	$sbj = $_POST['sbj'];
	else
	$sbj = "";
	
	if(!empty($_POST['tpc']))
	$tpc = $_POST['tpc'];
	else
	$tpc = "";
	
	if(!empty($_POST['lsn']))
	$lsn = $_POST['lsn'];
	else
	$lsn = "";
	
	//print_r($_POST);
?>
<style>
	<!--
		.sel 
		{
			width: 20%;
		}
		
		.sel-border
		{
			padding: 5px;
			border: 1px solid #eee;
			box-shadow: 1px 1px 2px #808080;
			border-radius: 5px;
		}
		
		.selfull
		{
			width: 90%
		}
		
		.side
		{
			display: inline;
		}
		
		#lsndiv
		{
			margin-top: 8px;
		}
		
		label
		{
			color: #666;
			text-shadow: 1px 1px 2px #ccc;
		
		}
		
		
		
		
	//-->
</style>
			<div class="row">
               <div class="col-mod-12">

                  <ul class="breadcrumb">
                   <li><a href="index.php">Dashboard</a></li>
                   <li><a href="#">View Questions</a></li>
                   
                 </ul>
                 
                 <div class="form-group hiddn-minibar pull-right">
                   <!-- SEARCHBOX -->
                 </div>
                 <h3 class="page-header"><i class="fa fa-warning"></i> View Questions and Answers <i class="fa fa-info-circle animated bounceInDown show-info"></i> </h3>

				</div>
			</div>
			
	       
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-cascade">
			<div>
				<?php
					if(!empty($org) && !empty($sbj) && !empty($tpc)) 
					{
				?>
				<div>
					<form action="<?php $thispage ?>" method="POST">
						<button type="submit" name="rst" value="rst">New Selection</button>
					</form>
				</div>
				
				<div id="lsndiv">
					<form action="<?php $thispage; ?>" method="POST" onsubmit="return verifySelect()">
						<label>Lessons</label> &raquo;
						<select name="lsn" placeholder="Select lesson" class="selfull sel-border" required >
							
							<?php
								doOptions($conn, 'lesson', 'lesson_id', 'lesson', $work_id, $org, $sbj, $tpc, 'lessons');
							?>
						</select>
						<input type="hidden" name="org" value="<?php echo $org; ?>">
						<input type="hidden" name="sbj" value="<?php echo $sbj; ?>">
						<input type="hidden" name="tpc" value="<?php echo $tpc; ?>">
						
						<br>
						<br><button style="float: right; " type="submit" class="btn btn-success btn-danger">Display Questions & Answers</button>
						<div class="clear"></div>
					</form>
				</div><br>
				
				<div>
					<?php if(!empty($lsn)) { ?>
					<table id="example" class="table table-bordered table-hover table-striped display">
						<thead>
							<tr><th>#</th><th>Question</th><th>Answer</th><th>Tip</th><th>Exhibit</th></tr>
						</thead>
						<tbody>
							<?php
								$sel = "SELECT exercise_question.question, exercise_answers.answers, exercise_question.tip, exercise_question.exhibit_ref 
								FROM exercise_question 
								JOIN exercise_answers 
								ON exercise_question.exercise_answers_id=exercise_answers.exercise_answers_id 
								WHERE lesson_id='$lsn' 
								ORDER BY exercise_question.exercise_question_id DESC";
								
								$rslt = mysqli_query($conn, $sel) or die('Data error!');
								
								if(mysqli_num_rows($rslt)==0)
								echo "<span style=\"color: red; \">NO QUESTIONS FOUND FOR THIS SELECTION!</span><br>";
								else
								{
									$cn = 0;
									while($rows = mysqli_fetch_row($rslt))
									{
										$cn++;
										echo "<tr><td>$cn</td><td>$rows[0]</td><td>$rows[1]</td><td>$rows[2]</td><td>$rows[3]</td></tr>";
									
									}
								}
							?>
						</tbody>
						<tfoot>
							<tr><th>#</th><th>Question</th><th>Answer</th><th>Tip</th><th>Exhibit</th></tr>
						</tfoot>					
					</table>
					<?php } ?>
				</div>
				<?php 
					}
					else
					{
				?>
					
				<form action="<?php $thispage; ?>" method="POST">
				
					<div class="side">
						<label>Organisation</label> &raquo;
						<select name="org" placeholder="Select Organisation" class="sel sel-border"> 
							<?php
								doOptionsJoin($conn, 'organisation', 'organisation_id', 'organisation', 'lesson', $work_id, 'organisations');
							?>
						</select>
					</div>
					
					<div class="side">
						<label>Subject</label> &raquo;
						<select name="sbj" placeholder="Select Subject" class="sel sel-border"> 
							<?php
								doOptionsJoin($conn, 'subject', 'subject_id', 'subject', 'lesson', $work_id, 'subjects');
							?>
						</select>
					</div>
					
					<div class="side">
						<label>Topics</label> &raquo;
						<select name="tpc" placeholder="Select Topic" class="sel sel-border"> 
							<?php
								doOptionsJoin($conn, 'topic', 'topic_id', 'topic', 'lesson', $work_id, 'topics');
							?>
						</select>
					</div>
					
					&nbsp; &nbsp; <button type="submit" class="btn btn-success btn-danger">Go</button>
					
				</form>
					
					
				<?php
					}
				?>
				
				
			</div>
			
		</div>
	</div>
</div>


<?php
include('partials/footer.php');

?>

<script>

</script>