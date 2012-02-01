<?php
	echo "<script type='text/javascript'>
		function approve(str)
		{
			  
			  if (window.XMLHttpRequest)
			  {// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp=new XMLHttpRequest();
			  }
			  else
			  {// code for IE6, IE5
				xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
			  }
			  
			  xmlhttp.onreadystatechange=function()
			  {
			  if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
				document.getElementById('topicTabel').innerHTML=xmlhttp.responseText;
				}
			  }
			xmlhttp.open('GET','approve.php?id='+str,true);
			xmlhttp.send();
		}
		function delete(str)
		{
			  
			  if (window.XMLHttpRequest)
			  {// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp=new XMLHttpRequest();
			  }
			  else
			  {// code for IE6, IE5
				xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
			  }
			  
			  xmlhttp.onreadystatechange=function()
			  {
			  if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
				document.getElementById('topicTabel').innerHTML=xmlhttp.responseText;
				}
			  }
			xmlhttp.open('GET','delete.php?id='+str,true);
			xmlhttp.send();
		}
	</script>";
	
	// Database connectie.
	include"dblogin.php";
	
	// Verkrijg variabele.
	$q = $_GET['q'];

	$sql="SELECT * FROM topics WHERE approved = '$q'";

	$result = mysql_query($sql);

	while($row = mysql_fetch_array($result))
	  {
			echo "<div class='topic_id'>";
			
			echo $row['id'];
			echo "</div>";

			echo "<div class='topic_title'>";
			echo "<a href='draadje.php?topicid=".$row['post_id']."&cat=".$row['catagorie_id']."'>".$row['posttitle']."</a>";
			echo "</div>";

			echo "<div class='topic_starttime'>";
			echo $row['starttime'];
			echo "</div>";
			
			echo "<div class='topic_action'>";
			
			if ($q != 1)
			{
				echo "<form style='float: left;' onclick='approve(".$row['id'].")'>";
				echo "<input type='submit' value='Y'/>";
				echo "</form>";
			}

			echo "<form onclick='delete(".$row['id'].")'>";
			echo "<input type='submit' value='X'/>";
			echo "</form>";
			
			echo "</div>";
	  }
?>