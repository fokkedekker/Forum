<div class="forum">
	<a href="index.php">Forum</a>
</div>
<div class="categorie">
	<br />
	<?php 
	/* menu met boom structuur, voorgaande pagina's kunnen worden ingeklikt */
		// Functie neemt naam van het bestand minus extensie.
		function curPageName() 
		{
			 $dottedName = substr($_SERVER["SCRIPT_NAME"],
			 strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
			 return preg_replace('/\.[^.]*$/', '', $dottedName); 
		}
		
		// Functie pakt bestandsnaam van huidige pagina.
		function curPageFile() 
		{
			 return substr($_SERVER["SCRIPT_NAME"],
			 strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
		}
		
		// Database connectie.
		include 'dblogin.php';
		
		if (array_key_exists('cat',$_GET))
		{
			$cat = mysql_real_escape_string(strip_tags($_GET["cat"]));
			$cats = mysql_query("SELECT name FROM catagories WHERE id='$cat'");
			$cats = mysql_fetch_array($cats);
			echo "&#8627; <a href='category.php?cat=".$cat."'>".$cats['name']."</a>";
		}
		else 
			echo "&#8627; <a href='".curPageFile()."'>".curPageName()."</a>";
	?>
</div>
<div class="thread">
	<?php 
	if (array_key_exists('topicid',$_GET) && array_key_exists('cat',$_GET))
	{ 
		$topic = mysql_real_escape_string(strip_tags($_GET["topicid"]));
		$cat = mysql_real_escape_string(strip_tags($_GET["cat"]));
		//if (!empty($_GET["id"])
		//	$topic = strip_tags($_GET["id"]);
		
		$topics = mysql_query("SELECT * FROM topics WHERE post_id='$topic'");
		$topics = mysql_fetch_array($topics);
		
		echo "&#8627; <a href='draadje.php?topicid=".$topic."&cat=".$cat."'>".$topics['posttitle']."</a>";
	}
	?>
</div>
