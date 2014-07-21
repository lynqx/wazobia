<?php
/*-------------------------// coded by: Tope Omomo (08134053081) /----------------------------------*/
/*-------------------------//		topeomomo@gmail.com			 //---------------------------------*/

$page_title = "Post Questions";
$path = "";
$inc_path = $path."partials/";
include($inc_path . 'header.php');

$_POST = array_map('trim', $_POST);
//print_r($_POST);

//get available values
if(!empty($_POST['organisation']))
$organisation = $_POST['organisation'];
else
$organisation = "";

if(!empty($_POST['subject']))
$subject = $_POST['subject'];
else
$subject = "";

if(!empty($_POST['lesson']))
$lesson = $_POST['lesson'];
else
$lesson = "";


//process form
if(!empty($_POST['sbtn']) && $_POST['sbtn']=='go')
{
	//given parameters
	if($_POST['ques'])
	$ques = $_POST['ques'];
	else
	$ques = "";
	
	if($_POST['ans_a'])
	$ans_a = $_POST['ans_a'];
	else
	$ans_a = "";
	
	if($_POST['ans_b'])
	$ans_b = $_POST['ans_b'];
	else
	$ans_b = "";
	
	if($_POST['ans_c'])
	$ans_c = $_POST['ans_c'];
	else
	$ans_c = "";
	
	if($_POST['ans_d'])
	$ans_d = $_POST['ans_d'];
	else
	$ans_d = "";
	
	if($_POST['ans_e'])
	$ans_e = $_POST['ans_e'];
	else
	$ans_e = "";
	
	if($_POST['ansbtn'])
	$ansbtn = $_POST['ansbtn'];
	else
	$ansbtn = "";
	
	if($_POST['tip'])
	$tip = $_POST['tip'];
	else
	$tip = "";
	
	if($_POST['exhibit_ref'])
	$exhibit_ref = $_POST['exhibit_ref'];
	else
	$exhibit_ref = "";
	
	
	//obtain needed parameters
	$org_id = getColumnValue($conn, 'organisation_id', 'organisation', 'organisation', $organisation);
	$sbj_id = getColumnValue($conn, 'subject_id', 'subject', 'subject', $subject);
	$lsn_id = getColumnValue($conn, 'lesson_id', 'lesson', 'lesson', $lesson);
	
	//do a buffer
	$aids = array(0, 0, 0, 0, 0);
	$qid = 0;
	$as = array($ans_a, $ans_b, $ans_c, $ans_d, $ans_e);
	
	
	//post answers
	for($i=0; $i<5; $i++)
	{
		if(!empty($as[$i]))
		$aids[$i] = postAnswer($conn, $as[$i]);
	}
	
	//correct answer's id
	$cor_a = 0;
	switch($ansbtn)
	{
		case 'a':
		$cor_a = $aids[0];
		break;
		
		case 'b':
		$cor_a = $aids[1];
		break;
		
		case 'c':
		$cor_a = $aids[2];
		break;
		
		case 'd':
		$cor_a = $aids[3];
		break;
		
		case 'e':
		$cor_a = $aids[4];
		break;
	}
	
	//post question
	$qid = postQuestion($conn, 
					$lsn_id, 
					$cor_a, 
					$ques, 
					$tip, 
					$exhibit_ref
					);
	
	//post ids
	$lastqaid = 0;
	for($i=0; $i<5; $i++)
	{
		if($aids[$i]!=0)
		$lastqaid = postIds($conn, $qid, $aids[$i]);
	}
	
	
	//define success message
	$success_msg = "";
	if($lastqaid!=0)
	$success_msg = "<span style=\"font-size: 16px; color: green; font-weight: bold; \">Question and Answers were posted successfully into database. Last QA id is: <i style=\"color: red; \">".$lastqaid."</i>.</span>";
	
	/////////////// end posting to db
}

?>
<style>
	<!--
	#exhblock
	{
		background-color: #fff;
		color: #666;
		border-radius: .5em;
		position: fixed;
		bottom: 5px;
		right: 5px;
		border: 2px solid #e4e4e4;
		font-size: 13px;
		width: 200px; padding: .2em;
		overflow-y: auto;
		height: 350px;
		box-shadow: 3px 3px 2px #808080;
		z-index:1000;
		
	}
	
	
	/*
	.transparent
	{
		zoom: 2;
		filter: alpha(opacity=50);
		opacity: 0.5;
	}
	*/
	
	
	#exhblock ul li
	{
		list-style-type: square;
	}
	
	#exhblock li a
	{
		color: #669;
	}
	
	#exhblock li a:hover
	{
		text-decoration: none;
		background-color: #232525;
		color: #efefff;
		padding-left: 5px;
		padding-right: 5px;
		border-radius: 5px;
	}
	
	.qa-all
	{
		border: 1px dashed #f2f3f3;
		margin: 5px;
		padding: 5px;
		border-radius: 5px;
		background-color: #f0f0f0;
	}
	
	.explain
	{
		font-size: 11px;
		color: #fcc;
		font-family: courier;
	
	}
	
	.opt
	{
		padding-left: 20px;
		font-size: 12px;
		font-weight: bold;
		color: blue;
	}
	
	#lesson 
	{
		width: 100%;
		padding: 5px;
	}
	
	#organisation, #subject 
	{
		width: 60%;
		padding: 5px;
	}
	
	#exhibit_div
	{
		display: none;
		position: fixed;
		bottom: 2em;
		left: 2px;
		max-width: 80%;
		max-height: 80%
		overflow: auto;
		background-color: #fff;
		border: 5px solid #888;
		padding: 10px;
		border-radius: 5px;
		z-index: 1000;
	}
	
	.clear
	{
		clear: both;
	}
	
	
	//-->
