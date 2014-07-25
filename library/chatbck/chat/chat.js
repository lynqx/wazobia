/*--------------- chat.js ----------------------*/
/*---- created by: Tope Omomo (08134053081) ----*/

function postMsg()
{
	var e=window.event;
	var key=e.which?e.which:e.keyCode;
	var n = document.getElementById('sendinp').value;
	var m = n.trim();
	var i = document.getElementById('sendid').value
	var u = document.getElementById('senduser').value
	
	
	if(m=="" || i=="" || u=="")
	return false;
	else if(key==13)
	{
		loadDoc('res','process.php?id='+i+'&user='+u+'&msg='+m);
		document.getElementById('sendinp').value="";
	}
}

	
	//load input form
	function loadDoc(div, url)
	{
		var xmlhttp;
		var loading="<span style=\"color: #ccc; font-size: small; font-family: courier; \"> Loading... </span>";
				
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
				document.getElementById(div).innerHTML=xmlhttp.responseText;
			}
			
		}
		xmlhttp.open("GET",url,true);
		xmlhttp.send();
	}
	
	/*
	//load input form
	function loadView(x)
	{
		var xmlhttp;
		var loading="<span style=\"color: #ccc; font-size: small; font-family: courier; \"> Loading... </span>";
				
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
				document.getElementById('targetDiv').innerHTML=xmlhttp.responseText;
			}
			else
			document.getElementById('targetDiv').innerHTML=loading;
		}
		xmlhttp.open("GET",'view.php?id='+x+'r='+Math.random(),true);
		xmlhttp.send();
	}
	*/
