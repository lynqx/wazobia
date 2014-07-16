
<script>
	<!--

	function showHide(q, a, s)
	{
		var x = document.getElementById(q);
		var y = document.getElementById(a);
		var r = document.getElementById(s);
		var plus = '&plus;';
		var minus = '&minus;';
		
		if(y.style.display=='block')
		{
			y.style.display = 'none';
			r.innerHTML = plus;
		}
		else
		{
			y.style.display = 'block';
			r.innerHTML = minus;
		}
	}

	//-->
</script>
<style>
	<!--
	.faq_a
	{
		display: none;
		margin-left: 8px;
		padding: 5px;
		border: 1px solid #f8f8f8;
		border-radius: 5px;
		box-shadow: 2px 3px 2px #efefef;
		background-color: #fff;
		color: #666;
	}
	
	.faq_s:hover
	{
		text-decoration: none;
	}
	
	.faq_q
	{
		color: #707070;
		font-weight: bold;
	}
	
	
	
	//-->
</style>

<div>
	<?php
		$qcnt = 1;
		$qsel = mysqli_query($conn, "SELECT faq_id, quest, ans FROM faq WHERE qshow='1'") or die(mysqli_error($conn).'Cannot Connect to FAQ base');
		while($qrow = mysqli_fetch_row($qsel))
		{
			$h = "<h4 title=\"Click to display/hide Answer\" class=\"faq_q\" id=\"q$qrow[0]\" onclick=\"showHide('q$qrow[0]','a$qrow[0]','s$qrow[0]')\"><a href=\"javascript:void()\" id=\"s$qrow[0]\" class=\"faq_s\">&plus;</a>$qrow[1]</h4>";
			$p = "<p id=\"a$qrow[0]\" class=\"faq_a\" style=\"background-color: #fff;\">$qrow[2]</p>";
			echo $h.$p;
		}
		mysqli_free_result($qsel);
	?>
	
</div>
<div style="clear: both;"></div>


