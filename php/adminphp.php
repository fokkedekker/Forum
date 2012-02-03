<?php
	/* selecteert alle topics uit de database die nog approved moeten worden, of alle posts die al geapproved zijn*/
	$q=$_GET["q"];
	include "dblogin.php";
	$q = mysql_real_escape_string($q);

	$sql="SELECT * FROM topics where approved = '".$q."'";

	$result = mysql_query($sql);
	
	while($row = mysql_fetch_array($result))
	{
		echo "<div class='topic_id'>";
		
		echo $row['id'];
		echo "</div>";
		
		// Initialiseer variabele dots.
		$dots = "";
		
		if (strlen($row['posttitle']) > 25)
			$dots = "...";
			
		echo "<div class='topic_title'>";
		echo "<a href='draadje.php?topicid=".$row['post_id']."&cat=".$row['catagorie_id']."'>".substr($row['posttitle'], 0, 24).$dots."</a>";
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