</style>

            <div class="row">
               <div class="col-mod-12">

                  <ul class="breadcrumb">
                   <li><a href="index.php">Dashboard</a></li>
                   <li><a href="#">Add Questions</a></li>
                   
                 </ul>
                 
                 <div class="form-group hiddn-minibar pull-right">
                   <!-- SEARCHBOX -->
                 </div>
                 <h3 class="page-header"><i class="fa fa-warning"></i> Add Questions, Answers and Exhibits <i class="fa fa-info-circle animated bounceInDown show-info"></i> </h3>

				</div>
			</div>


       
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-cascade">
			<div style="float: left; width:80%; border: 0; margin: 0;">
				<div>
					<?php if(!empty($success_msg)) { echo $success_msg; } ?>
				</div>
				
				<div class="qa-all">
					<form action="" method="POST" onsubmit="return validateForm();" autocomplete="off">
						
						
						<!-- select organisation -->
						<label>Organisation</label><br>
						<input type="text" list="organisations" placeholder="Type or select Organisation" name="organisation" id="organisation" value="<?php echo $organisation; ?>" autocomplete="off" onblur="retval(this.id, 1, 'subject', '<?php echo $subject; ?>')" class="qa">
						<datalist id="organisations">
							<div id="orgdiv">
								<!-- org_options -->
								<?php include('add_quest/org_options.php');?>
							</div>
						</datalist><br>
						<br>
						
						
						<!-- select subject -->
						<label>Subject</label><br>
						<select placeholder="Select subject" name="subject" id="subject" onblur="retval(this.id, 2, 'lesson', '<?php echo $lesson; ?>')" class="qa">
							<!-- sbj_options -->
							
						</select><br>
						<br>
							
							
						<!-- select lesson -->
						<label>Lesson</label><br>
						<select placeholder="Select lesson" name="lesson" id="lesson" class="qa">
							<!-- lsn_options -->
						</select><br>
						<br>
						
						<!-- type question and answer options -->
						<label>Question</label><br>
						<textarea class="qa" rows="4" cols="auto" style="width: 100%;" name="ques" autocomplete="off"></textarea><br>
						<label>Answers</label><br>
						<span class="explain">Choose correct answer only</span>&nbsp; &raquo; <span class="opt">A</span>&nbsp;&nbsp;<input type="radio" name="ansbtn" value="a" class="ansrad">				
						<br><textarea class="qa" rows="1" cols="auto" style="width: 100%;" name="ans_a" id="ans_a" autocomplete="off"></textarea><br><br>
						
						<span class="explain">Choose correct answer only</span>&nbsp; &raquo; <span class="opt">B</span>&nbsp;&nbsp;<input type="radio" name="ansbtn" value="b" class="ansrad">				
						<br><textarea class="qa" rows="1" cols="auto" style="width: 100%;" name="ans_b" id="ans_b" autocomplete="off" autocomplete="off"></textarea><br><br>
						
						<span class="explain">Choose correct answer only</span>&nbsp; &raquo; <span class="opt">C</span>&nbsp;&nbsp;<input type="radio" name="ansbtn" value="c" class="ansrad">				
						<br><textarea class="qa" rows="1" cols="auto" style="width: 100%;" name="ans_c" id="ans_c" autocomplete="off" ></textarea><br><br>
						
						<span class="explain">Choose correct answer only</span>&nbsp; &raquo; <span class="opt">D</span>&nbsp;&nbsp;<input type="radio" name="ansbtn" value="d" class="ansrad">				
						<br><textarea class="qa" rows="1" cols="auto" style="width: 100%;" name="ans_d" id="ans_d" autocomplete="off"></textarea><br><br>
						
						<span class="explain">Choose correct answer only</span>&nbsp; &raquo; <span class="opt">E</span>&nbsp;&nbsp;<input type="radio" name="ansbtn" value="e" class="ansrad">				
						<br><textarea class="qa" rows="1" cols="auto" style="width: 100%;" name="ans_e" id="ans_e" autocomplete="off"></textarea><br>
						
						<br><br>
						<label>Tips[Hints] for Review</label><br>
						<textarea rows="3" cols="auto" style="width: 100%;" name="tip" id="tip" autocomplete="off"></textarea><br>
						
						<label>exhibit</label><br>
						<input type="text" style="width: 60%;"  readonly="readonly" name="exhibit_ref" id="exhibit_ref" value="" onmouseover="showIt(); " onmouseout="closeExh()"> &nbsp; <a href="javascript:void()" class="explain" onclick="clearInput('exhibit_ref'); " >Remove Exhibit</a>
						
						<br><br>
						<div style="text-align: center; ">
							<button class="btn btn-success btn-lg" type="submit" name="sbtn" value="go">Submit</button>
						</div>
						<br>
					</form>	
				</div>
			</div>
			
			<div style="float: left; width:18%; border: 0; margin: 0;">
			
				<div id="exhblock" class="transparent">
					<h5 style="color: #285; "> &nbsp;&nbsp; Exhibits </h5>
					<ul>
						<?php
						$pt = "../exhibit/";
						
						//loop through and display files in the exhibit folder
						foreach (glob($pt."*.*") as $filepath)
						{
							$fl = end(explode('/', $filepath));
							if($fl!='index.php')
							echo "<li><a href=\"javascript:void()\" title=\"click to use\" onmouseover=\"loadDoc('loadexhibit.php?file=$fl', 'exhibit_div');\" onmouseout=\"closeExh(); \" onclick=\"insertFile('$fl'); \">".$fl."</a></li>";
							
						}
						
						?>
					</ul>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>

