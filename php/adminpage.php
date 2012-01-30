
<!DOCTYPE html PUBLIC "-//W3C/DTD XHTML 1.1//EN"
	"http://www.w3.org/ter/xhtml11/DTD/xhtml11.dtd">

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="stylesheet.css">
<<<<<<< HEAD
			<script type="text/javascript">
				function showTopic(str)
				{
					  if (str=="0")
					  {
						document.getElementById("topicTabel").innerHTML="Pending";
						str = "0";
					  }
					  else
					  {
						document.getElementById("topicTabel").innerHTML="Approved";
						str = "1";
					  }
					  
					  if (window.XMLHttpRequest)
					  {// code for IE7+, Firefox, Chrome, Opera, Safari
						xmlhttp=new XMLHttpRequest();
					  }
					  else
					  {// code for IE6, IE5
						xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
					  }
					  
					  xmlhttp.onreadystatechange=function()
					  {
					  if (xmlhttp.readyState==4 && xmlhttp.status==200)
						{
						document.getElementById("topicTabel").innerHTML=xmlhttp.responseText;
						}
					  }
					xmlhttp.open("GET","adminshow.php?q="+str,true);
					xmlhttp.send();
				}
			</script>
=======
<script type="text/javascript">
function showTopic(str)
{
if (str=="")
  {
  document.getElementById("topicTabel").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("topicTabel").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","adminphp.php?q="+str,true);
xmlhttp.send();
}
</script>

		
>>>>>>> 9cc4fb1... adminpage met ajax
		<title>
			Patriciaat Forum
		</title>
	</head>

	<body>
		<div class="container">

			<div class="header">
			<A HREF="index.php">Het Patriciaat Forum</A>
			</div>

			<div class="menu">
<<<<<<< HEAD
			<?php include 'menu.php'; ?>
			</div>
			
			<div class="slidemenu">
				<?php include 'adminslide.php'; ?>
			</div>

			<div class="center">
				<form>
					<select name="users" onchange="showTopic(this.value)">
						<option value="0">Pending Topics</option>
						<option value="1">Approved Topics</option>
					</select>
				</form>
				<br />
				<div id="topicTabel""></div>
=======
			<?php include 'menu.php' ?>
			</div>
			
			<div class="slidemenu">
			<a href="adminpagecat.php">Add Catagory</a>
			</div>

			<div class="center">
			
			<form>
			<select name="users" onchange="showTopic(this.value)">
			<option value="">Select Topic Type:</option>
			<option value="0">Pending Topics</option>
			<option value="1">Approved Topics</option>
			</select>
			</form>
			<br />
			<div id="topicTabel">Select topics will be displayed here</div>

>>>>>>> 9cc4fb1... adminpage met ajax
			</div>


			<div class="footer">
				&#169; 2012 Patriciaat 
			</div>

		</div>

	</body>





</html>