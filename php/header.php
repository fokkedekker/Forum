<?php
/*Met deze file wordt de header gegenereerd omdat het in 1 file zit wordt het op de hele site tegelijk doorgevoerd.*/
	echo "<a href='index.php'>Gitmasters</a>";
	if($_SERVER['HTTPS']!="on")
	{
		$redirect= "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		header("Location:$redirect");
	}
?>