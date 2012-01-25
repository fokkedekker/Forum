<div class="forum">
	<a href="..">Forum</a>
</div>
<div class="categorie">
	<br />
	<?php 
	include 'dblogin.php';
	if (!empty($_GET["cat"]))
	{
		$cat = strip_tags($_GET["cat"]);
		$cats = mysql_query("SELECT name FROM catagories WHERE id='$cat'");
		$cats = mysql_fetch_array($cats);
		echo "&#8627; <a href='category.php?cat=".$cat."'>".$cats['name']."</a>";
	}
	?>
</div>
<div class="thread">
	<?php 
	if (!empty($_GET["topicid"]))
	{
		$topic = strip_tags($_GET["topicid"]);
		$topics = mysql_query("SELECT * FROM topics WHERE post_id='$topic'");
		$topics = mysql_fetch_array($topics);
		
		echo "&#8627; <a href='draadje.php?topicid=".$topic."&cat=".$cat."'>".$topics['posttitle']."</a>";
	}
	?>
</div>
