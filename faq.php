<script>
	/*function for faq_qa.php question and answer expand and collapse*/
$(document).ready(function()
{
	$("faq_q").click(function()
	{
		if($("faq_a").css("display")=='none')
		$("faq_a").css("display")='block';
		else
		$("faq_a").css("display")='none';
	
	});
});

</script>

<?php
$page = 'faq';
$page_title = 'Frequently Asked Questions';
include ('includes/header.php'); 
 ?>
     <div class="header-discription">
      <div class="container ">    
        <h2>FAQ</h2>
        <p>Frequemtly Asked Questions</p>
      </div>
    </div>

    <!--*******************content*********-->
    <div>
		<div class="container" style="color: #b5b5b5; padding-bottom: 10px;">
			<?php
				include('faq/faq_qa.php');
			?>
		</div>
	</div>
    <!-- ********************content************** -->

<?php
include ('includes/footer.php'); 
 ?>
 