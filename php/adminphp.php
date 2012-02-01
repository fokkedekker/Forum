<?php
	$q=$_GET["q"];
	mysql_query(mysql_real_escape_string($q);
	include "dblogin.php";

	$sql="SELECT * FROM topics where approved = '".$q."'";

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
		if ($q != '1')
		{
			echo "<form style='float: left;' action='approve.php?id=".$row['id']."' method='POST'>";
			echo "<input type='image' src='public.png' value='Y'/>";
			echo "</form>";
		}
		echo "<form action='delete.php?id=".$row['id']."' method='POST'>";
		echo "<input type='image' src='nee.png' value='X'/>";
		echo "</form>";
		
		echo "</div>";
	}
?>