<div id="exhibit_div" onclick="closeExh()">
	
</div>



<?php
include('partials/footer.php');

?>

<script>
	//+-- load exhibit's div
	function loadDoc(url, tdiv)
	{
		var xmlhttp;
		var loading="<span style=\"color: #ccc; font-size: small; font-family: courier; \"> Loading... </span>";
		document.getElementById("exhibit_div").style.display='block';
		
		//confirm xmlhttp 
		if (window.XMLHttpRequest)
		{
			xmlhttp=new XMLHttpRequest();
		}
		else
		{
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		
		//load document
		xmlhttp.onreadystatechange=function()
		{
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				document.getElementById(tdiv).innerHTML=xmlhttp.responseText;
			}
			else
			document.getElementById(tdiv).innerHTML=loading;
		}
		xmlhttp.open("GET",url,true);
		xmlhttp.send();
	}
	
	
	//+-- close exhibit's div
	function closeExh()
	{
		document.getElementById("exhibit_div").style.display='none';
	}
	
	
	//+-- insert exhibit's filename
	function insertFile(x)
	{
		var inp = document.getElementById("exhibit_ref");
		inp.value = x;
		inp.focus();
	}
	
	
	//+-- show exibit on mouseover
	function showIt()
	{
		var inp = document.getElementById("exhibit_ref");
		if(inp.value!="")
		showExhibit(inp.value);
	}
	
	//+-- remove input's content
	function clearInput(x)
	{
		document.getElementById(x).value="";
	}
	
	//+-- load next values
	function retval(thisid, urlid, targetdiv, cursel)
	{
		var y = document.getElementById(thisid);
		var z = y.value.trim();
		
		var url="";
		switch(urlid)
		{
			case 1:
			url = 'add_quest/sbj_options.php?org='+z+'&sell='+cursel;
			break;
			
			case 2:
			url = 'add_quest/lsn_options.php?sbj='+z+'&sell='+cursel;
			break;
		}
		loadDoc(url, targetdiv);
	}
	
	function clearTyping(x)
	{
		document.getElementById(x).value="";
	}
	
	
	
	function validateForm()
	{
		var m = document.getElementsByClassName('qa');
		var n = document.getElementsByClassName('ansrad');
				
		var out1 = true;
		var out2 = false;
		
		//verify text inputs
		for (var i = 0; i < m.length; i++)
		{
			if(m[i].value=="")
			{
				out1=false;
				m[i].focus();
				alert("Organisation, Subject, Lesson, Question, Answers and Correct option must be completed!");
				break;
			}
		}
		
		//verify radio buttons
		if(out1 == true)
		{
			for(var k=0; k<n.length; k++)
			{
				if(n[k].checked==true)
				{
					out2 = true;
					break;
				}
			}
		}
		
		if(out1 == true && out2 == false)
		{
			alert('You must choose the correct optiion!');
		}
	
		return(out1&&out2);
	}
	
	
	
	function loadDoc2(url, tdiv)
	{
		var xmlhttp;
		var loading="<span style=\"color: #ccc; font-size: small; font-family: courier; \"> Loading... </span>";
		document.getElementById("exhibit_div").style.display='block';
		
		//confirm xmlhttp 
		if (window.XMLHttpRequest)
		{
			xmlhttp=new XMLHttpRequest();
		}
		else
		{
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		
		//load document
		xmlhttp.onreadystatechange=function()
		{
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				document.getElementById(tdiv).innerHTML=xmlhttp.responseText;
			}
			else
			document.getElementById(tdiv).innerHTML=loading;
		}
		xmlhttp.open("GET",url,true);
		xmlhttp.send();
	}

</script>