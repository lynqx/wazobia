<?php 
//* Student Area */
/* Doubleakins*/
/* 08063777394*/
/* 19062014*/
/* redirected to when student logs in */

$page_title = "Blank Page";
$path = "";
$inc_path = $path."partials/";
include($inc_path . 'header.php'); ?> 

  						<!-- /header -->
  						<div class="row">
  							<div class="col-mod-12">

  								<ul class="breadcrumb">
  									<li><a href="index.php">Library</a></li>
  									<li class="active"><a href="language.php">Language</a></li>
  								</ul>


  								<h3 class="page-header"> Basic Template <i class="fa fa-info-circle animated bounceInDown show-info"></i> </h3>

  								<blockquote class="page-information hidden">
  									<p>
  										<b>Template Page</b> is the basic page where you can add more pages according to your requirements easily within this division.
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
  											Demo Panel
  										</h3>
  									</div>
  									<div class="panel-body panel-border">
  										<H1>Fetching data with Ajax</H1>
<form>
<input type = "button" value = "Display Message" class="btn btn-lg btn-danger" onclick = "getData('ajax/data.php', 'targetDiv')">

</form>
<div id="targetDiv">
<p>The fetched data will go here.</p>
</div>

  									</div> <!-- /panel body -->	
  								</div>	
  							</div>
  						</div>


<?php include('partials/footer.php'); ?>

<script language = "javascript">
var XMLHttpRequestObject = false;
if (window.XMLHttpRequest) {
XMLHttpRequestObject = new XMLHttpRequest();
} else if (window.ActiveXObject) {
XMLHttpRequestObject = new ActiveXObject("Microsoft.XMLHTTP");
}

function getData(dataSource, divID, )
{
if(XMLHttpRequestObject) {
var obj = document.getElementById(divID);
XMLHttpRequestObject.open("GET", dataSource);
XMLHttpRequestObject.onreadystatechange = function()
{
if (XMLHttpRequestObject.readyState == 4 &&
XMLHttpRequestObject.status == 200) {
obj.innerHTML = XMLHttpRequestObject.responseText;
}
}
XMLHttpRequestObject.send(null);
}
}
</script>

