<?php
/*-------------------------// coded by: Tope Omomo (08134053081) /----------------------------------*/
/*-------------------------//		topeomomo@gmail.com			 //---------------------------------*/

/* pay_instructors_commision.php */


$page_title = "Pay Instructors Commissions";
$path = "";
$inc_path = $path."partials/";
include($inc_path . 'header.php'); 



if (!isset($_SESSION['work_id']) || $_SESSION['roles'] != 'admin') {
	redirect_to('error.php');
}

$this_page = $_SERVER['PHP_SELF'];


//--- step 1: display instructors
//--- step2: use instructor's info to obtain lessons info
//--- step3: use lessons' info to obtain dvds' info
//--- step4: use dvds' info to obtain commissions' info for MONTH'S transaction





?>

<style>
	<!--
	#acctinfo
	{
		padding: .7em;
		color: #666;
	}
	
	#acctinfo td
	{
		padding-left: 1em;
		padding-right: 1em;
		letter-spacing: 1px;
		font-weight: bold;
		color: #339;
	}
	
	
	//-->
</style>


	<!-- select an instructor -->
	<div class="row">
  							<div class="col-mod-12">

  								<ul class="breadcrumb">
  									<li><a href="index.php">Admin</a></li>
  									<li class="active"><a href="pay_instructrs.php">Pay Instructors</a></li>
  								</ul>


  								<h3 class="page-header"> Pay Instructor's Commission<i class="fa animated bounceInDown show-info">&#8358;</i> </h3>

  								<blockquote class="page-information hidden">
  									<p>
  										<b>Pay Instructors Page</b> to Pay Instructors that are not on the pay off plan.
  									</p>
  								</blockquote>

  							</div>
  						</div>

  						<!-- view students Panel -->
  						<div class="row">
  							<div class="col-md-12">
  								<div class="panel panel-cascade">
  									<div class="panel-heading">
  										<h3 class="panel-title">
  											<i class="fa">&#8358;</i>
  											Pay Instructors
  											<span class="pull-right">
  												<a  href="#" class="panel-minimize"><i class="fa fa-chevron-up"></i></a>
  											</span>
  										</h3>
  									</div>
  									<div class="panel-body">
	<div class="col-lg-12 col-md-11">
		
		<label>Select An Instructor | Year & Month</label>
		<form action="<?php echo $this_page; ?>" method="POST" onsubmit="return check_input('ins')">

			<div class="form-group">
			<select data-placeholder="Choose an Instructor..."id="ins" class="chosen-select" name="ins" style="width:500px;" tabindex="2">
				<option value=""></option>
				<?php
					//generate options
					$sel = "SELECT worker_register.work_first_name, worker_register.work_last_name, worker_register.work_id FROM instructors JOIN worker_register ON instructors.work_id=worker_register.work_id";
					
					$rslt = mysqli_query($conn, $sel) or die(mysqli_error($conn).'Cannot fetch Instructors');
					
					while($rows = mysqli_fetch_row($rslt))
					{
						$nm = ucwords($rows[0].' '.$rows[1]);
						$work_id = $rows[2];
						echo "<option value=\"$work_id\">$nm</option>";
					
					}
					
					mysqli_free_result($rslt);
				?>				
			<!--</select>-->
			</select>
			</div>
			<div class="form-group" class="col-lg-12">
			<div class="form-group col-lg-3">
			<label for="selectyear"> Year: </label>
			<select id="yr" name="yr">
				<?php yearsGen(); ?>
			</select>
			</div>
			
			<div class="form-group col-lg-3">
			<label for="selectmonth" class="control-label"> Month: </label>
			<select id="mn" name="mn">
				<?php monthsGen(); ?>
			</select>
			</div>
			</div>
			<div style="clear:both">
			<div class="form-actions">
				<button class="btn btn-success btn-animate-demo pull-left" name="ins_sel" value="1">Select Instructor</button>
			</div>
		</form>
	</div>
	
	<div class="col-lg-12 col-md-9">
	<?php
		if(!empty($_POST['ins']) && $_POST['ins_sel']>0 && !empty($_POST['mn']) && !empty($_POST['yr']))
		{
			//empty arrays
			$dvdids = array();
			$lessonids = array();
			$dvdtimes = array();
			$instimes = array();
			$inspay = array();
			$insamnt = array();
			
			
			
			$work_id = $_POST['ins'];
			$year = $_POST['yr'];
			$month_no = $_POST['mn'];
			$month_word = monthChange($_POST['mn']);
			
			$tm = $_POST['yr'].'-'.$_POST['mn'].'%';
			
			
			//echo 'work_id: '.$work_id.'<br>';
			
			//FORMULA:
			/*
			--- GET UNIQUE dvd_ids for the month
			--- use the dvd_ids to obtain total instructor's time in the videos
			--- use the dvd_ids to obtain total video time for each dvd
			--- use dvd_id to obtain specified instructor's amount set
			--- obtain total qty sold for each dvd
			--- calculate: instructor commission=
				[instructor's time * instructors amount * qty/total time for dvd]
			
			*/
			
			$sel1 = "SELECT lesson_id  
					FROM lesson 
					WHERE work_id='$work_id'";
			$rslt1 = mysqli_query($conn, $sel1) or die('Data Failure1!');
			
			while($row1 = mysqli_fetch_row($rslt1))
			{
				//available data thus far:
				$lesson_id = $row1[0];				
				
				$sel2 = "SELECT dvd_id 
					FROM dvd_lessons 
					WHERE lesson_id='$lesson_id'";
				$rslt2 = mysqli_query($conn, $sel2) or die('Data Failure2!');
			
				while($row2 = mysqli_fetch_row($rslt2))
				{
					$dvd_id = $row2[0];
					
					if(!in_array($dvd_id, $dvdids))
					array_push($dvdids, $dvd_id);
				}
				mysqli_free_result($rslt2);
				
			}
			mysqli_free_result($rslt1);
			
			
			
			//obtain total video time on disc 
			foreach($dvdids as $mydvd)
			{
				//obtain lesson_ids and query string
				$sel3 = "SELECT lesson_id  
					FROM dvd_lessons 
					WHERE dvd_id='$mydvd'";
				$rslt3 = mysqli_query($conn, $sel3) or die('Data Failure3!');
				
				$lessonids = array();		//empty array
				while($row3 = mysqli_fetch_row($rslt3))
				{
					array_push($lessonids, $row3[0]);
				}
				mysqli_free_result($rslt3);
				
				//construct str for query
				$inq = "";
				foreach($lessonids as $km)
				{
					if($km==end($lessonids))
					$inq .= "'$km'";
					else
					$inq .= "'$km', ";
				}
				
				/*
				echo $inq;
				echo "<p></p>";
				*/
				
				//get sum of duration for each dvd
				$sel4 = "SELECT SUM(duration)  
						FROM lesson	WHERE lesson_id IN ($inq)";
						
				$rslt4 = mysqli_query($conn, $sel4) or die(mysqli_error($conn).'Data Failure4!');
				
				while($row4 = mysqli_fetch_row($rslt4))
				{
					array_push($dvdtimes, $row4[0]);
				}
				mysqli_free_result($rslt4);
				
				
				//get sum of duration for each dvd for instructor
				$sel5 = "SELECT SUM(duration)  
						FROM lesson	WHERE lesson_id IN ($inq) 
						AND work_id='$work_id'";
						
				$rslt5 = mysqli_query($conn, $sel5) or die(mysqli_error($conn).'Data Failure5!');
				
				while($row5 = mysqli_fetch_row($rslt5))
				{
					array_push($instimes, $row5[0]);
				}
				mysqli_free_result($rslt5);
				
			}
			
			
			//compute amount per dvd for instructor
			$cnt = 0;
			foreach($dvdids as $myid)
			{
				$sel6 = "SELECT instructors_amount  
						FROM dvd_amount_set	
						WHERE dvd_id='$myid' AND amount_validity='1'";
						
				$rslt6 = mysqli_query($conn, $sel6) or die(mysqli_error($conn).'Data Failure6!');
				
				$row6 = mysqli_fetch_row($rslt6);
				
				$amnt = round($instimes[$cnt]*$row6[0]/$dvdtimes[$cnt], 2);
				
				array_push($inspay, $amnt);
			
				//---
				$cnt++;
			}
			mysqli_free_result($rslt6);
			
			
			//obtain qty of dvd sold dvd for the month and comput total amount for instructor
			$cnt = 0;
			foreach($dvdids as $dv)
			{
				$sel7 = "SELECT SUM(quantity)  
						FROM dvd_transaction WHERE dvd_id='$dv' AND time_transact LIKE '$tm'";
						
				$rslt7 = mysqli_query($conn, $sel7) or die(mysqli_error($conn).'Data Failure7!');
				
				$row7 = mysqli_fetch_row($rslt7);
				
				$pay = round($row7[0]*$inspay[$cnt], 2);
				
				array_push($insamnt, $pay);
				
				//---
				$cnt++;
			}
			mysqli_free_result($rslt7);
			
			/*
			//CHECK!!!!
			ECHO "DVD_IDS: <BR>";
			print_r($dvdids);
			
			ECHO "<BR>TOTAL DURATION: <BR>";
			print_r($dvdtimes);
			
			ECHO "<BR>INSTRUCTOR'S DURATION: <BR>";
			print_r($instimes);
			
			ECHO "<BR>INSTRUCTOR'S PAYperDVD: <BR>";
			print_r($inspay);
			
			ECHO "<BR>INST. TOTAL-PAY perDVD: <BR>";
			print_r($insamnt);
			*/
			
			
			//calculate total commission earned for the month
			$totcomm = array_sum($insamnt);
			$mnyr = monthChange($_POST['mn'])."-".$_POST['yr'];
			$paystatus = "<span style=\"color: red; font-weight: bold; \">&nbsp;UNPAID&nbsp;</span>";
			
			
			//check to see if already paid
			$sel8 = "SELECT payment_amount  
					FROM instructor_payment 
					WHERE work_id='$work_id' AND month='".monthChange($_POST['mn'])."' AND year='".$_POST['yr']."'";
						
			$rslt8 = mysqli_query($conn, $sel8) or die(mysqli_error($conn).'Data Failure8!');
				
			$row8 = mysqli_fetch_row($rslt8);
			
				//if commission already paid or zero commision
				$btnstate = "";
				$btn_text = "PAY &raquo;";
				
				if($totcomm==0)
				{
					$paystatus = "<span style=\"color: gray; font-weight: bold; \">&nbsp;NONE&nbsp;</span>";
					$btnstate = 'disabled';
				}
				elseif($row8[0] == $totcomm)
				{
					$paystatus = "<span style=\"color: green; font-weight: bold; \">&nbsp;PAID&nbsp;</span>";
					$btnstate = 'disabled';
				}
			
			mysqli_free_result($rslt8);
			
			
			//fetch instructor's payplan
			$payplan = getColumnValue($conn, 'instructor_payplan', 'instructors', 'work_id', $work_id);
			if($payplan == 2)
			{
				$paystatus = "<span style=\"color: gray; font-weight: bold; \">&nbsp;NONE&nbsp;</span>";
				$btnstate = 'disabled';
				$btn_text = "Payoff plan!";
				$btn_color = "red";
			}
			
			if(empty($btn_color))
			$btn_color = "";
			
			//draw table to display result
			$fname = getColumnValue($conn, 'work_first_name', 'worker_register', 'work_id', $work_id);
			$lname = getColumnValue($conn, 'work_last_name', 'worker_register', 'work_id', $work_id);
			$nm = ucwords($fname.' '.$lname);
			echo
				"<hr>
				<h3 style=\"color: #669; \">Commission Payment for <b>$nm</b></h3>
				
				
				<table class=\"table\">
					<thead>
						<tr>
							<th>Transaction Code</th><th>Name</th><th>Month-Year</th><th>Commission Earned</th><th>Status</th><th>Action</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<form action=\"$this_page\" method=\"POST\" onsubmit=\"return check_input('pulsateWarning');\">
								<input type=\"hidden\" name=\"pay_workid\" value=\"$work_id\" >
								<input type=\"hidden\" name=\"pay_month\" value=\"".monthChange($_POST['mn'])."\" >
								<input type=\"hidden\" name=\"pay_year\" value=\"".$_POST['yr']."\" >
								<input type=\"hidden\" name=\"pay_amt\" value=\"$totcomm\" >
								
								<input type=\"hidden\" name=\"pay_name\" value=\"$nm\" >
								
								<td><input id=\"pulsateWarning\" type=\"text\" name=\"xcode\" size=\"10\" ></td><td>$nm</td><td>$mnyr</td><td style=\"font-weight: bold; \"> &#8358; $totcomm</td><td>$paystatus</td><td><button class=\"btn btn-info\" type=\"submit\" name=\"paybtn\" value=\"1\" $btnstate style=\"color: $btn_color; \">$btn_text</button></td>
							</form>
						</tr>
					
					</tbody>
					<tfoot>
						<tr>
							<!--<th>Transaction Code</th><th>Name</th><th>Month-Year</th><th>Commission Earned</th><th>Status</th><th>Action</th> -->
						</tr>
					</tfoot>
				</table>";
			
			
			//fetch bank details
			$sel9 = "SELECT bank_name.bank_name, bank_details.account_name, bank_details.account_no   
					FROM bank_details
					JOIN bank_name 
					ON bank_name.bank_name_id=bank_details.bank_name_id 
					WHERE bank_details.work_id='$work_id'";
						
			$rslt9 = mysqli_query($conn, $sel9) or die(mysqli_error($conn).'Data Failure9!');
			$row9 = mysqli_fetch_row($rslt9);
			$bnk_nm = ucwords($row9[0]);
			$bnk_acc_nm = ucwords($row9[1]);
			$bnk_acc_no = $row9[2];
		
			//echo "work id: $work_id || $bnk_nm  ||  $bnk_acc_nm || $bnk_acc_no";
			
			
			//display bank details
			echo '<div class="panel-heading">
  										<h3 class="panel-title">
  											<i class="fa fa-money"></i>
  											Bank Details
  											<span class="pull-right">
  												<a  href="#" class="panel-minimize"><i class="fa fa-chevron-up"></i></a>
  											</span>
  										</h3>
  									</div>';
  									
			echo "<table id=\"acctinfo\" class=\"table table-bordered table-striped\">
				<tr>
					<th>&nbsp; Bank &nbsp;</th><td>$bnk_nm</td>
				</tr>
				<tr>
					<th>&nbsp; Account name &nbsp;</th><td>$bnk_acc_nm</td>
				</tr>
				<tr>
					<th>&nbsp; Account number &nbsp;</th><td>$bnk_acc_no</td>
				</tr>
			</table>";
			
		}
		
		if(!empty($_POST['paybtn']) && $_POST['paybtn']==1)
		{
			//post to database
			$work_id = $_POST['pay_workid'];
			$payment_amount = $_POST['pay_amt'];
			$transaction_code = $_POST['xcode'];
			$month = $_POST['pay_month'];
			$year = $_POST['pay_year'];
			$payment_time = date('Y-m-d H:i:s');
			
			$name = ucwords($_POST['pay_name']);
			
			
			$insert = "INSERT INTO instructor_payment (work_id, payment_amount, transaction_code, month, year, payment_time) 
						VALUES ('$work_id', '$payment_amount', '$transaction_code', '$month', '$year', '$payment_time')";
						
			if(!mysqli_query($conn, $insert))
			echo "<span style=\"color: red; font-weight: bold; \">Error! Failed to post payment info for <b>$name: ($month-$year)</b> into database</span>";
			
			else
			echo "<h4 style=\"color: green; font-weight: bold; \">Success! Payment Info for <b>$name: ($month-$year)</b> was posted.</h4>";
			
		}
		
		
		
		
		
		
	?>
	</div>
	</div>
	</div>
	</div>
	</div>
	</div>
	





<?php include('partials/footer.php'); ?>

<script>
	function check_input(x)
	{
		if(document.getElementById(x).value=="")
		{
			if(x=='pulsateWarning')
			alert("You must enter a transaction code for this payment")
			else
			alert("You must select an instructor's name");
			return false;
		}
		else
		return true;
	}
	
	
</script>